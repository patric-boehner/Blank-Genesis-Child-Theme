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
add_action( 'wp_dashboard_setup', 'pb_remove_dashboard_widgets' );
function pb_remove_dashboard_widgets() {

	// remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	// remove_meta_box( 'monsterinsights_reports_widget', 'dashboard', 'normal' );
	// remove_meta_box( 'woocommerce_dashboard_status', 'dashboard', 'normal' );
	remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );

}
