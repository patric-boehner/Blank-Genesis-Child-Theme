<?php

/**
 * Add User contact Methods
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Disable application passwords
add_filter( 'wp_is_application_passwords_available', '__return_false' );


// Register User Contact Methods
add_filter( 'user_contactmethods', 'custom_user_contact_methods' );
function custom_user_contact_methods( $user_contact_method ) {

	if ( genesis_detect_seo_plugins() ) {

		unset( $user_contact_method[ 'myspace' ] );
		unset( $user_contact_method[ 'tumblr' ] );
		unset( $user_contact_method[ 'wikipedia' ] );

		return $user_contact_method;

	}

	if ( current_user_can( 'edit_posts' ) ) {

		$user_contact_method[ 'facebook' ] = __( 'Facebook Profile', 'blank-child-theme' );
		$user_contact_method[ 'twitter' ] = __( 'Twitter Username', 'blank-child-theme' );
		$user_contact_method[ 'instagram' ] = __( 'Instagram Profile', 'blank-child-theme' );
		$user_contact_method[ 'youtube' ] = __( 'Youtube Profile', 'blank-child-theme' );
		$user_contact_method[ 'linkedin' ] = __( 'LinkedIn Profile', 'blank-child-theme' );

	}

	return $user_contact_method;

}
