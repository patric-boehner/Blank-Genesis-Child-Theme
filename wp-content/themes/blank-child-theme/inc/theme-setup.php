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


/**
 * Add desired theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 3.0.0
 */
add_action( 'after_setup_theme', 'pb_load_theme_support', 9 );
function pb_load_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}


/**
 * Add desired post type supports.
 *
 * See config file at `config/post-type-supports.php`.
 *
 * @since 3.0.0
 */
add_action( 'after_setup_theme', 'pb_load_post_type_support', 9 );
function pb_load_post_type_support() {

	$post_type_supports = genesis_get_config( 'post-type-supports' );

	foreach ( $post_type_supports as $post_type => $args ) {
		add_post_type_support( $post_type, $args );
	}

}


// Registers the responsive menus.
if ( function_exists( 'genesis_register_responsive_menus' ) ) {

	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );

}


// Add viewport meta tag for mobile browsers.
// add_theme_support( 'genesis-responsive-viewport' );


// Remove the site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );


// Unregister primary widget area.
unregister_sidebar( 'sidebar' ); // Primary
unregister_sidebar( 'sidebar-alt' ); // Secondary
unregister_sidebar( 'header-right' ); // Header Right


// Remove Edit link
add_filter( 'genesis_edit_post_link', '__return_false' );


// Enable/Disable author box
add_filter( 'get_the_author_genesis_author_box_single', '__return_true' );


// Remove support for custom logo
remove_action( 'after_setup_theme', 'genesis_output_custom_logo', 11 );


// Remove Genesis SEO Settings menu link
remove_theme_support( 'genesis-seo-settings-menu' );
remove_theme_support( 'genesis-customizer-seo-settings' );


// Remove Genesis menu link
remove_theme_support( 'genesis-admin-menu' );


// Remove Genesis in-post SEO Settings
remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );


// Remove Genesis in-post Layout Settings
remove_theme_support( 'genesis-inpost-layouts' );


// Remove Archive Layout settings
remove_theme_support( 'genesis-archive-layouts' );


// Remove Genesis user permisions
remove_action( 'show_user_profile', 'genesis_user_options_fields' );
remove_action( 'edit_user_profile', 'genesis_user_options_fields' );


// Rmeove Genesis taxonomy SEO settings
remove_action( 'admin_init', 'genesis_add_taxonomy_seo_options' );


// Remove Genesis user contact methods
remove_filter( 'user_contactmethods', 'genesis_user_contactmethods' );


// Remove Genesis user SEO settings
remove_action( 'show_user_profile', 'genesis_user_seo_fields' );
remove_action( 'edit_user_profile', 'genesis_user_seo_fields' );


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


// Editor Color Gradients
add_theme_support( 'editor-gradient-presets', genesis_get_config( 'editor-gradient-presets' ) );


// Disable Custom Colors
add_theme_support( 'disable-custom-colors' );


//Disable Gradients
add_theme_support( 'disable-custom-gradients' );


// Add Image Sizes.
add_image_size( 'genesis-singular-images', 800, 600, TRUE );
// add_image_size( 'genesis-singular-image-[type]', 600, 300, true ); // Specific post type
