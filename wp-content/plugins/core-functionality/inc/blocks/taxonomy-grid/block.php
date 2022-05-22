<?php
/**
 * Register custom block for a taxonomy grid
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

function register_acf_taxonomt_grid_block() {

  // register a testimonial block.
  acf_register_block_type( array(
      'name'              => 'taxonomy-grid-block',
      'title'             => esc_html__('Taxonomy Grid', 'core-functionality'),
      'description'       => esc_html__('A block for outputting a list of taxonomy terms.', 'core-functionality'),
      'category'          => 'content', // common, formatting, layout, widgets, embed
      'icon'              => 'archive', // Dahsicons
      'keywords'          => array( 'cateogry, taxonomy' ),
      'post_types'        => array( 'content_area', 'page', 'post' ),
      'multiple'          => true,
      'render_template'   => CORE_DIR . 'inc/blocks/taxonomy-grid/partial.php',
      'enqueue_style'     => get_stylesheet_directory_uri() . "/assets/css/term-grid.min.css",
      'example'  => array(
        'attributes' => array(
            'mode' => 'preview',
        )
      ),
      'supports'		    => [
        // Each can also be set to true or false
        'mode'          => false,
        'align'			    => array( 'wide', 'full' ),
        'align_text'    => array( 'left', 'right', 'center' ),
        'align_content' => array( 'top', 'center', 'bottom' ), // matrix
      ]
  ));

}

// Check if function exists and hook into setup.
if( function_exists( 'acf_register_block_type' ) ) {
    add_action( 'acf/init', 'register_acf_taxonomt_grid_block' );
}