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
