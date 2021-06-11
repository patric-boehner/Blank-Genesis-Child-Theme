<?php
/**
 * Register block partial for displaying template block
 *
 * @package    CoreFunctionality
 * @since      2.0.0
 * @copyright  Copyright (c) 2020, Patrick Boehner
 * @license    GPL-2.0+
 */

//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


//**********************

// Create id attribute allowing for custom "anchor" value.
$id = 'optimized-video-block' . $block['id'];

if( !empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'optimized-video-block wp-block-embed';

if( !empty( $block['className'] ) ) {
    $className .= ' ' . $block['className'];
}

if( !empty( $block['align'] ) ) {
  $className .= ' align' . $block['align'];
}

// Variables
$iframe = get_field( 'video_iframe' );
$title = esc_html( get_field( 'video_title' ) );

// Get iframe src
preg_match('/src="(.+?)"/', $iframe, $matches);

// Check if iframe src is supplied
$src = !empty( $matches ) ? $src = $matches[1] : $src = '';

// Get the host url
$video_url_host = parse_url( $src, PHP_URL_HOST );

// Adjust conditions if from youtube or vimeo
if ( $video_url_host == 'www.youtube.com' || $video_url_host == 'youtube.com' ) {

  $video_id = parse_url( $src, PHP_URL_PATH );
  $video_id = esc_attr( str_replace( '/embed/', '', $video_id ) );

  // Video thumbnail
  $img_url = esc_url( 'https://img.youtube.com/vi/'.$video_id.'/' );

  $responsive = sprintf( '<img class="video-block__thumbnail" srcset="%smqdefault.jpg 320w, %smaxresdefault.jpg 1280w" sizes="(max-width: 1280px) 100vw, 1280px" src="%smaxresdefault.jpg" alt="'.$title.'" loading="lazy" />', $img_url, $img_url, $img_url );


} elseif ( $video_url_host == 'player.vimeo.com' ) {

  $video_id = parse_url( $src, PHP_URL_PATH );
  $video_id = esc_attr( str_replace( '/video/', '', $video_id ) );

  // Video thumbnail
  $img_url = esc_url( 'https://vumbnail.com/'.$video_id.'' );

  $responsive = sprintf( '<img class="video-block__thumbnail" srcset="%s.jpg 640w, %s_large.jpg 640w, %s_medium.jpg 200w, %s_small.jpg 100w" sizes="(max-width: 640px) 100vw, 640px" src="%s.jpg" alt="'.$title.'" loading="lazy" />', $img_url, $img_url, $img_url, $img_url, $img_url );

} else {
  
  $video_id = '';
  $img_url = '';
  $size = array( '' );

}  

// Output content
include CORE_DIR . '/inc/blocks/video/view.php';