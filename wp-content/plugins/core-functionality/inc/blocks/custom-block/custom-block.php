<?php
/**
 * Register custom block for watever purpose
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

function register_acf_custom_block() {

  // register a testimonial block.
  acf_register_block_type( array(
      'name'              => 'custom-block',
      'title'             => esc_html__('Custom Block', 'core-functionality'),
      'description'       => esc_html__('A block for outputting a custom block.', 'core-functionality'),
      'category'          => 'common', // common, formatting, layout, widgets, embed
      'icon'              => 'admin-appearance', // Dahsicons
      'keywords'          => array( '' ),
      'post_types'        => array( 'content_area', 'page', 'post' ),
      'multiple'          => true,
      'render_template'   => CORE_DIR . 'inc/blocks/custom-block/partial.php',
      'example'  => array(
        'attributes' => array(
            'mode' => 'preview',
            'data' => array(
              'text'          => "Custom block sample text...",
              'is_preview'    => true,
            )
        )
      ),
      'supports'		    => [
        'mode'          => 'preview',
        // Each can also be set to true or false
        'align'			    => array( 'wide', 'full', 'left', 'right', 'center' ),
        'align_text'    => array( 'left', 'right', 'center' ),
        'align_content' => array( 'top', 'center', 'bottom' ), // matrix
      ]
  ));

}

// Check if function exists and hook into setup.
if( function_exists( 'acf_register_block_type' ) ) {
    add_action( 'acf/init', 'register_acf_custom_block' );
}