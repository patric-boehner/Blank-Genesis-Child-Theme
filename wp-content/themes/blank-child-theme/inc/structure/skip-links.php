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