<?php

/**
 * Modify RSS Feed
 *
 * @package		Gentle Heart Yoga
 * @author		Patrick Boehner
 * @copyright	Copyright (c) 2016, Patrick Boehner
 * @license		GPL-2.0+
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


/*
 * Add Featured Image to RSS feed
 *
 * Author: John Lock
 * https://www.lockedowndesign.com/add-featured-image-to-rss-feed-wordpress/
 *
 */

add_filter( 'the_content', 'pb_featured_image_in_feed' );
function pb_featured_image_in_feed( $content ) {

		global $post;
		if( is_feed() ) {
				if ( has_post_thumbnail( $post->ID ) ){
						$feat_image_output = get_the_post_thumbnail( $post->ID, 'full', array( 'style' => 'height: auto;margin-bottom:2em;max-width: 600px !important;padding-top: 0.75em;width: 100% !important;' ) );
						$content = $feat_image_output . $content;
				}
		}

		return $content;

}
