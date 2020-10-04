<?php
/**
 * Homepage template file
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */

// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


//* Change site-title SEO wrap
//**********************

add_filter( 'genesis_site_title_wrap','pb_wrap_site_title' );
function pb_wrap_site_title( $wrap ) {

	$wrap = 'h1';

	return $wrap;

}


//* Force full-width-content layout setting
// add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );



//* Entry Header
//**********************

// Remove entry title on homepage
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open',  5  );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );


// Change entry title to h2 on homepage
add_filter( 'genesis_entry_title_wrap', 'pb_post_title_wrap' );
function pb_post_title_wrap( $wrap ) {

	return 'h1';

}


//**********************

//* Run the Genesis loop
genesis();
