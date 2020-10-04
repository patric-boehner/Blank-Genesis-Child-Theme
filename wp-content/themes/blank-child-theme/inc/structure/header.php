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
add_action( 'genesis_before_header', 'pb_add_top_banner' );
function pb_add_top_banner() {

	if ( get_theme_mod( 'pb-theme-top-banner-visibility', 1 ) && !isset( $_COOKIE[ 'top-banner-hidden' ] ) ) {

    $text = get_theme_mod( 'pb-theme-top-banner-text', pb_get_default_top_banner_text() );

    // Output top-banner html
    include CHILD_DIR . '/inc/views/top-banner.php';

  }

}
