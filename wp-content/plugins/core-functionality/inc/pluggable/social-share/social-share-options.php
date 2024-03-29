<?php
/**
* Social Share ACF Options
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
        'page_title' 	=> __( 'Social Share Setting', 'core-functionality' ),
        'menu_title'	=> __( 'Social Share', 'core-functionality' ),
        'parent_slug'	=> 'options-general.php',
        'capability'    => 'edit_pages',
    ));
	
}


// ACF Social Share Options
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_614e7701e07a4',
        'title' => 'Social Share',
        'fields' => array(
            array(
                'key' => 'field_614e783c57039',
                'label' => 'Show Social Sharing?',
                'name' => 'show_social_sharing',
                'type' => 'true_false',
                'instructions' => 'Toggle to allow and show social sharing features for blog posts.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_6287018af34b3',
                'label' => 'Sharing Heading',
                'name' => 'sharing_heading',
                'type' => 'text',
                'instructions' => 'Add the heading displayed above the social share links.
    If left empty the default heading text will be set to be visible only to screen readers.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'Share this Post',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_614e7882f0cc4',
                'label' => 'Sharing Options',
                'name' => 'sharing_options',
                'type' => 'select',
                'instructions' => 'Select which social sharing sharing services you want to allow. Drag and drop to rearange their order',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'facebook' => 'Facebook',
                    'twitter' => 'Twitter',
                    'pinterest' => 'Pinterest',
                    'linkedin' => 'Linkedin',
                    'email' => 'Email',
                ),
                'allow_custom' => 0,
                'default_value' => array(
                    0 => 'facebook',
                    1 => 'twitter',
                    2 => 'pinterest',
                    3 => 'linkedin',
                    4 => 'email',
                ),
                'allow_null' => 0,
                'multiple' => 1,
                'ui' => 1,
                'ajax' => 0,
                'return_format' => 'value',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_6285c317ad6f3',
                'label' => 'Button Style',
                'name' => 'sharing_button_style',
                'type' => 'radio',
                'instructions' => 'Both Icon and icon only include accessible text.',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'icon' => 'Icon Only',
                    'icon-text' => 'Icon and Text',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => 'icon-text',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_614e794434934',
                'label' => 'Additional Settings',
                'name' => '',
                'type' => 'message',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => 'Customize the options for sharing on Twitter and via email.',
                'new_lines' => 'wpautop',
                'esc_html' => 0,
            ),
            array(
                'key' => 'field_614e797d34935',
                'label' => 'Twitter Handle',
                'name' => 'shring_twitter_handle',
                'type' => 'text',
                'instructions' => 'Add the business twitter handle without the @ symbol.',
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
                'key' => 'field_614e799234936',
                'label' => 'Email Subject',
                'name' => 'sharing_email_subject',
                'type' => 'text',
                'instructions' => 'The post title will be appended to the subject.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'Shared Article:',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_614e79d134937',
                'label' => 'Email Body',
                'name' => 'sharing_email_body',
                'type' => 'textarea',
                'instructions' => 'The post url will be appended to the body text you add.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'I want to share this article with you. Here is the link to the article:',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 3,
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-social-share',
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