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


/**
 * Cleanup menu classes
 * From: Bill Erickson
 */
add_filter( 'nav_menu_css_class', 'pb_clean_nav_menu_classes', 5 );
function pb_clean_nav_menu_classes( $classes ) {

	if( ! is_array( $classes ) ) {
		return $classes;
	}

	foreach( $classes as $i => $class ) {

		// Remove class with menu item id
		$id = strtok( $class, 'menu-item-' );

		if( 0 < intval( $id ) ) {
			unset( $classes[ $i ] );
		}

		// Remove menu-item-type-*
		if( false !== strpos( $class, 'menu-item-type-' ) ) {
			unset( $classes[ $i ] );
		}

		// Remove menu-item-object-*
		if( false !== strpos( $class, 'menu-item-object-' ) ) {
			unset( $classes[ $i ] );
		}

		// Change page ancestor to menu ancestor
		if( 'current-page-ancestor' == $class ) {
			$classes[] = 'current-menu-ancestor';
			unset( $classes[ $i ] );
		}

	}

	// Remove submenu class if depth is limited
	if( isset( $args->depth ) && 1 === $args->depth ) {
		$classes = array_diff( $classes, array( 'menu-item-has-children' ) );
	}

	return $classes;

}
