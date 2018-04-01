<?php

/**
 * Alter Breadcrumbs
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


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


/**
 * Wrap last breadcrumb in a span for styling
 * @author Gary Jones
 *
 * @param array $crumbs, existing HTML markup for breadcrumbs
 * @param array $args, breadcrumb arguments
 * @return array $crumbs, amended breadcrumbs
 */

add_filter( 'genesis_build_crumbs', 'ea_wrap_last_breadcrumb', 10, 2 );
function ea_wrap_last_breadcrumb( $crumbs, $args ) {

	// Don't run on home or front page
	if( is_home() || is_front_page() ) {
		return $crumbs;
	}

	// Ensure duplicate and empty crumb entries are handled.
	$crumbs = array_filter( array_unique( $crumbs ) );
	$last_crumb_index = count( $crumbs ) - 1;

	// Some "crumbs" actually contain multiple separated crumbs (i.e. sub-pages)
	// so make sure we're really only getting the last separated crumb
	$crumb_parts = explode( $args['sep'], $crumbs[ $last_crumb_index ] );
	if ( count( $crumb_parts ) > 1 ) {

		$last_crumb_part_index = count( $crumb_parts ) - 1;
		$crumb_parts[ $last_crumb_part_index ] = '<span class="last-breadcrumb">' . $crumb_parts[ $last_crumb_part_index ] . '</span>';
		$crumbs[ $last_crumb_index ] = join( $args['sep'], $crumb_parts );

	} else {

		$crumbs[ $last_crumb_index ] = '<span class="last-breadcrumb">' . $crumbs[ $last_crumb_index ] . '</span>';

	}

	return $crumbs;

}
