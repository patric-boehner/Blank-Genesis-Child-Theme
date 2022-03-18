<?php

/**
 * Remove old custom meta fields
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
 * Remove ancient Custom Fields Metabox because it's slow and most often useless anymore
 * ref: https://core.trac.wordpress.org/ticket/33885
 */
add_action( 'admin_menu' , 'cf_remove_post_custom_fields_now' );
function cf_remove_post_custom_fields_now() {

	foreach ( get_post_types( '', 'names' ) as $post_type ) {
		remove_meta_box( 'postcustom' , $post_type , 'normal' );
	}
	
}
