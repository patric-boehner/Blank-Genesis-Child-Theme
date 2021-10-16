<?php

/**
 * Post Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


/**
 * Cleanup post classes
 * From: Bill Erickson
 */
add_filter( 'post_class', 'pb_clean_post_classes', 5 );
function pb_clean_post_classes( $classes ) {

	if( ! is_array( $classes ) )
		return $classes;

	// Change hentry to entry, remove if adding microformat support
	$key = array_search( 'hentry', $classes );

	if( false !== $key )
		$classes = array_replace( $classes, array( $key => 'entry' ) );
		$allowed_classes = array(
			'entry',
			'type-' . get_post_type(),
		 );

	return array_intersect( $classes, $allowed_classes );

}


// Customize the post info function
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter( $post_info ) {

	if ( is_page() ) {
		return;
	}	
	
	$post_info = '[post_date] by [post_author] [post_comments]';

	return $post_info;

}


// Add social share to entry footer
add_action( 'genesis_entry_footer', 'pb_social_share_in_footer' );
function pb_social_share_in_footer() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	if ( function_exists( 'pb_add_social_share_options' ) ) {
		pb_add_social_share_options();
	}

}



// Add previous and next post links after entry
add_action( 'genesis_after_entry', 'pb_add_entry_footer_style', 1 );
function pb_add_entry_footer_style() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	// Output styles
	wp_print_styles( 'entry-footer-style' );

}



// Add previous and next post links after entry
add_action( 'genesis_after_entry', 'pb_customize_entry_pagination', 8 );
function pb_customize_entry_pagination() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	// Output pagination
	if ( function_exists( 'pb_adjacent_entry_pagination' ) ) {
		pb_adjacent_entry_pagination();
	}

}



// Add after post block area
add_action( 'genesis_after_entry', 'pb_after_post_block_area', 9 );
function pb_after_post_block_area() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	if ( function_exists( 'pb_show_content_area' ) ) {
		pb_show_content_area( array( 
			'location' => 'after-blog-post',
			'element' => 'section',
		) );
	
	}
	
}