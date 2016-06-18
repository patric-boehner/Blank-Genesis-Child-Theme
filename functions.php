<?php

//* Theme Functions
//**********************************************

/**
* @package		[Blank Genesis Child Theme]
* @author		Patrick Boehner
* @copyright	Copyright (c) 2015, Patrick Boehner
* @license		GPL-2.0+
*/

/**
* Remember to replace [Blank Genesis Child Theme] with the final
* child theme name throught the child theme.
*/

//**********************************************
//* Security Updates
//**********************************************

//* Block Direct Acess
if( !defined( 'ABSPATH' ) ) exit;

//* Prevent File Modifications
define ( 'DISALLOW_FILE_EDIT', true );


//**********************************************
//* Maintance Mode
//**********************************************

//* Comment out to turn off
// include_once( CHILD_DIR . '/lib/maintenace-mode.php' );


//**********************************************
//* Local Development
//**********************************************

// If debug is on return version number as time, otherwsie return static number
define ('VERSION', '1.0.1');

//* Cache Busting
function pb_version_id() {
	if ( WP_DEBUG )
	return time();
	return VERSION;
}

//* Test File
// Remove before deployment
require_once( dirname(__FILE__)."/lib/test.php" );


//**********************************************
//* Define the Child theme
//**********************************************

define( 'CHILD_THEME_NAME', '[Blank Genesis Child Theme]' );
define( 'CHILD_THEME_URL', 'http://www.example.com/' );
define( 'CHILD_THEME_VERSION', pb_version_id() );


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

   //**********************************************
   //* Setup child theme functions
   //**********************************************

   // Clean up and organize all our changes
   include_once( CHILD_DIR . '/lib/theme-functions.php' );


   //**********************************************
   //* Load Site Library Files & Scripts
   //**********************************************
   //* Files found in the lib directory /functions-backend.php
   // https://codex.wordpress.org/Function_Reference/wp_enqueue_script

	//* Editor Styles
	// add_editor_style( '/css/editor-style.min.css' );

   //* Login Styles
   add_action( 'login_enqueue_scripts', 'pb_login_styles', 10 );

   //* Load Google Web Fonts
   add_action( 'wp_enqueue_scripts', 'pb_google_fonts' );

	//* Mobile Responsive Menu
	add_action( 'wp_enqueue_scripts', 'pb_mobile_responsive_menu_script' );

	//* Scroll To Top Script
	add_action( 'wp_enqueue_scripts', 'pb_scroll_to_top_script' );


	//* Fitvid Script
	add_action( 'wp_enqueue_scripts', 'pb_enqueue_fitvid_scripts' );


   //**********************************************
   //* Backend
   //**********************************************

   //* Stop WordPress from Guessing Urls
   add_filter('redirect_canonical', 'pb_stop_guessing');


   //* Admin Screen
   //**********************

   //* Hide Admin Areas that are not used
   add_action( 'admin_menu', 'pb_remove_menu_pages' );

   //* Hide Admin Bar options not in user
   add_action( 'wp_before_admin_bar_render', 'pb_remove_admin_bar_options' );

   //* Change Admin Menu Order
   add_filter( 'custom_menu_order', 'pb_custom_menu_order' );
   add_filter( 'menu_order', 'pb_custom_menu_order' );

   //* Remove Dashboard Meta Boxes
   add_action( 'wp_dashboard_setup', 'pb_remove_dashboard_widgets' );


   //* Theme Options
   //**********************

   //* Add support for custom background
   // add_theme_support( 'custom-background' );


   //* Genesis Theme Settings
   //**********************

   //* Remove Genesis Theme Settings Metaboxes
   add_action( 'genesis_theme_settings_metaboxes', 'pb_remove_genesis_metaboxes' );

   //* Unregister content/sidebar layout setting
   // genesis_unregister_layout( 'content-sidebar' );

   //* Unregister sidebar/content layout setting
   genesis_unregister_layout( 'sidebar-content' );

   //* Unregister content/sidebar/sidebar layout setting
   genesis_unregister_layout( 'content-sidebar-sidebar' );

   //* Unregister sidebar/sidebar/content layout setting
   genesis_unregister_layout( 'sidebar-sidebar-content' );

   //* Unregister sidebar/content/sidebar layout setting
   genesis_unregister_layout( 'sidebar-content-sidebar' );

   //* Unregister full-width content layout setting
   // genesis_unregister_layout( 'full-width-content' );

   //* Force full-width-content layout setting
   // add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


   //* Admin User Settings
   //**********************

   // Remove Unused User Settings
	//* These first two options will end up hiding the main Genesis Settings Menu is turned on.
   // remove_action( 'show_user_profile', 'genesis_user_options_fields' );
   // remove_action( 'edit_user_profile', 'genesis_user_options_fields' );
   // remove_action( 'show_user_profile', 'genesis_user_archive_fields' );
   // remove_action( 'edit_user_profile', 'genesis_user_archive_fields' );
   // remove_action( 'show_user_profile', 'genesis_user_seo_fields' );
   // remove_action( 'edit_user_profile', 'genesis_user_seo_fields' );
   remove_action( 'show_user_profile', 'genesis_user_layout_fields' );
   remove_action( 'edit_user_profile', 'genesis_user_layout_fields' );


   //* In Post Settings
   //**********************

   //* Remove In Post Genesis Layout Settings
   remove_theme_support( 'genesis-inpost-layouts' );

   //* Remove Genesis Page Templates
   add_filter( 'theme_page_templates', 'pb_remove_genesis_page_templates' );


   //* Menus
   //**********************

   //* Unregister primary/secondary navigation menus
   // remove_theme_support( 'genesis-menus' );

   //* Unregister primary navigation menu
   // add_theme_support( 'genesis-menus', array( 'secondary' => __( 'Secondary Navigation Menu', 'genesis' ) ) );

   //* Unregister secondary navigation menu
   // add_theme_support( 'genesis-menus', array( 'primary' => __( 'Primary Navigation Menu', 'genesis' ) ) );


   //* Widgets
   //**********************

   //* Unregister primary sidebar
   // unregister_sidebar( 'sidebar' );

   //* Unregister secondary sidebar
   // unregister_sidebar( 'sidebar-alt' );

   //* Unregister header right widget area
   // unregister_sidebar( 'header-right' );

   //* Add support for 3-column footer widgets
   // add_theme_support( 'genesis-footer-widgets', 3 );

   //* Execute shortcodes in widgets
   add_filter( 'widget_text', 'do_shortcode' );


   //* Media
   //**********************
   // https://developer.wordpress.org/reference/functions/add_image_size/

   //* Remove default link for images
   add_action( 'admin_init', 'pb_default_attachment_display_settings', 10 );

   //* Set thumbnail size
   // set_post_thumbnail_size( 300, 165, TRUE );
   // add_image_size( 'pb_custom_img', 620, 240, TRUE );


   //**********************************************
   //* Frontend
   //**********************************************

   //* Site Sturcture
   //**********************

   //* Add support for structural wraps
   add_theme_support( 'genesis-structural-wraps', array(
      'header',
      'nav',
      'subnav',
      'site-inner',
      'footer-widgets',
      'footer'
   ) );

   //* Add HTML5 markup structure
   add_theme_support( 'html5', array(
   	'comment-list',
   	'search-form',
   	'comment-form',
   	'gallery',
   	'caption',
   ) );


   //* Accessibility
   //**********************
   add_theme_support( 'genesis-accessibility', array(
      'headings',
      // 'drop-down-menu',
      'search-form',
      'skip-links',
      'rems',
   ) );


   //* Modify Head
   //**********************

   //* Remove Meta Tags
   // remove_action( 'wp_head', 'rsd_link' );   // really simple discovery link
   // remove_action( 'wp_head', 'wlwmanifest_link' ); //windows live writer support
   remove_action( 'wp_head', 'wp_generator' );  // wordpress version
   // remove_action( 'wp_head', 'wp_shortlink_wp_head' );

   //* Add viewport meta tag for mobile browsers
   add_theme_support( 'genesis-responsive-viewport' );

   //* Strip out Comments RSS feed
   remove_action( 'wp_head','feed_links', 2 );
   remove_action( 'wp_head','feed_links_extra', 3 );
   add_action( 'wp_head', 'pb_reinsert_rss_feed', 1 );

   // Remove Query Strings From Static Resources
   // add_filter( 'script_loader_src', 'pb_remove_script_version', 15, 1 );
   // add_filter( 'style_loader_src', 'pb_remove_script_version', 15, 1 );


   //* Title Area
   //**********************

   //* Remove the site description
   // http://www.briangardner.com/code/remove-header-elements/
   // remove_action( 'genesis_site_description', 'genesis_seo_site_description' );


   //* Footer
   //**********************

   //* Customize footer credits
   add_filter( 'genesis_footer_creds_text', 'pb_footer_creds_text' );

   //* Scoll Back to The Button
   // add_action( 'genesis_after', 'pb_scroll_to_top');


   //* Posts
   //**********************

   //* Remove Edit link
   // add_filter( 'genesis_edit_post_link', '__return_false' );


   //* Pagination
   //**********************

   //* See the post-pagination.php file under -> /lib/post-pagination.php


   //* Breadcrumbs
   //**********************

   //* Add Blog to Breadcrumbs
   // add_filter( 'genesis_single_crumb', 'pb_add_blog_crumb', 10, 2 );
   // add_filter( 'genesis_archive_crumb', 'pb_add_blog_crumb', 10, 2 );


   //* Comments
   //**********************

   //* Remove comments entirely from frontend
   // add_action( 'wp_enqueue_scripts', 'pb_remove_genesis_comments' );

   //* Disable HTML in WordPress comments
   add_filter( 'comment_text', 'wp_filter_nohtml_kses' );
   add_filter( 'comment_text_rss', 'wp_filter_nohtml_kses' );
   add_filter( 'comment_excerpt', 'wp_filter_nohtml_kses' );

   //* Remove comment form allowed tags
   add_filter( 'comment_form_defaults', 'pb_remove_comment_form_allowed_tags' );

}

//**********************************************
//* WP Admin - Login
//**********************************************

//* Change Loging URL
add_filter( 'login_headerurl', 'pb_login_logo_url' );

//* Change Logo Title
add_filter( 'login_headertitle', 'pb_login_logo_url_title' );

//* Modify WordPress Login Errors Message for Better Security
add_filter('login_errors', create_function('$a', "return '<b>Error:</b> Invalid Username or Password';"));


//**********************************************
//* Misc Theme Functions
//**********************************************

// Unregister the superfish scripts
add_action( 'custom_disable_superfish', 'pb_unregister_superfish' );

// Disable Emojie Scripts
add_action( 'init', 'pb_disable_wp_emojicons', 1 );

// Remove jQuery Migrate script
add_filter( 'wp_default_scripts', 'pb_unregister_jquery_migrate' );

// Filter Yoast SEO Metabox Priority
add_filter( 'wpseo_metabox_prio', 'pb_filter_yoast_seo_metabox' );
