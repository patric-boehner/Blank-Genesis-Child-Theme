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


// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Blank Child Theme' );
define( 'CHILD_THEME_URL', 'http://example.com/' );
define( 'CHILD_THEME_VERSION', '1.0.7' );


// Cache Busting
function cache_version_id() {

	if ( WP_DEBUG ) {
		return time();
	} else {
		return CHILD_THEME_VERSION;
	}

}

// Set Content Width
$content_width = apply_filters( 'content_width', 720, 720, 720 );


/**
 * Theme Setup
 * @since 1.0.0
 *
 * This setup function attaches all of the site-wide functions
 * to the correct hooks and filters. All the functions themselves
 * are defined below this setup function.
 *
 */

add_action('genesis_setup','pb_child_theme_setup', 15);
function pb_child_theme_setup() {

	// Stop loading depriated functions
	add_filter( 'genesis_load_deprecated', '__return_false' );


	// Theme Setup
	include_once( CHILD_DIR . '/inc/theme-setup.php' );


	// Load Stylesheets & Scripts
	include_once( CHILD_DIR . '/inc/functions/load-assets.php' );
	// Admin Tools
	include_once( CHILD_DIR . '/inc/functions/development-tools.php' );


	// Admin
	include_once( CHILD_DIR . '/inc/admin/widgets.php' );
	include_once( CHILD_DIR . '/inc/admin/customizer.php' );
	include_once( CHILD_DIR . '/inc/admin/genesis-metaboxes.php' );
	include_once( CHILD_DIR . '/inc/admin/inpost-editor.php' );
	include_once( CHILD_DIR . '/inc/admin/screen-options.php' );
	include_once( CHILD_DIR . '/inc/admin/theme-defaults.php' );
	include_once( CHILD_DIR . '/inc/admin/login.php' );
	include_once( CHILD_DIR . '/inc/admin/menu.php' );
	include_once( CHILD_DIR . '/inc/admin/dashboard.php' );


	// Gobal Functions
	include_once( CHILD_DIR . '/inc/functions/cleanup.php' );
	include_once( CHILD_DIR . '/inc/functions/helpers.php' );
	include_once( CHILD_DIR . '/inc/functions/markup.php' );
	include_once( CHILD_DIR . '/inc/functions/post-thumbnail-cache.php' );
	include_once( CHILD_DIR . '/inc/functions/media.php' );
	include_once( CHILD_DIR . '/inc/functions/js-body-class.php' );
	// include_once( CHILD_DIR . '/inc/functions/svg-sprite.php' );
	include_once( CHILD_DIR . '/inc/functions/sitemap.php' );
	include_once( CHILD_DIR . '/inc/functions/breadcrumbs.php' );
	// include_once( CHILD_DIR . '/inc/functions/ninja-forms-filter.php' );
	// include_once( CHILD_DIR . '/inc/functions/yoast-filter.php' );


	// Structure
	include_once( CHILD_DIR . '/inc/structure/comments.php' );
	include_once( CHILD_DIR . '/inc/structure/search.php' );
	include_once( CHILD_DIR . '/inc/structure/footer.php' );
	include_once( CHILD_DIR . '/inc/structure/post.php' );
	include_once( CHILD_DIR . '/inc/structure/archive.php' );
	include_once( CHILD_DIR . '/inc/structure/loop.php' );
	include_once( CHILD_DIR . '/inc/structure/menu.php' );

}
