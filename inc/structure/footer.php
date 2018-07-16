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


// Add stylesheet before Footer
add_action( 'genesis_before_footer', 'pb_load_footer_styles' );
function pb_load_footer_styles() {

	wp_print_styles( array( 'site-footer-partial' ) ); // Note: If this was already done it will be skipped.

}


// Customize Footer Credits
add_filter( 'genesis_footer_output', 'pb_footer_cred_output' );
function pb_footer_cred_output() {

	$first_year		   = '2018';

	if( date( 'Y' ) !== $first_year ){
		$credits_years   = '&copy; ' . $first_year . ' - ' . date( 'Y' ) . ' ' . '';
	} else {
		$credits_years   = '&copy; ' . $first_year . ' ' . '';
	}

	// Include copyright view
	include CHILD_DIR . '/inc/views/copyright-text.php';

}
