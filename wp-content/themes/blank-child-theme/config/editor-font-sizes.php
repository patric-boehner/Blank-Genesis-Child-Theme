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
		'name'      => esc_attr__( 'Small', 'blank-child-theme' ),
		'shortName' => esc_attr__( 'S', 'blank-child-theme' ),
		'size'      => 16,
		'slug'      => 'small'
	),
	array(
		'name'      => esc_attr__( 'Regular', 'blank-child-theme' ),
		'shortName' => esc_attr__( 'M', 'blank-child-theme' ),
		'size'      => 20,
		'slug'      => 'regular'
	),
	array(
		'name'      => esc_attr__( 'Large', 'blank-child-theme' ),
		'shortName' => esc_attr__( 'L', 'blank-child-theme' ),
		'size'      => 24,
		'slug'      => 'large'
	),
	array(
		'name'      => esc_attr__( 'H1 Heading', 'blank-child-theme' ),
		'shortName' => esc_attr__( 'h1', 'blank-child-theme' ),
		'size'      => 49,
		'slug'      => 'xxx-large'
	),
	array(
		'name'      => esc_attr__( 'H2 Heading', 'blank-child-theme' ),
		'shortName' => esc_attr__( 'h2', 'blank-child-theme' ),
		'size'      => 39,
		'slug'      => 'xx-large'
	),
	array(
		'name'      => esc_attr__( 'H3 Heading', 'blank-child-theme' ),
		'shortName' => esc_attr__( 'h3', 'blank-child-theme' ),
		'size'      => 31,
		'slug'      => 'x-large'
	)

);
