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


// Register User Contact Methods
add_filter( 'user_contactmethods', 'custom_user_contact_methods' );
function custom_user_contact_methods( $user_contact_method ) {

	$user_contact_method['facebook'] = __( 'Facebook profile', 'blank-child-theme' );
	$user_contact_method['twitter'] = __( 'Twitter profile', 'blank-child-theme' );
	$user_contact_method['linkedin'] = __( 'LinkedIn profile', 'blank-child-theme' );

	return $user_contact_method;

}
