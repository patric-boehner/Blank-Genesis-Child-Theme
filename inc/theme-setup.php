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



// Add HTML5 markup structure.
add_theme_support( 'html5', array(

	'caption',
	'comment-form',
	'comment-list',
	'gallery',
	'search-form'

) );


// Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(

	'header',
	'nav',
	'footer-widgets',
	'footer'

) );


// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array(

	'404-page',
	'drop-down-menu',
	'headings',
	'rems',
	'search-form',
	'skip-links'

) );


// Add Primary and Footer menu
add_theme_support( 'genesis-menus', array(

	'primary' => __( 'Primary Menu', 'blank-child-theme' ),
	'secondary' => __( 'Footer Menu', 'blank-child-theme' ),

) );


// Remove the site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );


// Remove default layouts
// genesis_unregister_layout( 'content-sidebar' );
// genesis_unregister_layout( 'sidebar-content' );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
// genesis_unregister_layout( 'full-width-content' );


// Set default layout
// genesis_set_default_layout( 'full-width-content' );


// Unregister Genesis widgets
// unregister_sidebar( 'sidebar' ); // Primary
unregister_sidebar( 'sidebar-alt' ); // Secondary
unregister_sidebar( 'header-right' ); // Header Right


// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );


// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );


// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );


// Display author box
// add_filter( 'get_the_author_genesis_author_box_single', '__return_false' );


// Add support for editor styles.
add_theme_support( 'editor-styles' );


// Enable support for Block Editor wide images.
add_theme_support( 'align-wide' );


// Make media embeds responsive.
add_theme_support( 'responsive-embeds' );


// Disable custom font sizes
add_theme_support( 'disable-custom-font-sizes' );


// -- Editor Font Styles
add_theme_support( 'editor-font-sizes', array(

	array(
		'name'      => __( 'small', 'blank-child-theme' ),
		'shortName' => __( 'S', 'blank-child-theme' ),
		'size'      => 16,
		'slug'      => 'small'
	),
	array(
		'name'      => __( 'regular', 'blank-child-theme' ),
		'shortName' => __( 'M', 'blank-child-theme' ),
		'size'      => 20,
		'slug'      => 'regular'
	),
	array(
		'name'      => __( 'large', 'blank-child-theme' ),
		'shortName' => __( 'L', 'blank-child-theme' ),
		'size'      => 24,
		'slug'      => 'large'
	),

) );


// Disable Custom Colors
add_theme_support( 'disable-custom-colors' );


// Editor Color Palette
add_theme_support( 'editor-color-palette', array(

	array(
		'name'  => __( 'Blue', 'ea_genesis_child' ),
		'slug'  => 'blue',
		'color'	=> '#004b96',
	),
	array(
		'name'  => __( 'Green', 'ea_genesis_child' ),
		'slug'  => 'green',
		'color' => '#58AD69',
	),
	array(
		'name'  => __( 'Orange', 'ea_genesis_child' ),
		'slug'  => 'orange',
		'color' => '#FFBC49',
	),
	array(
		'name'	=> __( 'Red', 'ea_genesis_child' ),
		'slug'	=> 'red',
		'color'	=> '#E2574C',
	),

) );


// Sets the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 680; // Pixels.
}


// Add Image Sizes.
add_image_size( 'featured-image', 680, 400, TRUE );


// Remove Genesis Favicon (use site icon instead)
remove_action( 'wp_head', 'genesis_load_favicon' );
