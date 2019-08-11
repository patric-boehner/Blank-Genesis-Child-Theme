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

	}

}
