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


// Change Gravatar Size
add_filter( 'genesis_comment_list_args', 'pb_change_comments_gravatar' );
function pb_change_comments_gravatar( array $args ) {

	$args['avatar_size'] = 72;

	return $args;
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


// Filter form defualts
// add_filter( 'comment_form_default_fields', 'pb_comment_form_classes' );
// function pb_comment_form_classes( $fields ) {
//
// 	foreach( $fields as &$field ) {
// 		$field = str_replace(
// 			'<label for="author">Name <span class="required">*</span></label>',
// 			'<label for="author">' .esc_html__( 'Your Name', 'life-after-divorce' ). ' <span class="required">*</span></label>',
// 			$field
// 		);
// 		$field = str_replace(
// 			'<label for="email">Email <span class="required">*</span></label>',
// 			'<label for="email">' .esc_html__( 'Your Email', 'life-after-divorce' ). ' <span class="required">*</span></label>',
// 			$field
// 		);
// 		$field = str_replace(
// 			'Save my name, email, and website in this browser for the next time I comment.',
// 			esc_html__( 'Save name and email in this browser for the next time you comment.', 'life-after-divorce' ),
// 			$field
// 		);
// 	}
//
// 	return $fields;
//
// }


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
