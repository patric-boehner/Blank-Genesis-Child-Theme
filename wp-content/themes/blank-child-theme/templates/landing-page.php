<?php

/**
 * Template Name: Landing Page
 *
 * Landing Page Template
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Add landing page body class to the head.
add_filter( 'body_class', 'genesis_sample_add_body_class' );
function genesis_sample_add_body_class( $classes ) {

	$classes[] = 'landing-page';

	return $classes;

}


// Remove Skip Links.
remove_action ( 'genesis_before_header', 'genesis_skip_links', 5 );


// Dequeue Skip Links Script.
add_action( 'wp_enqueue_scripts', 'genesis_sample_dequeue_skip_links' );
function genesis_sample_dequeue_skip_links() {

	wp_dequeue_script( 'skip-links' );

}


// Remove site header elements.
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
remove_action( 'genesis_header', 'pb_add_primary_menu_toggle', 10 );


// Remove navigation.
remove_theme_support( 'genesis-menus' );


// Remove breadcrumbs.
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );


// Remove footer widgets.
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );


// Remove site footer elements.
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );
remove_action( 'genesis_footer', 'pb_footer', 5 );


// Run the Genesis loop.
genesis();
