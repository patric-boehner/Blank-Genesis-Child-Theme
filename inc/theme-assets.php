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

  // Move jQuery to footer
	if( ! is_admin() ) {

		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
		wp_enqueue_script( 'jquery' );

	}

	// Register component styles that are printed as needed.
  wp_register_style(
    'site-header-partial',
    get_theme_file_uri( '/assets/css/header.min.css' ),
    array(),
    cache_version_id()
  );


  wp_register_style(
    'site-content-area-partial',
    get_theme_file_uri( '/assets/css/content-area.min.css' ),
    array(),
    cache_version_id()
  );


  wp_register_style(
    'site-comment-partial',
    get_theme_file_uri( '/assets/css/comments.min.css' ),
    array(),
    cache_version_id()
  );


	wp_register_style(
    'site-footer-partial',
    get_theme_file_uri( '/assets/css/site-footer.min.css' ),
    array(),
    cache_version_id()
  );


	// Load Webfonts
	wp_enqueue_style(
    'google-web-fonts',
    pb_fonts_url(),
    array(),
    null
  );


	// Load Global Stylesheet
	wp_enqueue_style(
    'global-style',
    get_stylesheet_directory_uri() . "/assets/css/global-style.min.css",
    false,
    cache_version_id()
  );


  // Block Editor Front End Styles
  if ( has_blocks() && is_singular() ) {

    wp_enqueue_style(
      'front-end-block-styles',
      get_stylesheet_directory_uri() . "/assets/css/block-front-style.min.css",
      false,
      cache_version_id()
    );

  }


  // Load Print Styles
	wp_enqueue_style(
    'print',
    get_stylesheet_directory_uri() . '/assets/css/print.min.css',
    false,
    cache_version_id(),
    'print'
  );


	// Load Global Script
	wp_enqueue_script(
    'global-script',
    get_stylesheet_directory_uri() . "/assets/js/global.min.js",
    array( 'jquery' ),
    cache_version_id(),
    false
  );

	wp_script_add_data(
    'global-script',
    'async',
    true
  );


  // Load responsive menu varaibles
  wp_localize_script(
		'global-script',
		'genesis_responsive_menu',
		genesis_responsive_menu_settings()
	);


	// Lazy Load Script
	if ( 'lazyload' === get_theme_mod( 'lazy_load_media' ) ) {

		wp_enqueue_script(
      'wprig-lazy-load-images',
      get_stylesheet_directory_uri() . "/assets/js/lazyload.min.js",
      array(),
      cache_version_id(),
      false
    );

		wp_script_add_data(
      'wprig-lazy-load-images',
      'defer',
      true
    );

	}


	// Social Share Script
	if ( ! empty( get_theme_mod( 'social_share_option', 1 ) ) && is_singular( 'post' ) ) {

		wp_enqueue_script(
      'social-share-script',
      get_stylesheet_directory_uri() . "/assets/js/social-share.min.js",
      array( 'jquery' ),
      cache_version_id(),
      false
    );

		wp_script_add_data(
      'social-share-script',
      'defer',
      true
    );

	}


  // Setup page if has top banner.
	if ( get_theme_mod( 'pb-theme-top-banner-visibility', 1 ) && !isset( $_COOKIE[ 'top-banner-hidden' ] ) ) {

		wp_enqueue_script(
      'top-banner-js',
      get_stylesheet_directory_uri() . "/assets/js/top-banner.min.js",
      array( 'jquery' ),
      cache_version_id(),
      false
    );

		wp_script_add_data(
      'top-banner-js',
      'defer',
      true
    );

	}

  // Load Customizer Banner varaibles
	/*
		* Actual function to pass PHP to JavaScript. Args:
		* 1. The target JavaScript file has the handle 'top-banner-js' (this is the file we just enqueued)
		* 2. The data will be called 'dismissalLength' by the JS file
		* 3. 'dismissal_length' will contain the data in $cookie_date
		* https://wpshout.com/building-a-magical-golden-bridge-from-php-to-javascript-with-wp_localize_script/
		* https://wordpress.stackexchange.com/questions/186155/how-do-you-pass-a-boolean-value-to-wp-localize-script
		*/
	wp_localize_script(
		'top-banner-js',
		'dismissal_length',
		pb_get_customizer_banner_cookie_settings()
	);

}


// Defines responsive menu settings
function genesis_responsive_menu_settings() {

	$settings = array(
		'mainMenu'         => __( 'Menu', 'blank-child-theme' ),
		'menuIconClass'    => 'icon-menu',
		'subMenu'          => __( 'Submenu', 'blank-child-theme' ),
		'subMenuIconClass' => 'icon-chevron-down',
		'menuClasses'      => array(
			'combine' => array(
				'.nav-primary',
			),
			'others'  => array(),
		),
	);

	return $settings;

}


// Block Editor Assets
add_action( 'enqueue_block_editor_assets', 'pb_block_editor_styles' );
function pb_block_editor_styles() {

  wp_enqueue_style(
    'theme-block-editor-styles',
    get_stylesheet_directory_uri() . "/assets/css/block-editor-style.min.css",
    false,
    cache_version_id()
  );

  // Load Webfonts
  wp_enqueue_style(
    'google-web-fonts',
    pb_fonts_url(),
    array(),
    null
  );

}


// Retrive Customize settings for banner cookie
function pb_get_customizer_banner_cookie_settings(){

	$settings = array(

		'value' => array(
			'days'	=> get_theme_mod( 'pb-theme-top-banner-cookie-end-date' )
		),

	);

	return $settings;

}


// Load login stylesheet
add_action( 'login_enqueue_scripts', 'pb_custom_login_stylesheet' );
function pb_custom_login_stylesheet() {

	wp_enqueue_style(
    'login-style',
    get_stylesheet_directory_uri() . "/assets/css/login-style.min.css",
    false,
    cache_version_id()
  );

}
