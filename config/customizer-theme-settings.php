<?php

/**
* Overrides `genesis/config/customizer-theme-settings.php` to set default theme configuration settings.
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
$sections = array();

$genesis_customizer_theme_config = get_template_directory() . '/config/customizer-theme-settings.php';

if ( is_readable( $genesis_customizer_theme_config ) ) {

	$sections = require $genesis_customizer_theme_config;
	unset( $sections['genesis']['sections']['genesis_header'] );
	unset( $sections['genesis']['sections']['genesis_adsense'] );
	unset( $sections['genesis']['sections']['genesis_color_scheme'] );
	unset( $sections['genesis']['sections']['genesis_layout'] );
	unset( $sections['genesis']['sections']['genesis_breadcrumbs'] );
	unset( $sections['genesis']['sections']['genesis_comments'] );
	unset( $sections['genesis']['sections']['genesis_archives'] );
	unset( $sections['genesis']['sections']['genesis_scripts'] );

}

return $sections;
