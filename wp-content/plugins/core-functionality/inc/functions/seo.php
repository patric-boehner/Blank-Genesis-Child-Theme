<?php

/**
 * Include changes Yoast SEO
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


// Thanks to Bill Erickson
// https://github.com/billerickson/EA-Core-Functionality/blob/master/inc/general.php

/**
 * Remove WPSEO Notifications
 *
 */
add_action( 'admin_notices', 'cf_remove_wpseo_notifications' );
function cf_remove_wpseo_notifications() {

	if( ! class_exists( 'Yoast_Notification_Center' ) )
		return;

	remove_action( 'admin_notices', array( Yoast_Notification_Center::get(), 'display_notifications' ) );
	remove_action( 'all_admin_notices', array( Yoast_Notification_Center::get(), 'display_notifications' ) );
}
