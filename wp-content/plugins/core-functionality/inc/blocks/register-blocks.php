<?php
/**
* Register custom blocks
*
* @package    CoreFunctionality
* @since      2.0.0
* @copyright  Copyright (c) 2019, Patrick Boehner
* @license    GPL-2.0+
*/

//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'cwp_register_block_script' );
function cwp_register_block_script() {

    // Icon Block
    wp_register_style(
        'block-icon',
        CORE_URL . 'inc/blocks/icon/style-icon.min.css',
        array(),
        cf_cf_version_id()
    );


    // Toggle Block
    wp_register_style(
        'block-toggle',
        CORE_URL . 'inc/blocks/toggle/style-toggle.min.css',
        array(),
        cf_cf_version_id()
    );


    wp_register_script(
        'block-toggle',
        CORE_URL . 'inc/blocks/toggle/script-toggle.min.js',
        array(),
        cf_cf_version_id()
    );

    
    // Video Block
    wp_register_style(
        'block-video',
        CORE_URL . 'inc/blocks/video/style-video.min.css',
        array(),
        cf_cf_version_id()
    );


    wp_register_script(
        'block-video',
        CORE_URL . 'inc/blocks/video/script-video.min.js',
        array(),
        cf_cf_version_id()
    );

}

// register_block_type( CORE_DIR . 'inc/blocks/my-first-block/block.json' );
// register_block_type( CORE_DIR . 'inc/blocks/tip/block.json' );
register_block_type( CORE_DIR . 'inc/blocks/icon/block.json' );
register_block_type( CORE_DIR . 'inc/blocks/toggle/block.json' );
register_block_type( CORE_DIR . 'inc/blocks/video/block.json' );