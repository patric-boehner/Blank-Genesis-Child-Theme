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


// Remove jQuery Migrate
add_filter( 'wp_default_scripts', 'pb_dequeue_jquery_migrate' );
function pb_dequeue_jquery_migrate( &$scripts ){

	if( !is_admin() ) {
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}

}


// Remove Edit link
add_filter( 'genesis_edit_post_link', '__return_false' );


// Disable HTML in comments
add_filter( 'comment_text', 'wp_filter_nohtml_kses' );
add_filter( 'comment_text_rss', 'wp_filter_nohtml_kses' );
add_filter( 'comment_excerpt', 'wp_filter_nohtml_kses' );


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


// Remove Genesis Page Templates
add_filter( 'theme_page_templates', 'pb_remove_genesis_page_templates' );
function pb_remove_genesis_page_templates( $page_templates ) {

	unset( $page_templates[ 'page_archive.php' ] );
	unset( $page_templates[ 'page_blog.php' ] );
	return $page_templates;

}


// Remove .header classes added by genesis
remove_filter( 'body_class', 'genesis_header_body_classes' );


// Cleanup menu classes
add_filter( 'nav_menu_css_class', 'pb_clean_nav_menu_classes', 5 );
function pb_clean_nav_menu_classes( $classes ) {
	if( ! is_array( $classes ) )

		return $classes;
	$allowed_classes = array(
		'menu-item-home',
		'menu-item',
		'current-menu-item',
		'current-menu-ancestor',
		'menu-item-has-children',
	);

	return array_intersect( $classes, $allowed_classes );

}


// Cleanup post classes
add_filter( 'post_class', 'pb_clean_post_classes', 5 );
function pb_clean_post_classes( $classes ) {

	if( ! is_array( $classes ) )
		return $classes;

	// Change hentry to entry, remove if adding microformat support
	$key = array_search( 'hentry', $classes );

	if( false !== $key )
		$classes = array_replace( $classes, array( $key => 'entry' ) );
		$allowed_classes = array(
			'entry',
			'type-' . get_post_type(),
		 );

	return array_intersect( $classes, $allowed_classes );

}


/**
 * Disable the emoji's
 *
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
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );

}


/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {

	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}

}


/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {

	if ( 'dns-prefetch' == $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}

	return $urls;

}
