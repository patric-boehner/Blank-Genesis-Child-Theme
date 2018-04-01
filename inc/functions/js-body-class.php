<?php

/**
 * Add JS Body Class
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


/**
 * Script sample comes from WP SiteCare's carelib
 * https://github.com/wpsitecare/carelib
 *
 * This reproduces what the Blank Child Theme Theme does in the
 * 'responsive-menu.js' but moves it to a small inline script that
 * is added after the opening <body> tag.
 */

add_action( 'genesis_before', 'pb_add_js_body_class' );
function pb_add_js_body_class() {

	echo '<script type="text/javascript">document.body.classList.add("js");</script>' . "\n";

}
