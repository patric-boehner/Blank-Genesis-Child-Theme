<?php
/**
 * Register custom block for lazyloading video
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
// https://www.advancedcustomfields.com/resources/acf_register_block_type/

function register_acf_ll_video_block() {

  // register a testimonial block.
  acf_register_block_type( array(
      'name'              => 'video-block',
      'title'             => esc_html__('Optimized Video', 'core-functionality'),
      'description'       => esc_html__('A block for embeding a video from youtube or vimeo for faster page speed.', 'core-functionality'),
      'category'          => 'content', // common, formatting, layout, widgets, embed
      'icon'              => 'video-alt3', // Dahsicons
      'keywords'          => array( 'video, youtube, vimeo, lazyload, optimized' ),
      'post_types'        => array( 'content_area', 'page', 'post' ),
      'multiple'          => true,
      'render_template'   => CORE_DIR . 'inc/blocks/video/partial.php',
      'enqueue_style'     => get_stylesheet_directory_uri() . "/assets/css/video-optimized.min.css",
      'enqueue_script'     => get_stylesheet_directory_uri() . "/assets/js/block-video-optimized.min.js",
      'supports'		    => [
        'mode'          => 'preview',
        // Each can also be set to true or false
        'align'			    => array( 'wide', 'full' ),
      ]
  ));

}

// Check if function exists and hook into setup.
if( function_exists( 'acf_register_block_type' ) ) {
    add_action( 'acf/init', 'register_acf_ll_video_block' );
}