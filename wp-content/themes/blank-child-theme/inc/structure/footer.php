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


// Load footer sytles
add_action( 'genesis_footer', 'pb_load_footer_styles', 1 );
function pb_load_footer_styles() {

	// Output styles
    wp_print_styles( 'footer-style' );

}


// Remove the footer credits
remove_filter( 'genesis_footer', 'genesis_do_footer' );


// Genesis footer and footer block area
add_action( 'genesis_footer', 'pb_footer', 5 );
function pb_footer() {

	echo '<h2 class="screen-reader-text">'.esc_html__('Footer', 'blank-child-theme').'</h2>';

	// Output the footer block area
	pb_footer_block_areas();

	genesis_markup(
		[
			'open'    => '<div %s>',
			'context' => 'sub-footer',
		]
	);

	// Hook location
	do_action( 'pb_before_footer_credit' );

	// Output footer credits
	pb_footer_credit_output();

	genesis_markup(
		[
			'close'   => '</div>',
			'context' => 'sub-footer',
		]
	);


}


// Add Footer Block Areas
function pb_footer_block_areas() {

	// Hide if widget areas option is toggled on
	if ( genesis_footer_widgets_hidden_on_current_page() ) {
		return;
	}

	// Output content area
	if ( function_exists( 'cf_show_content_area' ) ) {
		cf_show_content_area( array(
			'location' => 'footer',
			'id'	   => 'footer',
		) );
	}

}


// Customize Footer Credits
function pb_footer_credit_output() {

	$creds_text = wp_kses_post( genesis_get_option( 'footer_text' ) );
	$output     = '<p class="copyright">' . genesis_strip_p_tags( $creds_text ) . '</p>';

	$output = apply_filters( 'genesis_footer_output', $output, $creds_text );

	echo $output;

}
