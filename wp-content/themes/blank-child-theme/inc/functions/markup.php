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


// Disable Genesis Schema
add_filter( 'genesis_disable_microdata', '__return_true' );


/**
 * Adds body classes to help with block styling.
 *
 * - `has-no-blocks` if content contains no blocks.
 * - `first-block-[block-name]` to allow changes based on the first block (such as removing padding above a Cover block).
 * - `first-block-align-[alignment]` to allow styling adjustment if the first block is wide or full-width.
 *
 * @since 2.8.0
 *
 * @param array $classes The original classes.
 * @return array The modified classes.
 */

add_filter( 'body_class', 'genesis_blocks_body_classes' );
function genesis_blocks_body_classes( $classes ) {

	if ( ! is_singular() || ! function_exists( 'has_blocks' ) || ! function_exists( 'parse_blocks' ) ) {
		return $classes;
	}

	if ( ! has_blocks() ) {
		$classes[] = 'has-no-blocks';
		return $classes;
	}

	$post_object = get_post( get_the_ID() );

	$blocks      = (array) parse_blocks( $post_object->post_content );

	if ( isset( $blocks[0]['blockName'] ) ) {
		$classes[] = 'first-block-' . str_replace( '/', '-', $blocks[0]['blockName'] );
	}

	if ( isset( $blocks[0]['attrs']['align'] ) ) {
		$classes[] = 'first-block-align-' . $blocks[0]['attrs']['align'];
	}

	return $classes;

}



/**
 * Adds top-banner body classes.
 *
 * @since 1.0.0
 *
 * @param array $classes Current classes.
 * @return array The new classes.
 */
add_action( 'body_class', 'pb_notice_bar_classes' );
function pb_notice_bar_classes( $classes ) {

	if ( get_theme_mod( 'pb-theme-top-banner-visibility', 1 ) ) {

		$classes[] = 'top-banner-hidden';

		if ( is_customize_preview() ) {
			$classes[] = 'customizer-preview';
		}

	}

	return $classes;

}


// Remove redundent .site-inner and .content-sidebar-wrap on full-width layouts
add_action( 'genesis_meta', 'pb_remove_redundant_markup' );
function pb_remove_redundant_markup() {

	add_filter( 'genesis_markup_site-inner', '__return_null' );

	if ( 'full-width-content' === genesis_site_layout() ) {
		add_filter( 'genesis_markup_content-sidebar-wrap', '__return_null' );
	}

}


// Change '.content-sidebar-wrap' to '.content-area'
add_filter( 'genesis_markup_content-sidebar-wrap_open', 'pb_change_content_sidebar_wrap', 10, 2 );
function pb_change_content_sidebar_wrap( $open, $args ) {

	return str_replace( 'content-sidebar-wrap', 'content-area', $open );

}


/**
 * Archive Description markup
 * From Bill Erickson
 */
add_filter( 'genesis_markup_posts-page-description_open', 'pb_archive_description_markup' );
add_filter( 'genesis_markup_posts-page-description_close', 'pb_archive_description_markup' );
add_filter( 'genesis_markup_taxonomy-archive-description_open', 'pb_archive_description_markup' );
add_filter( 'genesis_markup_taxonomy-archive-description_close', 'pb_archive_description_markup' );
add_filter( 'genesis_markup_author-archive-description_open', 'pb_archive_description_markup' );
add_filter( 'genesis_markup_author-archive-description_close', 'pb_archive_description_markup' );
add_filter( 'genesis_markup_cpt-archive-description_open', 'pb_archive_description_markup' );
add_filter( 'genesis_markup_cpt-archive-description_close', 'pb_archive_description_markup' );
add_filter( 'genesis_markup_date-archive-description_open', 'pb_archive_description_markup' );
add_filter( 'genesis_markup_date-archive-description_close', 'pb_archive_description_markup' );
add_filter( 'genesis_markup_search-archive-description_open', 'pb_archive_description_markup' );
add_filter( 'genesis_markup_search-archive-description_close', 'pb_archive_description_markup' );
function pb_archive_description_markup( $markup ) {

	return str_replace( array( '<div', '</div' ), array( '<header', '</header' ), $markup );

}


/**
 * Notes
 *
 * https://wpbeaches.com/adding-attribute-html-section-genesis/
 */

// Change secondary nave aria-label
add_filter( 'genesis_attr_nav-primary', 'pb_change_primary_nav_aria_label' );
function pb_change_primary_nav_aria_label( $attributes ) {

	$attributes['aria-label'] = 'Main';

	return $attributes;

}


// Change secondary nave aria-label
add_filter( 'genesis_attr_site-footer', 'pb_change_footer_role' );
function pb_change_footer_role( $attributes ) {

	$attributes['role'] = 'contentinfo';

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
