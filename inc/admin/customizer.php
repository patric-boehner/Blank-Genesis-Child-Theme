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

	// $wp_customize->remove_control( 'blog_title' );
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



/**
 * WP Rig Theme Customizer
 *
 * @package wprig
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
add_action( 'customize_register', 'pb_customize_register' );
function pb_customize_register( $wp_customize ) {
	/**
	 * Theme options.
	 */
	$wp_customize->add_section(
		'theme_options', array(
			'title'							 => 'Lazy-Load Images',
			'panel'							 => 'genesis',
		)
	);

	if ( function_exists( 'wprig_lazyload_images' ) ) {
		$wp_customize->add_setting(
			'lazy_load_media', array(
				'default'           => 'lazyload',
				'sanitize_callback' => 'pb_sanitize_lazy_load_media',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'lazy_load_media', array(
				'label'           => __( 'Lazy-load images', 'blank-child-theme' ),
				'section'         => 'theme_options',
				'type'            => 'radio',
				'description'     => __( 'Lazy-loading images means images are loaded only when they are in view. Improves performance, but can result in content jumping around on slower connections.', 'blank-child-theme' ),
				'choices'         => array(
					'lazyload'    => __( 'Lazy-load on (default)', 'blank-child-theme' ),
					'no-lazyload' => __( 'Lazy-load off', 'blank-child-theme' ),
				),
			)
		);
	}
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
