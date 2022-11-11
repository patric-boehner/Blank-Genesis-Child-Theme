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
$classes = ['icon-block'];

if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}

if ( ! empty( $block['textColor'] ) ) {
	$classes[] = 'has-text-color';
	$classes[] = 'has-' . $block['textColor'] . '-color';
}

// Variables
$icon_name = esc_attr( get_field( 'icon_select' ) );
$size = esc_attr( get_field( 'icon_size' ) );


$block_classes = esc_attr( join( ' ', $classes ) );
$block_id = !empty( $block['anchor'] ) ? ' id="' . esc_attr( sanitize_title( $block['anchor'] ) ) . '"' : '' ;

// Icons
if ( function_exists( 'pb_load_inline_svg' ) ) {

  $icon_svg = pb_load_inline_svg( array(
      'directory' => 'decorative', 
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
