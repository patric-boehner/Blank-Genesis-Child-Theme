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


// Add mage sizes for use in Add Media modal
add_filter( 'image_size_names_choose', 'pa_add_medium_large_size_selection' );
function pa_add_medium_large_size_selection( $sizes ) {

    return array_merge( $sizes, array(
        'medium_large' => __( 'Medium Large' ),
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
