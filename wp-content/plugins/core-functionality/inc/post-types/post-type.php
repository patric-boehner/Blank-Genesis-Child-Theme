<?php
/**
 * Register custom post type
 *
 * @package    CoreFunctionality
 * @since      2.0.0
 * @copyright  Copyright (c) 2020, Patrick Boehner
 * @license    GPL-2.0+
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


if ( ! function_exists( 'pb_register_cpt_name' ) ) {

   // Register Services post type
   add_action( 'init', 'pb_register_cpt_name', 0 );

   function pb_register_cpt_name() {

      // Label Variables
      $singular = 'CP Name';
      $plural   = 'CP Names';

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

      $rewrite = array(
         'slug'                => 'cp-name',
         'with_front'          => false,
         'pages'               => true,
         'feeds'               => true,
      );

      $args = array(
         'label'               => __( $singular, 'core-functionality' ),
         'labels'              => $labels,
         'show_in_rest'        => true,
         'supports'            => array(
  					'title',
  					'editor',
  					'thumbnail',
  					'revisions',
  					// 'genesis-cpt-archives-settings',
  				),
         'taxonomies'          => array( ),
         'hierarchical'        => false,
         'public'              => true,
         'show_ui'             => true,
         'show_in_menu'        => true,
         'menu_position'       => null, // After posts
			   'menu_icon'				   => '', //dashicons
         'show_in_admin_bar'   => true,
         'show_in_nav_menus'   => true,
         'can_export'          => true,
         'has_archive'         => true,
         'exclude_from_search' => false, //If set to true will remove the custom post type from search, but also from the main query on the taxonomy page
         'publicly_queryable'  => true,
         'rewrite'             => $rewrite,
         'capability_type'     => 'post',
      );

      register_post_type( 'cp-name', $args );

   }

}
