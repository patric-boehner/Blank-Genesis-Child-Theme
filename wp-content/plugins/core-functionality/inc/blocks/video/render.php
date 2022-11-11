<?php
/**
* Block Data
*
* @package    CoreFunctionality
* @since      2.0.0
* @copyright  Copyright (c) 2019, Patrick Boehner
* @license    GPL-2.0+
* 
* @link https://www.billerickson.net/building-acf-blocks-with-block-json/
* @link https://www.modernwpdev.co/acf-blocks/registering-blocks/#render-template
*/

// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Create class attribute allowing for custom "className" and "align" values.
$classes = ['optimized-video-block wp-block-embed'];


// $data is what we're going to expose to our render template
$data = array(
	'video_title' => esc_html( get_field( 'video_title' ) ),
  'video_iframe' => get_field( 'video_iframe' )
);

// Icon Algin class
if( ! empty( $block['align'] ) ) {
    $classes[] = 'align' . $block['align'];
}

// Check to see if a custom class has been added
if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}

// Join the classes together into one variable
$block_classes = esc_attr( join( ' ', $classes ) );

// Dynamic block ID
$block_id = 'icon-' . $block['id'];

// Get iframe src
preg_match('/src="(.+?)"/', $data[ 'video_iframe' ], $matches);

// Check if iframe src is supplied
$video_src = !empty( $matches ) ? $matches[1] : '';

// Get the host url
$video_url_host = parse_url( $video_src, PHP_URL_HOST );

// Adjust conditions if from youtube or vimeo
if ( $video_url_host == 'www.youtube.com' || $video_url_host == 'youtube.com' ) {

  $video_id = parse_url( $video_src, PHP_URL_PATH );
  $video_id = esc_attr( str_replace( '/embed/', '', $video_id ) );

  // Video thumbnail
  $img_url = esc_url( 'https://img.youtube.com/vi/'.$video_id.'/' );

  $responsive = sprintf( '<img class="video-block__thumbnail" srcset="%smqdefault.jpg 320w, %smaxresdefault.jpg 1280w" sizes="(max-width: 1280px) 100vw, 1280px" src="%smaxresdefault.jpg" alt="" loading="lazy" alt="" aria-hidden="true" focusable="false" />', $img_url, $img_url, $img_url );


} elseif ( $video_url_host == 'player.vimeo.com' ) {

  $video_id = parse_url( $video_src, PHP_URL_PATH );
  $video_id = esc_attr( str_replace( '/video/', '', $video_id ) );

  // Video thumbnail
  $img_url = esc_url( 'https://vumbnail.com/'.$video_id.'' );

  $responsive = sprintf( '<img class="video-block__thumbnail" srcset="%s.jpg 640w, %s_large.jpg 640w, %s_medium.jpg 200w, %s_small.jpg 100w" sizes="(max-width: 640px) 100vw, 640px" src="%s.jpg" loading="lazy" alt="" aria-hidden="true" focusable="false" />', $img_url, $img_url, $img_url, $img_url, $img_url );

} else {
  
  $video_id = '';
  $img_url = '';
  $size = array( '' );
  $responsive = '<span></span>';

}  

// Output template part
include CORE_DIR . 'inc/blocks/video/functions.php';
include CORE_DIR . 'inc/blocks/video/template.php';