<?php
/**
* Block Functions
*
* @package    CoreFunctionality
* @since      2.0.0
* @copyright  Copyright (c) 2019, Patrick Boehner
* @license    GPL-2.0+
*/

// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Output video block dns prefetch
add_action( 'wp_head', 'cf_dns_prefetch_video_links', 10 );
function cf_dns_prefetch_video_links() {

	cf_dns_prefetch_optimized_video();

}


// Create DNS prefetch urls by parsing video block
function cf_dns_prefetch_optimized_video() {

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