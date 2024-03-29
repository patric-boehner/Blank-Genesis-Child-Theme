<?php

/**
 * Admin Bar Options
 *
 * @author      Patrick Boehner
 * @link        http://www.patrickboehner.com
 * @package     CoreFunctionality
 * @copyright   Copyright (c) 2022, Patrick Boehner
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 *
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;;


//**********************


/**
 * Remove the Howdy Text in WordPress
 *
 * @link https://wpintensity.com/change-howdy-text-wordpress/
 *
 */
add_filter( 'admin_bar_menu', 'cf_remove_howdy',25 );
function cf_remove_howdy( $wp_admin_bar ) {

    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', '', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
	
}



/** 
 * Hide admin bar for none editor users
 * 
 * From the No Nonsense plugin by Room 34 Creative Services, LLC
 * @link https://room34.com
 */

add_action( 'after_setup_theme', 'cf_hide_admin_bar_for_logged_in_non_editors', 10 );
function cf_hide_admin_bar_for_logged_in_non_editors() {

	if ( !wp_doing_ajax() && is_user_logged_in() && !current_user_can('edit_posts')) {
		add_filter('show_admin_bar', '__return_false');
	}

}


/** 
 * Limit admin elements for logged-in non-editors
 * 
 * From the No Nonsense plugin by Room 34 Creative Services, LLC
 * @link https://room34.com
 */

add_action( 'admin_menu' , 'cf_limit_admin_elements_for_logged_in_non_editors', 11);
function cf_limit_admin_elements_for_logged_in_non_editors() {

	if (!wp_doing_ajax() && is_admin() && is_user_logged_in() && !current_user_can('edit_posts')) {
		remove_menu_page('index.php');
		add_filter('admin_footer_text', '__return_false');
		add_filter('update_footer', '__return_false', 99);
	}

}