<?php
/**
 * Register custom post type
 * 
 * Run searhc and replace on 'cp_name' and 'CP Name' with the post type name
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
         'name'                  => _x( $plural, 'Post Type General Name', 'core-functionality' ),
         'singular_name'         => _x( $singular, 'Post Type Singular Name', 'core-functionality' ),
         'menu_name'             => __( $plural, 'core-functionality' ),
         'name_admin_bar'        => __( $singular, 'core-functionality' ),  // Singular
         'parent_item_colon'     => __( 'Parent Item:', 'core-functionality' ),
         'all_items'             => __( 'All ' . $plural, 'core-functionality' ),
         'add_new_item'          => __( 'Add New ' . $singular, 'core-functionality' ),
         'add_new'               => __( 'Add New ' . $singular, 'core-functionality' ),
         'new_item'              => __( 'New ' . $singular, 'core-functionality' ),
         'edit_item'             => __( 'Edit ' . $singular, 'core-functionality' ),
         'update_item'           => __( 'Update ' . $singular, 'core-functionality' ),
         'view_item'             => __( 'View ' . $singular, 'core-functionality' ),
         'search_items'          => __( 'Search ' . $plural, 'core-functionality' ),
         'not_found'             => __( 'No ' . $plural . ' found', 'core-functionality' ),
         'not_found_in_trash'    => __( 'No ' . $plural . ' found in Trash', 'core-functionality' ),
         'featured_image'        => __('Featured Image', 'core-functionality'),
         'set_featured_image'    => __('Set featured image', 'core-functionality'),
         'remove_featured_image' => __('Remove featured image', 'core-functionality'),
         'use_featured_image'    => __('Use as featured image', 'core-functionality'),
         'insert_into_item'      => __('Insert into Testimonial', 'core-functionality'),
         'uploaded_to_this_item' => __('Uploaded to this ' . $singular, 'core-functionality'),
         'items_list'            => __( $plural . ' list', 'core-functionality'),
         'items_list_navigation' => __( $plural . ' list navigation', 'core-functionality'),
         'filter_items_list'     => __('Filter ' .$plural. ' list', 'core-functionality'),
      );

      $rewrite = array(
         'slug'                => 'cp_name',
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

      register_post_type( 'cp_name', $args );

   }

}


/**
 * CPT Updates messages.
 *
 * @param array $messages Existing post update messages.
 *
 * @return array Amended testimonial CPT notices
 * 
 * @link https://www.sitepoint.com/wordpress-custom-post-types-notices-taxonomies/
 */
add_filter( 'post_updated_messages', 'pb_cp_name_notices' );
function pb_cp_name_notices( $messages ) {

   $singular = 'CP Name';
   $plural   = 'CP Names';

   $post             = get_post();
   $post_type        = get_post_type( $post );
   $post_type_object = get_post_type_object( $post_type );

   $messages['cp_name'] = array(
      0  => '', // Unused. Messages start at index 1.
      1  => __( $singular . ' updated.', 'core-functionality' ),
      2  => __( 'Custom field updated.', 'core-functionality' ),
      3  => __( 'Custom field deleted.', 'core-functionality' ),
      4  => __( $singular . ' updated.', 'core-functionality' ),
      5  => isset( $_GET['revision'] ) ? sprintf( __( 'cp_name restored to revision from %s', 'core-functionality' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
      6  => __( $singular . ' published.', 'core-functionality' ),
      7  => __( $singular . ' saved.', 'core-functionality' ),
      8  => __( $singular . ' submitted.', 'core-functionality' ),
      9  => sprintf(
         __( $singular . ' scheduled for: <strong>%1$s</strong>.', 'core-functionality' ),
         date_i18n( __( 'M j, Y @ G:i', 'core-functionality' ), strtotime( $post->post_date ) )
      ),
      10 => __( $singular . ' draft updated.', 'core-functionality' )
   );

   if ( $post_type_object->publicly_queryable ) {
      $permalink = get_permalink( $post->ID );

      $view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'View ' . $singular, 'core-functionality' ) );
      $messages[ $post_type ][1] .= $view_link;
      $messages[ $post_type ][6] .= $view_link;
      $messages[ $post_type ][9] .= $view_link;

      $preview_permalink = add_query_arg( 'preview', 'true', $permalink );
      $preview_link      = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview ' . $singular, 'core-functionality' ) );
      $messages[ $post_type ][8] .= $preview_link;
      $messages[ $post_type ][10] .= $preview_link;
   }

   return $messages;

}
