<?php

/**
 * Banner Strucutre
 *
 * @package    CoreFunctionality
 * @since      2.0.0
 * @copyright  Copyright (c) 2022, Patrick Boehner
 * @license    GPL-2.0+
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Bring in the options
require_once( CORE_DIR . 'inc/pluggable/banner/banner-options.php' );


// Cleanup old cookies
add_action( 'init', 'cf_remove_banner_cookie' );


// Output banner
function cf_output_banner() {

    // Banner
    $display = esc_attr( get_option( 'options_enable_banner' ) );
    $cookie = esc_attr( get_option( 'options_banner_cookie' ) );

    $button = sprintf(
        '<button id="banner__close" class="button button__small" aria-expanded="true"><span>%s</span></button>',
        esc_html__( 'Close Banner', 'core-functionality' )
    ); 

    // Adjust display and remove cookie if not set to allow banner to close
    $class = ( $cookie == 'enable' ) ? 'dismissable__button' : '';

    // Enable the cookie
    if( $display == 'enable' ) {

        $close_button = ( $cookie == 'enable' ) ? $button : '';


        if ( function_exists( 'cf_show_content_area' ) && !isset( $_COOKIE[ cf_unique_banner_cookie_name() ] ) ) {

            cf_show_content_area( array(
                'location'      => 'banner',
                'class'         => $class,
                'prepend'       => '<div class="block__inner">',
                'append'        => $close_button . '</div>'
            ) );

        }

    }

}


// Setup unique cookie name
function cf_unique_banner_cookie_name() {

    // Variables
    $key = 'mdY'; // 'mdYgi' Month, Day, Year, Hour, Minute. May want to simpligy to remove time
    $id = get_option( 'options_banner_content' );
    $date_time = esc_attr( get_post_modified_time( $key, false, $id, false ) );

    $cookie_name = 'banner-hidden-' .  $date_time;
    
    return $cookie_name;

}


// Check if the banner is active
function cf_is_banner_active() {

    $id = get_option( 'options_banner_content' );
    $display = esc_attr( get_option( 'options_enable_banner' ) );

    return ( $display == 'enable' && !isset( $_COOKIE[ cf_unique_banner_cookie_name() ] ) ) ? true : false ;
		
}


// Check if the banner is set to use the cookie
function cf_is_dismissable_banner_active() {

    $id = get_option( 'options_banner_content' );
    $cookie = esc_attr( get_option( 'options_banner_cookie' ) );

    return ( $cookie == 'enable' && !isset( $_COOKIE[ cf_unique_banner_cookie_name() ] ) ) ? true : false ;
		
}



// Retrive Customize settings for banner cookie
function cf_get_banner_cookie_settings() {

    $id = get_option( 'options_banner_content' );
    $days = esc_attr( get_option( 'options_hide_banner' ) );
    $cookie_name = cf_unique_banner_cookie_name();

    $settings = array(
        'days'	=> $days,
        'name'  => $cookie_name,
    );

    return $settings;

}


// Remove the cookie is the banner is turned off but the cookie is present
function cf_remove_banner_cookie() {

    if( isset( $_COOKIE ) ) {

        // Loop through to get the name of each cookie
        foreach( $_COOKIE as $key => $val ) {
            
            $cookie_name_partial = str_contains( $key, 'banner-hidden-' );
            $cookie_name = cf_unique_banner_cookie_name();

             // Remove cookie if the partial is present and isn't our existing unique cookie
            if ( $cookie_name_partial == true && $key !== $cookie_name ) {

                /*
                 * Remember: unseting a cookie doesn't remove the cookie, just deleates the value
                 * You need to reset the cookie 
                 */
                unset( $_COOKIE[ $key ] );
                setcookie( $key, '', -1, '/' );

            }
        
        }

    }

}



/**
 * Adds top-banner body classes.
 *
 * @since 1.0.0
 *
 * @param array $classes Current classes.
 * @return array The new classes.
 */
add_action( 'body_class', 'cf_notice_bar_classes' );
function cf_notice_bar_classes( $classes ) {

	// Set banner hidden if banner is set to display at all
	if ( cf_is_banner_active() ) {
		$classes[] = 'top-banner-hidden';
	}

	// Set banner to visible if banner is set to display and cookies are set to false
	if (  cf_is_banner_active() == true && cf_is_dismissable_banner_active() == false ) {
		$classes[] = 'top-banner-visible';
	}

	return $classes;

}