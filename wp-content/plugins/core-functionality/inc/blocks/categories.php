<?php

/**
 * Custom block categories
 *
 * @author      Patrick Boehner
 * @link        http://www.patrickboehner.com
 * @package     Core Functionality
 * @copyright   Copyright (c) 2012, Patrick Boehner
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */


add_filter( 'block_categories_all', 'cf_custom_block_categories_all', 10, 2 );
function cf_custom_block_categories_all( $categories, $post ) {
    // if ( $post->post_type !== 'post' ) {
    //     return $categories;
    // }
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'content',
                'title' => __( 'Content', 'core-functionality' ),
            ),
        )
    );
}
