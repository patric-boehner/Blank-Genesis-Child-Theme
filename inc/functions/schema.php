<?php

/**
 * Disable Genesis Schema
 *
 * @package Blank Child Theme
 * @author  Bill Erickson
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


/**
 * Disable Genesis Schema
 * @author Bill Erickson
 * @see https://www.billerickson.net/yoast-schema-with-genesis/
 */
add_action( 'init', 'be_disable_genesis_schema' );
function be_disable_genesis_schema() {

	if ( genesis_detect_seo_plugins() ) {

		$elements = array(
			'head',
			'body',
			'site-header',
			'site-title',
			'site-description',
			'breadcrumb',
			'breadcrumb-link-wrap',
			'breadcrumb-link-wrap-meta',
			'breadcrumb-link',
			'breadcrumb-link-text-wrap',
			'search-form',
			'search-form-meta',
			'search-form-input',
			'nav-primary',
			'nav-secondary',
			'nav-header',
			'nav-link-wrap',
			'nav-link',
			'entry',
			'entry-image',
			'entry-image-widget',
			'entry-image-grid-loop',
			'entry-author',
			'entry-author-link',
			'entry-author-name',
			'entry-time',
			'entry-modified-time',
			'entry-title',
			'entry-content',
			'comment',
			'comment-author',
			'comment-author-link',
			'comment-time',
			'comment-time-link',
			'comment-content',
			'author-box',
			'sidebar-primary',
			'sidebar-secondary',
			'site-footer',
		);

		foreach( $elements as $element ) {
			add_filter( 'genesis_attr_' . $element, 'pb_remove_schema_attributes', 20 );
		}

	}

}


/**
 * Remove schema attributes
 *
 */
function pb_remove_schema_attributes( $attr ) {

	unset( $attr['itemprop'], $attr['itemtype'], $attr['itemscope'] );
	return $attr;

}
