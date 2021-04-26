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
$id = 'accordion-block-' . $block['id'];

if( !empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'accordion-block accordion-container';

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
$text = esc_html( get_field( 'heading' ) );
$heading = esc_html( get_field( 'heading_level' ) );


// Output content
include CORE_DIR . '/inc/blocks/accordion/view.php';
