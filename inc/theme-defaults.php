<?php

//* Theme Defaults
//**********************************************

/**
* @package		[Blank Genesis Child Theme]
* @author		Patrick Boehner
* @copyright	Copyright (c) 2016, Patrick Boehner
* @license		GPL-2.0+
*/


//**********************************************
//* Security Updates
//**********************************************

//* Block Direct Acess
if( !defined( 'ABSPATH' ) ) exit;


//**********************************************
//* Add Site Library Files & Scripts
//**********************************************

add_filter( 'genesis_theme_settings_defaults', 'pb_child_theme_defaults' );
/**
* Updates theme settings on reset.
*
* @since 2.2.3
*/
function pb_child_theme_defaults( $defaults ) {

	$defaults['blog_cat_num']              = 6;
	$defaults['content_archive']           = 'full';
	$defaults['content_archive_limit']     = 0;
	$defaults['content_archive_thumbnail'] = 0;
	$defaults['posts_nav']                 = 'numeric';
	$defaults['site_layout']               = 'content-sidebar';

	return $defaults;

}

add_action( 'after_switch_theme', 'pb_child_theme_setting_defaults' );
/**
* Updates theme settings on activation.
*
* @since 2.2.3
*/
function pb_child_theme_setting_defaults() {

	if ( function_exists( 'genesis_update_settings' ) ) {

		genesis_update_settings( array(
			'blog_cat_num'              => 6,
			'content_archive'           => 'full',
			'content_archive_limit'     => 0,
			'content_archive_thumbnail' => 0,
			'posts_nav'                 => 'numeric',
			'site_layout'               => 'content-sidebar',
		) );

	}

	update_option( 'posts_per_page', 6 );

}
