<?php

/**
 * Dont Update the Plugin
 * If there is a plugin in the repo with the same name, this prevents WP from prompting an update.
 *
 * @since  1.0.0
 * @author Jon Brown
 * @param  array $r Existing request arguments
 * @param  string $url Request URL
 * @return array Amended request arguments
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


//* Don't Update Filter
//**********************

add_filter( 'http_request_args', 'cf_dont_update_core_func_plugin', 5, 2 );
function cf_dont_update_core_func_plugin( $r, $url ) {

	if ( 0 !== strpos( $url, 'https://api.wordpress.org/plugins/update-check/1.1/' ) ) {
		return $r; // Not a plugin update request. Bail immediately.
		$plugins = json_decode( $r['body']['plugins'], true );
		unset( $plugins['plugins'][plugin_basename( __FILE__ )] );
		$r['body']['plugins'] = json_encode( $plugins );
	}

		return $r;

}