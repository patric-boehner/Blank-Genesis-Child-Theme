<?php

/**
 * Asign default post screen options
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    https://tommcfarlin.com/remove-wordpress-meta-boxes/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Hide Screen Options by Default
apply_filters( 'default_hidden_meta_boxes', 'pb_hide_default_meta_boxes', 10, 2 );
function pb_hide_default_meta_boxes( $hidden, $screen ) {

	// Check which page we are on before hiding metaboxes
	if ( 'post' == $current_screen->base ) {

		$hidden = arrya(
			'slugdiv',
			'postcustom',
			'trackbacksdiv',
			'commentstatusdiv',
			'commentsdiv',
			'authordiv',
			'revisionsdiv',
			'tags'
		);

	}

	return $hidden;

}
