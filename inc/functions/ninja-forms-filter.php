<?php

/**
 * Ninja Forms Customization
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


//* Customize Frontend Output
//**********************************************

add_filter( 'ninja_forms_i18n_front_end', 'pb_custom_ninja_forms_i18n_front_end' );
function pb_custom_ninja_forms_i18n_front_end( $strings ) {

	$strings['fieldsMarkedRequired'] = '';
	return $strings;

}
