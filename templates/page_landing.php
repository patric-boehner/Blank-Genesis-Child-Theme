<?php
/**
 * This file adds the Landing template to the [Blank Genesis Child Theme].
 *
 * @author Patrick Boehner
 * @package [Blank Genesis Child Theme]
 *
 */

 /*
 Template Name: Landing
 */

 //* Add custom body class to the head
 add_filter( 'body_class', 'workstation_add_body_class' );
 function workstation_add_body_class( $classes ) {

    $classes[] = 'landing-page';

    return $classes;

 }

 //* Remove skip link for primary navigation
 remove_filter( 'genesis_skip_links_output', 'workstation_skip_links_output' );

 //* Force full width content layout
 add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

 //* Remove site header elements
 remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
 remove_action( 'genesis_header', 'genesis_do_header' );
 remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

 //* Remove Menus
 remove_theme_support( 'genesis-menus' );

 //* Remove breadcrumbs
 remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

 //* Remove site footer widgets
 remove_action( 'genesis_before_footer', 'workstation_footer_widgets' );

 //* Remove site footer elements
 remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
 remove_action( 'genesis_footer', 'genesis_do_footer' );
 remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

 //* Run the Genesis loop
 genesis();
