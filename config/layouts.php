<?php

/**
* Overrides `genesis/config/layouts.php` to set default theme layouts.
*
* @package Blank Child Theme
* @author  Patrick Boehner
* @license GPL-2.0-or-later
* @link    http://example.com/
*/


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Overide
$layouts = array();

$genesis_layouts_config = get_template_directory() . '/config/layouts.php';

if ( is_readable( $genesis_layouts_config ) ) {
	$layouts = require $genesis_layouts_config;
	unset( $layouts['sidebar-content'] );
	unset( $layouts['content-sidebar-sidebar'] );
	unset( $layouts['sidebar-sidebar-content'] );
	unset( $layouts['sidebar-content-sidebar'] );
}

return $layouts;
