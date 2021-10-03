<?php

/**
 * Breadcrumb Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Add blog to single post and category breadcrumbs
add_filter( 'genesis_single_crumb', 'pb_add_blog_crumb', 10, 2 );
add_filter( 'genesis_archive_crumb', 'pb_add_blog_crumb', 10, 2 );
function pb_add_blog_crumb( $crumb, $args ) {

	if ( is_singular( 'post' ) || is_category() ) {

		$crumb = '<span class="breadcrumb-link-wrap"><a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">'. get_the_title( get_option( 'page_for_posts' ) ) .'</a></span>' . $args['sep'] . $crumb;

	}

	return $crumb;


}


// Remove Breadcrumb labels
add_filter( 'genesis_breadcrumb_args', 'pb_remove_breadcrumb_labels', 10 );
function pb_remove_breadcrumb_labels( $args ) {

	$args['labels']['prefix'] = ''; 
	$args['labels']['author'] = ''; 
	$args['labels']['category'] = '';
	$args['labels']['tag'] = ''; 
	$args['labels']['date'] = ''; 
	$args['labels']['search'] = ''; 
	$args['labels']['tax'] = ''; 
	$args['labels']['post_type'] = ''; 
	$args['labels']['404'] = '';

	return $args;

}


// Alter breadcrumb nav structure
add_filter( 'genesis_breadcrumb_args', 'pb_alter_breadcrumb_markup', 11 );
function pb_alter_breadcrumb_markup( $args ) {

	$aria_label = esc_html__( 'Breadcrumb', ' blank-child-theme' );

	$args['prefix'] = '<nav class="breadcrumb" aria-label="'.$aria_label.'">';

	$args['suffix'] = '</nav>';

	return $args;

}


// Change breadcrumb seperator
add_filter( 'genesis_breadcrumb_args', 'pb_change_breadcrumb_seperator', 12 );
function pb_change_breadcrumb_seperator( $args ) {

	if ( function_exists( 'pb_load_inline_svg' ) ) {

		$icon = pb_load_inline_svg( array(
			'filename' => 'chevron-down',
			'title' => '',
		) );

	}

	$aria_label = esc_html__( 'Breadcrumb Separator', ' blank-child-theme' );

	$args['sep'] = '<span class="separator" aria-hidden="true">'.$icon.'</span> '; 

	return $args;

}