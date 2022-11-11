<?php
/**
* Block Data
*
* @package    CoreFunctionality
* @since      2.0.0
* @copyright  Copyright (c) 2019, Patrick Boehner
* @license    GPL-2.0+
*
* @link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/ 
* @link https://www.billerickson.net/building-acf-blocks-with-block-json/
* @link https://www.modernwpdev.co/acf-blocks/
*/

// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Create class attribute allowing for custom "className" and "align" values.
$classes = ['icon-toggle'];

// $data is what we're going to expose to our render template
$data = array(
	'toggle_heading' => esc_html( get_field( 'heading' ) ),
    'toggle_heading_size' => esc_attr( get_field( 'heading_level' ) )
);

// Alignment class
if( ! empty( $block['align'] ) ) {
    $classes[] = 'align-' . $block['align'];
}

// Check to see if a custom class has been added
if ( ! empty( $block['className'] ) ) {
	$classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}

// Join the classes together into one variable
$block_classes = esc_attr( join( ' ', $classes ) );

// Dynamic block ID
$block_id = 'icon-' . $block['id'];
$id_only = str_replace( 'block_', '', $block['id'] );

$toggle_id = 'toggle__button-' . $id_only;
$content_id = 'toggle__content-' . $id_only;


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


// Output template part
include CORE_DIR . 'inc/blocks/toggle/template.php';