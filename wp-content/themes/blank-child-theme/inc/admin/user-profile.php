<?php

/**
 * Add User contact Methods
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Disable application passwords
add_filter( 'wp_is_application_passwords_available', '__return_false' );