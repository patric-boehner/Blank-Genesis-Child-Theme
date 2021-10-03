<?php

/**
 * Load Scripts and Stylesheets
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Remove style.css stylesheet
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );


// Enqueue Scripts and Styles.
add_action( 'wp_enqueue_scripts', 'pb_enqueue_child_theme_scripts_styles' );
function pb_enqueue_child_theme_scripts_styles() {


	// Load Global Stylesheet
	wp_enqueue_style(
    'global-style',
    get_stylesheet_directory_uri() . "/assets/css/global.min.css",
    false,
    cache_version_id()
  );


  // Load Webfonts
  pb_enqueue_webfonts();


  // Setup page if has top banner.
  if ( pb_is_banner_active() == true ) {

    wp_register_style(
      'banner-style',
      get_stylesheet_directory_uri() . "/assets/css/banner.min.css",
      false,
      cache_version_id()
    );

		wp_enqueue_script(
      'banner-script',
      get_stylesheet_directory_uri() . "/assets/js/banner.min.js",
      array( 'jquery' ),
      cache_version_id(),
      true
    );

		wp_script_add_data(
      'banner-script',
      'defer',
      true
    );

    // Load Customizer Banner varaibles    
    wp_localize_script(
      'banner-script',
      'cookie_banner',
      pb_get_banner_cookie_settings()
    );

	}
  

  // Load Entry Content Stylesheet
  wp_register_style(
    'entry-content-style',
    get_stylesheet_directory_uri() . "/assets/css/entry-content.min.css",
    false,
    cache_version_id()
  );


  // Load Comment Stylesheet
  if( is_singular() && comments_open() ) {

    wp_register_style(
      'comment-style',
      get_stylesheet_directory_uri() . "/assets/css/comments.min.css",
      false,
      cache_version_id()
    );

  }


  // Load Footer Stylesheet
  wp_register_style(
    'footer-style',
    get_stylesheet_directory_uri() . "/assets/css/footer.min.css",
    false,
    cache_version_id()
  );
  

	// Load Global Script
	wp_enqueue_script(
    'global-script',
    get_stylesheet_directory_uri() . "/assets/js/global.min.js",
    array(),
    cache_version_id(),
    true
  );

  wp_script_add_data(
    'global-script',
    'defer',
    true
  );


	// Social Share Script
	if ( pb_display_sharing_feature() == true && is_singular( 'post' ) ) {

		wp_enqueue_script(
      'social-share-script',
      get_stylesheet_directory_uri() . "/assets/js/social-share.min.js",
      array( 'jquery' ),
      cache_version_id(),
      true
    );

		wp_script_add_data(
      'social-share-script',
      'defer',
      true
    );

	}

}


// Load footer styles
add_action( 'init', 'pb_load_styles_footer' );
function pb_load_styles_footer() {

  add_action( 'get_footer', 'pb_enqueue_print_stylesheet' );

}

// Load Print Styles
function pb_enqueue_print_stylesheet() {

	wp_enqueue_style(
    'print',
    get_stylesheet_directory_uri() . '/assets/css/print.min.css',
    false,
    cache_version_id(),
    'print'
  );

}


// Block Editor Assets
/**
 * Registers an editor stylesheet for the current theme.
 */
add_action( 'after_setup_theme', 'pb_theme_add_editor_styles' );
function pb_theme_add_editor_styles() {

    add_editor_style( "/assets/css/editor.min.css" );

}



add_action( 'enqueue_block_editor_assets', 'pb_block_editor_styles' );
function pb_block_editor_styles() {

  // Load Webfonts
  pb_enqueue_webfonts();

  // Editor layout styles
  wp_enqueue_style(
    'editor-layout',
    get_stylesheet_directory_uri() . "/assets/css/editor-layout.min.css",
    false,
    cache_version_id()
  );

  wp_enqueue_script(
    'theme-block-editor-js',
    get_stylesheet_directory_uri() . "/assets/js/editor.min.js",
    array( 'wp-blocks', 'wp-dom', 'wp-i18n', 'wp-editor' ),
    cache_version_id(),
    true
  );

}



// Load login stylesheet
add_action( 'login_enqueue_scripts', 'pb_custom_login_stylesheet' );
function pb_custom_login_stylesheet() {

	wp_enqueue_style(
    'login-style',
    get_stylesheet_directory_uri() . "/assets/css/login.min.css",
    false,
    cache_version_id()
  );

}


// Load local web fonts
function pb_enqueue_webfonts() {

  wp_enqueue_style(
    'ssp-regular-font',
    get_stylesheet_directory_uri() . "/assets/fonts/source-sans-pro-v14-latin-regular.woff2",
    null,
    null,
  );

  wp_enqueue_style(
    'ssp-bold-font',
    get_stylesheet_directory_uri() . "/assets/fonts/source-sans-pro-v14-latin-600.woff2",
    null,
    null,
  );

}