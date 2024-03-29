<?php

/**
 * Header Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Add top banner if set before the header
add_action( 'genesis_before_header', 'pb_add_banner' );
function pb_add_banner() {

  if( pb_is_landing_page() ) {
    return;
  }

  if ( function_exists( 'cf_show_content_area' ) && function_exists( 'cf_output_banner' )  ) {

     // Output styles
     wp_print_styles( 'banner-style' );

     cf_output_banner();
		
	}

}