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
$className = 'max-width-block';

if( !empty( $block['className'] ) ) {
    $className .= ' ' . $block['className'];
}

if( !empty( $block['align'] ) ) {
  $className .= ' align-' . $block['align'];
}

// Variables
$max_width = esc_attr( get_field( 'maximum_width' ) );

if( !empty( $max_width ) ) {
  $className .= ' is-style-' . $max_width;
}


// Output content
include CORE_DIR . '/inc/blocks/max-width/view.php';
