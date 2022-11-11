<?php
/**
 * Register block partial for displaying template block
 *
 * @package    CoreFunctionality
 * @since      2.0.0
 * @copyright  Copyright (c) 2020, Patrick Boehner
 * @license    GPL-2.0+
 */

//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


//**********************
// Variables
$layout = esc_attr( get_field( 'content_layout' ) );
$method = esc_attr( get_field( 'get_method' ) );


// Create id attribute allowing for custom "anchor" value.
$id = 'content-grid-' . $block['id'];

if( !empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = ['content-grid-block'];

if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}

if( ! empty( $layout ) ) {
  $classes[] = $layout;
}

$block_classes = esc_attr( join( ' ', $classes ) );
$block_id = !empty( $block['anchor'] ) ? ' id="' . esc_attr( sanitize_title( $block['anchor'] ) ) . '"' : '' ;


// Block Settings
$entries = get_field( 'chosen_entires' );
$post_type = esc_attr( get_field( 'post_type' ) );
$posts_count = esc_attr( get_field( 'number_entries' ) );
$author = esc_attr( get_field( 'select_author' ) );
$categories = get_field( 'from_categories' );
$tags = get_field( 'from_tags' );
$offset = esc_attr( get_field( 'offset_entries' ) );
$order_by = esc_attr( get_field( 'order_by' ) );
$order = esc_attr( get_field( 'order_type' ) );
$exclude_entries = get_field( 'exclude_entry' );


// Check array of posts to exlude or return null array
$posts_to_exclude = !empty( $exclude_entries ) ? $exclude_entries : (array) null;


// Merged number of posts based on post count and excluded posts
$posts_count = !empty( $posts_count ) ? $posts_count : 0;
$posts_limit = $posts_count + count($posts_to_exclude);


// Default values
$post_type = !empty( $post_type ) ? $post_type : 'post';
$author = !empty( $author ) ? $author : '';
$order_by = !empty( $order_by ) ? $order_by : 'date';
$order = !empty( $order ) ? $order : 'DESC';
$posts_in = !empty( $entries ) ? $entries : array( 0 );
$offset = !empty( $offset ) ? $offset : 0;
$posts_per_page = is_numeric( $posts_limit ) ? $posts_limit : 3;


// Taxonomy Defaults
if( $categories && $tags ) {

  $tax_args = array(
    'tax_query' => array(
      'relation' => 'OR',
      array(
        'taxonomy' => 'category',
        'terms'    => $categories,
      ),
      array(
        'taxonomy' => 'post_tag',
        'terms'    => $tags,
      ),
    ),
  );

} elseif( ! $tags && $categories ) {

  $tax_args = array(
    'category__in' => $categories,
  );
  
} elseif( ! $categories && $tags ) {

  $tax_args = array(
    'tag__in' => $tags,
  );

} else {

  $tax_args = array(
    'update_post_term_cache' => false,
  );

}


// Standard Query
if( $method == 'default' ) {

  $args = array(
    'post_type'			  	     => $post_type,
    'author'                 => $author,
    'ignore_sticky_posts'    => 1,
    'order'                  => $order,
    'orderby'                => $order_by,
    'paged'                  => 1,
    'posts_per_page'         => $posts_per_page,
    'offset'                 => $offset,
    'no_found_rows'          => true,
    'update_post_meta_cache' => false,
  );

  // $args .= $tax_args;
  $args = array_merge( $args, $tax_args );

// Post Select Query
} else {

  $args = array(
    'post_type'			  	     => 'post',
    'ignore_sticky_posts'    => 1,
    'post__in'				       => $posts_in,
    'orderby'                => 'post__in',
    'no_found_rows'          => true,
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
	);

}

// Output content
include CORE_DIR . '/inc/blocks/content-grid/view.php';
