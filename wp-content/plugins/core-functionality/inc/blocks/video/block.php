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

function register_acf_video_block() {

  // register a testimonial block.
  acf_register_block_type( array(
      'name'              => 'video-block',
      'title'             => esc_html__('Optimized Video', 'core-functionality'),
      'description'       => esc_html__('A block for embeding a video from youtube or vimeo for faster page speed.', 'core-functionality'),
      'category'          => 'media', // common, formatting, layout, widgets, embed
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
        'align'			    => array( 'wide' ),
      ]
  ));

}

// Check if function exists and hook into setup.
if( function_exists( 'acf_register_block_type' ) ) {
    add_action( 'acf/init', 'register_acf_video_block' );
}


// Output video block dns prefetch
add_action( 'wp_head', 'pb_add_dns_prefetch_video_links', 10 );
function pb_add_dns_prefetch_video_links() {

	pb_dns_prefetch_optimized_video();

}


// Create DNS prefetch urls by parsing video block
function pb_dns_prefetch_optimized_video() {

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

	$videos = array();

	foreach( $blocks as $block ) {

		if( 'acf/video-block' === $block['blockName']   ) {
			$videos[] = $block['attrs']['data']['video_iframe'];
		}

	}

	if ( !empty( $videos ) ) {

		// Setup empty array for unique values
		$hosts_array = array();

		// Get list of host urls
		foreach( $videos as $video ) {

			// Get the host url
			$video_url_host = parse_url( $video, PHP_URL_HOST );
			// Covert to array
			$hosts_array[] = $video_url_host;
			// Creat arrya of uniue hosts
			$hosts_array = array_unique( $hosts_array );

		}

		// Create prefetc
		foreach( $hosts_array as $host ) {

			// Format url for source
			$prefetch = ( $host == 'www.youtube.com' || $host == 'youtube.com' )? esc_url( 'https://img.youtube.com/' ) : esc_url( 'https://vumbnail.com/' ) ;

			// Output header links
			echo '<link rel="dns-prefetch" href="'.$prefetch.'" />';

		}
		
	}

}