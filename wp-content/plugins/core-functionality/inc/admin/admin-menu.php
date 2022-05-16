<?php

/**
 * Admin ACF Options
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


// Restrcit ACF admin menu to only the developer user role
add_filter('acf/settings/show_admin', 'cf_acf_show_admin');
function cf_acf_show_admin( $show ) {
    
    return current_user_can( 'developer' );
    
}


// Hide Admin Columns Plugin if the user role is not developer
add_action( 'admin_menu', 'cf_remove_plugin_menus', 999 );
function cf_remove_plugin_menus(){

  if ( !current_user_can( 'developer' ) ) {
    return;
  }

  remove_submenu_page( 'options-general.php', 'codepress-admin-columns' );

}
