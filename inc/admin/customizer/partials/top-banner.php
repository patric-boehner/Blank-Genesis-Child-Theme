<?php

/**
* Add dismissable cookied notice bar
*
* @package Blank Child Theme
* @author  Patrick Boehner
* @license GPL-2.0+
* @link    https://integrative-trauma-recovery.com
*/


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


//* Notice Bar
//**********************

// Top Banner Section.
$wp_customize->add_section(
	'pb-theme-top-banner-settings', array(
		'description' => sprintf( '<strong>%s</strong><p>%s</p>', __( 'Modify the settings for the top banner section.', 'blank-child-theme' ), __( 'Each time the customizer is opened, the top banner will be displayed in the live preview so you can easily customize the content.', 'blank-child-theme' ) ),
		'title'       => __( 'Top Banner Section', 'blank-child-theme' ),
		'panel'       => 'genesis',
	)
);

$wp_customize->add_setting(
	'pb-theme-top-banner-visibility', array(
		'default'           => 0,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'pb-theme-top-banner-visibility', array(
		'description' => __( 'Check the box to display a dismissible banner at the top of all pages.', 'blank-child-theme' ),
		'label'       =>  __( 'Show Top Banner?', 'blank-child-theme' ),
		'section'     => 'pb-theme-top-banner-settings',
		'settings'    => 'pb-theme-top-banner-visibility',
		'type'        => 'checkbox',
	)
);

$wp_customize->add_setting(
	'pb-theme-top-banner-text', array(
		'default'           => pb_get_default_top_banner_text(),
		'sanitize_callback' => 'wp_kses_data',
		'transport'         => isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh',
	)
);

$wp_customize->add_control(
	'pb-theme-top-banner-text', array(
		'description' => __( 'Change the text for the dismissible banner (allows HTML).', 'blank-child-theme' ),
		'label'       => __( 'Top Banner Text', 'blank-child-theme' ),
		'section'     => 'pb-theme-top-banner-settings',
		'settings'    => 'pb-theme-top-banner-text',
		'type'        => 'textarea',
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'pb-theme-top-banner-text', array(
			'selector'        => '.authority-top-banner',
			'settings'        => array( 'pb-theme-top-banner-text' ),
			'render_callback' => function() {
				return get_theme_mod( 'pb-theme-top-banner-text' );
			},
		)
	);
}

$wp_customize->add_setting(
	'pb-theme-top-banner-cookie-end-date', array(
		'default'						=> '7',
		'sanitize_callback'	=> 'absint',
		'type'							=> 'theme_mod',
	)
);

$wp_customize->add_control(
	'pb-theme-top-banner-cookie-end-date', array(
		'label'				=> __( 'Days to Hide Banner', 'blank-child-theme' ),
		'description'	=> __( 'Set the number of days the banner should be hidden when closed.', 'blank-child-theme' ),
		'section'     => 'pb-theme-top-banner-settings',
		'type'				=> 'number',
	)
);
