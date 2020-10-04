<?php
/**
 * Register the Content Areas Post Type
 *
 * @package    CoreFunctionality
 * @since      2.0.0
 * @copyright  Copyright (c) 2020, Patrick Boehner
 * @license    GPL-2.0+
 */


 //* Block Acess
 //**********************
 if( !defined( 'ABSPATH' ) ) exit;


 if ( ! function_exists( 'pb_register_cpt_content_areas' ) ) {

    // Register Services post type
    add_action( 'init', 'pb_register_cpt_content_areas', 0 );

    function pb_register_cpt_content_areas() {

       // Label Variables
       $singular = 'Content Area';
       $plural   = 'Content Areas';

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
          'slug'                => 'content-area',
          'with_front'          => false,
       );

       $args = array(
          'label'               => __( $singular, 'core-functionality' ),
          'labels'              => $labels,
          'show_in_rest'        => true,
          'supports'            => array(
   					'title',
   					'editor',
   					'revisions',
   				),
          'taxonomies'          => array( ),
          'hierarchical'        => false,
          'public'              => false,
          'show_ui'             => true,
 			    'menu_icon'				    => 'dashicons-schedule',
          'can_export'          => true,
          'has_archive'         => false,
          'exclude_from_search' => true, // If set to true will remove the custom post type from search, but also from the main query on the taxonomy page
          'rewrite'             => $rewrite,
       );

       register_post_type( 'content_area', $args );

    }


    // Redirect Single Content Area Pages
    add_action( 'template_redirect', 'pb_redirect_single_content_area' );
    function pb_redirect_single_content_area() {

      if( is_singular( 'content_area' ) ) {
			     wp_redirect( home_url() );
			     exit;
		  }

    }


    // Show Block Area
    function pb_show_content_area( $location = '' ) {

      // Return early
      if( ! $location ) {
        return;
      }

      $location = sanitize_key( $location );

      $loop = new WP_Query( array(
        'post_type'		=> 'content_area',
        'name'    		=> $location,
        'posts_per_page'	=> 1,
      ));

      if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post();
      echo '<div class="block-content-area block-content-area-' . $location . '">';
      the_content();
			echo '</div>';
      endwhile; endif; wp_reset_postdata();

	 }

 }
