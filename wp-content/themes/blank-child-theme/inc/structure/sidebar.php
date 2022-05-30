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


// Add inner content to the primary sidebar
// add_action( 'genesis_after_content', 'pb_add_primary_sidebar' );
function pb_add_primary_sidebar() {


    // Excape Early
    if( ! is_singular( 'post' ) ) {
        return;
    }

    if( function_exists( 'cf_show_content_area' ) ) {

        $screen_reader_heading = sprintf(
            '<h2 class="screen-reader-text">%s</h2>',
            esc_html__( 'Primary Sidebar', 'blank-child-theme' ),
        );

        cf_show_content_area( array( 
            'location' => 'sidebar',
            'element'  => 'aside',
            'id'       => 'sidebar-primary',
            'prepend'  => $screen_reader_heading
        ) );

    }

}


/**
 * Remove Secondary Sidebar
 * 
 * Remove the full strucutre
 */
remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_get_sidebar_alt' );
