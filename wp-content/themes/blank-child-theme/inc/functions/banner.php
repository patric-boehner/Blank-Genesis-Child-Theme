<?php

/**
 * Banner Strucutre
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Cleanup old cookies
add_action( 'init', 'pb_remove_banner_cookie' );


// Output banner
function pb_output_banner() {

    // Banner
    $id = pb_get_id_by_slug( 'banner', 'content_area' );
    $display = esc_attr( get_post_meta( $id, 'enable_banner', true ) );
    $cookie = esc_attr( get_post_meta( $id, 'banner_cookie', true ) );
    $button = sprintf(
        '<button id="banner__close" class="button button__small" aria-expanded="true"><span>%s</span></button>',
        esc_html__( 'Close Banner', 'blank-child-theme' )
    ); 
    // Adjust display and remove cookie if not set to allow banner to close
    $class = ( $cookie == 'enable' ) ? 'dismissable__button' : '';

    // Enable the cookie
    if( $display == 'enable' ) {

        $close_button = ( $cookie == 'enable' ) ? $button : '';

        pb_show_content_area( array(
            'location'      => 'banner',
            'class'         => $class,
            'prepend'       => '<div class="block__inner">',
            'append'        => $close_button . '</div>'
        ) );

    }

}


// Setup unique cookie name
function pb_unique_banner_cookie_name() {

    // Variables
    $key = 'mdY'; // 'mdYgi' Month, Day, Year, Hour, Minute. May want to simpligy to remove time
    $id = pb_get_id_by_slug( 'banner', 'content_area' );
    $date_time = esc_attr( get_post_modified_time( $key, false, $id, false ) );

    $cookie_name = 'banner-hidden-' .  $date_time;
    
    return $cookie_name;

}


// Check if the banner is active
function pb_is_banner_active() {

	$id = pb_get_id_by_slug( 'banner', 'content_area' );
    $display = esc_attr( get_post_meta( $id, 'enable_banner', true ) );

    return ( $display == 'enable' && !isset( $_COOKIE[ pb_unique_banner_cookie_name() ] ) ) ? true : false ;
		
}


// Check if the banner is set to use the cookie
function pb_is_dismissable_banner_active() {

	$id = pb_get_id_by_slug( 'banner', 'content_area' );
    $cookie = esc_attr( get_post_meta( $id, 'banner_cookie', true ) );

    return ( $cookie == 'enable' && !isset( $_COOKIE[ pb_unique_banner_cookie_name() ] ) ) ? true : false ;
		
}



// Retrive Customize settings for banner cookie
function pb_get_banner_cookie_settings() {

    $id = pb_get_id_by_slug( 'banner', 'content_area' );
    $days = esc_attr( get_post_meta( $id, 'hide_banner', true ) );
    $cookie_name = pb_unique_banner_cookie_name();

    $settings = array(
        'days'	=> $days,
        'name'  => $cookie_name,
    );

    return $settings;

}


// Remove the cookie is the banner is turned off but the cookie is present
function pb_remove_banner_cookie() {

    if( isset( $_COOKIE ) ) {

        // Loop through to get the name of each cookie
        foreach( $_COOKIE as $key => $val ) {
            
            $cookie_name_partial = str_contains( $key, 'banner-hidden-' );
            $cookie_name = pb_unique_banner_cookie_name();

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