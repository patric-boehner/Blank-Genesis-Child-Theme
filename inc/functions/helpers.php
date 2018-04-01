<?php

/**
 * Helper functions
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
 * Helper function to check if we're on a WooCommerce page.
 *
 * @since  2.0.0
 *
 * @link   https://docs.woocommerce.com/document/conditional-tags/.
 *
 * @return bool
 */
function pb_is_woocommerce_page() {

	if ( ! class_exists( 'WooCommerce' ) ) {
		return false;
	}

	if ( is_woocommerce() || is_shop() || is_product_category() || is_product_tag() || is_product() || is_cart() || is_checkout() || is_account_page() ) {
		return true;
	} else {
		return false;
	}

}
