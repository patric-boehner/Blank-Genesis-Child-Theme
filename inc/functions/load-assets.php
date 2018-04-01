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

	// Load Webfonts
	wp_enqueue_style( 'google-web-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600', array(), cache_version_id() );

	// Load Global Stylesheet
	wp_enqueue_style( 'global-style', get_stylesheet_directory_uri() . "/assets/css/global-style.min.css", false, cache_version_id() );

	// Load Global Script
	wp_enqueue_script( 'global-script', get_stylesheet_directory_uri() . "/assets/js/global.min.js", array( 'jquery' ), cache_version_id(), true );

	wp_localize_script(
		'global-script',
		'genesis_responsive_menu',
		genesis_responsive_menu_settings()
	);

	// Load Print Styles
	wp_enqueue_style( 'print', get_stylesheet_directory_uri() . '/assets/css/print.min.css', false, cache_version_id(), 'print' );

}


// Define our responsive menu settings.
function genesis_responsive_menu_settings() {

	$settings = array(

		'mainMenu'         => __( 'Menu', 'genesis-sample' ),
		'menuIconClass'    => 'icon-menu',
		'subMenu'          => __( 'Submenu', 'genesis-sample' ),
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


// Load Editor styles
add_editor_style( "assets/css/editor-style.min.css" );


// Load Gutenberg styles
add_action( 'enqueue_block_editor_assets', 'pb_gutenberg_scripts' );
function pb_gutenberg_scripts() {
	wp_enqueue_style( 'gutenberg-styles', get_stylesheet_directory_uri() . '/assets/css/gutenberg-style.min.css', array( 'wp-edit-blocks' ), cache_version_id() );
}


// Load login stylesheet
add_action( 'login_enqueue_scripts', 'pb_custom_login_stylesheet' );
function pb_custom_login_stylesheet() {

	wp_enqueue_style( 'login-style', get_stylesheet_directory_uri() . "/assets/css/login-style.min.css", false, cache_version_id() );

}
