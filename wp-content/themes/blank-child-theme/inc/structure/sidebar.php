<?php

/**
 * Structure Sidebar
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;



// Remove Sidebars
// https://studiopress.github.io/genesis/developer-features/genesis-layouts/

/**
 * Alter Output of Primary Sidbar
 * 
 * Remove the full strucutre and add it back while swaping the
 * theme default content for the content area.
 */
remove_action( 'genesis_after_content', 'genesis_get_sidebar' );

// add_action( 'genesis_before_loop', 'pb_add_or_remove_sidebar', 12 );
function pb_add_or_remove_sidebar() {

    // Remove inner content from primary sidebar
    remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

    // Remove the primary sidebar if not on right template
    if ( ! is_singular( 'post' ) ) {

        remove_action( 'genesis_after_content', 'genesis_get_sidebar' );

    }

    // Add inner content to the primary sidebar
    add_action( 'genesis_sidebar', 'pb_testing' );
    function pb_testing() {

        if( function_exists( 'cf_show_content_area' ) ) {

            cf_show_content_area( array( 
                'location' => 'sidebar',
                'element' => 'div',
            ) );

        }

    }

}    


/**
 * Remove Secondary Sidebar
 * 
 * Remove the full strucutre
 */
remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_get_sidebar_alt' );
