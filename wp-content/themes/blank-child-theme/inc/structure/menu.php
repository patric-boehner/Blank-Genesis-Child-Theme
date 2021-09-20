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
add_action( 'pb_before_footer_credit', 'genesis_do_subnav' );


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


// Add no-js class to menu
add_filter( 'wp_nav_menu_args', 'yourprefix_remove_superfish_nav_primary' );
function yourprefix_remove_superfish_nav_primary( $args ) {

	if( 'primary' == $args['theme_location'] ) {
		$args['menu_class'] = 'menu genesis-nav-menu menu-primary no-js';
	}
	
	return $args;

}


/**
 * Add arrows to menu items
 * @author Bill Erickson
 * @link http://www.billerickson.net/code/add-arrows-to-menu-items/
 * 
 * @param string $item_output, HTML output for the menu item
 * @param object $item, menu item object
 * @param int $depth, depth in menu structure
 * @param object $args, arguments passed to wp_nav_menu()
 * @return string $item_output
 */
add_filter( 'walker_nav_menu_start_el', 'pb_arrows_in_menus', 10, 4 );
function pb_arrows_in_menus( $item_output, $item, $depth, $args ) {

	if( in_array( 'menu-item-has-children', $item->classes ) ) {

		$icon = pb_load_inline_svg( array(
			'filename' => 'chevron-down',
			'title' => '',
		) );

		$arrow = 0 == $depth ? $icon : $icon;
		$item_output = str_replace( '</a>', $arrow . '</a>', $item_output );

	}

	return $item_output;

}


// Add mobile menu button
add_action('genesis_header', 'pb_add_primary_menu_toggle', 10);
function pb_add_primary_menu_toggle() {

	$icon = pb_load_inline_svg( array(
		'filename' => 'menu',
	) );

	$menu = esc_html__( 'Menu' , 'blank-child-theme');

	$mobile_button = sprintf( '<button id="nav-toggle" class="nav-toggle" aria-expanded="false" aria-controls="genesis-nav-primary">%s%s</button>', '<span>'.$menu.'</span>' ,$icon );


	echo $mobile_button;

}