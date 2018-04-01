<?php

/**
 * Yoast SEO Plugin Filters
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Tell Yoast Google Analytics plugin not to be at the top of the WP admin menu
add_filter( 'wpga_menu_on_top', '__return_false' );


// Filter Yoast SEO Metabox Priority
add_filter( 'wpseo_metabox_prio', 'pb_filter_yoast_seo_metabox' );
function pb_filter_yoast_seo_metabox() {

	return 'low';

}
