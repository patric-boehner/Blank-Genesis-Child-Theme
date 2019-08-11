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
		'core/button',
		'core/text-columns',
		'core/spacer',
		'core/shortcode',
		'core/embed',
		'core/group',
	);

	// if( $post->post_type === 'page' ) {
	// 	$allowed_blocks[] = 'core/shortcode';
	// }

	return $allowed_blocks;

}


// Disable gensis title toggle
// add_filter( 'genesis_title_toggle_enabled', '__return_false' );


// Add title togle support for a custom post type
// add_post_type_support( '[post-type]', 'genesis-title-toggle' );

// Disable genesis breadcrumb support
// add_filter( 'genesis_breadcrumbs_toggle_enabled', '__return_false' );
