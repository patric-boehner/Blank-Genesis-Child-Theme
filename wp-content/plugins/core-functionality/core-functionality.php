<?php
/**
 * Plugin Name: Core Functionality
 * Plugin URI: https://btsadventures.com
 * Description: This custom plugin is a companion to your websites. It contains all your site's core functionality so that it is independent of your theme. For your site to have all its intended functionality, this plugin must be active.
 * Version: 1.1.8
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


//* Version Numbers
//**********************

// If debug is on return version number as time, otherwsie return static number
define ('CF_VERSION', '1.1.8');

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
// require_once( CORE_DIR . 'inc/blocks/categories.php' );s
// require_once( CORE_DIR . 'inc/blocks/content-grid/block.php' );
// require_once( CORE_DIR . 'inc/blocks/taxonomy-grid/block.php' );
// require_once( CORE_DIR . 'inc/blocks/icon/block.php' );
// require_once( CORE_DIR . 'inc/blocks/video/block.php' );
// require_once( CORE_DIR . 'inc/blocks/toggle/block.php' );
// require_once( CORE_DIR . 'inc/blocks/custom-block/custom-block.php' );


require_once( CORE_DIR . 'inc/blocks/register-blocks.php' );


// Plugible
require_once( CORE_DIR . 'inc/pluggable/social-share/social-share.php' );
require_once( CORE_DIR . 'inc/pluggable/email-testing/email-testing.php' );
require_once( CORE_DIR . 'inc/pluggable/user-profile-image/user-profile-image.php' );
require_once( CORE_DIR . 'inc/pluggable/banner/banner.php' );
require_once( CORE_DIR . 'inc/pluggable/related-posts/related-posts.php' );
require_once( CORE_DIR . 'inc/pluggable/events/plugin.php' );



// Plugin Activation hook
register_activation_hook( __FILE__, 'cf_core_functionality_activate_hook' );
function cf_core_functionality_activate_hook() {

	// Register custom post types
	cf_register_cpt_content_areas();
	cf_register_cpt_events();

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

	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules();

}


// Plugin Deactivation Hook
register_deactivation_hook(  __FILE__, 'cf_core_functionality_deactivation_hook' );
function cf_core_functionality_deactivation_hook() {

	// Unregister post types
	unregister_post_type( 'content_area' );
	unregister_post_type( 'events' );

	// Remove testing cron schedual
	wp_clear_scheduled_hook( 'cf_cron_email_test' );

	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules();

}