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


// Remove Genesis in-post Scripts Settings
remove_action( 'admin_menu', 'genesis_add_inpost_scripts_box' );
remove_action( 'save_post', 'genesis_inpost_seo_save', 1, 2 );


// Remove Genesis in-post Layout Settings
remove_theme_support( 'genesis-inpost-layouts' );


// Remove Archive Layout settings
remove_theme_support( 'genesis-archive-layouts' );


/**
 * Genesis SEO settings:
 * For refrance, see /genesis/lib/functions/seo.php
 */

// Remove Genesis in-post SEO Settings
remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );


// Remove Genesis SEO Settings menu link
remove_theme_support( 'genesis-seo-settings-menu' );


// Rmeove Genesis taxonomy SEO settings
remove_action( 'admin_init', 'genesis_add_taxonomy_seo_options' );


// Remove Genesis user contact methods
remove_filter( 'user_contactmethods', 'genesis_user_contactmethods' );


// Remove Genesis user SEO settings
remove_action( 'show_user_profile', 'genesis_user_seo_fields' );
remove_action( 'edit_user_profile', 'genesis_user_seo_fields' );
