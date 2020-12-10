<?php

/**
 * Unset default dashboards
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Remove welcome dashboard
remove_action( 'welcome_panel', 'wp_welcome_panel' );


// Remove dashboard meta boxes
add_action('wp_dashboard_setup', 'pb_remove_dashboard_widgets' );
function pb_remove_dashboard_widgets() {
	global $wp_meta_boxes;

	// WordpRess
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	// MonsterInsights
	unset($wp_meta_boxes['dashboard']['normal']['core']['monsterinsights_reports_widget']);
	// Yoast
	unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);
	// WooCommerce
	unset($wp_meta_boxes['dashboard']['normal']['core']['woocommerce_dashboard_status']);
	// Gravity Forms
	// unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);
}


/**
 * Add or Remove links from the Admin Bar
 *
 * @link https://digwp.com/2011/04/admin-bar-tricks/#add-remove-links
 * 
 * @link https://www.isitwp.com/remove-wordpress-logo-admin-bar/
 * 
 * @link https://wordpress.stackexchange.com/questions/200296/how-to-remove-customize-from-admin-menu-bar-after-wp-4-3/201646
 * 
 * @link https://github.com/isvictorious/wcphx-2020/blob/master/wp-content/themes/wcphx-genesis/functions.php
 */
// add_action( 'wp_before_admin_bar_render', 'pb_admin_bar_render' );
function pb_admin_bar_render() {
	global $wp_admin_bar;

	// $wp_admin_bar->remove_menu( 'comments' ); // remove comments
	$wp_admin_bar->remove_menu( 'wp-logo' ); // remove WordPress menu
	$wp_admin_bar->remove_menu( 'updates' ); // remove updates
	// $wp_admin_bar->remove_menu( 'new-content' ); // remove add new
	// $wp_admin_bar->remove_menu( 'customize' ); // remove customizer

}

