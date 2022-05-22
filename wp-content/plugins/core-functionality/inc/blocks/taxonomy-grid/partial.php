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

// https://developer.wordpress.org/reference/functions/get_terms/

// Create class attribute allowing for custom "className" and "align" values.
$classes = ['taxonomy-grid-block'];

// Variables
$layout = esc_attr( get_field( 'content_layout' ) );
$method = esc_attr( get_field( 'get_method' ) );

if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}

if( !empty( $block['align'] ) ) {
  $classes[] = 'align' . $block['align'];
}

if( !empty( $block['align_text'] ) ) {
  $classes[] = 'has-text-align-' . $block['align_text'];
}

if( !empty( $block['align_content'] ) ) {
  $className = 'is-vertically-aligned-' . $block['align_content'];
}

if( ! empty( $layout ) ) {
  $classes[] = $layout;
}

$block_classes = esc_attr( join( ' ', $classes ) );
$block_id = !empty( $block['anchor'] ) ? ' id="' . esc_attr( sanitize_title( $block['anchor'] ) ) . '"' : '' ;

// Settings
$selected_terms = get_field( 'choosen_terms' );
$number = esc_attr( get_field( 'number_entries' ) );
$order_by = esc_attr( get_field( 'order_by' ) );
$order = esc_attr( get_field( 'order_type' ) );

// Default values
$selected_terms = !empty( $selected_terms ) ? $selected_terms : array( 0 );
$number = !empty( $number ) ? $number : '';
$order_by = !empty( $order_by ) ? $order_by : 'name';
$order = !empty( $order ) ? $order : 'ASC';


// Default
if( $method == 'default' ) {

  // get_category function arguments
  $args = array(
    'taxonomy'                 => 'category',
    'child_of'                 => false,
    'parent'                   => 0,
    'orderby'                  => $order_by,
    'order'                    => $order,
    'hide_empty'               => true,
    'hierarchical'             => true,
    'exclude'                  => '',
    'include'                  => '',
    'number'                   => $number,
    'pad_counts'               => false
  );

} else {

  // get_category function arguments
  $args = array(
    'taxonomy'                 => 'category',
    'child_of'                 => false,
    'hide_empty'               => true,
    'hierarchical'             => true,
    'include'                  => $selected_terms,
    'pad_counts'               => false
  );

}




$taxonomy = get_terms( $args );

// Output content
include CORE_DIR . '/inc/blocks/taxonomy-grid/view.php';
