<?php

/**
 * Local User Profile Iage
 *
 * Add an option to upload an image to the user profile
 * to replace gravatar.
 *
 * @package    CoreFunctionality
 * @since      2.0.0
 * @copyright  Copyright (c) 2022, Patrick Boehner
 * @license    GPL-2.0+ 
 *
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Load settings
require_once( CORE_DIR . 'inc/pluggable/user-profile-image/user-profile-image-settings.php' );


/**
 * Use ACF image field as avatar
 * @author Mike Hemberger
 * @link http://thestizmedia.com/acf-pro-simple-local-avatars/
 * @uses ACF Pro image field (tested return value set as Array )
 */
add_filter( 'get_avatar', 'cf_acf_profile_image', 10, 5 );
function cf_acf_profile_image( $avatar, $id_or_email, $size, $default, $alt ) {

    $user = '';
    
    // Get user by id or email
    if ( is_numeric( $id_or_email ) ) {

        $id   = (int) $id_or_email;
        $user = get_user_by( 'id' , $id );

    } elseif ( is_object( $id_or_email ) ) {

        if ( ! empty( $id_or_email->user_id ) ) {
            $id   = (int) $id_or_email->user_id;
            $user = get_user_by( 'id' , $id );
        }

    } else {

        $user = get_user_by( 'email', $id_or_email );

    }

    if ( ! $user ) {

        return $avatar;

    }

    // Get the user id
    $user_id = $user->ID;

    // Get the file id
    $image_id = get_user_meta( $user_id, 'cf_user_image', true);

    // Bail if we don't have a local avatar
    if ( ! $image_id ) {
        return $avatar;
    }

    // Return the original Avatar if none is set
    $image_url  = wp_get_attachment_image_src( $image_id, 'thumbnail' );
    // Get Image Size URL
    $avatar_url = $image_url[0];
    // Build image markup
    $avatar = '<img alt="' . $alt . '" src="' . $avatar_url . '" class="avatar avatar-' . $size . '" height="' . $size . '" width="' . $size . '"/>';

    // Return our new avatar
    return $avatar;

}



// Use ACF field to replace the avatar image URL
add_filter( 'get_avatar_url', 'cf_profile_avatar_url', 10, 3 );
function cf_profile_avatar_url( $url, $id_or_email, $args ){

    $user = '';

    // Get user by id or email
    if ( is_numeric( $id_or_email ) ) {

        $id   = (int) $id_or_email;
        $user = get_user_by( 'id' , $id );

    } elseif ( is_object( $id_or_email ) ) {

        if ( ! empty( $id_or_email->user_id ) ) {

            $id   = (int) $id_or_email->user_id;
            $user = get_user_by( 'id' , $id );

        }

    } else {

        $user = get_user_by( 'email', $id_or_email );

    }

    if ( ! $user ) {

        return $url;

    }

    // Get the user id
    $user_id = $user->ID;

    // Get the file id
    $image_id = get_user_meta( $user_id, 'cf_user_image', true );

    // Return the original Avatar if none is set
    if ( ! $image_id ) {
        return $url;
    }

    // Get Image Size URL
    $image_url  = wp_get_attachment_image_src( $image_id, 'thumbnail' );
    $avatar_url = $image_url[0];

    // Return new avatar URL
    return $avatar_url;

}