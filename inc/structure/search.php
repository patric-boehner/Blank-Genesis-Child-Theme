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


// Replace the default genesis search form
// add_filter( 'get_search_form', 'pb_custom_search_form', 10, 4 );
// function pb_custom_search_form() {
//
// 	$search_text = get_search_query() ? apply_filters( 'the_search_query', get_search_query() ) : apply_filters( 'genesis_search_text', __( 'Search this website', 'blank_child_theme' ) . ' &#x02026;' );
//
// 	$onfocus = "if ('" . esc_js( $search_text ) . "' === this.value) {this.value = '';}";
// 	$onblur  = "if ('' === this.value) {this.value = '" . esc_js( $search_text ) . "';}";
//
// 	$value_or_placeholder = ( get_search_query() == '' ) ? 'placeholder' : 'value';
//
// 	$form  = sprintf( '<form %s>', genesis_attr( 'search-form' ) );
//
// 	$form_id = uniqid( 'searchform-', true );
//
// 	$icon_search = '';
//
// 	$form .= sprintf(
// 		'<meta itemprop="target" content="%s"/><label for="%s"><span class="screen-reader-text">%s</span><input itemprop="query-input" type="search" name="s" id="%s" %s="%s" /></label><button class="search-button" type="submit">%s</button></form>',
// 		home_url( '/?s={s}' ),
// 		esc_attr( $form_id ),
// 		esc_html( 'Search this website', 'blank_child_theme' ),
// 		esc_attr( $form_id ),
// 		$value_or_placeholder,
// 		esc_attr( 'Search...', 'blank_child_theme' ),
// 		$icon_search
// 	);
//
// 	return apply_filters( 'genesis_search_form', $form );
//
// }


// Customize search form label text
add_filter( 'genesis_search_form_label', 'pb_search_form_label' );
function pb_search_form_label( $label ) {

	return esc_html__( 'Search this website', 'blank_child_theme' );

}


/**
 * Customize search form input text
 *
 * This will also replace the genesis_search_form_label
 * text the filter genesis_search_form_label is not also set.
 */
add_filter( 'genesis_search_text', 'pb_search_form_placeholder_text' );
function pb_search_form_placeholder_text( $text ) {

	return esc_attr__( 'Search...', 'blank_child_theme' );

}


// Add icon to search form button
add_filter( 'genesis_search_button_text', 'pb_search_button_icon' );
function pb_search_button_icon( $text ) {

	return esc_attr( 'Search' );

}


// Restric what post types display in search results
add_filter('pre_get_posts', 'pb_filter_search_results');
function pb_filter_search_results( $query ) {

	if ( $query->is_search ) {

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
