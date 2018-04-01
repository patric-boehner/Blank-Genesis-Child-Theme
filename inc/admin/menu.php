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


// Change admin menu order
add_filter( 'custom_menu_order', 'pb_change_admin_menu_order' );
add_filter( 'menu_order', 'pb_change_admin_menu_order' );
function pb_change_admin_menu_order( $menu_order ) {

	if ( !$menu_order ) {
		return true;
	}

	return array(
		'index.php', // Dashboard
		'separator1', // First separator
		'edit.php?post_type=page', // Pages
		'edit.php', // Posts
		// 'edit.php?post_type=your_custom_post_type',
		'upload.php', // Media
		'edit-comments.php', // Comments
		'separator1', // Second separator
	);

}
