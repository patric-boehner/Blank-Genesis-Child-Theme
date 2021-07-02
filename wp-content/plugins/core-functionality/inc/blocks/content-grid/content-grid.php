<?php
/**
 * Register content gird block
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
// https://10up.github.io/Engineering-Best-Practices/php/
// https://docs.wpvip.com/how-tos/improve-performance-by-removing-usage-of-post__not_in/

function register_acf_content_grid_block() {

  // register a testimonial block.
  acf_register_block_type( array(
      'name'              => 'content-grid',
      'title'             => esc_html__('Content Grid', 'core-functionality'),
      'description'       => esc_html__('A set of posts displayed by category and/or tag in a grid.', 'core-functionality'),
      'category'          => 'content', // common, formatting, layout, widgets, embed
      'icon'              => 'block-default', // Dahsicons
      'keywords'          => array( '' ),
      'post_types'        => array( 'content_area', 'page', 'post' ),
      'multiple'          => true,
      'render_template'   => CORE_DIR . 'inc/blocks/content-grid/partial.php',
      'enqueue_style'     => get_stylesheet_directory_uri() . "/assets/css/content-grid.min.css",
      'example'  => array(
        'attributes' => array(
            'mode' => 'preview',
            'data' => array(
              'content_layout'  => "three-columns",
              'number_entries'  => "3",
              'is_preview'      => true,
            )
        )
      ),
      'supports'		    => [
        'mode'          => false,
        // Each can also be set to true or false
        'align'			    => array( 'wide', 'full' ),
        'align_text'    => array( 'left', 'right', 'center' ),
        'align_content' => array( 'top', 'center', 'bottom' ), // matrix
      ]
  ));

}

// Check if function exists and hook into setup.
if( function_exists( 'acf_register_block_type' ) ) {
    add_action( 'acf/init', 'register_acf_content_grid_block' );
}