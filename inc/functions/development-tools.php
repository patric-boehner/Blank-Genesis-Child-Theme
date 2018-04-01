<?php

/**
 * Development and Staging Enviroment Color Change
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


/**
* Forked from Server Press Local Admin Color Bar
* @link: https://serverpress.com/plugins/local-admin-bar-color
* @author: Gregg Franklin
*
* Also barrowed from Bill Ericksos's core functionality plugin.
* @link https://github.com/billerickson
*/

add_action( 'init', 'pb_admin_bar_text' );
function pb_admin_bar_text() {

	if ( is_admin_bar_showing() ) {
		if ( pb_is_local_dev_site() || pb_is_staging_site() || pb_is_development_staging_site() ) {

			// Add admin notice
			add_action( 'admin_bar_menu', 'pb_admin_bar_notice' );
			// Remove Howdy
			add_filter( 'admin_bar_menu', 'pb_remove_howdy' );
			// Style the admin bar
			add_action( 'admin_head', 'pb_admin_bar_notice_css' );

		}
	}

}


function pb_admin_bar_notice() {

	// Check which site we are one & change text accordingly
	if ( pb_is_local_dev_site() ) {
		$admin_text = 'Local Development Website';
	} elseif ( pb_is_development_staging_site() ) {
		$admin_text = 'Developemnt Staging Website';
	} elseif ( pb_is_staging_site() ) {
		$admin_text = 'Staging Website';
	}else {
		$admin_text = '';
	}

	$admin_notice = array(
		'parent'	=> 'top-secondary', /** puts it on the right side. */
		'id'		=> 'environment-notice',
		'title'		=> '<span>' . $admin_text . '</span>',
	);

	global $wp_admin_bar;
	$wp_admin_bar->add_menu( $admin_notice );

}


// Remove Howdy message
function pb_remove_howdy( $wp_admin_bar ) {

	$my_account = $wp_admin_bar->get_node( 'my-account' );
	$newtitle = str_replace( 'Howdy,', '', $my_account->title );
	$wp_admin_bar->add_node( array(
		'id' => 'my-account',
		'title' => $newtitle,
	) );

}

// Style the admin bar
function pb_admin_bar_notice_css() {
	$env_color = '#627f00';

	echo "<!-- WPLT Admin Bar Notice -->
	<style type='text/css'>
		#wp-admin-bar-environment-notice>div,
		#wpadminbar { background-color: $env_color !important }
		#wp-admin-bar-environment-notice { display: none }
		@media only screen and (min-width:1030px) {
			 #wp-admin-bar-environment-notice { display: block }
			 #wp-admin-bar-environment-notice>div>span {
				  color: #EEE!important;
				  font-size: 120%!important;
				  text-transform: uppercase!important;
			 }
		}
		#adminbarsearch:before,
		.ab-icon:before,
		.ab-item:before { color: #EEE !important }
	</style>";

}


/**
 * Force different color scheme when user is developer on development server
 *
 * @since 1.0.0
 * @param string $color_scheme
 * @return string
 */

add_filter( 'get_user_option_admin_color', 'pb_dev_color_scheme', 5 );
function pb_dev_color_scheme( $color_scheme ) {
	if ( pb_is_local_dev_site() ) {
		$color_scheme = 'coffee';
	} elseif ( pb_is_staging_site() || pb_is_development_staging_site() ) {
		$color_scheme = 'ocean';
	} else {
		$color_scheme = 'default';
	}
	return $color_scheme;
}


/**
 * Check if current site is a local development site
 *
 * @since 1.2.0
 * @return boolean
 */
function pb_is_local_dev_site() {
	$url_strings = array( 'localdev', 'localhost', '.dev', '.local' );
	$is_dev_site = false;
	foreach( $url_strings as $string )
		if( strpos( home_url(), $string ) )
			$is_dev_site = true;

	return $is_dev_site;
}


/**
 * Check if current site is a development staging site
 *
 * @since 1.2.0
 * @return boolean
 */
function pb_is_development_staging_site() {
	$url_strings = array( 'staging.patrickboehner.com' );
	$is_development_staging_site = false;
	foreach( $url_strings as $string )
		if( strpos( home_url(), $string ) )
			$is_development_staging_site = true;

	return $is_development_staging_site;
}


/**
 * Check if current site is a staging site
 *
 * @since 1.2.0
 * @return boolean
 */
function pb_is_staging_site() {
	$url_strings = array( 'staging.', '.flywheelsites.com', '.staging.wpengine.com' );
	$is_staging_site = false;
	foreach( $url_strings as $string )
		if( strpos( home_url(), $string ) )
			$is_staging_site = true;

	return $is_staging_site;
}
