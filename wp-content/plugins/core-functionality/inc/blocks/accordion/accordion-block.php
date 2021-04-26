<?php
/**
 * Register custom block for accordion block
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
// https://www.advancedcustomfields.com/resources/acf_register_block_type/

function register_acf_accordion_block() {

  // register a testimonial block.
  acf_register_block_type( array(
      'name'              => 'accordion-block',
      'title'             => esc_html__('Accordion', 'core-functionality'),
      'description'       => esc_html__('A block for creating an accordion element that you can add other blocks into.', 'core-functionality'),
      'category'          => 'common', // common, formatting, layout, widgets, embed
      'icon'              => 'editor-ul', // Dahsicons
      'keywords'          => array( 'accordion, faq' ),
      'post_types'        => array( 'content_area', 'page', 'post' ),
      'multiple'          => true,
      'render_template'   => CORE_DIR . 'inc/blocks/accordion/partial.php',
      'enqueue_style'     => get_stylesheet_directory_uri() . "/assets/css/block-accordion.min.css",
      'enqueue_script'     => get_stylesheet_directory_uri() . "/assets/js/block-accordion.min.js",
      'supports'		    => [
        'mode'          => 'preview',
        // Each can also be set to true or false
        'align'			    => array( 'wide', 'full' ),
        'customClassName'	=> true,
        'jsx' 			=> true,
      ]
  ));

}

// Check if function exists and hook into setup.
if( function_exists( 'acf_register_block_type' ) ) {
    add_action( 'acf/init', 'register_acf_accordion_block' );
}