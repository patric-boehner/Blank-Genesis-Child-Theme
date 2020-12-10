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

// Create id attribute allowing for custom "anchor" value.
$id = 'content-grid-' . $block['id'];

if( !empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'content-grid';

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

// Variables
$layout = esc_attr( get_field( 'content_layout' ) );
$method = esc_attr( get_field( 'get_method' ) );
$entries = get_field( 'chosen_entires' );
$posts = esc_attr( get_field( 'number_entries' ) );
$cat = get_field( 'from_cateogry' );
$offset = esc_attr( get_field( 'offset_entries' ) );
$order_by = esc_attr( get_field( 'order_by' ) );
$order = esc_attr( get_field( 'order_type' ) );
$exclude_entries = get_field( 'exclude_entry' );

if( !empty( $entries ) ) {
  $entry_ids = $entries;
} else {
  $entry_ids = (array) null;
}

if( empty($posts) ) {
  $limit = 100;
} else {
  $limit = $posts;
}


if( !empty( $cat ) ) {
  $cat_to_include = $cat;
} else {
  $cat_to_include = (array) null;
}


if( !empty( $exclude_entries ) ) {
  $posts_to_exclude = $exclude_entries;
} else {
  $posts_to_exclude = (array) null;
}


if( !empty( $layout ) ) {
  $className .= ' ' . $layout;
}

if( $layout == 'three-columns' ){
  $style_name = '--grid-columns: repeat(3, 1fr);';
} else {
  $style_name = '--grid-columns: repeat(4, 1fr);';
}



// Output content
include CORE_DIR . '/inc/blocks/content-grid/view.php';
