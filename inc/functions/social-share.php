<?php

/**
 * Add simple social share links
 *
 * Can be styled as text or icons.
 * Assumes the theme has an image folder with an logo.png file
 * If you are using text with your links, remove the aria-label attribute.
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 *
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


//* Social Share Icons
//**********************

// Main function for adding social share options
function pb_add_social_share_options() {

	// If this is the admin page, do nothing.
	if ( is_admin() ) {
		return;
	}

	// If share options is disabled in Customizer, do nothing.
	if ( empty( get_theme_mod( 'social_share_option', '1' ) ) ) {
		return;
	}

	// Setup Variables
	$url        			= urlencode( get_permalink() );
	$url_short  			= urlencode( wp_get_shortlink() );
	$title						= esc_attr( strip_tags( get_the_title() ) );
	$name       			= urlencode( get_bloginfo( 'name' ) );
	$site_twitter     = esc_html( get_theme_mod( 'social_share_twitter_account' ) );
	$author_twitter   = esc_html( get_the_author_meta( 'twitter' ) );
	$email_subject		= esc_html( get_theme_mod( 'social_share_email_subject' ) );
	$email_body				= esc_html( get_theme_mod( 'social_share_email_body' ) );

	// If the post hasp no images, returen the default image (site logo)
	if ( !empty( genesis_get_image() ) ) {
		$first_img = genesis_get_image( array(
			'format' => 'url',
			'size'	=> 'large'
		) );
	} else {
		$first_img = esc_url( get_stylesheet_directory_uri() . '/assets/images/logo.png' );
	}

	// Add Twitter handle if it exists
	if ( !empty( $site_twitter ) ) {
	  $twitter_user	 = '@' . urlencode( $site_twitter );
	} elseif ( !empty( $author_twitter ) ) {
		$twitter_user = '@' . urlencode( $author_twitter );
	} else {
		$twitter_user	 = '';
	}

	// Email output
	if ( get_theme_mod( 'social_share_email_subject' ) ) {
		$subject = urlencode( $email_subject ) . '&nbsp;' .  $name;
	} else {
		$subject = $name;
	}

	if ( get_theme_mod( 'social_share_email_body' ) ) {
		$body = urlencode( $email_body ) . '&nbsp;' .  $url;
	} else {
		$body = $url;
	}

	// Icons & Screen Reader

	$facebook = pb_svg_icons_available( 'Share on Facebook', 'facebook', '', '32px', '32px' );
	$twitter = pb_svg_icons_available( 'Share on Twitter', 'twitter', '', '32px', '32px' );
	$linkedin	= pb_svg_icons_available( 'Share on LinkedIn', 'linkedin', '', '32px', '32px' );
	$pinterest = pb_svg_icons_available( 'Share on Pinterest', 'pinterest', '', '32px', '32px' );
	$mail	= pb_svg_icons_available( 'Share via Email', 'envelope', '', '32px', '32px' );


	// Output social share links
	include CHILD_DIR . '/inc/views/social-share-links.php';

}
