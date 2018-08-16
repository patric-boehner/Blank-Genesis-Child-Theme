<?php

/**
 * Nav Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Repositions primary navigation menu to header.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );


// Reposition the secondary navigation menu to footer.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 6 );


// Control the menu depth.
add_filter( 'wp_nav_menu_args', 'pb_control_menu_depth_args' );
function pb_control_menu_depth_args( $args ) {

	if ( 'primary' == $args['theme_location'] ) {
		$args['depth'] = 2;
	} else if ('secondary' == $args['theme_location'] ) {
		$args['depth'] = 1;
	}

	return $args;

}
