<?php

/**
 * Skiplink Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;

add_filter('genesis_skip_links_output','pb_remove_sidebar_skiplink');
function pb_remove_sidebar_skiplink( $links ) {

	if ( 'narrow-content' !== genesis_site_layout() || 'full-width-content' !== genesis_site_layout() ) {
		unset( $links['genesis-sidebar-primary'] );
	}
	
	return $links;

}


// Change Skiplinks
// https://github.com/billerickson/EA-Genesis-Child/blob/master/inc/markup.php
add_filter( 'genesis_skip_links_output', 'pb_main_content_skip_link' );
function pb_main_content_skip_link( $skip_links ) {

	$old = $skip_links;
	$skip_links = array();

	foreach( $old as $id => $label ) {
		if( 'genesis-content' == $id ) {
			$id = 'main-content';
		}

		if( 'genesis-footer-widgets' == $id ) {
			$id = 'footer';
		}
			
		$skip_links[ $id ] = $label;
		
	}

	return $skip_links;
	
}