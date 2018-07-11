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
