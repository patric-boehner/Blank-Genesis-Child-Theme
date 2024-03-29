<?php

/**
 * Pagination Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Archive pagiantion function
function pb_archive_pagination() {

	// Links
	$prev_link = get_previous_posts_link( apply_filters( 'genesis_prev_link_text', __( 'Previous Page', 'blank-child-theme' ) ) );
	$next_link = get_next_posts_link( apply_filters( 'genesis_next_link_text', __( 'Next Page', 'blank-child-theme' ) ) );

	// Screen Reader Text
	$screen_reader = '<h2 id="pagination-nav" class="screen-reader-text">' . __( 'Pagination', 'blank-child-theme' ) .  '</h2>';

	// Output
	if ( $prev_link || $next_link ) {

		$pagination = $prev_link ? sprintf( '<li class="pagination-next pagination-item">%s</li>', $prev_link ) : '';
		$pagination .= $next_link ? sprintf( '<li class="pagination-previous pagination-item">%s</li>', $next_link ) : '';

		genesis_markup( array(
			'open'	 => '<nav %s aria-labelledby="pagination-nav">' . $screen_reader,
			'close'	 => '</nav>',
			'content' => '<ul class="archive-pagination-menu">' . $pagination . '</ul>',
			'context' => 'archive-pagination',
		) );

	}

}


// Adjacent entry pagiantion function
function pb_adjacent_entry_pagination() {

	// Nav Titles
	$previous_text = '<span class="nav-title">' .__( 'Previous Post', 'blank-child-theme' ). '</span>';
	$next_text = '<span class="nav-title">' .__( 'Next Post', 'blank-child-theme' ). '</span>';

	// Links
	$previous_link = get_previous_post_link( $previous_text .' '. '%link', '%title');
	$next_link = get_next_post_link( $next_text .' '. '%link', '%title' );

	// Screen Reader Text
	$screen_reader = '<h2 id="pagination-nav" class="screen-reader-text">' . __( 'Pagination', 'blank-child-theme' ) .  '</h2>';

	// Output if either post is available
	if ( $previous_link || $next_link ) {

		$pagination = $previous_link ? sprintf( '<li class="pagination-previous pagination-item">%s</li>', $previous_link ) : '';
		$pagination .= $next_link ? sprintf( '<li class="pagination-next pagination-item">%s</li>', $next_link ) : '';

		genesis_markup( array(
			'open'	 => '<nav %s aria-labelledby="pagination-nav">' . $screen_reader,
			'close'	 => '</nav>',
			'content' => '<ul class="adjacent-entry-pagination-menu">' . $pagination . '</ul>',
			'context' => 'adjacent-entry-pagination',
		) );

	}

}


// Customize the previous page link in pagination
// add_filter ( 'genesis_prev_link_text' , 'pb_filter_previous_page_link_text' );
// function pb_filter_previous_page_link_text ( $text ) {

// 	if ( ! is_post_type_archive( '' ) || ! is_tax( '' ) ) {
// 		return __( 'Newer Posts', 'blank-child-theme' );
// 	}

// 	return __( 'CPT Previous Page', 'blank-child-theme' );

// }


// Customize the next page link in pagination
// add_filter ( 'genesis_next_link_text' , 'pb_filter_next_page_link_text' );
// function pb_filter_next_page_link_text ( $text ) {

// 	if ( ! is_post_type_archive( '' ) || ! is_tax( '' ) ) {
// 		return __( 'Older Posts', 'blank-child-theme' );
// 	}

// 	return __( 'CPT Next Page', 'blank-child-theme' );

// }


// Pagination link class
add_filter('next_posts_link_attributes', 'pb_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'pb_posts_link_attributes');
function pb_posts_link_attributes() {

	return 'class="button"';

}


// Remove pagiantion aria label
add_filter( 'genesis_attr_adjacent-entry-pagination', 'pb_remove_pagiantion_label' );
add_filter( 'genesis_attr_archive-pagination', 'pb_remove_pagiantion_label' );

function pb_remove_pagiantion_label( $attributes ) { 

 $attributes['aria-label'] = '';

 return $attributes;

}