<?php

/**
 * Lazy-Load theme options
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Add Lazyload Seciton
/*
 * Part of the WP Rig Theme Customizer
 * @package wprig
 */

$wp_customize->add_section(
  'theme_options', array(
    'title'							 => __( 'Lazy-Load Images', 'blank-child-theme' ),
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
