<?php
/**
 * Register custom block for max width wrapper
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

function register_acf_max_width_block() {

  // register a testimonial block.
  acf_register_block_type( array(
      'name'              => 'max-width-block',
      'title'             => esc_html__('Max-Width', 'core-functionality'),
      'description'       => esc_html__('A wrapping block for setting the maximum width of the content contained inside.', 'core-functionality'),
      'category'          => 'layout', // common, formatting, layout, widgets, embed
      'icon'              => 'editor-expand', // Dahsicons
      'keywords'          => array( 'width, group, max width, max-width' ),
      'multiple'          => true,
      'render_template'   => CORE_DIR . 'inc/blocks/max-width/partial.php',
      'enqueue_style'     => get_stylesheet_directory_uri() . "/assets/css/max-width.min.css",
      'supports'		    => [
        'mode'          => 'preview',
        // Each can also be set to true or false
        'align'    => array( 'left', 'right', 'center' ),
        'customClassName'	=> true,
        'jsx' 			=> true,
      ]
  ));

}

// Check if function exists and hook into setup.
if( function_exists( 'acf_register_block_type' ) ) {
    add_action( 'acf/init', 'register_acf_max_width_block' );
}