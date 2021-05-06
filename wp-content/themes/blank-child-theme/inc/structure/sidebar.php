<?php

/**
 * Structure Sidebar
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;



// Remove Sidebars
// https://studiopress.github.io/genesis/developer-features/genesis-layouts/
add_action( 'genesis_meta', 'pb_remove_sidebar_on_layouts' );
function pb_remove_sidebar_on_layouts() {

	$site_layout = genesis_site_layout();

	if ( 'narrow-content' === $site_layout || 'full-width-content' === $site_layout ) {
		remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
		remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_get_sidebar_alt' );
	}

}