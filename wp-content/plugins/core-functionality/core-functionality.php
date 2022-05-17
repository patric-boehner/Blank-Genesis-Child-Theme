<?php
/**
 * Plugin Name: Core Functionality
 * Plugin URI: https://
 * Description: This custom plugin is a companion to your websites. It contains all your site's core functionality so that it is independent of your theme. For your site to have all its intended functionality, this plugin must be active.
 * Version: 1.1.3
 * Author: Patrick Boehner
 * Author URI: http://www.patrickboehner.com
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * This plugin is inspired and originaly came from Bill Erickson's own example core plugin.
 * Original Project: https://github.com/billerickson/Core-Functionality
 *
 */

//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


//* Setup
//**********************

// Plugin Path
if ( !defined( 'CORE_DIR' ) ) {
	define( 'CORE_DIR', plugin_dir_path( __FILE__ ) );
}

// Plugin URL
if ( !defined( 'CORE_URL' ) ) {
	define( 'CORE_URL', plugin_dir_url( __FILE__ ) );
}

// Plugin Root File
if ( !defined( 'CORE_FILE' ) ) {
	define( 'CORE_FILE', __FILE__ );
}

// Cron test email
if( !defined( 'CRON_EMAIL' ) ) {
	define( 'CRON_EMAIL', 'test@example.com' );
}



//* Version Numbers
//**********************

// If debug is on return version number as time, otherwsie return static number
define ('CF_VERSION', '1.1.3');

// Cache Busting
function cf_cf_version_id() {

	// Use current time if using debug
	if ( WP_DEBUG ) {
		return time();
	}

	// Otherwsie use the plugin version number
	return CF_VERSION;

}	
	


//* Include Plugin Files
//**********************

add_action( 'plugins_loaded', '_cf_core_functionality' );
function _cf_core_functionality() {

	// Admin
	require_once( CORE_DIR . 'inc/admin/admin-bar-notice.php' );
	require_once( CORE_DIR . 'inc/admin/admin-menu.php' );
	require_once( CORE_DIR . 'inc/admin/admin-bar.php' );
	require_once( CORE_DIR . 'inc/admin/user-roles.php' );


	// Functions
	require_once( CORE_DIR . 'inc/functions/dont-update.php' );
	require_once( CORE_DIR . 'inc/functions/custom-meta.php' );
	require_once( CORE_DIR . 'inc/functions/custom-functions.php' );
	require_once( CORE_DIR . 'inc/functions/editor-placeholder.php' );
	require_once( CORE_DIR . 'inc/functions/seo.php' );
	require_once( CORE_DIR . 'inc/functions/acf.php' );
	require_once( CORE_DIR . 'inc/functions/user-profile.php' );


	// Post Types
	require_once( CORE_DIR . 'inc/post-types/content-areas.php' );
	require_once( CORE_DIR . 'inc/post-types/blocks.php' );
	// require_once( CORE_DIR . 'inc/post-types/post-type.php' );


	// Taxonomies
	// require_once( CORE_DIR . 'inc/taxonomies/tax-name.php' );


	// Blocks
	require_once( CORE_DIR . 'inc/blocks/categories.php' );
	require_once( CORE_DIR . 'inc/blocks/content-grid/content-grid.php' );
	require_once( CORE_DIR . 'inc/blocks/icon/icon-block.php' );
	require_once( CORE_DIR . 'inc/blocks/video/video-block.php' );
	require_once( CORE_DIR . 'inc/blocks/toggle/toggle-block.php' );
	require_once( CORE_DIR . 'inc/blocks/max-width/max-width-block.php' );
	// require_once( CORE_DIR . 'inc/blocks/custom-block/custom-block.php' );


	// Plugible
	require_once( CORE_DIR . 'inc/plugable/social-share/social-share.php' );
	require_once( CORE_DIR . 'inc/plugable/email-testing/email-testing.php' );
	require_once( CORE_DIR . 'inc/plugable/user-profile-image/user-profile-image.php' );
	require_once( CORE_DIR . 'inc/plugable/banner/banner.php' );


	// For third-party plugins looking to load their files
	do_action( 'cf_core_functionality_loaded' );

}


// Plugin Activation hook
register_activation_hook( __FILE__, 'cf_core_functionality_activate_hook' );
function cf_core_functionality_activate_hook() {

	// Startup
	_cf_core_functionality();

	// Add Content Areas post type
	cf_register_cpt_content_areas();

	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules();

	// Add Cron Events
	cf_add_cron_event_email_test();

	// Admin user role
	cf_admin_user_role();

	// Editor user role
	cf_editor_user_role();

	// Author user role
	cf_author_user_role();

	// Contributor user role
	cf_contributor_user_role();

	// Developer user role
	cf_developer_user_role();

}


// Plugin Deactivation Hook
register_deactivation_hook(  __FILE__, 'cf_core_functionality_deactivation_hook' );
function cf_core_functionality_deactivation_hook() {

	wp_clear_scheduled_hook( 'cf_cron_email_test' );

}


// Plugin Uninstall Hook
register_uninstall_hook(  __FILE__, 'cf_core_functionality_uninstall_hook' );
function cf_core_functionality_uninstall_hook() {

}
