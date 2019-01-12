<?php

/**
 * Comments Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Add stylesheet before Comments
add_action( 'genesis_before_comments', 'pb_load_comments_area_styles' );
function pb_load_comments_area_styles() {

	wp_print_styles( array( 'site-comment-partial' ) );

}


// Resitrict Nested comments to 2 depth
// http://justintadlock.com/archives/2016/11/16/designing-better-nested-comments
// function jt_comment_parent_link( $args = array() ) {
//
//     echo jt_get_comment_parent_link( $args );
// }
//
// function jt_get_comment_parent_link( $args = array() ) {
//
//     $link = '';
//
//     $defaults = array(
//         'text'   => '%s', // Defaults to comment author.
//         'depth'  => 2,    // At what level should the link show.
//         'before' => '',   // String to output before link.
//         'after'  => ''    // String to output after link.
//     );
//
//     $args = wp_parse_args( $args, $defaults );
//
//     if ( $args['depth'] <= $GLOBALS['comment_depth'] ) {
//
//         $parent = get_comment()->comment_parent;
//
//         if ( 0 < $parent ) {
//
//             $url  = esc_url( get_comment_link( $parent ) );
//             $text = sprintf( $args['text'], get_comment_author( $parent ) );
//
//             $link = sprintf( '%s<a class="comment-parent-link" href="%s">%s</a>%s', $args['before'], $url, $text, $args['after'] );
//         }
//     }
//
//     return $link;
// }


// Append a comment parent link for comments more then three deep
// add_filter( 'comment_text', 'pb_append_parent_link', 100 );
// function pb_append_parent_link( $content ) {
//
// 	$reply_link = pb_comment_parent_link(
// 		array(
//         'depth'  => 3,
//         'text'   => __( 'In reply to %s', 'extant' ),
//         'before' => '<div class="comment-parent">',
//         'after'  => '</div>'
//     )
// 	);
//
// 	return $content . $reply_link;
//
// }


// Modify the comments default
add_filter( 'comment_form_defaults', 'pb_comment_form_defaults' );
function pb_comment_form_defaults( array $paramaters ) {

	$paramaters['title_reply'] = __( 'Join The Conversation', 'blank-child-theme' );

	$aria_describeby = '<span id="email-notes">' .__( 'Your email address will not be published.', 'blank-child-theme' ). '</span>';

	$paramaters['comment_notes_before'] = '<p class="comment-notes">' . __( 'Please leave your comment below.', 'blank-child-theme' ) . ' ' . $aria_describeby . ' ' . __( 'Required fields are marked *', 'blank-child-theme' ) . '</p>';

	// $paramaters['comment_notes_after'] = '<p class="comment-form-notes">' . '</p>';

	// $paramaters['label_submit'] = __( 'Post Comment', 'blank-child-theme' );

	return $paramaters;

}


// Filter form classes
add_filter( 'comment_form_default_fields', 'pb_comment_form_classes' );
function pb_comment_form_classes( $fields ) {

	foreach( $fields as &$field ) {
		$field = str_replace( 'class="comment-form-author"', 'class="comment-form-author first one-half"', $field );
		$field = str_replace( 'class="comment-form-email"', 'class="comment-form-email one-half"', $field );
		// $field = str_replace( 'class="comment-form-url"', 'class="comment-form-url first one-half"', $field );
	}

	return $fields;

}


// Customize the next page link in comment pagination
add_filter( 'genesis_next_comments_link_text', 'pb_filter_next_comments_link_text' );
function pb_filter_next_comments_link_text( $text ) {

	return __( 'Newer Comments', 'blank-child-theme' );

}


// Customize the previous page link in comment pagination
add_filter( 'genesis_prev_comments_link_text', 'pb_filter_prev_comments_link_text' );
function pb_filter_prev_comments_link_text( $text ) {

	return __( 'Older Comments', 'blank-child-theme' );

}
