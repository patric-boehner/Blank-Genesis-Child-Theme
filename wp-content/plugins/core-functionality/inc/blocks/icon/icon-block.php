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

function register_acf_icon_block() {

  // register a testimonial block.
  acf_register_block_type( array(
      'name'              => 'icon-block',
      'title'             => esc_html__('Icon', 'core-functionality'),
      'description'       => esc_html__('A block for adding an icon and can be used with additional blocks.', 'core-functionality'),
      'category'          => 'common', // common, formatting, layout, widgets, embed
      'icon'              => 'carrot', // Dahsicons
      'keywords'          => array( 'icon' ),
      'post_types'        => array( 'block_area', 'page', 'post' ),
      'multiple'          => true,
      'render_template'   => CORE_DIR . 'inc/blocks/icon/partial.php',
      'enqueue_style'     => get_stylesheet_directory_uri() . "/assets/css/icon.min.css",
      'supports'		    => [
        'mode'          => 'preview',
        // Each can also be set to true or false
        'align'			    => false,
        'align_content' => array( 'top', 'center', 'bottom' ), // matrix
        'customClassName'	=> true,
        'jsx' 			=> true,
      ]
  ));

}

// Check if function exists and hook into setup.
if( function_exists( 'acf_register_block_type' ) ) {
    add_action( 'acf/init', 'register_acf_icon_block' );
}