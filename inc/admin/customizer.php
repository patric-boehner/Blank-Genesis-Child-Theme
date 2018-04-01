<?php

/**
 * Remove customizer settings
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;



// Remove Genesis & additional CSS options
add_action( 'customize_register', 'pb_remove_css_section', 15 );
function pb_remove_css_section( $wp_customize ) {

	$wp_customize->remove_control( 'blog_title' );
	$wp_customize->remove_section( 'genesis_header' );
	$wp_customize->remove_section( 'genesis_comments' );
	$wp_customize->remove_section( 'genesis_layout' );
	$wp_customize->remove_section( 'genesis_adsense' );
	$wp_customize->remove_section( 'genesis_breadcrumbs' );
	$wp_customize->remove_section( 'genesis_archives' );
	$wp_customize->remove_section( 'genesis_scripts' );
	$wp_customize->remove_panel( 'genesis-seo' );
	$wp_customize->remove_section( 'custom_css' );

}
