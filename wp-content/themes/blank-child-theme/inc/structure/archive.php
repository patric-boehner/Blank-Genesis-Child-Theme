<?php

/**
 * Archive Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Add body clases to all blogs and archives
add_filter( 'body_class', 'pb_archive_body_class' );
function pb_archive_body_class( $classes ) {

	if(  !is_home() || !is_search() ) {
		return $classes;	
	}
	
    $classes[] = 'archive';
	return $classes;
	
}


// Removes possible conflicting class names
add_filter( 'genesis_attr_taxonomy-archive-description', 'pb_attributes_archive_description' );
add_filter( 'genesis_attr_author-archive-description', 'pb_attributes_archive_description' );
function pb_attributes_archive_description( $attributes ) {

	$attributes['class'] = str_replace( ' taxonomy-description', '' ,$attributes['class'] );
	$attributes['class'] = str_replace( ' author-description', '', $attributes['class'] );

	return $attributes;

}


// Add class to first post
add_filter( 'post_class', 'pb_first_post_class' );
function pb_first_post_class( $classes ) {

	if ( !is_home() || is_paged() ) {
		return $classes;
	}

    global $wp_query;

    if( 0 == $wp_query->current_post ) {
			$classes[] = 'first-entry';
		}

	  return $classes;

}


// Remove Genesis image fallback
add_filter( 'genesis_get_image_default_args', 'pb_remove_image_fallback' );
function pb_remove_image_fallback( $args ) {

	// Don't use first attached image as featured image fallback
	$args['fallback'] = false;

	return $args;

}


// Add content area before footer
add_action( 'genesis_before_footer', 'pb_add_archive_content_area', 1 );
function pb_add_archive_content_area() {

	// if this is not an archive, abort.
    if ( is_singular() ) {
        return;
    }

	// Output content area
	if ( function_exists( 'pb_show_content_area' ) ) {
		pb_show_content_area( 'archive-footer' );
	}

}


// Modify automatic excerpts read more Link
add_filter( 'the_content_more_link', 'pb_get_read_more_link' );
add_filter( 'get_the_content_more_link', 'pb_get_read_more_link' );
add_filter( 'excerpt_more', 'pb_get_read_more_link' );
function pb_get_read_more_link( $more ) {

	include CHILD_DIR . '/inc/partials/read-more.php';

	return $continue_reading;

}


// Add Read More link to excerpts
add_filter( 'get_the_excerpt', 'pb_modify_excerpt_read_more_link' );
function pb_modify_excerpt_read_more_link( $excerpt ) {

	$continue_reading = '';

	if ( has_excerpt() ) {

		include CHILD_DIR . '/inc/partials/read-more.php';

	}

	$trim_excerpt = rtrim( $excerpt, "." );

	return $trim_excerpt . $continue_reading;

}


// Filter excerpt length
add_filter( 'excerpt_length', 'pb_custom_excerpt_length', 999 );
function pb_custom_excerpt_length( $length ) {

	return 55;

}



// Modify arhive pagination
remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
add_action( 'genesis_after_endwhile', 'pb_customize_archive_pagination' );
function pb_customize_archive_pagination() {

	get_template_part( '/inc/partials/pagination' );

}


// Customize the previous page link in pagination
add_filter ( 'genesis_prev_link_text' , 'pb_filter_previous_page_link_text' );
function pb_filter_previous_page_link_text ( $text ) {

	if ( ! is_post_type_archive( '' ) || ! is_tax( '' ) ) {
		return __( 'Newer Posts', 'blank-child-theme' );
	}

	return __( 'CPT Previous Page', 'blank-child-theme' );

}


// Customize the next page link in pagination
add_filter ( 'genesis_next_link_text' , 'pb_filter_next_page_link_text' );
function pb_filter_next_page_link_text ( $text ) {

	if ( ! is_post_type_archive( '' ) || ! is_tax( '' ) ) {
		return __( 'Older Posts', 'blank-child-theme' );
	}

	return __( 'CPT Next Page', 'blank-child-theme' );

}


// Pagination link class
add_filter('next_posts_link_attributes', 'pb_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'pb_posts_link_attributes');
function pb_posts_link_attributes() {

	return 'class="button"';

}
