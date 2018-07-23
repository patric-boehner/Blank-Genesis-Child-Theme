<?php

/**
 * Social Share theme options
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Add Social Share Section

$wp_customize->add_section(
  'ct_social_share_settings' ,
  array(
    'title'      => __( 'Social Share Links', 'blank-child-theme' ),
    'panel'			 => 'genesis',
  // 'priority'   => 30,
  )
);


// Turn on and off
$wp_customize->add_setting(
  'social_share_option',
  array(
    'default'   => 1,
    'transport' => 'refresh',
  )
);

$wp_customize->add_control(
  'social_share_option',
  array(
    'label'         => __( 'Use Social Sharing', 'blank-child-theme' ),
  	'section'       => 'ct_social_share_settings',
    'type'          => 'checkbox',
    'description'   => __( 'Check this box to allow and show social sharing features for blog posts.', 'blank-child-theme' ),
  )
);



// Set twitter handle
$wp_customize->add_setting(
  'social_share_twitter_account',
  array(
    'default' => '',
    'transport' => 'refresh',
  )
);

// Add text box
$wp_customize->add_control(
  'social_share_twitter_account',
  array(
    'label'       => __( 'Twitter Handle', 'blank-child-theme' ),
    'section'     => 'ct_social_share_settings',
    'type'        => 'text',
    'description' => __( 'Add your Twitter handle without the @ symbol. If left empty, the post author\'s handle will be used.', 'blank-child-theme' ),
  )
);
