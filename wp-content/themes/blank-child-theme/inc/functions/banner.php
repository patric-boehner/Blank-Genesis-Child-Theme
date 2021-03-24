<?php

/**
 * Banner & Cookie functions
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Remove banner cookie when cookies are disabled and the cookie is present
add_action('init', 'pb_remove_banner_cookie');
function pb_remove_banner_cookie() {

	$id = pb_get_id_by_slug( 'banner', 'content_area' );
	
	$display = esc_attr( get_post_meta( $id, 'enable_banner', true ) );
	$cookie = esc_attr( get_post_meta( $id, 'banner_cookie', true ) );

	if ( ( $cookie == 'disable' || $display == 'disable' ) && isset( $_COOKIE[ 'banner-hidden' ] ) ) {
		unset( $_COOKIE[ 'banner-hidden' ] );
		setcookie( 'banner-hidden', '', time() - 3600 );
	}

}
