<?php

/**
 * Customize ACF functions
 *
 * @author      Patrick Boehner
 * @link        http://www.patrickboehner.com
 * @package     Core Functionality
 * @copyright   Copyright (c) 2012, Patrick Boehner
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Hide ACF Admin on live enviroment
if ( 'local' !== wp_get_environment_type() || 'development' !== wp_get_environment_type() || 'staging' !== wp_get_environment_type() ) {

	add_filter( 'acf/settings/show_admin', '__return_true' );

}


// Add Social Share Settings
if( function_exists('acf_add_options_page') ) {
 
	acf_add_options_sub_page(array(
		'page_title' 	=> __( 'Social Share Setting', 'blank-child-theme' ),
		'menu_title'	=> __( 'Social Share', 'blank-child-theme' ),
		'parent_slug'	=> 'options-general.php',
	));
	
}


// Post archive theme settings page
// if( function_exists('acf_add_options_page') ) {
 
// 	acf_add_options_sub_page(array(
// 		'page_title' 	=> 'Posts Archive Settings',
// 		'menu_title'	=> 'Archive Settings',
// 		'parent_slug'	=> 'edit.php',
// 	));
	
// }


// Block Catoegires
// add_filter( 'block_categories_all', 'cf_plugin_block_categories_all', 10, 2 );
// function  cf_plugin_block_categories_all( $categories, $post ) {
// //  if ( $post->post_type !== array( 'post', 'block_area', 'page', 'presenters' )  ) {
// //      return $categories;
// //  }
//     return array_merge(
//         $categories,
//         array(
//             array(
//                 'slug' => 'content',
//                 'title' => __( 'Content', 'core-functionality' ),
//             ),
//             array(
//             'slug' => 'donations',
//             'title' => __( 'Donations', 'core-functionality' ),
//         ),
//         )
//     );
    
// }



/**
 * Dynamic Icon Select 
 * Lists icons found in theme's /assets/icons directory 
 *
 * https://www.billerickson.net/dynamic-dropdown-fields-in-acf/
 */
add_filter('acf/load_field/name=icon_select', 'cf_acf_icon_select' );
function cf_acf_icon_select( $field ) {

	$field['choices'] = array( 0 => '(None)' );

	if( ! function_exists( 'cf_get_theme_icons' ) )
		return $field;

	$icons = cf_get_theme_icons();

	foreach( $icons as $icon ) {
		$field['choices'][ $icon ] = $icon;
	}

	return $field;

}


/**
 * Get Theme Icons
 * Refresh cache by bumping CHILD_THEME_VERSION
 */
function cf_get_theme_icons( $directory = 'decorative' ) {

	$icons = get_option( 'cf_theme_icons_' . $directory );

	$version = get_option( 'cf_theme_icons_' . $directory . '_version' );

	if( empty( $icons ) || ( defined( 'CHILD_THEME_VERSION' ) && version_compare( CHILD_THEME_VERSION, $version ) ) ) {

		$icons = scandir( get_stylesheet_directory() . '/assets/icons/' . $directory );
		$icons = array_diff( $icons, array( '..', '.' ) );
		$icons = array_values( $icons );

		if( empty( $icons ) ) {
			return $icons;
		}
			
		// remove the .svg
		foreach( $icons as $i => $icon ) {
			$icons[ $i ] = substr( $icon, 0, -4 );
		}

		update_option( 'cf_theme_icons_' . $directory, $icons );

		// Update the icon theme version
		if( defined( 'CHILD_THEME_VERSION' ) ) {
			update_option( 'cf_theme_icons_' . $directory . '_version', CHILD_THEME_VERSION );
		}
			
	}

	return $icons;

}