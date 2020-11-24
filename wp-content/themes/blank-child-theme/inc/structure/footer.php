<?php

/**
 * Footer Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Add Footer Block Areas
add_action( 'genesis_before_footer', 'pb_footer_block_areas' );
function pb_footer_block_areas() {

	// Hide if widget areas option is toggled on
	if ( genesis_footer_widgets_hidden_on_current_page() ) {
		return;
	}

	echo '<div id="genesis-footer-widgets" class="before-footer block-content-area">';
	echo '<h2 class="screen-reader-text">Footer</h2>';
	echo '<div class="wrap">';

	if ( function_exists( 'pb_show_content_area' ) ) {
		pb_show_content_area( 'footer' );
	}

	echo "</div></div>";

}


// Customize Footer Credits
remove_filter( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'pb_footer_credit_output' );
function pb_footer_credit_output() {

		$creds_text = wp_kses_post( genesis_get_option( 'footer_text' ) );
		$output     = '<p class="copyright">' . genesis_strip_p_tags( $creds_text ) . '</p>';

		$output = apply_filters( 'genesis_footer_output', $output, $creds_text );

		echo $output;

}
