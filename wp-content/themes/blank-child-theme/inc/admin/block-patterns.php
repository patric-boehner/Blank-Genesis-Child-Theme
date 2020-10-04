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


// Register block pattern categories
register_block_pattern_category(
    'posts',
    array( 'label' => __( 'Custom Cateogry', 'core-functionality' ) )
);


// Custom block patterns
// add_action( 'init', 'cf_register_block_patterns' );
function cf_register_block_patterns() {

    register_block_pattern(
        'core-functionality/colum-header-layout',
        array(
            'title'       => __( 'Title', 'core-functionality' ),
            'description' => _x( 'Description', 'Block pattern description', 'core-functionality' ),
            'categories'  => array( 'columns' ),
            'viewportWidth' => 1400,
            'content'     => '',
        )
    );

}
 


