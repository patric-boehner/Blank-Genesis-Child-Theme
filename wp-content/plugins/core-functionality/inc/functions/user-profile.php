<?php

/**
 * Update User Profile fields
 *
 * @author      Patrick Boehner
 * @link        http://www.patrickboehner.com
 * @package     Core Functionality
 * @copyright   Copyright (c) 2012, Patrick Boehner
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Register User Contact Methods
add_filter( 'user_contactmethods', 'cf_custom_user_contact_methods' );
function cf_custom_user_contact_methods( $user_contact_method ) {

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
