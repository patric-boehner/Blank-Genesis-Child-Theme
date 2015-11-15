<?php

//* Maintenance Mode
//**********************************************
//* Shut down the website for everybody without admin permissions. You as a admin will still have full access to both the blog and to the admin panel.


/**
* @package		[Blank Genesis Child Theme]
* @author		Patrick Boehner
* @copyright	Copyright (c) 2015, Patrick Boehner
* @license		GPL-2.0+
*/


//* Security
//**********************
if( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//* Put into maintenance mode except for logedin admins
add_action( 'get_header', 'pb_maintenace_mode' );
function pb_maintenace_mode() {
   if ( ( !is_user_logged_in() && !current_user_can( 'administrator' ) ) ) {
      wp_die( 'Down for maintenance, we will be back shortly.', 'Down for maintenance, we will be back shortly.', array('response' => '503') );
   }
}
