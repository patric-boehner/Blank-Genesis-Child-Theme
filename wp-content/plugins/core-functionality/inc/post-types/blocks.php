<?php
/**
 * Register the Reusable Blocks Post Type
 *
 * @package    CoreFunctionality
 * @since      2.0.0
 * @copyright  Copyright (c) 2020, Patrick Boehner
 * @license    GPL-2.0+
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


add_filter( 'register_post_type_args', 'cf_show_blocks_in_menu', 10, 2 );
function cf_show_blocks_in_menu( $args, $post_type ) {

  if ( 'wp_block' !== $post_type ) {
    return $args;
  }

  $wp_block_args = [
    '_builtin'      => false,
    'show_in_menu'  => true,
    'labels'        => array(
      'menu_name'           => __( 'Reusable Blocks', 'core-functionality' ),
      'name_admin_bar'      => __( 'Reusable Blocks', 'core-functionality' )
    ),
    'menu_icon'     => 'dashicons-screenoptions'
  ];

  return array_merge( $args, $wp_block_args );

}
