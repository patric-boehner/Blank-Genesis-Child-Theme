<?php

/**
 * Helper functions
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Custom excerpt length.
function pb_custom_excerpt( $args = array() ) {

	// Set defaults.
	$defaults = array(
		'length' => 20,
		'more'   => '...',
		'post'   => '',
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Trim the excerpt.
	return wp_trim_words( get_the_excerpt( $args['post'] ), absint( $args['length'] ), esc_html( $args['more'] ) );

}


// Get ID of page by slug
function pb_get_id_by_slug( $page_slug, $post_type ) {
    $page = get_page_by_path( $page_slug, OBJECT, $post_type );
    if ( $page ) {
        return $page->ID;
    } else {
        return null;
    }
}


/**
 * Checks if we're on any type of archive page.
 *
 * Thanks BizBudding's Mia Engine
 * 
 * @param bool $use_cache Whether to use static cache.
 *
 * @return bool
 */
function pb_is_type_archive( $use_cache = false ) {

	static $is_type_archive = null;

	if ( ! is_null( $is_type_archive ) && $use_cache ) {

		return $is_type_archive;

	} else {

		$is_type_archive = is_home() || is_post_type_archive() || is_category() || is_tag() || is_tax() || is_author() || is_date() || is_year() || is_month() || is_day() || is_time() || is_archive() || is_search();
		
	}

	return $is_type_archive;

}



// Check if page is a landing page
function pb_is_landing_page() {

	return( is_page_template( 'templates/landing-page.php' ) ) ? true : false ; 

}


// Output link to comments more then two deep
/*
 * http://justintadlock.com/archives/2016/11/16/designing-better-nested-comments
 */
function pb_comment_parent_link( $args = array() ) {

    echo pb_get_comment_parent_link( $args );
}

function pb_get_comment_parent_link( $args = array() ) {

    $link = '';

    $defaults = array(
        'text'   => '%s', // Defaults to comment author.
        'depth'  => 2,    // At what level should the link show.
        'before' => '',   // String to output before link.
        'after'  => ''    // String to output after link.
    );

    $args = wp_parse_args( $args, $defaults );

    if ( $args['depth'] <= $GLOBALS['comment_depth'] ) {

        $parent = get_comment()->comment_parent;

        if ( 0 < $parent ) {

            $url  = esc_url( get_comment_link( $parent ) );
            $text = sprintf( $args['text'], get_comment_author( $parent ) );

            $link = sprintf( '%s<a class="comment-parent-link" href="%s">%s</a>%s', $args['before'], $url, $text, $args['after'] );
        }
    }

    return $link;
}



// Return a list of page ID that have been set to nofollow in Yoast.
function pb_find_unlisted_pages() {

	if ( ! class_exists( 'WPSEO_Meta' ) ) {
		return;
	}

	$key = '_yoast_wpseo_meta-robots-noindex';

	$args = [
		'post_type'  => 'page',
		'fields'	 => 'ids',
		'nopaging'	 => true,
		'meta_key'	 => $key,
		'meta_value' => '1'
	];

	$pages_no_follow = get_posts( $args );

	foreach ( $pages_no_follow as $page ) {
		$pages[] = $page;
	}

	$page_ids = implode( "','", $pages );

	return $page_ids;

}