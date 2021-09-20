<?php
/**
 * Theme supports.
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0-or-later
 * @link    http://example.com/
 */

return [
	'html5'                           => [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
		'script',
		'style',
	],
	'structural-wraps'				  => [
		'header',
		'footer',
	],
	'genesis-accessibility'           => [
		'headings',
		'rems',
		'search-form',
		'skip-links'
	],
	'genesis-after-entry-widget-area' => '',
	'genesis-footer-widgets'          => 0,
	'genesis-menus'                   => [
		'primary'   => __( 'Header Menu', 'blank-child-theme' ),
		'secondary' => __( 'Footer Menu', 'blank-child-theme' ),
	],
];
