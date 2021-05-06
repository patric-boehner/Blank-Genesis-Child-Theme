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

// Query Variables
$entries = get_field( 'chosen_entires' );
$posts_count = esc_attr( get_field( 'number_entries' ) );
$categories = get_field( 'from_categories' );
$tags = get_field( 'from_tags' );
$offset = esc_attr( get_field( 'offset_entries' ) );
$order_by = esc_attr( get_field( 'order_by' ) );
$order = esc_attr( get_field( 'order_type' ) );
$exclude_entries = get_field( 'exclude_entry' );


// Create id attribute allowing for custom "anchor" value.
$id = 'content-grid-' . $block['id'];

if( !empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'content-grid-block';

if( !empty( $block['className'] ) ) {
    $className .= ' ' . $block['className'];
}

if( !empty( $block['align'] ) ) {
  $className .= ' align' . $block['align'];
}

if( !empty( $block['align_text'] ) ) {
  $className .= ' has-text-align-' . $block['align_text'];
}

if( !empty( $block['align_content'] ) ) {
  $className .= ' is-vertically-aligned-' . $block['align_content'];
}

if( !empty( $layout ) ) {
  $className .= ' ' . $layout;
}


// Check array of posts to exlude or return null array
$posts_to_exclude = !empty( $exclude_entries ) ? $exclude_entries : (array) null;

// Merged number of posts based on post count and excluded posts
$posts_count = !empty( $posts_count ) ? $posts_count : 0;
$posts_limit = $posts_count + count($posts_to_exclude);


// Query args varaibele
$args = array();

// Only if there are either categories or tags.
if ( $categories || $tags ) {
  $args = cf_acf_blocks_get_content_query_arguments( $categories, $tags );
}

// Orderby args
$args['orderby'] = !empty( $order_by ) ? $order_by : 'date';

// Order args
$args['order'] = !empty( $order ) ? $order : 'DESC';

// Posts per page args
$args['posts_per_page'] = is_numeric( $posts_limit ) ? $posts_limit : 3;

// Offset args
$args['offset'] = !empty( $offset ) ? $offset : 0;


// Type or arg
if( $method == 'default' ) {

  // Get the content
  $get_content = cf_acf_blocks_get_query_content( $args );
  
} else {

  // Posts in args
  $args['post__in'] = !empty( $entries ) ? $entries : array( 0 );

  // Orderby in args
  $args['orderby'] = 'post__in';

  // Get the content
  $get_content = cf_acf_blocks_get_selected_content( $args );

}

// Output content
include CORE_DIR . '/inc/blocks/content-grid/view.php';
