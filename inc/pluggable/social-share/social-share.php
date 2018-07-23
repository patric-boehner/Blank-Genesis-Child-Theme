<?php

/**
 * Add simple social share links
 *
 * Can be styled as text or icons.
 * Assumes the theme has an image folder with an logo.png file
 * If you are using text with your links, remove the aria-label attribute.
 *
 * @package Integrative Trauma Recovery
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    https://integrative-trauma-recovery.com
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


//* Get Images
//**********************
/* https://css-tricks.com/snippets/wordpress/get-the-first-image-from-a-post/
 * https://designsbynickthegeek.com/tutorials/genesis-explained-image-functions
 */

// function pb_find_image_url() {
//
// 	// If a featured image is set first, use that, orerwsie fallback to first Images
// 	// The genesis_get_image() function does both functions for us.
// 	$first_img = genesis_get_image( array(
// 		'format' => 'url',
// 		'size'	=> 'large'
// 	) );
//
// 	// If the post has no images, returen the default image (site logo)
// 	if( empty( $first_img ) ) {
// 		$first_img = esc_url( get_stylesheet_directory_uri() . '/images/logo.png' );
// 	}
//
// 	// Return the image
// 	return $first_img;
//
// }


//* Social Share Icons
//**********************

// Main function for adding social share options
function pb_add_social_share_options() {

	// If this is the admin page, do nothing.
	if ( is_admin() ) {
		return;
	}

	// If lazy-load is disabled in Customizer, do nothing.
	if ( empty( get_theme_mod( 'social_share_option', '1' ) ) ) {
		return;
	}

	// Setup Variables
	$url        = urlencode( get_permalink() );
	$url_short  = urlencode( wp_get_shortlink() );
	$title      = urlencode( get_the_title() );
	$title	    = str_replace( '%26%238217%3B', '%27', $title );
	$name       = urlencode( get_bloginfo( 'name' ) );
	$site_twitter     = esc_html( get_theme_mod( 'social_share_twitter_account' ) );
	$author_twitter   = esc_html( get_the_author_meta( 'twitter' ) );

	// If the post has no images, returen the default image (site logo)
	if ( !empty( genesis_get_image() ) ) {
		$first_img = genesis_get_image( array(
			'format' => 'url',
			'size'	=> 'large'
		) );
	} else {
		$first_img = esc_url( get_stylesheet_directory_uri() . '/assets/images/logo.png' );
	}

	// Add Twitter handle if it exists
	if ( get_theme_mod( 'social_share_twitter_account' )  ) {
	  $twitter	 = '@' . urlencode( $site_twitter );
	} elseif (  get_the_author_meta( 'twitter' ) ) {
	  $twitter	 = '@' . urlencode( $author_twitter );
	} else {
	  $twitter	 = '';
	}

	// Output social share links
	include CHILD_DIR . '/inc/pluggable/social-share/views/social-share-links.php';

}
