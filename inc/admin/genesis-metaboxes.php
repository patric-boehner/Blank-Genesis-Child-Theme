<?php

/**
 * Remove Genesis In-Post Metaboxes
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Removes output of unused admin settings metaboxes.
add_action( 'genesis_theme_settings_metaboxes', 'genesis_sample_remove_metaboxes' );
function genesis_sample_remove_metaboxes( $_genesis_admin_settings ) {

	remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
	remove_meta_box( 'genesis-theme-settings-nav', $_genesis_admin_settings, 'main' );

}


// Remove Genesis in-post Layout Settings
remove_theme_support( 'genesis-inpost-layouts' );


// Remove Archive Layout settings
remove_theme_support( 'genesis-archive-layouts' );


// Remove Genesis user permisions
remove_action( 'show_user_profile', 'genesis_user_options_fields' );
remove_action( 'edit_user_profile', 'genesis_user_options_fields' );


/**
 * Genesis SEO settings:
 * For refrance, see /genesis/lib/functions/seo.php
 */

// Remove Genesis in-post SEO Settings
remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );


// Rmeove Genesis taxonomy SEO settings
remove_action( 'admin_init', 'genesis_add_taxonomy_seo_options' );


// Remove Genesis user contact methods
remove_filter( 'user_contactmethods', 'genesis_user_contactmethods' );


// Remove Genesis user SEO settings
remove_action( 'show_user_profile', 'genesis_user_seo_fields' );
remove_action( 'edit_user_profile', 'genesis_user_seo_fields' );
