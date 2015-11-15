<?php

//* Theme Functions
//**********************************************

/**
* @package		[Blank Genesis Child Theme]
* @author		Patrick Boehner
* @copyright	Copyright (c) 2015, Patrick Boehner
* @license		GPL-2.0+
*/

/**
* Remember to replace [Blank Genesis Child Theme] with the final
* child theme name throught the child theme.
*/

//**********************************************
//* Security Updates
//**********************************************

//* Block Direct Acess
if( !defined( 'ABSPATH' ) ) exit;


//**********************************************
//* Define the Child theme
//**********************************************

define( 'CHILD_THEME_NAME', '[Blank Genesis Child Theme]' );
define( 'CHILD_THEME_URL', 'http://www.example.com/' );
define( 'CHILD_THEME_VERSION', filemtime( get_stylesheet_directory() . '/style.css' ) );

/**
 * Theme Setup
 * @since 1.0.0
 *
 * This setup function attaches all of the site-wide functions
 * to the correct hooks and filters. All the functions themselves
 * are defined below this setup function.
 *
 */
add_action('genesis_setup','pb_child_theme_setup', 15);
function pb_child_theme_setup() {

   //**********************************************
   //* Maintance Mode
   //**********************************************

   //* Comment out to turn off
   // include_once( CHILD_DIR . '/lib/maintenace-mode.php' );


   //**********************************************
   //* Setup child theme functions
   //**********************************************

   // Clean up and organize all our changes
   include_once( CHILD_DIR . '/lib/theme-functions.php' );

   //**********************************************
   //* Load Site Library Files & Scripts
   //**********************************************
   //* Files found in the lib directory /functions-backend.php
   //* https://codex.wordpress.org/Function_Reference/wp_enqueue_script

   //* Login Styles
   add_action( 'login_enqueue_scripts', 'pb_login_styles', 10 );

   // Load Google Web Fonts
   add_action( 'wp_enqueue_scripts', 'pb_google_fonts' );

   //* Mobile Responsive Menu - Enqueue scripts and stiles
   add_action( 'wp_enqueue_scripts', 'pb_mobile_responsive_menu' );


}
