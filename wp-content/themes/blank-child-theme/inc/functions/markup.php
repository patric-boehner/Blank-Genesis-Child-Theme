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


// Remove feautre classes
remove_filter( 'body_class', 'genesis_title_hidden_body_class' );
remove_filter( 'body_class', 'genesis_breadcrumbs_hidden_body_class' );
remove_filter( 'body_class', 'genesis_singular_image_hidden_body_class' );
remove_filter( 'body_class', 'genesis_singular_image_visible_body_class' );
remove_filter( 'body_class', 'genesis_footer_widgets_hidden_body_class' );
remove_filter( 'body_class', 'genesis_layout_body_classes' );
remove_filter( 'body_class', 'genesis_header_body_classes' );


/**
 * Adds a css class to the body element.
 *
 * @param  array $classes the current body classes.
 * @return array $classes modified classes.
 */
add_filter( 'body_class', 'pb_layout_body_class' );
function pb_layout_body_class( $classes ) {

	// 'full-width-content'
	// 'narrow-content'
	// 'sidebar-content'

	// Remove the `template-` prefix and get the name of the template without the file extension.
	if ( !empty( get_post_meta( get_the_ID(), '_wp_page_template', true ) ) ) {
		
		$template_name = basename( get_page_template_slug( get_the_ID() ) );
		$template_name = str_ireplace( 'template-', '', basename( get_page_template_slug( get_the_ID() ), '.php'));

		$classes[] = $template_name;

	} elseif( is_singular( 'post' ) || is_home() || is_archive() || is_404() || is_search() ) {

		$classes[] = 'narrow-content';

	} else {

		$classes[] = 'full-width-content';

	}

	return $classes;

}


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

add_filter( 'body_class', 'genesis_blocks_body_classes', 12 );
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


// Remove redundent .site-inner and .content-sidebar-wrap on full-width layouts
add_action( 'genesis_meta', 'pb_remove_redundant_markup' );
function pb_remove_redundant_markup() {

	add_filter( 'genesis_markup_site-inner', '__return_null' );

	if ( is_singular() || is_home() || is_archive() || is_404() || is_search() ) {
		add_filter( 'genesis_markup_content-sidebar-wrap', '__return_null' );
	}

}


// Change '.content-sidebar-wrap' to '.content-area'
add_filter( 'genesis_markup_content-sidebar-wrap_open', 'pb_change_content_sidebar_wrap', 10, 2 );
function pb_change_content_sidebar_wrap( $open, $args ) {

	return str_replace( 'content-sidebar-wrap', 'content-area', $open );

}


// Change 'genesis-content' to 'main-content'
add_filter( 'genesis_attr_content', 'pb_main_id_attributes', 12 );
function pb_main_id_attributes( $attributes ) {

	// class, id, itemscope, itemtype, etc.
	$attributes['id']  = 'main-content';
	
	return $attributes;

}


// Remove unnecessary post classes.
add_filter( 'post_class', 'pb_remove_post_classes', 10, 3 );
function pb_remove_post_classes( $classes, $class, $post_id ) {

	return array_diff(

		$classes,
		[
			'post',
			'has-post-thumbnail',
			'category-uncategorized',
			'post-' . $post_id,
			'status-' . get_post_status( $post_id ),
			'format-' . ( get_post_format( $post_id ) ? get_post_format( $post_id ) : 'standard' ),
		]
	);

}


// Adds before content class to entry meta.
add_filter( 'genesis_attr_entry-meta-before-content', 'pb_entry_meta_before_content_atts' );
function pb_entry_meta_before_content_atts( $atts ) {

	$atts['class'] .= ' entry-meta-before-content';

	return $atts;

}


// Adds after content class to entry meta.
add_filter( 'genesis_attr_entry-meta-after-content', 'pb_entry_meta_after_content_atts' );
function pb_entry_meta_after_content_atts( $atts ) {

	$atts['class'] .= ' entry-meta-after-content';

	return $atts;
	
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
add_filter( 'genesis_attr_nav-secondary', 'pb_change_secondary_nav_aria_label' );
function pb_change_secondary_nav_aria_label( $attributes ) {

	$attributes['aria-label'] = 'Footer';

	return $attributes;

}


// Add pagination aria-label
add_filter( 'genesis_attr_adjacent-entry-pagination', 'pb_add_pagination_nav_aria_label' );
add_filter( 'genesis_attr_archive-pagination', 'pb_add_pagination_nav_aria_label' );
function pb_add_pagination_nav_aria_label( $attributes ) {

	$attributes['aria-label'] = 'Pagination';

	return $attributes;

}
