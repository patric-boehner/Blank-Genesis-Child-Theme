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



/**
 * Custom search form
 *
 */
add_filter( 'get_search_form', 'pb_search_form' );
function pb_search_form() {

	$label_text = esc_html__( 'Search for', 'blank-child-theme' );
	$placeholder_text = esc_html__( 'Search', 'blank-child-theme' );

	$text = esc_html__( 'Submit', 'blank-child-theme' );
	$icon_name = 'search';

	$button = pb_svg_icons_available( $text, $icon_name );

	ob_start();

	// Include search form
	include CHILD_DIR . '/inc/views/search-form.php';

	return ob_get_clean();

}


// Restric what post types display in search results
add_filter('pre_get_posts', 'pb_filter_search_results');
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
