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


// Add Comment styles
add_action( 'genesis_before_comments', 'pb_add_styles_before_comments' );
function pb_add_styles_before_comments() {

	// Output styles
    wp_print_styles( 'comment-style' );

}


// Disable HTML in comments
add_filter( 'comment_text', 'wp_filter_nohtml_kses' );
add_filter( 'comment_text_rss', 'wp_filter_nohtml_kses' );
add_filter( 'comment_excerpt', 'wp_filter_nohtml_kses' );


// Change Gravatar Size
add_filter( 'genesis_comment_list_args', 'pb_change_comments_gravatar' );
function pb_change_comments_gravatar( array $args ) {

	$args['avatar_size'] = 72;

	return $args;
}


// Modify the author says text in comments
add_filter( 'comment_author_says_text', 'sp_comment_author_says_text' );
function sp_comment_author_says_text() {

	return;

}


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


// Add button class to cancle reply comment link
add_filter('cancel_comment_reply_link', 'pb_comment_cancle_reply_link_filter', 3, 99);
function pb_comment_cancle_reply_link_filter( $formatted_link, $link, $text ) {

	$formatted_link = str_replace( 'id="cancel-comment-reply-link"', 'id="cancel-comment-reply-link" class="button button__small" ', $formatted_link );

	return $formatted_link;

}


// Remove URL Field
add_filter('comment_form_default_fields', 'pb_unset_url_field');
function pb_unset_url_field($fields) {

	if(isset($fields['url'])) {

		unset($fields['url']);
		return $fields;

	}

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