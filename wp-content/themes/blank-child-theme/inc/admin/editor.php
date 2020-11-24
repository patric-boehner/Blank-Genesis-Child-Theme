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

	$allowed_blocks = array(
		'core/block', // Include to show reusable blocks in the block inserter.
		'core/image',
		'core/gallery',
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/quote',
		'core/buttons',
		'core/text-columns',
		'core/columns',
		'core/spacer',
		'core/seperator',
		'core/shortcode',
		'core/embed',
		'core/group',
		'core/shortcode'
	);

	// if( $post->post_type === 'page' ) {
	// 	$allowed_blocks[] = '';
	// }

	return $allowed_blocks;

}


// Disable gensis title toggle
// add_filter( 'genesis_title_toggle_enabled', '__return_false' );

// Add title togle support for a custom post type
// add_post_type_support( '[post-type]', 'genesis-title-toggle' );

// Disable genesis breadcrumb support
// add_filter( 'genesis_breadcrumbs_toggle_enabled', '__return_false' );



/**
 * Gutenberg layout class
 * @link https://www.billerickson.net/change-gutenberg-content-width-to-match-layout/
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

	$layout = false;
	$post_id = isset( $_GET['post'] ) ? intval( $_GET['post'] ) : false;
  
	// Get post-specific layout
	if( $post_id ) {
		$layout = genesis_get_custom_field( '_genesis_layout', $post_id );
	}
		
    
	// Pages use full width as default, see below
	if( empty( $layout ) && 'page' === get_post_type() ) {
		$layout = 'wide-content';
	}

	if( empty( $layout ) && 'post' === get_post_type() ) {
		$layout = 'narrow-content';
	}
    
	// If no post-specific layout, use site-wide default
	elseif( empty( $layout ) ) {
		$layout = genesis_get_option( 'site_layout' );
	}

	$classes .= ' ' . $layout . ' ';
	
	return $classes;

}


/**
 * Full width layout for pages as default
 * https://www.billerickson.net/change-gutenberg-content-width-to-match-genesis-layout/
 *
 * @param string $layout 
 * @return string
 */
add_filter( 'genesis_pre_get_option_site_layout', 'pb_wide_width_pages' );
function pb_wide_width_pages( $layout ) {

	if( is_page() ) {
		$layout = 'wide-content';
	}
		
	return $layout;

}
