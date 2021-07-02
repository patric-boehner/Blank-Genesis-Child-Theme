<?php

/**
 * Cache Post Thumbnails
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


/**
 * Version: 1.0.0
 * Author: Brady Vercher
 * Author URI: http://www.blazersix.com/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Prime post thumbnail cache.
 *
 * Automatically primes the cache for the main loop on the front page and archives.
 * 
 * @param array $posts List of posts in the query.
 * @param WP_Query $wp_query WP Query object.
 * @return array
 */

add_action( 'the_posts', 'pb_prime_post_thumbnails_cache', 10, 2 );
function pb_prime_post_thumbnails_cache( $posts, $wp_query ) {

	if ( ! ( $wp_query->is_main_query() && pb_is_type_archive() ) ) {
		return $posts;
	}

	update_post_thumbnail_cache( $wp_query );

	return $posts;

}
