<?php

/**
 * Events Meta
 *
 * @package    CoreFunctionality
 * @since      2.0.0
 * @copyright  Copyright (c) 2022, Patrick Boehner
 * @license    GPL-2.0+
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_62c525abed3e5',
	'title' => 'Location Address',
	'fields' => array(
		array(
			'key' => 'field_62c525ac072d9',
			'label' => 'Street',
			'name' => 'address_street',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_62c525ac072ee',
			'label' => 'Postal Code',
			'name' => 'address_postal',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_62c525ac072f9',
			'label' => 'City',
			'name' => 'address_locality',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_62c525ac07304',
			'label' => 'Region',
			'name' => 'address_region',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_62c525ac0730f',
			'label' => 'Country',
			'name' => 'address_country',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_62c530b03427b',
			'label' => 'Map URL',
			'name' => 'address_url',
			'aria-label' => '',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'locations',
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

acf_add_local_field_group(array(
	'key' => 'group_62b9278bce33c',
	'title' => 'Date and Time',
	'fields' => array(
		array(
			'key' => 'field_62b9278bd1ef6',
			'label' => 'Start date and time:',
			'name' => 'event_start_date',
			'aria-label' => '',
			'type' => 'date_time_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'm/d/Y g:i a',
			'return_format' => 'm/d/Y g:i a',
			'first_day' => 0,
		),
		array(
			'key' => 'field_62b9278bd1f00',
			'label' => 'End date and time:',
			'name' => 'event_end_date',
			'aria-label' => '',
			'type' => 'date_time_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'm/d/Y g:i a',
			'return_format' => 'm/d/Y g:i a',
			'first_day' => 0,
		),
		array(
			'key' => 'field_62dcd7c14f43f',
			'label' => '',
			'name' => '',
			'aria-label' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'For all day events or not display times, leave start and end times at 12:00 am',
			'new_lines' => '',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_62b92bef38ca4',
			'label' => 'Repeat Dates',
			'name' => 'event_repeat',
			'aria-label' => '',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_62b92c6aad9ef',
			'label' => 'Multiple Dates',
			'name' => 'event_multiple_dates',
			'aria-label' => '',
			'type' => 'repeater',
			'instructions' => 'Include all dates the event repeats on, including the first and final dates.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_62b92bef38ca4',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => 'Add Date',
			'rows_per_page' => 20,
			'sub_fields' => array(
				array(
					'key' => 'field_62b92d7d17c64',
					'label' => 'Date',
					'name' => 'event_date',
					'aria-label' => '',
					'type' => 'date_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'display_format' => 'm/d/Y',
					'return_format' => 'm/d/Y',
					'first_day' => 0,
					'parent_repeater' => 'field_62b92c6aad9ef',
				),
			),
		),
		array(
			'key' => 'field_62b936bc2caba',
			'label' => 'Final end date and time',
			'name' => 'event_final_date',
			'aria-label' => '',
			'type' => 'date_time_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_62b92bef38ca4',
						'operator' => '==',
						'value' => '1',
					),
					array(
						'field' => 'field_62b92c6aad9ef',
						'operator' => '>',
						'value' => '0',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'm/d/Y g:i a',
			'return_format' => 'm/d/Y g:i a',
			'first_day' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'events',
			),
		),
	),
	'menu_order' => 3,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => 'Event date and time settings',
	'show_in_rest' => 0,
));

endif;		