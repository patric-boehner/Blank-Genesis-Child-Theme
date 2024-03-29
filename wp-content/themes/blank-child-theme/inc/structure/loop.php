<?php

/**
 * Loop Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Add entry content styles
add_action( 'genesis_before_loop', 'pb_add_entry_content_style', 1 );
function pb_add_entry_content_style() {

	// Output styles
    wp_print_styles( 'entry-content-style' );

}


// Replace No Posts loop structure
remove_action( 'genesis_loop_else', 'genesis_do_noposts' );
add_action( 'genesis_loop_else', 'pb_alter_no_posts_output' );
function pb_alter_no_posts_output() {

	get_template_part( '/inc/partials/no-posts' );

}


// Update No Post Text
add_filter( 'genesis_noposts_text', 'pb_filter_not_post_text', 10, 2 );
function pb_filter_not_post_text( $text ) {

 if ( is_search() ) {

	 $text = __( '<strong>Sorry, but nothing matched your search terms.</strong> Please try again with some different keywords.', 'blank-child-theme' );
	 $text = $text . get_search_form();

 }

 if ( is_archive() ) {

	 $text = __( '<strong>Sorry, but I don\'t have any posts on that subject.</strong> Please try searching for something else.', 'blank-child-theme' );
	 $text = $text . get_search_form();

 }

 return $text;

}
