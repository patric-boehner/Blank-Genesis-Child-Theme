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

    $id = pb_get_id_by_slug( 'banner', 'content_area' );
    $display = esc_attr( get_field( 'enable_banner', $id ) );
    $cookie = esc_attr( get_field( 'banner_cookie', $id ) );

    // Adjust display and remove cookie if not set to allow banner to close
    if( $cookie == 'enable' ){
      $class = ' header-banner__button';
    } else {
      $class = '';
    }

    if( $display == 'enable' ) {

      echo '<div class="header-banner'.$class.'">';

        pb_show_content_area( 'banner' );

        if( $cookie == 'enable' ) {
          // Output banner close button
          include CHILD_DIR . '/inc/views/banner-button.php';
        }

      echo '</div>';

    }
		
	}

}
