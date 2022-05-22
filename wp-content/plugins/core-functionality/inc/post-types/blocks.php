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

  // Label Variables
  $singular = 'Reusable Block';
  $plural   = 'Reusable Blocks';

  $labels = array(
    'name'                => _x( $plural, 'Post Type General Name', 'core-functionality' ),
    'singular_name'       => _x( $singular, 'Post Type Singular Name', 'core-functionality' ),
    'menu_name'           => __( $plural, 'core-functionality' ),
    'name_admin_bar'      => __( $singular, 'core-functionality' ),  // Singular
    'parent_item_colon'   => __( 'Parent Item:', 'core-functionality' ),
    'all_items'           => __( 'All ' . $plural, 'core-functionality' ),
    'add_new_item'        => __( 'Add New ' . $singular, 'core-functionality' ),
    'add_new'             => __( 'Add New ' . $singular, 'core-functionality' ),
    'new_item'            => __( 'New ' . $singular, 'core-functionality' ),
    'edit_item'           => __( 'Edit ' . $singular, 'core-functionality' ),
    'update_item'         => __( 'Update ' . $singular, 'core-functionality' ),
    'view_item'           => __( 'View ' . $singular, 'core-functionality' ),
    'search_items'        => __( 'Search ' . $plural, 'core-functionality' ),
    'not_found'           => __( 'No ' . $plural . ' found', 'core-functionality' ),
    'not_found_in_trash'  => __( 'No ' . $plural . ' found in Trash', 'core-functionality' ),
 );

  $wp_block_args = [
    '_builtin'      => false,
    'show_in_menu'  => true,
    'label'               => __( $singular, 'core-functionality' ),
    'labels'              => $labels,
    'menu_icon'     => 'dashicons-screenoptions'
  ];

  return array_merge( $args, $wp_block_args );

}
