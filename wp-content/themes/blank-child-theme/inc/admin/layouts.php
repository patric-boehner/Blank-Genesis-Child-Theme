<?php

/**
 * Add custom layouts
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Registers custom grid layout
/*
 * https://studiopress.github.io/genesis/developer-features/genesis-layouts/
 * 
 * New layouts replace default site layouts for that type
 */
add_action( 'after_setup_theme', 'pb_register_layouts' );
function pb_register_layouts() {

	// genesis_register_layout(
	// 	'standard-content', // A layout slug of your choice. Used in body classes. 
	// 	[
	// 		'label' => __( 'Standard Content', 'blank-child-theme' ),
	// 		'type'  => [ 'page', 'singular' ],
	// 	]
	// );

	genesis_register_layout(
		'narrow-content', // A layout slug of your choice. Used in body classes. 
		[
			'label' => __( 'Narrow Content', 'blank-child-theme' ),
			'type'  => [ 'page', 'post', 'singular', 'site' ],
		]
	);
	
	genesis_register_layout(
		'wide-content', // A layout slug of your choice. Used in body classes. 
		[
			'label' => __( 'Wide Content', 'blank-child-theme' ),
			'type'  => [ 'page', 'post', 'singular', 'site' ],
		]
    );
    
    
}