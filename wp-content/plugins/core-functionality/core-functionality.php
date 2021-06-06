<?php
/**
 * Plugin Name: Core Functionality
 * Plugin URI: https://
 * Description: This custom plugin is a companion to your websites. It contains all your site's core functionality so that it is independent of your theme. For your site to have all its intended functionality, this plugin must be active.
 * Version: 1.0.3
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
 * This plugin is inspired and originaly cam from Bill Erickson's own example core plugin.
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

// Plugin File Path Fix For Activation Hook
// http://timneill.net/2013/01/help-register_activation_hook-isnt-working/
define('CORE_PLUGIN_PATH', WP_PLUGIN_DIR . '/core-functionality/');
require_once CORE_PLUGIN_PATH . 'core-functionality.php';


//* Version Numbers
//**********************

// If debug is on return version number as time, otherwsie return static number
define ('CF_VERSION', '1.1.0');

//* Cache Busting
function pb_cf_version_id() {
	if ( WP_DEBUG )
	return time();
	return CF_VERSION;
}


//* Include Plugin Files
//**********************

// Init
require_once( CORE_DIR . '/inc/init.php' );


// Post Types
include_once( CORE_DIR . '/inc/post-types/content-areas.php' );
include_once( CORE_DIR . '/inc/post-types/blocks.php' );
// include_once( CORE_DIR . '/inc/post-types/post-type.php' );


// Taxonomies
// include_once( CORE_DIR . '/inc/taxonomies/tax-name.php' );

// Blocks
include_once( CORE_DIR . '/inc/blocks/categories.php' );
// include_once( CORE_DIR . '/inc/blocks/custom-block/custom-block.php' );
include_once( CORE_DIR . '/inc/blocks/content-grid/content-grid.php' );
include_once( CORE_DIR . '/inc/blocks/icon/icon-block.php' );
include_once( CORE_DIR . '/inc/blocks/video/video-block.php' );
include_once( CORE_DIR . '/inc/blocks/toggle/toggle-block.php' );
include_once( CORE_DIR . '/inc/blocks/max-width/max-width-block.php' );

// Plugible
include_once( CORE_DIR . '/inc/plugable/popular-posts.php' );