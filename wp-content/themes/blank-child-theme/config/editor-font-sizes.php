<?php

/**
* Sets editor font size config.
*
* @package Blank Child Theme
* @author  Patrick Boehner
* @license GPL-2.0-or-later
* @link    http://example.com/
*/


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Array of editor sizes
return array(

	array(
		'name'      => __( 'Small', 'blank-child-theme' ),
		'shortName' => __( 'S', 'blank-child-theme' ),
		'size'      => 16,
		'slug'      => 'small'
	),
	array(
		'name'      => __( 'Regular', 'blank-child-theme' ),
		'shortName' => __( 'M', 'blank-child-theme' ),
		'size'      => 20,
		'slug'      => 'regular'
	),
	array(
		'name'      => __( 'Large', 'blank-child-theme' ),
		'shortName' => __( 'L', 'blank-child-theme' ),
		'size'      => 24,
		'slug'      => 'large'
	),

);
