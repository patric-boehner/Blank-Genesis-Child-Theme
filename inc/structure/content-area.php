<?php

/**
 * Main Content Area Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Add stylesheet before Content Area
add_action( 'genesis_before_content', 'pb_load_content_area_styles' );
function pb_load_content_area_styles() {

	wp_print_styles( array( 'site-content-area-partial' ) ); // Note: If this was already done it will be skipped.

}
