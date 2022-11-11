<?php

/**
 * Related Posts Strucutre
 *
 * @package    CoreFunctionality
 * @since      2.0.0
 * @copyright  Copyright (c) 2022, Patrick Boehner
 * @license    GPL-2.0+
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


/**
 * Function for outputing the related posts
 * 
 * Returns a formated list of 3 posts
 */
function cf_output_related_posts() {

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
    if( cf_get_post_category() == false ) {
        return;
    }
    
    // Loop
    if ( $posts->have_posts() ) :

        /**
         * Create a filterable headline text
         * 
         * Use 'cf_related_posts_title' as the hook for the callback function
         * when you want to chnage the title.
         * Default priority is 10.
         * 
         * @link https://developer.wordpress.org/reference/functions/add_filter/
         */
        $title = esc_html__( 'Related Posts', 'core-functionality');
        $section_heading = apply_filters( 'cf_related_posts_title', $title );

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
            include CORE_DIR . '/inc/pluggable/related-posts/view.php';

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
 * If the cateogry isn't the default cateogry, return true
 */
function cf_get_post_category() {
    
    // Get the current posts cateory slugs
    $category = wp_get_post_categories( get_the_ID(), array( 'fields' => 'ids' ) );
    $default_cateogry = get_option('default_category');

    // If there is only one cateogry and that cateogry is the default category return flase
    if( count( $category ) <= 1 && $category[0] == $default_cateogry ) {
        return false;
    }

    return true;
	
}
