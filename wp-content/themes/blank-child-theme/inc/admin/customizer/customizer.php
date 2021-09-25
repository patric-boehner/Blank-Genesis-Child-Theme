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

// Useful Links
/*
 * https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
 * https://developer.wordpress.org/themes/customize-api/customizer-objects/
 */

// Remove Genesis & additional CSS options
add_action( 'customize_register', 'pb_remove_customizer_sections' );
function pb_remove_customizer_sections( $wp_customize ) {

	$wp_customize->remove_control( 'blog_title' );
	$wp_customize->remove_section( 'genesis_header' );
	// $wp_customize->remove_section( 'genesis_layout' );
	$wp_customize->remove_section( 'genesis_breadcrumbs' );
	// $wp_customize->remove_section( 'genesis_comments' );
	$wp_customize->remove_control( 'genesis_trackbacks_posts' );
	$wp_customize->remove_control( 'genesis_trackbacks_pages' );
	$wp_customize->remove_control( 'genesis_comments_pages' );
	$wp_customize->remove_control( 'genesis_entry_meta_before_content' );
	$wp_customize->remove_control( 'genesis_entry_meta_after_content' );
	$wp_customize->remove_control( 'genesis_show_featured_image_page' );
	$wp_customize->remove_section( 'genesis_archives' );
	// $wp_customize->remove_section( 'genesis_footer' );
	// $wp_customize->remove_section( 'genesis_scripts' );

}


// Add custom customizer sections
// https://codex.wordpress.org/Theme_Customization_API
// https://codex.wordpress.org/Class_Reference%5CWP_Customize_Manager%5Cadd_control

// add_action( 'customize_register', 'pb_customize_register' );
// function pb_customize_register( $wp_customize ) {

// 	// Add social-share
// 	include CHILD_DIR . '/inc/admin/customizer/partials/social-share.php';

// }