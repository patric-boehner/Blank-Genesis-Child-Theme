<?php

/**
* Add logo settings
*
* @package Blank Child Theme
* @author  Patrick Boehner
* @license GPL-2.0+
* @link    https://integrative-trauma-recovery.com
*/


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Logo Width
$wp_customize->add_setting(
	'genesis_sample_logo_width',
	[
		'default'           => 350,
		'sanitize_callback' => 'absint',
	]
);


// Add a control for the logo size.
$wp_customize->add_control(
	'genesis_sample_logo_width',
	[
		'label'       => __( 'Logo Width', 'genesis-sample' ),
		'description' => __( 'The maximum width of the logo in pixels.', 'genesis-sample' ),
		'priority'    => 9,
		'section'     => 'title_tagline',
		'settings'    => 'genesis_sample_logo_width',
		'type'        => 'number',
		'input_attrs' => [
			'min' => 100,
		],
	]
);
