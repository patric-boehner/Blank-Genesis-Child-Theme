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

// Create class attribute allowing for custom "className" and "align" values.
$className = 'icon-block';

if( !empty( $block['className'] ) ) {
    $className .= ' ' . $block['className'];
}

if( !empty( $block['align_content'] ) ) {
  $className .= ' is-vertically-aligned-' . $block['align_content'];
}

// Variables
$icon_name = esc_attr( get_field( 'icon_select' ) );
$align = esc_attr( get_field( 'icon_align' ) );
$size = esc_attr( get_field( 'icon_size' ) );
$color = esc_attr( get_field( 'icon_color' ) );

if( !empty( $size ) ) {
  $className .= ' icon-size-' . $size;
}

if( !empty( $align ) ) {
  $className .= ' icon-align-' . $align;
}

if( !empty( $color ) ) {
  $className .= ' has-'.$color.'-color';
}

// Icons
if ( function_exists( 'pb_load_inline_svg' ) ) {
  $icon_svg = pb_load_inline_svg( array( 
      'filename' => $icon_name,
      'width' => '28',
      'height' => '28',
      'title' => '',
  ) );
} else {
  $icon_svg = '';
}

// Output content
include CORE_DIR . '/inc/blocks/icon/view.php';
