<?php

/**
 * Common Cleanups
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Stop WordPress from Guessing Urls
add_filter( 'redirect_canonical', 'pb_stop_guessing' );
function pb_stop_guessing($url) {

	if ( is_404() ) {
		return false;
	}
		return $url;

}


// Remove Meta Tags
remove_action( 'wp_head', 'wp_generator' );


// Strip out Comments RSS feed
remove_action( 'wp_head','feed_links', 2 );
remove_action( 'wp_head','feed_links_extra', 3 );


// Disable Pingbacks
add_filter( 'xmlrpc_methods', 'pb_disable_xmlrpc_ping');
function pb_disable_xmlrpc_ping ($methods) {

	unset( $methods['pingback.ping'] );
	return $methods;

}


// Disable XML-RPC
remove_action ('wp_head', 'rsd_link');


// Remove .header classes added by genesis
remove_filter( 'body_class', 'genesis_header_body_classes' );


// Disable Emojie Scripts
/**
 * From Ryan Hellyer plugin Disable Emojis
 */

add_action( 'init', 'pb_disable_emojis' );
function pb_disable_emojis() {

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );

}


/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param    array  $plugins
 * @return   array  Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {

	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}

}


// Remove dns-prefetch
add_filter( 'emoji_svg_url', '__return_false' );