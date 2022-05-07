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


function pb_output_related_posts() {

    // Variables
    $category = get_the_category();
	$current_cat = $category[0]->cat_ID;
    $post_to_exclude = array( get_the_ID() );


    // Query
    $posts = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page'  => 3 + count( $post_to_exclude ),
        'category__in'    => $current_cat,
        'no_found_rows'   => true,
        'update_post_meta_cache' => false
    ) );
    
    
    // Loop
    if ( $posts->have_posts() ) :

        // Variable
        $section_heading = esc_html__( 'Related Posts', 'blank-child-theme');

        // Opening Strcutre
        echo sprintf(
            '<section class="related-posts"><h3>%s</h3><div class="inner_content">',
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