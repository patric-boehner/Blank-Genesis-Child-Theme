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


// Customize the post info function
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter( $post_info ) {

	if ( is_page() ) {
		return;
	}

	$post_info = '[post_date] by [post_author] [post_comments]';

	return $post_info;

}


// Display author box
add_filter( 'get_the_author_genesis_author_box_single', '__return_false' );


// Add social share to entry footer
add_action( 'genesis_entry_footer', 'pb_social_share_in_foonter' );
function pb_social_share_in_foonter() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	pb_add_social_share_options();

}


// Add previous and next post links after entry
add_action( 'genesis_after_entry', 'pb_customize_entry_pagination', 8 );
function pb_customize_entry_pagination() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	get_template_part( '/inc/partials/post', 'pagination' );

}
