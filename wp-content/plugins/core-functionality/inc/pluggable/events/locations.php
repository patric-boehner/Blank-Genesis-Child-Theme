<?php
/**
* Location taxonomy for events
*
* @package    CoreFunctionality
* @since      2.0.0
* @copyright  Copyright (c) 2019, Patrick Boehner
* @license    GPL-2.0+
*/

//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


if ( ! function_exists( 'cf_register_locations_taxonomy' ) ) {

  add_action( 'init', 'cf_register_locations_taxonomy', 0 );

  // Register Custom Taxonomy
  function cf_register_locations_taxonomy() {

    $plural = 'Locations';
    $singular = '';

    $labels = array(
      'name'                       => __( $plural, 'core-functionality' ),
      'singular_name'              => __( $plural, 'core-functionality' ),
      'menu_name'                  => __( $plural, 'core-functionality' ),
      'name_admin_bar'             => __( $plural, 'core-functionality' ),
      'all_items'                  => __( 'All' . ' ' . $plural, 'core-functionality' ),
      'new_item_name'              => __( 'New' . ' ' . $plural . 'Name', 'core-functionality' ),
      'add_new_item'               => __( 'Add New' . ' ' . $plural, 'core-functionality' ),
      'edit_item'                  => __( 'Edit' . ' ' . $plural, 'core-functionality' ),
      'update_item'                => __( 'Update' . ' ' . $plural, 'core-functionality' ),
      'view_item'                  => __( 'View' . ' ' . $plural, 'core-functionality' ),
      'separate_items_with_commas' => __( 'Separate' . ' ' . $plural . ' ' . 'with commas', 'core-functionality' ),
      'add_or_remove_items'        => __( 'Add or remove' . ' ' . $plural, 'core-functionality' ),
      'choose_from_most_used'      => __( 'Choose from the most used' . ' ' . $plural, 'core-functionality' ),
      'search_items'               => __( 'Search' . ' ' . $plural, 'core-functionality' ),
      'not_found'                  => __( 'No' . ' ' . $plural . ' ' . 'Found', 'core-functionality' ),
    );

    $rewrite = array(
      'slug'          => 'locations',
      'with_front'    => true,
      'hierarchical'  => true,
    );

    $default = array(
      'name' => 'Default Location',
      'slug' => 'default-location',
    );

    $args = array(
      'labels'             => $labels,
    	'hierarchical'       => true,
    	'public'             => false,
    	'show_ui'            => true,
    	'show_admin_column'  => true,
    	'show_in_nav_menus'  => false,
    	'show_tagcloud'      => false,
      'query_var'          => true,
      'show_in_quick_edit' => true,
      'default_term'       => $default,
      'show_in_rest'       => true,
      'rewrite'            => $rewrite,
    );

  	register_taxonomy( 'locations', array( 'events' ), $args );

  }

}
