<?php

/**
 * Template Name: Site Map
 *
 * Sitemap Page Template
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


//* Add custom body class to the head
add_filter( 'body_class', 'pb_add_body_class' );
function pb_add_body_class( $classes ) {

	$classes[] = 'site-map';

	return $classes;

}


// Remove standard post content output.
remove_action( 'genesis_post_content', 'genesis_do_post_content' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );


// Add the sitemap content to the post content output.
add_action( 'genesis_entry_content', 'genesis_page_archive_content' );
add_action( 'genesis_post_content', 'genesis_page_archive_content' );


// Output the genesis sitemap function.
function genesis_page_archive_content() {

	genesis_sitemap();

}


// Run the Genesis loop.
genesis();
