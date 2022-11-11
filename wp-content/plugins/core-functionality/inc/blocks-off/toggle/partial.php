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
$id = 'toggle-' . $block['id'];
$id_only = str_replace( 'block_', '', $block['id'] );

$toggle_id = 'toggle__button-' . $id_only;
$content_id = 'toggle__content-' . $id_only;

if( !empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'toggle-block';

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

// Icons
if ( function_exists( 'pb_load_inline_svg' ) ) {
  $icon_svg = pb_load_inline_svg( array( 
      'filename' => 'chevron-down',
      'width' => '24',
      'height' => '24',
      'title' => '',
  ) );
} else {
  $icon_svg = '';
}

// Variables
$text = esc_html( get_field( 'heading' ) );
$heading = esc_html( get_field( 'heading_level' ) );


/**
 * Template file for inner blocks
 * 
 * Add to the view file using esc_attr( wp_json_encode( $template ) );
 * 
 * @link https://www.billerickson.net/innerblocks-with-acf-blocks/
 */
$template = array(
  array( 'core/heading',
    array(
      'level'   => 3,
      'placeholder' => 'Enter a heading or a question',
    ) ),
  array( 'core/paragraph',
    array(
      'placeholder' => 'Enter your content or the answer to the question'
    ) )
);


// Output content
include CORE_DIR . '/inc/blocks/toggle/view.php';
