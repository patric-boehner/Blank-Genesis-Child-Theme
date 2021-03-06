<?php

/**
 * Resource Loading Help
 *
 * Borrowed from WPRig
 * https://github.com/wprig/wprig/blob/master/dev/functions.php
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Resource hinting with preconect and dns-preload
// add_filter( 'wp_resource_hints', 'pb_resource_hints', 10, 2 );
function pb_resource_hints( $urls, $relation_type ) {

	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => '//fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;

}


/**
 * Adds async/defer attributes to enqueued / registered scripts.
 *
 * If #12009 lands in WordPress, this function can no-op since it would be handled in core.
 *
 * @link https://core.trac.wordpress.org/ticket/12009
 * @link https://github.com/wprig/wprig
 * @param string $tag    The script tag.
 * @param string $handle The script handle.
 * @return array
 */
add_filter( 'script_loader_tag', 'pb_filter_script_loader_tag', 10, 2 );
function pb_filter_script_loader_tag( $tag, $handle ) {

	foreach( array( 'async', 'defer', 'preload' ) as $attr ) {

		if( ! wp_scripts()->get_data( $handle, $attr ) ) {
			continue;
		}

		// Prevent adding attribute when already added in #12009.
		if( ! preg_match( ":\s$attr(=|>|\s):", $tag ) ) {
			$tag = preg_replace( ':(?=></script>):', " rel='$attr'", $tag, 1 );
		}

		// Only allow one.
		break;

	}

	return $tag;

}


// Preload Font Files
add_filter('style_loader_tag', 'pb_filter_style_loader_tag', 10, 2);
function pb_filter_style_loader_tag( $html, $handle ) {

    if( $handle === 'ssp-regular-font' ) {
		
		return str_replace(array("rel='stylesheet'", "media='all'"), array("rel='preload' as='font' type='font/woff2' crossorigin='anonymous'", ""), $html);

    }

	if( $handle === 'ssp-bold-font' ) {

		return str_replace(array("rel='stylesheet'", "media='all'"), array("rel='preload' as='font' type='font/woff2' crossorigin='anonymous'", ""), $html);

    }

    return $html;

}
