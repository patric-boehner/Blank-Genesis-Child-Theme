<?php

/**
 * Footer Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Customize Footer Credits
add_filter( 'genesis_footer_output', 'pb_footer_cred_output' );
function pb_footer_cred_output() {

	$first_year		  = ' 2018 - ';
	$credits_years   = '&copy; ' . $first_year . date( 'Y' ) . ' ' . '';

	// Include copyright view
	include CHILD_DIR . '/inc/views/copyright-text.php';

}
