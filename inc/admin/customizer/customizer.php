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
add_action( 'customize_register', 'pb_remove_css_section', 15 );
function pb_remove_css_section( $wp_customize ) {

	$wp_customize->remove_control( 'blog_title' );
	$wp_customize->remove_panel( 'genesis-seo' );
	$wp_customize->remove_section( 'genesis_layout' );
	$wp_customize->remove_section( 'genesis_breadcrumbs' );
	$wp_customize->remove_section( 'genesis_comments' );
	$wp_customize->remove_section( 'genesis_archives' );
	$wp_customize->remove_section( 'genesis_footer' );
	$wp_customize->remove_section( 'genesis_scripts' );
	$wp_customize->remove_section( 'custom_css' );

}



// Add custom customizer sections
// https://codex.wordpress.org/Theme_Customization_API
// https://codex.wordpress.org/Class_Reference%5CWP_Customize_Manager%5Cadd_control

add_action( 'customize_register', 'pb_customize_register' );
function pb_customize_register( $wp_customize ) {

	// Add lazy-loading
	include CHILD_DIR . '/inc/admin/customizer/partials/lazy-load.php';

	// Add banner
	include CHILD_DIR . '/inc/admin/customizer/partials/top-banner.php';

	// Add social-share
	include CHILD_DIR . '/inc/admin/customizer/partials/social-share.php';

}


/**
 * Sanitize the lazy-load media options.
 *
 * @param string $input Lazy-load setting.
 */
function pb_sanitize_lazy_load_media( $input ) {
	$valid = array(
		'lazyload' => __( 'Lazy-load images', 'blank-child-theme' ),
		'no-lazyload' => __( 'Load images immediately', 'blank-child-theme' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}


/**
 * Gets default top banner section text.
 *
 * @since 1.0.0
 *
 * @return string Text to use in the top banner.
 */
function pb_get_default_top_banner_text() {

	return __( 'Add your custom Call To Action text here. Limited time only. <strong><a href="https://example.com">Reserve your session today!</a></strong>', 'blank-child-theme' );

}
