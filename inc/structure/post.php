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


// Add social share to entry footer
add_action( 'genesis_entry_footer', 'pb_social_share_in_foonter' );
function pb_social_share_in_foonter() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	pb_add_social_share_options();

}


// Customize author box
add_action( 'genesis_author_box', 'pb_modify_author_profile', 10, 6 );
function pb_modify_author_profile() {

	$facebook_link = esc_url( get_the_author_meta( 'facebook' ) );
	$twitter_link = esc_url( get_the_author_meta( 'twitter' ) );
	$linked_link = esc_url( get_the_author_meta( 'linkedin' ) );

	$facebook = pb_svg_icons_available( 'Facebook', 'facebook', '', '25px', '25px' );
	$twitter = pb_svg_icons_available( 'Twitter', 'twitter', '', '25px', '25px' );
	$linkedin = pb_svg_icons_available( 'LinkedIn', 'linkedin', '', '25px', '25px' );

	// Include authoe profile
	include CHILD_DIR . '/inc/views/author-profile.php';

}


// Add previous and next post links after entry
add_action( 'genesis_after_entry', 'pb_customize_entry_pagination', 8 );
function pb_customize_entry_pagination() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	get_template_part( '/inc/partials/post', 'pagination' );

}
