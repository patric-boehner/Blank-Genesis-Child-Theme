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


// Custom block categories
// add_action( 'init', 'pb_plugin_register_my_pattern_categories' );
function pb_plugin_register_my_pattern_categories() {

    if ( function_exists( 'register_block_pattern_category' ) ) {

        register_block_pattern_category( 'sections', array( 'label' => __( 'Sections', 'blank-child-theme' ) ) );
        register_block_pattern_category( 'elements', array( 'label' => __( 'Page Elements', 'blank-child-theme' ) ) );

    }

}
   


// Custom block patterns
// add_action( 'init', 'pb_register_block_patterns' );
function pb_register_block_patterns() {

    if ( function_exists( 'register_block_pattern' ) ) {

        register_block_pattern(
            'blank-child-theme/sample-block-pattern',
            array(
                'title'       => __( 'Sample Pattern', 'blank-child-theme' ),
                'description' => _x( 'Description', 'Block pattern description', 'blank-child-theme' ),
                'categories'  => array( 'sections' ),
                'viewportWidth' => 1400,
                'content'       => replace_theme_uri( get_block_pattern_markup( 'inc/block-patterns/sample-block-pattern.php' ) ),
            )
        );

    }  

}


// Return block pattern markup
function get_block_pattern_markup( $path ) {
        
    if ( ! locate_template( $path ) ) {
        return;
    } 

    ob_start();

    include( locate_template( $path ) );
    return ob_get_clean();

}



/*
 * Search and replace image urls base url
 * https://mrwweb.com/storing-block-patterns-in-html-files-for-nicer-code-technical
 */
function replace_theme_uri( $markup ) {

	return str_replace( '{{theme_uri}}', site_url(), $markup );

}
 


