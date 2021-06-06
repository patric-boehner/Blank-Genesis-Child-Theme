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

	pb_add_social_share_options();

}


// Customize author box
add_action( 'genesis_author_box', 'pb_modify_author_profile', 10, 6 );
function pb_modify_author_profile() {

	// Variables
	$id = get_the_author_meta( 'ID' );
	$link = esc_url( get_author_posts_url( $id ) );
	$avatar = get_avatar( $id ); // $size is the second peramater, ex: 100
	$name = esc_html( get_the_author_meta( 'display_name' ) );
	$prepend = esc_attr__( 'About:' , 'blank-child-theme' );
	$description = wp_kses_post( ( get_the_author_meta( 'description' ) ) );

	// Exit early if no bio
	if( empty( $description ) && get_the_author_meta( 'genesis_author_box_single', $id ) ) {
		return;
	}
	
	// Author heading strucutre
	if( get_the_author_meta( 'genesis_author_box_archive', $id ) ) {
		$heading = sprintf( '<a href="%s"><h3 class="author-profile__title">%s %s</h3></a>', $link, $prepend, $name );
	} else {
		$heading = sprintf( '<h3 class="author-profile__title">%s %s</h3>', $prepend, $name );
	}

	// Include authoe profile
	include CHILD_DIR . '/inc/views/author-profile.php';

}


// Add previous and next post links after entry
add_action( 'genesis_after_entry', 'pb_customize_entry_pagination', 8 );
function pb_customize_entry_pagination() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	get_template_part( '/inc/partials/post-pagination' );

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