<?php

/**
 * Customize Block Editor
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Allowed list of blocks
// https://rudrastyh.com/gutenberg/remove-default-blocks.html
// add_filter( 'allowed_block_types', 'pb_allowed_block_types', 10, 2 );
function pb_allowed_block_types( $allowed_blocks, $post ) {

	$allowed_block_types = array(
		// 'yoast-seo/breadcrumbs',
		'gravityforms/form',
		// 'yoast/how-to-block',
		// 'yoast/faq-block',
		'acf/child-pages-grid',
		'acf/icon-block',
		'acf/video-block',
		'acf/toggle-block',
		'core/paragraph',
		'core/image',
		'core/heading',
		'core/gallery',
		'core/list',
		'core/quote',
		'core/archives',
		'core/audio',
		'core/button',
		'core/buttons',
		'core/calendar',
		'core/categories',
		'core/freeform',
		'core/code',
		'core/column',
		'core/columns',
		'core/cover',
		'core/embed',
		'core/file',
		'core/group',
		'core/html',
		'core/latest-comments',
		'core/latest-posts',
		'core/media-text',
		'core/missing',
		'core/more',
		'core/nextpage',
		'core/page-list',
		'core/pattern',
		'core/preformatted',
		'core/pullquote',
		'core/block',
		'core/rss',
		'core/search',
		'core/separator',
		'core/shortcode',
		'core/social-link',
		'core/social-links',
		'core/spacer',
		'core/table',
		'core/tag-cloud',
		'core/text-columns',
		'core/verse',
		'core/video',
		'core/navigation',
		'core/navigation-link',
		'core/navigation-submenu',
		'core/site-logo',
		'core/site-title',
		'core/site-tagline',
		'core/query',
		'core/template-part',
		'core/avatar',
		'core/post-title',
		'core/post-excerpt',
		'core/post-featured-image',
		'core/post-content',
		'core/post-author',
		'core/post-date',
		'core/post-terms',
		'core/post-navigation-link',
		'core/post-template',
		'core/query-pagination',
		'core/query-pagination-next',
		'core/query-pagination-numbers',
		'core/query-pagination-previous',
		'core/query-no-results',
		'core/read-more',
		'core/comment-author-name',
		'core/comment-content',
		'core/comment-date',
		'core/comment-edit-link',
		'core/comment-reply-link',
		'core/comment-template',
		'core/comments-title',
		'core/comments-query-loop',
		'core/comments-pagination',
		'core/comments-pagination-next',
		'core/comments-pagination-numbers',
		'core/comments-pagination-previous',
		'core/post-comments',
		'core/post-comments-form',
		'core/home-link',
		'core/loginout',
		'core/term-description',
		'core/query-title',
		'core/post-author-biography',
	);

	// $cpt_allowed_blocks = array(
	// 	'core/youtube',
	// 	'core/facebook',
	// 	'core/twitter',
	// 	'core/soundcloud',
	// 	'core/vimeo',
	// );

	// Custom Post Type
	// if( $post->post_type === 'cpt' ) {
	// 	$allowed_blocks = $cpt_allowed_blocks;
	// }

	return $allowed_blocks;

}


// Disable gensis title toggle
add_filter( 'genesis_title_toggle_enabled', '__return_false' );


// Disable genesis breadcrumb support
add_filter( 'genesis_breadcrumbs_toggle_enabled', '__return_false' );


// // Custom Layout
// add_action( 'after_setup_theme', 'pb_register_narrow_layout' );
// function pb_register_narrow_layout() {

// 	genesis_register_layout(
// 		'narrow-content', // A layout slug of your choice. Used in body classes. 
// 		[
// 			'label' => __( 'Narrow Content', 'blank-child-theme' ),
// 		]
// 	);

// }


/**
 * Gutenberg layout class
 * 
 * @link https://www.billerickson.net/change-gutenberg-content-width-to-match-layout/
 * @link https://developer.wordpress.org/reference/functions/get_page_template_slug/
 * @link https://tommcfarlin.com/body-class-based-on-a-template/
 *
 * @param string $classes
 * @return string
 */
add_filter( 'admin_body_class', 'pb_block_editor_layout_class' );
function pb_block_editor_layout_class( $classes ) {

	$screen = get_current_screen();

	if( ! $screen->is_block_editor() ) {
		return $classes;
	}

	// Remove the `template-` prefix and get the name of the template without the file extension.
	if ( !empty( get_post_meta( get_the_ID(), '_wp_page_template', true ) ) ) {
		
		$template_name = basename( get_page_template_slug( get_the_ID() ) );
		$template_name = str_ireplace( 'template-', '', basename( get_page_template_slug( get_the_ID() ), '.php'));

	} 
    
	// Pages use full width as default, see below
	if( 'page' === get_post_type() || $template_name == 'full-widht-layout' ) {
		$layout = 'full-width-content';
	}

	// Change defualt for posts
	if( 'post' === get_post_type() || $template_name == 'narow-contnet' ) {
		$layout = 'narrow-content';
	}
    
	// If no post-specific layout, use site-wide default
	if( !empty( $template_name ) ) {
		$layout = $template_name;
	} else {
		$layout = 'full-width-content';
	}

	$classes .= ' ' . $layout . ' ';
	
	return $classes;

}


// Add editor class if title is hidden
add_filter( 'admin_body_class', 'pb_block_editor_title_class' );
function pb_block_editor_title_class( $classes ) {

	$screen = get_current_screen();

	if( ! $screen->is_block_editor() ) {
		return $classes;
	}

	$title_hidden = false;
	$post_id = isset( $_GET['post'] ) ? intval( $_GET['post'] ) : false;

	if( $post_id ) {
		$title_hidden = genesis_get_custom_field( '_genesis_hide_title', $post_id );
	}

	if ( !empty( $title_hidden ) ) {
		$title_hidden = 'genesis-title-hidden';
	}

	
	$classes .= ' ' . $title_hidden . ' ';
	
	return $classes;

}


// Remove inpost Genesis settings
add_action( 'init', 'pb_simplify_editing_screens' );
function pb_simplify_editing_screens() {

	// Posts
	remove_post_type_support( 'post' , 'genesis-scripts' );

	//Pages
	remove_post_type_support( 'page' , 'genesis-scripts' );

}