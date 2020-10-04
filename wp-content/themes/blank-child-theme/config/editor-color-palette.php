<?php

/**
* Sets editor colors config.
*
* @package Blank Child Theme
* @author  Patrick Boehner
* @license GPL-2.0-or-later
* @link    http://example.com/
*/


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Array of editor colors
return array(

	array(
		'name'  => __( 'Blue', 'blank-child-theme' ),
		'slug'  => 'blue',
		'color'	=> '#004b96',
	),
	array(
		'name'  => __( 'Green', 'blank-child-theme' ),
		'slug'  => 'green',
		'color' => '#58AD69',
	),
	array(
		'name'  => __( 'Orange', 'blank-child-theme' ),
		'slug'  => 'orange',
		'color' => '#FFBC49',
	),
	array(
		'name'  => __( 'White', 'blank-child-theme' ),
		'slug'  => 'white',
		'color' => '#FFFFFF',
	),

);
