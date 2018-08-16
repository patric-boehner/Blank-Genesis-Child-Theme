<?php

/**
 * Admin Menu customization
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


/**
 * Reorders and cleans up the administration menu to make it more user-friendly.
 *
 * @param  array $menuOrder The current array of menu items.
 * @return array            An updated order of the items that correspond to the menu.
 *
 * @link   https://codex.wordpress.org/Plugin_API/Filter_Reference/custom_menu_order
 */
add_filter( 'custom_menu_order', 'pb_change_admin_menu_order', 10, 1 );
add_filter( 'menu_order', 'pb_change_admin_menu_order', 10, 1 );
function pb_change_admin_menu_order( $menu_order ) {

	if ( !$menu_order ) {
		return true;
	}

	return array(
		'index.php', // Dashboard
		'separator1', // First separator
		'edit.php?post_type=page', // Pages
		'edit.php', // Posts
		'edit-comments.php', // Comments
		// 'edit.php?post_type=your_custom_post_type',
		'upload.php', // Media
		'separator1', // Second separator
	);

}


// Remove Post via email option
add_filter( 'enable_post_by_email_configuration', '__return_false', 100 );
