<?php

/**
 * Login page customization
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Filter login logo url
add_filter( 'login_headerurl', 'pb_login_logo_url_change' );
function pb_login_logo_url_change() {

	return esc_url( home_url() );

}


// Filter login logo text
add_filter( 'login_headertitle', 'pb_login_logo_site_title' );
function pb_login_logo_site_title() {

	return esc_html( get_bloginfo( 'name' ) );

}


// Filter login error message
add_filter( 'login_errors', 'pb_login_errors_message' );
function pb_login_errors_message() {

	$error_message = '<b>' .esc_html__( 'Error', 'blank-child-theme' ). ': ' . '</b>' .__( 'Invalid Username/Email or Password', 'blank-child-theme' ). '';
	return $error_message;

}
