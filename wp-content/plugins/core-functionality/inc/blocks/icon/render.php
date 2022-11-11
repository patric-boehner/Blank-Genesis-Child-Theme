<?php
/**
* Block Data
*
* @package    CoreFunctionality
* @since      2.0.0
* @copyright  Copyright (c) 2019, Patrick Boehner
* @license    GPL-2.0+
* 
* @link https://www.billerickson.net/building-acf-blocks-with-block-json/
* @link https://www.modernwpdev.co/acf-blocks/registering-blocks/#render-template
*/


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Create class attribute allowing for custom "className" and "align" values.
$classes = ['icon-block'];


// $data is what we're going to expose to our render template
$data = array(
	'icon_name' => esc_attr( get_field( 'icon_select' ) ),
    'icon_size' => esc_attr( get_field( 'icon_size' ) )
);


// Class names for text colors
if ( ! empty( $block['textColor'] ) ) {
    $classes[] = 'has-' . $block['textColor'] . '-color';
    $classes[] = 'has-text-color';
}

// Icon Algin class
if( ! empty( $block['alignContent'] ) ) {
    $classes[] = 'is-vertically-aligned-' . $block['alignContent'];
}

// Check to see if a custom class has been added
if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}

// Icon Size Icon
if( ! empty( $data['icon_size'] ) ) {
    $classes[] = 'icon-size-' . $data['icon_size'];
}

// Join the classes together into one variable
$block_classes = esc_attr( join( ' ', $classes ) );

// Dynamic block ID
$block_id = 'icon-' . $block['id'];


// Icons
if ( function_exists( 'pb_load_inline_svg' ) ) {

    $icon_svg = pb_load_inline_svg( array(
        'directory' => 'decorative', 
        'filename' => $data['icon_name'],
        'width' => '28',
        'height' => '28',
        'title' => '',
    ) );
    
  } else {
    $icon_svg = '';
  }



// Output template part
include CORE_DIR . 'inc/blocks/icon/template.php';