<?php

//* Theme Function
//**********************************************

/**
* @package		[Blank Genesis Child Theme]
* @author		Patrick Boehner
* @copyright	Copyright (c) 2015, Patrick Boehner
* @license		GPL-2.0+
*/

/**
* Remember to replace [Blank Genesis Child Theme] with the final
* child theme name through the child theme files.
*/

//**********************************************
//* Security Updates
//**********************************************

//* Block Direct Acess
if( !defined( 'ABSPATH' ) ) exit;


//**********************************************
//* Add Site Library Files & Scripts
//**********************************************
//* http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
//* https://codex.wordpress.org/Function_Reference/wp_enqueue_style


//* Load Login Style
function pb_login_styles() {
	wp_enqueue_style( 'login_styles.min', get_stylesheet_directory_uri() . '/css/login.min.css', false );
}


//* Load Google Web Fonts
function pb_google_fonts() {
		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Raleway:300,700', array(), CHILD_THEME_VERSION );
}


//* Mobile Responsive Menu
function pb_mobile_responsive_menu() {
   // Add needed conditional statement
	wp_enqueue_script( 'responsive-menu.min', get_stylesheet_directory_uri() . '/js/min/responsive-menu.min.js', array( 'jquery' ), '1.0.0', true );
}
