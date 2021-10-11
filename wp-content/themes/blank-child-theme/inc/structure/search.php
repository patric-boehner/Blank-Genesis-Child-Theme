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
