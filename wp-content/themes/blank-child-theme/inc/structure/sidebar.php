<?php

/**
 * Structure Sidebar
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;



// Remove Sidebars
// https://studiopress.github.io/genesis/developer-features/genesis-layouts/
remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_get_sidebar_alt' );