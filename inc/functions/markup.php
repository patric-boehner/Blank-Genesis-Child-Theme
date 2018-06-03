<?php

/**
 * Modify Genesis markup attributes
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Change '.content-sidebar-wrap' to '.content-area'
add_filter( 'genesis_markup_content-sidebar-wrap_open', 'pb_change_content_sidebar_wrap', 10, 2 );
function pb_change_content_sidebar_wrap( $open, $args ) {

	return str_replace( 'content-sidebar-wrap', 'content-area', $open );

}


// Add Organization schema to site title
add_filter( 'genesis_attr_title-area', 'pb_change_title_area_schema' );
function pb_change_title_area_schema( $attr ) {

	$attr['itemscope'] = 'itemscope';
	$attr['itemtype']  = 'http://schema.org/Organization';

	return $attr;

}


// Change site title schema from healine to name
add_filter( 'genesis_attr_site-title', 'pb_change_site_title_schema' );
function pb_change_site_title_schema( $attr ) {

	$attr['itemprop'] = 'name';

	return $attr;

}


// Change secondary nave aria-label
add_filter( 'genesis_attr_nav-primary', 'pb_change_primary_nav_aria_label' );
function pb_change_primary_nav_aria_label( $attributes ) {

	$attributes['aria-label'] = 'Main';

	return $attributes;

}


// Change secondary nave aria-label
add_filter( 'genesis_attr_nav-secondary', 'pb_change_secondary_nav_aria_label' );
function pb_change_secondary_nav_aria_label( $attributes ) {

	$attributes['aria-label'] = 'Footer';

	return $attributes;

}


// Add pagination aria-label
add_filter( 'genesis_attr_adjacent-entry-pagination', 'pb_add_pagination_nav_aria_label' );
add_filter( 'genesis_attr_archive-pagination', 'pb_add_pagination_nav_aria_label' );
function pb_add_pagination_nav_aria_label( $attributes ) {

	$attributes['aria-labelledby'] = 'pagination-nav';

	return $attributes;

}
