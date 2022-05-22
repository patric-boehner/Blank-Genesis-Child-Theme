<?php
/**
* Sitewide Banner ACF Options
*
* @package    CoreFunctionality
* @since      2.0.0
* @copyright  Copyright (c) 2019, Patrick Boehner
* @license    GPL-2.0+
*/

//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Add Social Share Settings page
if( function_exists('acf_add_options_page') ) {
 
	acf_add_options_sub_page(array(
		'page_title' 	=> __( 'Site Banner Setting', 'core-functionality' ),
		'menu_title'	=> __( 'Site Banner', 'core-functionality' ),
		'parent_slug'	=> 'options-general.php',
		'capability'    => 'manage_options',
	));
	
}


if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_628011132cf51',
		'title' => 'Banner Settings',
		'fields' => array(
			array(
				'key' => 'field_628011132fe94',
				'label' => 'Enable Banner',
				'name' => 'enable_banner',
				'type' => 'button_group',
				'instructions' => 'Display the banner.',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'enable' => 'Enable',
					'disable' => 'Disable',
				),
				'allow_null' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
				'return_format' => 'value',
			),
			array(
				'key' => 'field_6280111e2d112',
				'label' => 'Banner Content',
				'name' => 'banner_content',
				'type' => 'post_object',
				'instructions' => 'Select the Content Area containing the banner text.',
				'required' => 1,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_628011132fe94',
							'operator' => '==',
							'value' => 'enable',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array(
					0 => 'content_area',
				),
				'taxonomy' => '',
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'id',
				'ui' => 1,
			),
			array(
				'key' => 'field_628011132fe9e',
				'label' => 'Make Dismissable',
				'name' => 'banner_cookie',
				'type' => 'button_group',
				'instructions' => 'Allow the banner to be close for a set number of days',
				'required' => 1,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_628011132fe94',
							'operator' => '==',
							'value' => 'enable',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'enable' => 'Enable',
					'disable' => 'Disable',
				),
				'allow_null' => 0,
				'default_value' => 'enable',
				'layout' => 'horizontal',
				'return_format' => 'value',
			),
			array(
				'key' => 'field_628011132fea7',
				'label' => 'Days to Hide Banner?',
				'name' => 'hide_banner',
				'type' => 'number',
				'instructions' => 'Number of days the banner remains hidden when closed.',
				'required' => 1,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_628011132fe94',
							'operator' => '==',
							'value' => 'enable',
						),
						array(
							'field' => 'field_628011132fe9e',
							'operator' => '==',
							'value' => 'enable',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 14,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-site-banner',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'seamless',
		'label_placement' => 'left',
		'instruction_placement' => 'field',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));
	
	endif;		