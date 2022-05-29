<?php

/**
 * Modify Images
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Adjsut compression quality
// add_filter('jpeg_quality', function( $arg ){
// 	return 87;
// });


// Remove intermediate sizes size
// remove_image_size('1536x1536');
// remove_image_size('2048x2048');



// Update default image sizes on theme switch
add_action( 'switch_theme', 'pb_child_theme_enforce_image_size_options' );
function pb_child_theme_enforce_image_size_options() {

	update_option( 'thumbnail_size_w', 150 );
	update_option( 'thumbnail_size_h', 150 );
	update_option( 'thumbnail_crop', 1 );
	update_option( 'medium_size_w', 300 );
	update_option( 'medium_size_h', 300 );
	update_option( 'large_size_w', 1024 );
	update_option( 'large_size_h', 1024 );

}


// Add sizes for use in Add Media modal
add_filter( 'image_size_names_choose', 'pa_add_medium_large_size_selection' );
function pa_add_medium_large_size_selection( $sizes ) {

    return array_merge( $sizes, array(
        'medium_large' => __( 'Medium Large', 'blank-child-theme' ),
    ) );

}


// Change Default Gallery Image Size
// add_filter( 'shortcode_atts_gallery', 'pb_change_gallery_atts', 10, 3 );
// function pb_change_gallery_atts( $output, $pairs, $atts ) {
//
// 	$output['size'] = 'medium_thumbnail';
// 	return $output;
//
// }





/**
 * Limits srcset from using an image larger than the actual src image.
 *
 * https://www.ibenic.com/improve-responsive-image-attributes-wordpress/
 * 
 * @since 2.13.0
 *
 * @param array  $image_meta    The image meta data as returned by 'wp_get_attachment_metadata()'.
 * @param int[]  $size_array    {
 *     An array of requested width and height values.
 *
 *     @type int $0 The width in pixels.
 *     @type int $1 The height in pixels.
 * }
 * @param string $image_src     The 'src' of the image.
 * @param int    $attachment_id The image attachment ID or 0 if not supplied.
 *
 * @return array
 */
add_filter( 'wp_calculate_image_srcset_meta', 'pb_limit_max_srcset_image', 10, 4 );
function pb_limit_max_srcset_image( $image_meta, $size_array, $image_src, $attachment_id ) {

	if ( ! isset( $size_array[0] ) ) {
		return $image_meta;
	}

	$width = $size_array[0];

	if ( is_array( $image_meta['sizes'] ) && $image_meta['sizes'] ) {

		foreach ( $image_meta['sizes'] as $name => $value ) {

			if ( ! isset( $value['width'] ) ) {
				continue;
			}
			if ( $value['width'] > $width ) {
				unset( $image_meta['sizes'][ $name ] );
			}

		}

	}

	return $image_meta;

}