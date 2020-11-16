<?php

/**
 * Breadcrumb Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Reposition the breadcrumbs.
// remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
// add_action( 'genesis_before', 'pb_move_breadcrumbs' );
// function pb_move_breadcrumbs() {

// 	add_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_breadcrumbs', 12 );

// }


// Add blog to single post and category breadcrumbs
add_filter( 'genesis_single_crumb', 'pb_add_blog_crumb', 10, 2 );
add_filter( 'genesis_archive_crumb', 'pb_add_blog_crumb', 10, 2 );
function pb_add_blog_crumb( $crumb, $args ) {

	if ( is_singular( 'post' ) || is_category() ) {

		return '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">' . get_the_title( get_option( 'page_for_posts' ) ) .'</a> ' . $args['sep'] . ' ' . $crumb;
	} else {

		return $crumb;

	}

}


// Remove Breadcrumb Arguments
add_filter( 'genesis_breadcrumb_args', 'pb_remove_breadcrumb_prefix', 5 );
function pb_remove_breadcrumb_prefix( $args ) {

	// Remove labels
	foreach( $args['labels'] as $key => &$label ) {
		$label = '';
	}

	return $args;

}
