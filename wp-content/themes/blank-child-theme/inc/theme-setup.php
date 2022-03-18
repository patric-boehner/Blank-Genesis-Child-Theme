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
add_action( 'after_setup_theme', 'pb_load_theme_support', 12 );
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
add_action( 'after_setup_theme', 'pb_load_post_type_support', 12 );
function pb_load_post_type_support() {

	$post_type_supports = genesis_get_config( 'post-type-supports' );

	foreach ( $post_type_supports as $post_type => $args ) {
		add_post_type_support( $post_type, $args );
	}

}


// Remove the site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );


// Unregister primary widget area.
unregister_sidebar( 'sidebar' ); // Primary
unregister_sidebar( 'sidebar-alt' ); // Secondary
unregister_sidebar( 'header-right' ); // Header Right


// Force narrow-content on single posts only
add_filter( 'genesis_pre_get_option_site_layout', 'pb_narrow_layout' );
function pb_narrow_layout() {

	if ( is_home() || is_archive() || is_404() || is_search() ) {
		return 'narrow-content';
	}

	if ( is_singular( 'post' ) ) {
		return 'narrow-content';
	}

}


// Only load styles for used blocks
// add_filter( 'should_load_separate_core_block_assets', '__return_true' );


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
// remove_theme_support( 'genesis-inpost-layouts' );


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


// Make media embeds responsive.
add_theme_support( 'responsive-embeds' );


// Remove Duatone SVG's
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );


// Remove block editor templates
remove_theme_support( 'block-templates' );


// Add Image Sizes.
add_image_size( 'genesis-singular-images', 800, 600, TRUE );
// add_image_size( 'genesis-singular-image-[type]', 600, 300, true ); // Specific post type


add_theme_support( 'align-wide' );