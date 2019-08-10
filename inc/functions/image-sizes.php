<?php

/**
 * Set default image sizes
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Update default image sizes on theme switch
add_action( 'switch_theme', 'pb_child_theme_enforce_image_size_options' );
function pb_child_theme_enforce_image_size_options() {

	update_option( 'thumbnail_size_w', 150 );
	update_option( 'thumbnail_size_h', 150 );
	update_option( 'thumbnail_crop', 1 );
	update_option( 'medium_size_w', 300 );
	update_option( 'medium_size_h', 300 );
	update_option( 'large_size_w', 1024 );
	update_option( 'large_size_h', 1024 );

}
