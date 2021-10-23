<?php

/**
 * Structure Search Results
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


add_filter( 'genesis_search_form', 'pb_search_form' );
function pb_search_form() {

	ob_start();
	get_template_part( 'searchform' );
	return ob_get_clean();
	
}



// Restric what post types display in search results
// add_filter('pre_get_posts', 'pb_filter_search_results');
function pb_filter_search_results( $query ) {

	if ( !is_admin() && $query->is_main_query() &&  $query->is_search ) {

		$query->set(
			'post_type',
				array(
					// 'custom-post-type',
					'post',
					'page'
			)
		);

		// $query->set( 'posts_per_page', 10 );

	}

	return $query;

}


/**
 * Exclude noindex'd pages from site search
 * https://www.billerickson.net/code/exclude-no-index-content-from-wordpress-search/
 */

// add_action( 'pre_get_posts', 'pb_exclude_noindex_from_search' );
function pb_exclude_noindex_from_search( $query ) {

	if( class_exists('WPSEO_Options') ){

		if( $query->is_main_query() && $query->is_search() && ! is_admin() ) {

			$meta_query = isset( $query->meta_query ) ? $query->meta_query : array();
			$meta_query['noindex'] = array(
				'key' => '_yoast_wpseo_meta-robots-noindex',
				'value' => 1,
				'compare' => 'NOT EXISTS',
			);

			$query->set( 'meta_query', $meta_query );

		}

	}

}