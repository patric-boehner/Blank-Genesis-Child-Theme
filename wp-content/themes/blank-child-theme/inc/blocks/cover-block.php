<?php
/**
 * Parse the cover block
 *
 * @package    Blank Child Theme
 * @since      2.0.0
 * @copyright  Copyright (c) 2020, Patrick Boehner
 * @license    GPL-2.0+
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Output cover block background image for preload
add_action( 'wp_head', 'pb_preload_cover_block_image', 1 );
function pb_preload_cover_block_image() {

	pb_preload_first_block_image();

}


// Find the ID of the fist block containing an image
function pb_get_first_block_image_id() {

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

	if( empty( $blocks[0]['attrs']['id'] ) ) {
		return;
	}

	$image_id = esc_attr( $blocks[0]['attrs']['id'] );

	return $image_id;

}


// Create a preload image url for first blocks contianing images
function pb_preload_first_block_image() {

	global $post;

	// Exit early
	if( ! is_singular() ) {
		return;
	}

	// Exit early 
	if( empty( pb_get_first_block_image_id() ) ) {
		return;
	}

	// Image ID
	$image_id = pb_get_first_block_image_id();
	$image_srcset = wp_get_attachment_image_srcset( $image_id, 'full' );

	echo '<link rel="preload" as="image" imagesrcset="'.$image_srcset.'" imagesizes="100vw" />';

}


//  Disable native lazy loading on images with matching image id class
add_filter( 'wp_img_tag_add_loading_attr', 'pb_remove_lazy_loading_by_class', 10, 3 );
function pb_remove_lazy_loading_by_class( $value, $image, $context ) {
	
    if ( 'the_content' === $context ) {

		$image_class = 'wp-image-' .  pb_get_first_block_image_id();

         if ( false !== strpos( $image, $image_class ) ) {
              return false;
         }

    }

    return $value;

}
