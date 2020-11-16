<?php
/**
 * Core Functionality Plugin
 *
 * @package    CoreFunctionality
 * @since      2.0.0
 * @copyright  Copyright (c) 2016, Patrick Boehner
 * @license    GPL-2.0+
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


//* Setup
//**********************

// Dont Update Pugin Function
require_once( CORE_DIR . '/inc/functions/dont-update.php' );

// Remoce Custom Meta
require_once( CORE_DIR . '/inc/functions/custom-meta.php' );

// Custom Functions
require_once( CORE_DIR . '/inc/functions/custom-functions.php' );

// Post Type Title Placeholder
require_once( CORE_DIR . '/inc/functions/editor-placeholder.php' );

// Yost SEO
require_once( CORE_DIR . '/inc/functions/seo.php' );

// ACF Functions
require_once( CORE_DIR . '/inc/functions/acf.php' );