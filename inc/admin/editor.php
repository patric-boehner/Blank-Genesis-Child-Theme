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
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
    'core/button',
    'core/text-columns',
		'core/columns',
    'core/media-text',
    'core/separator',
    'core/gallery',
    'core/quote',
    'core/shortcode',
    'core/embed'
	);

	// if( $post->post_type === 'page' ) {
	// 	$allowed_blocks[] = 'core/shortcode';
	// }

	return $allowed_blocks;

}
