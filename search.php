<?php
/**
 * Search template file
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */

// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Search Header
//**********************

remove_action( 'genesis_before_loop', 'genesis_do_search_title' );
add_action( 'genesis_before_loop', 'pb_modify_search_page_header' );
function pb_modify_search_page_header() {

	$title = sprintf( '<header class="archive-description search-description"><h1 class="archive-title">%s %s</h1></header>', apply_filters( 'genesis_search_title_text', __( 'Search Results for:', 'genesis' ) ), get_search_query() );
	echo apply_filters( 'genesis_search_title_output', $title ) . "\n";

}

//**********************

//* Run the Genesis loop
genesis();
