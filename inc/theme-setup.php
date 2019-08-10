<?php

/**
 * All basic theme setups
 *
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );


// Add HTML5 markup structure.
add_theme_support( 'html5', genesis_get_config( 'html5' ) );


// Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', genesis_get_config( 'structural-wraps' ) );


// Add Accessibility support.
add_theme_support( 'genesis-accessibility', genesis_get_config( 'accessibility' ) );


// Add Primary and Footer menu
add_theme_support( 'genesis-menus', genesis_get_config( 'menus' ) );


// Remove the site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );


// Set default layout
// genesis_set_default_layout( 'full-width-content' );


// Unregister primary widget area.
// unregister_sidebar( 'sidebar' ); // Primary


// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' ); // Secondary

// Removes header right widget area.
unregister_sidebar( 'header-right' ); // Header Right


// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );


// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );


// Disable author box
// add_filter( 'get_the_author_genesis_author_box_single', '__return_false' );


// Add support for editor styles.
add_theme_support( 'editor-styles' );


// Enable support for Block Editor wide images.
add_theme_support( 'align-wide' );


// Make media embeds responsive.
add_theme_support( 'responsive-embeds' );


// Editor Font Styles
add_theme_support( 'editor-font-sizes', genesis_get_config( 'editor-font-sizes' ) );


// Disable custom font sizes
add_theme_support( 'disable-custom-font-sizes' );


// Editor Color Palette
add_theme_support( 'editor-color-palette', genesis_get_config( 'editor-color-palette' ) );


// Disable Custom Colors
add_theme_support( 'disable-custom-colors' );


// Sets the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 680; // Pixels.
}


// Add Image Sizes.
add_image_size( 'featured-image', 680, 400, TRUE );


// Remove Genesis Favicon (use site icon instead)
remove_action( 'wp_head', 'genesis_load_favicon' );
