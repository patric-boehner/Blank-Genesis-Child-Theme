<?php

/**
 * Banner Strucutre
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;



// Output banner
function pb_output_banner() {

    // Banner
    $id = pb_get_id_by_slug( 'banner', 'content_area' );
    $display = esc_attr( get_post_meta( $id, 'enable_banner', true ) );
    $cookie = esc_attr( get_post_meta( $id, 'banner_cookie', true ) );

    // Adjust display and remove cookie if not set to allow banner to close
    $class = ( $cookie == 'enable' ) ? ' header-banner__button' : '';

    // Enable the cookie
    if( $display == 'enable' ) {

        echo '<div class="header-banner'.$class.'">';

        if( $cookie == 'enable' ) {
            // Output banner close button
            include CHILD_DIR . '/inc/views/banner-button.php';
        }

        pb_show_content_area( array(
            'location'      => 'banner',
        ) );

        echo '</div>';

    }

}


// Retrive Customize settings for banner cookie
function pb_get_banner_cookie_settings() {

    $id = pb_get_id_by_slug( 'banner', 'content_area' );
    $days = esc_attr( get_post_meta( $id, 'hide_banner', true ) );

    $settings = array(
        'days'	=> $days,
    );

    return $settings;

}


// Check if the banner is active and if the cookie is not set
function pb_is_banner_active() {

	$id = pb_get_id_by_slug( 'banner', 'content_area' );
    $display = esc_attr( get_post_meta( $id, 'enable_banner', true ) );
    $cookie = esc_attr( get_post_meta( $id, 'banner_cookie', true ) );

	return ( ( $display == 'enable' || $cookie == 'enable' ) && !isset( $_COOKIE[ 'banner-hidden' ] ) ) ? true : false ;
		
}