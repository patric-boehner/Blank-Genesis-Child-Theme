<?php

/**
 * Set The Default Genesis Theme Options
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


/**
 * Override theme settings and remove theme settings metaboxes with this helper class
 *
 * Requires WordPress v2.6.0 and PHP v5.3.0
 *
 * @version 2.0.0
 * @author  Joshua David Nelson, josh@joshuadnelson.com
 * @license GPLv2.0+
 * @link    https://gist.github.com/joshuadavidnelson/1aefa78ef7eba90f4de0
 *
 * Copyirght 2015, Joshua David Nelson
 */

class PB_Override_Genesis_Settings {

	// The array of options to set
	private $options = array();

	// The array of metaboxes to remove
	private $metaboxes = array();

	// The current option to be set
	private $current_option = '';

	// The current metabox to be removed
	private $current_metabox = '';

	// Set Genesis Theme Options with array
	public function set_options( $these_options ) {

		if( !is_array( $these_options ) )
			return;

		$this->options = $these_options;

		foreach( $this->options as $option => $value ) {
			$this->current_option = $option;
			add_filter( "genesis_pre_get_option_{$option}", array( $this, $option ), 10, 1 );

		}
	}

	//Override Theme Option with new value using the magic call method
	public function __call( $func, $params ) {

		if( in_array( $func, $this->options ) ) {
			return $this->get_value( $func );
		} else {
			return $params;
		}

	}

	// Get the option's new value
	private function get_value( $option ) {

		if( array_key_exists( $option, $this->options ) ) {
			return $this->options[ $option ];
		} else {
			return null;
		}

	}

	// Remove a group of metaboxes
	public function remove_metaboxes( $metaboxes ) {

		if( !is_array( $metaboxes ) )
			return;

		// Set metaboxes
		$this->metaboxes = $metaboxes;

		// Add action
		add_action( 'genesis_theme_settings_metaboxes', array( $this, 'remove_genesis_metaboxes' ) );

	}

	// Remove genesis theme settings metaboxes
	public function remove_genesis_metaboxes( $_genesis_theme_settings_pagehook ) {

		foreach( $this->metaboxes as $metabox ) {
			remove_meta_box( "genesis-theme-settings-{$metabox}",     $_genesis_theme_settings_pagehook, 'main' );
		}

	}
}


/**
 * Using the Genesis Settings Helper Class
 *
 * @version 1.0.0
 * @author Joshua David Nelson, josh@joshuadnelson.com
 * @license GPLv2.0+
 */

add_action( 'init', 'pb_set_theme_options' );
function pb_set_theme_options() {

	if( class_exists( 'PB_Override_Genesis_Settings' ) ) {

		$override = new PB_Override_Genesis_Settings;

		// Override Theme Settings - these are all the defaults
		$options = array(
		'update'                    => 1,
		'blog_title'                => 'text', // or 'image'
		'header_right'              => 0,
		'site_layout'               => genesis_get_default_layout(),
		'superfish'                 => 0,
		'nav_extras'                => '',
		'nav_extras_twitter_id'     => '',
		'nav_extras_twitter_text'   => '',
		'feed_uri'                  => '',
		'comments_feed_uri'         => '',
		'redirect_feeds'            => 0,
		'comments_pages'            => 0,
		'comments_posts'            => 1,
		'trackbacks_pages'          => 0,
		'trackbacks_posts'          => 0,
		'breadcrumb_home'           => 0,
		'breadcrumb_front_page'     => 0,
		'breadcrumb_posts_page'     => 0,
		'breadcrumb_single'         => 1,
		'breadcrumb_page'           => 0,
		'breadcrumb_archive'        => 1,
		'breadcrumb_404'            => 0,
		'breadcrumb_attachment'     => 0,
		'content_archive'           => 'excerpts', // excerpts, full
		'content_archive_limit'		  => 0,
		'content_archive_thumbnail' => 1,
		'posts_nav'                 => 'older-newer', // older-newer, numeric
		'blog_cat'                  => '',
		'blog_cat_exclude'          => '',
		'blog_cat_num'              => '',
		'header_scripts'            => '',
		'footer_scripts'            => '',
		'image_size'		   	    		=> 'featured-image', // or any other registered image size
		'image_alignment'				 		=> 'alignnone', // blank, 'alignleft' or 'alignright'
		);
		$override->set_options( $options );

		//Remove Theme Settings Metaboxes
		$metaboxes = array( 'breadcrumb', 'feeds', 'header', 'nav', 'adsense', 'breadcrumb', 'comments', 'posts', 'blogpage', 'scripts', 'layout' );
		$override->remove_metaboxes( $metaboxes );

	}

}


// Update default image sizes on theme switch
add_action( 'switch_theme', 'pb_child_theme_enforce_image_size_options' );
function pb_child_theme_enforce_image_size_options() {

	update_option( 'thumbnail_size_w', 150 );
	update_option( 'thumbnail_size_h', 150 );
	update_option( 'thumbnail_crop', 1 );
	update_option( 'medium_size_w', 300 );
	update_option( 'medium_size_h', 300 );
	update_option( 'large_size_w', 1024 );
	update_option( 'large_size_h', 1024 );

}
