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


// Add top banner if set
add_action( 'genesis_before_header', 'pb_add_banner' );
function pb_add_banner() {

  if ( function_exists( 'pb_show_content_area' ) && !isset( $_COOKIE[ 'banner-hidden' ] ) ) {

    get_template_part( '/inc/partials/banner' );
		
	}

}
