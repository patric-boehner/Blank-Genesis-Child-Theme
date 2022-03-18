<?php

/**
 * CPT Editor Placeholder Text
 *
 * @author      Patrick Boehner
 * @link        http://www.patrickboehner.com
 * @package     Core Functionality
 * @copyright   Copyright (c) 2016, Patrick Boehner
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 *
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;;


//* Change Post Editor Placeholder Text
//**********************

add_filter( 'enter_title_here', 'cf_change_placeholder_title_text' );
function cf_change_placeholder_title_text( $title ){

	$screen = get_current_screen();

	if( isset( $screen->post_type ) ) {

		if  ( 'content_area' == $screen->post_type ) {
			$title = esc_html__( 'Add content area name', 'core-functionality' );
		}

	}

	return $title;

}
