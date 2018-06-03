<?php

/**
 * Customize post editor output
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
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
 * @source       https://www.billerickson.net/disabling-gutenberg-certain-templates/
 */

// Templates without editor
function pb_templates_without_editor() {

	return array(
		'templates/site-map.php'
	);

}


// Disable Classic Editor by template
add_action( 'admin_head', 'pb_disable_classic_editor_by_template' );
function pb_disable_classic_editor_by_template() {

	$screen = get_current_screen();

	if( 'page' !== $screen->id || ! isset( $_GET['post']) )
		return;

	$template = get_page_template_slug( intval( $_GET['post'] ) );
	$excluded_templates = pb_templates_without_editor();

	if( in_array( $template, $excluded_templates ) ) {
		remove_post_type_support( 'page', 'editor' );
	}

}


// Cleanup Post Editior Screen
add_action( 'init', 'simplify_post_editing_screens' );
function simplify_post_editing_screens() {

	// Posts
	remove_post_type_support( 'post', 'custom-fields' );
	remove_post_type_support( 'post', 'trackbacks' );

	// Pages
	remove_post_type_support( 'page', 'custom-fields' );
	remove_post_type_support( 'page', 'thumbnail' );
	remove_post_type_support( 'page', 'comments' );
	remove_post_type_support( 'page', 'trackbacks' );

}
