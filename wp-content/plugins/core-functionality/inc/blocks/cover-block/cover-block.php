<?php
/**
 * Parse the cover block
 *
 * @package    CoreFunctionality
 * @since      2.0.0
 * @copyright  Copyright (c) 2020, Patrick Boehner
 * @license    GPL-2.0+
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Output video block dns prefetch
add_action( 'wp_head', 'pb_preload_cover_block_image', 1 );
function pb_preload_cover_block_image() {

	pb_get_first_block_image();

}


// Find the image of the first cover block
function pb_get_first_block_image() {

	global $post;

	// Exit early
	if( ! is_singular() ) {
		return;
	}

	$blocks = parse_blocks( $post->post_content );

	// Exit early
	if ( empty( $blocks ) ) {
		return;
	}

	// Only load if the first block is the optimized video block
	if ( isset( $blocks[0]['blockName'] ) ) {
		$blocknames[] = $blocks[0]['blockName'];
	}

	// Exit early if is no cover
	if( $blocknames[0] !== 'core/cover' ) {
		return;
	}

	if( empty( $blocks[0]['attrs']['ulr'] ) ) {
		return;
	}

	$image_url = esc_url( $blocks[0]['attrs']['url'] );

	echo '<link rel="preload"  as="image" href="'.$image_url.'" />';

}