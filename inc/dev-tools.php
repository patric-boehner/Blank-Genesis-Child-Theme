<?php

/**
 * Force different color scheme when user is developer on development server
 *
 * @since 1.0.0
 * @param string $color_scheme
 * @return string
 */
function pb_dev_color_scheme( $color_scheme ) {
	if ( pb_is_developer() && pb_is_dev_site() ) {
		$color_scheme = 'ocean';
	} elseif ( pb_is_developer() && pb_is_staging_site() ) {
		$color_scheme = 'coffee';
	} else {
		$color_scheme = 'default';
	}
	return $color_scheme;
}
add_filter( 'get_user_option_admin_color', 'pb_dev_color_scheme', 5 );

/**
 * Check if current user is the developer
 *
 * @since 1.0.0
 * @global array $current_user
 * @return boolean
 */
function pb_is_developer() {
	// Check if user is logged in
	if ( !is_user_logged_in() ) {
		return false;
	}
	// Approved developer
	$approved = array(
		'admin',
      'patrickboehner',
	);
	// Get the current user
	$current_user = wp_get_current_user();
	$current_user = strtolower( $current_user->user_login );
	// Check if current user is approved developer
	return in_array( $current_user, $approved );
}

/**
 * Check if current site is a development site
 *
 * @since 1.2.0
 * @return boolean
 */
function pb_is_dev_site() {
	$dev_strings = array( 'localdev', 'localhost', 'dev.', '.dev', '.local' );
	$is_dev_site = false;
	foreach( $dev_strings as $string )
		if( strpos( home_url(), $string ) )
			$is_dev_site = true;

	return $is_dev_site;
}

/**
 * Check if current site is a staging site
 *
 * @since 1.2.0
 * @return boolean
 */
function pb_is_staging_site() {
	$dev_strings = array( 'staging.', 'staging' );
	$is_staging_site = false;
	foreach( $dev_strings as $string )
		if( strpos( home_url(), $string ) )
			$is_staging_site = true;

	return $is_staging_site;
}
