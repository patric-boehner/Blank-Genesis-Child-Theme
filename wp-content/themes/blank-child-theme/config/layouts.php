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


return [
	'wide-content'         => [
		'label'   => __( 'Wide Content', 'blank-child-theme' ),
		'default' => is_rtl() ? false : true,
		'type'    => [ 'site' ],
	],
	'narrow-content'         => [
		'label'   => __( 'Narrow Content', 'blank-child-theme' ),
		'type'    => [ 'site' ],
	],
	
];
