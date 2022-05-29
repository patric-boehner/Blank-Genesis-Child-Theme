<?php

/**
 * Register custom block patterns
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */

//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;

// Remove default patterns
remove_theme_support( 'core-block-patterns' );


/**
 * Custom block categories
 * 
 * @link https://make.wordpress.org/core/2022/05/02/new-features-for-working-with-patterns-and-themes-in-wordpress-6-0/
 */
// add_action( 'init', 'pb_plugin_register_my_pattern_categories' );
function pb_plugin_register_my_pattern_categories() {

    if ( function_exists( 'register_block_pattern_category' ) ) {

        register_block_pattern_category( 'sections', array( 'label' => __( 'Sections', 'blank-child-theme' ) ) );
        register_block_pattern_category( 'elements', array( 'label' => __( 'Page Elements', 'blank-child-theme' ) ) );

    }

}


// Return block pattern markup
// function get_block_pattern_markup( $path ) {
        
//     if ( ! locate_template( $path ) ) {
//         return;
//     } 

//     ob_start();

//     include( locate_template( $path ) );
//     return ob_get_clean();

// }


/*
 * Search and replace image urls base url
 * https://mrwweb.com/storing-block-patterns-in-html-files-for-nicer-code-technical
 */
// function replace_theme_uri( $markup ) {

// 	return str_replace( '{{theme_uri}}', site_url(), $markup );

// }
 


