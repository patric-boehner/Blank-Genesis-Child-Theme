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

// Hide ACF on live sites
add_filter( 'acf/settings/show_admin', 'cf_acf_in_staging' );
function cf_acf_in_staging() {

  // Escape if we are in local, dev or staging
  if ( cf_is_local_dev_site() || cf_is_staging_site() || cf_is_development_staging_site() ) {
    return true;
  }

  return false;

}


// Hide Admin Columns Plugin on live site
add_action( 'admin_menu', 'cf_remove_plugin_menus', 999 );
function cf_remove_plugin_menus(){

  // Escape if we are in local, dev or staging
  if ( cf_is_local_dev_site() || cf_is_staging_site() || cf_is_development_staging_site() ) {
    return;
  }

  remove_submenu_page( 'options-general.php', 'codepress-admin-columns' );

}
