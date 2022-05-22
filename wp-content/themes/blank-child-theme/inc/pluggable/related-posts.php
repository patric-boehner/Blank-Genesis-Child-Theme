<?php

/**
 * Related Posts Strucutre
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


/**
 * Function for outputing the related posts
 * 
 * Returns a formated list of 3 posts
 */
function pb_output_related_posts() {

    // Variables
    $category = get_the_category();
	$current_cat = $category[0]->cat_ID;
    $post_to_exclude = array( get_the_ID() );

    // Query
    $posts = new WP_Query( array(
        'post_type'       => 'post',
        'posts_per_page'  => 3 + count( $post_to_exclude ),
        'category__in'    => $current_cat,
        'no_found_rows'   => true,
        'update_post_meta_cache' => false
    ) );

    // Exit Early
    if( pb_post_has_cateogry() == false ) {
        return;
    }
    
    // Loop
    if ( $posts->have_posts() ) :

        // Variable
        $section_heading = esc_html__( 'Related Posts', 'blank-child-theme');

        // Opening Strcutre
        echo sprintf(
            '<section class="related-posts"><h2>%s</h2><div class="inner_content">',
            $section_heading
        );

        // Loop
        while ( $posts->have_posts() ) : $posts->the_post();

            // Skip Current Posts
            if ( in_array( get_the_ID(), $post_to_exclude ) ) {
                continue;
            }

            // Post Strucutre
            get_template_part( 'inc/partials/content-related', 'posts' );

        endwhile;
    endif;

    // Reset
    wp_reset_postdata();

    // Closing Content
    echo sprintf(
        '</div></section>',
    );

}


/**
 * Check if the post in the loop has a cateogry
 * 
 * If that that isn't the default cateogry, return true
 */
function pb_post_has_cateogry() {
    
    // Get the current posts cateory slugs
    $category = wp_get_post_categories( get_the_ID(), array( 'fields' => 'ids' ) );
    $default_cateogry = get_option('default_category');

    // If there is only one cateogry and that cateogry is the default category return flase
    if( count( $category ) <= 1 && $category[0] == $default_cateogry ) {
        return false;
    }

    return true;
	
}
