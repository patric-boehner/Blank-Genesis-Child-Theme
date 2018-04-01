<?php

/**
 * Customize the Genesis Sitemap Output function
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Sitemap Output
add_filter( 'genesis_sitemap_output', 'pb_customize_sitemap_output' );
function pb_customize_sitemap_output() {

	$heading = ( genesis_a11y( 'headings' ) ? 'h2' : 'h4' );

	// Pages
	$sitemap  =  sprintf( '<%2$s>%1$s</%2$s>', __( 'Pages:', 'blank_child_theme' ), $heading );
	$sitemap .=  sprintf( '<ul>%s</ul>', wp_list_pages( 'title_li=&echo=0' ) );

	// Post Type
	// $sitemap .=  sprintf( '<%2$s>%1$s</%2$s>', __( 'Post Type:', 'blank_child_theme' ) , $heading );
	// $sitemap .=  sprintf( '<ul>%s</ul>', wp_get_archives( 'type=postbypost&limit=10&echo=0&post_type=pb_cpt_services' ) );

	// Categories
	$sitemap .= sprintf( '<%2$s>%1$s</%2$s>', __( 'Categories:', 'blank_child_theme' ), $heading );
	$sitemap .= sprintf( '<ul>%s</ul>', wp_list_categories( 'sort_column=name&title_li=&echo=0' ) );

	// Blog Posts
	$sitemap .=  sprintf( '<%2$s>%1$s</%2$s>', __( 'Blog Posts:', 'blank_child_theme' ) , $heading );
	$sitemap .=  sprintf( '<ul>%s</ul>', wp_get_archives( 'type=postbypost&limit=100&echo=0' ) );

	return $sitemap;

}
