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


// Enable support for Gutenberge wide images.
// add_theme_support( 'gutenberg', array(
// 	'wide-images' => true,
// ) );


// Enable support for WooCommerce and WooCommerce features.
// add_theme_support( 'woocommerce' );
// add_theme_support( 'wc-product-gallery-zoom' );
// add_theme_support( 'wc-product-gallery-lightbox' );
// add_theme_support( 'wc-product-gallery-slider' );


// Add Image Sizes.
add_image_size( 'featured-image', 720, 400, TRUE );


// Change the favicon path
add_filter( 'genesis_favicon_url', 'custom_favicon_url' );
function custom_favicon_url( $favicon ) {

	$favicon =  get_stylesheet_directory_uri() . '/assets/images/favicon.png';

	return $favicon;

}
