<?php
/**
 * This file adds functions to the Blank Child Theme.
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */

// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Start the engine.
include_once get_template_directory() . '/lib/init.php';


// Set localization
// add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
// function genesis_sample_localization_setup() {
//
// 	load_child_theme_textdomain( genesis_get_theme_handle(), get_stylesheet_directory() . '/languages' );
//
// }


// Child theme (do not remove).
define( 'CHILD_THEME_HANDLE', sanitize_title_with_dashes( wp_get_theme()->get( 'Name' ) ) );
define( 'CHILD_THEME_VERSION', wp_get_theme()->get( 'Version' ) );


// Cache Busting
function cache_version_id() {

	if ( WP_DEBUG ) {
		return time();
	} else {
		return CHILD_THEME_VERSION;
	}

}


// Stop loading depriated functions
add_filter( 'genesis_load_deprecated', '__return_false' );


// Theme Setup & Defaults
include_once( CHILD_DIR . '/inc/theme-setup.php' );
include_once( CHILD_DIR . '/inc/theme-assets.php' );


// Admin
include_once( CHILD_DIR . '/inc/admin/customizer/customizer.php' );
include_once( CHILD_DIR . '/inc/admin/widgets.php' );
include_once( CHILD_DIR . '/inc/admin/editor.php' );
include_once( CHILD_DIR . '/inc/admin/menu.php' );
include_once( CHILD_DIR . '/inc/admin/layouts.php' );
include_once( CHILD_DIR . '/inc/admin/dashboard.php' );
include_once( CHILD_DIR . '/inc/admin/user-profile.php' );
include_once( CHILD_DIR . '/inc/admin/block-patterns.php' );


// Gobal Functions
include_once( CHILD_DIR . '/inc/functions/autoptimize.php' );
include_once( CHILD_DIR . '/inc/functions/banner.php' );
include_once( CHILD_DIR . '/inc/functions/cleanup-header.php' );
include_once( CHILD_DIR . '/inc/functions/helpers.php' );
include_once( CHILD_DIR . '/inc/functions/resource-loading.php' );
include_once( CHILD_DIR . '/inc/functions/social-share.php' );
include_once( CHILD_DIR . '/inc/functions/markup.php' );
include_once( CHILD_DIR . '/inc/functions/post-thumbnail-cache.php' );
include_once( CHILD_DIR . '/inc/functions/media.php' );
include_once( CHILD_DIR . '/inc/functions/js-body-class.php' );
include_once( CHILD_DIR . '/inc/functions/inline-svg.php' );
include_once( CHILD_DIR . '/inc/functions/sitemap.php' );;


// Blocks
include_once( CHILD_DIR . '/inc/blocks/paragraphs.php' );


// Structure
include_once( CHILD_DIR . '/inc/structure/header.php' );
include_once( CHILD_DIR . '/inc/structure/comments.php' );
include_once( CHILD_DIR . '/inc/structure/search.php' );
include_once( CHILD_DIR . '/inc/structure/footer.php' );
include_once( CHILD_DIR . '/inc/structure/post.php' );
include_once( CHILD_DIR . '/inc/structure/archive.php' );
include_once( CHILD_DIR . '/inc/structure/loop.php' );
include_once( CHILD_DIR . '/inc/structure/menu.php' );
include_once( CHILD_DIR . '/inc/structure/breadcrumbs.php' );
include_once( CHILD_DIR . '/inc/structure/skip-links.php' );
include_once( CHILD_DIR . '/inc/structure/login.php' );
