<?php

/**
 * Template Name: Narrow Content
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Add landing page body class to the head.
add_filter( 'body_class', 'genesis_sample_add_body_class' );
function genesis_sample_add_body_class( $classes ) {

	$classes[] = 'narrow-content';

	return $classes;

}


// Run the Genesis loop.
genesis();
