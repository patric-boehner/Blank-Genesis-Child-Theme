<?php

/**
 * Social Sharing Options
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


// Main function for adding social share options
function pb_add_social_share_options() {

	// If this is the admin page, do nothing.
	if ( is_admin() ) {
		return;
	}

	// If share options is disabled do nothing.
	if( pb_display_sharing_feature() == false ){
		return;
	}

	// Setup Variables
	$heading = esc_html__( 'Share this Article', 'blank-child-theme' );
	$screen_reader_text = '<span class="screen-reader-text">('.esc_html__( 'Links open in new window', 'blank-child-theme' ).')</span>';

	$url				= urlencode( get_permalink() );
	$url_short			= urlencode( wp_get_shortlink() );
	$title				= urlencode( esc_attr( strip_tags( get_the_title() ) ) );
	$name				= urlencode( get_bloginfo( 'name' ) );
	$sharing_options 	= get_option( 'options_sharing_options' );


	// Formated Sharing Links
	$share_urls = array(
		'facebook' => sprintf(
			'http://www.facebook.com/sharer/sharer.php?u=%s&t=%s',
			$url,
			$title
		),
		'twitter'  => sprintf(
			'http://www.twitter.com/intent/tweet?url=%s&text=%s+%s',
			$url_short,
			$title,
			pb_retrieve_sharing_twitter_handle()
		),
		'pinterest' => sprintf(
			'http://pinterest.com/pin/create/button/?url=%s&media=%s&nbsp;&description=%s',
			$url_short,
			pb_retrieve_sharing_featured_image(),
			$title
		),
		'linkedin' => sprintf(
			'https://www.linkedin.com/shareArticle?min=true&url=%s&title=%s&source=%s',
			$url_short,
			$title,
			$name
		),
		'email' => sprintf(
			'mailto:?subject=%s&body=%s',
			pb_social_share_email_subject(),
			pb_social_share_email_content()
		),
	);


	// Empty Variable
	$share_links = '';

	// Output Link Strucutre
	foreach( $sharing_options as $option ) {

		if( !empty( $option ) ) {
			
			// Variables
			$class = esc_attr( $option );
			$service = '<span class="share-links__name">'.esc_html( ucfirst( $option ) ).'</span>';
			$share_link = $share_urls[ esc_attr( $option ) ];

			if ( function_exists( 'pb_load_inline_svg' ) ) {
				$svg = pb_load_inline_svg( array(
					'directory' => 'social',
					'filename' => $class,
				) );
			}
			
			// Strucutre
			$share_item = sprintf(
				'<li class="share-links__item"><a href="%s" class="share-links__link %s" target="_blank" rel="noopener noreferrer nofollow">%s%s</a></li>',
				$share_link,
				$class,
				$svg,
				$service
			);

			$share_links .= $share_item;

		}

	}

	// Final Output
	$output = sprintf(
		'<div class="share-links"><h3 class="share-links__heading">%s %s</h3><ul class="share-links__list">%s</ul></div>',
		$heading,
		$screen_reader_text,
		$share_links
	);

	echo $output;

}


// Check if social share is set to display
function pb_display_sharing_feature() {

	// Return false is 0, aka no
	if ( !empty( get_option( 'options_show_social_sharing' ) == 0  ) ) {
		return false;
	}

	return true;

}


// Retireve the first image of a post otherwise returns logo
function pb_retrieve_sharing_featured_image() {

	if ( !empty( genesis_get_image() ) ) {
		$first_img = genesis_get_image( array(
			'format' => 'url',
			'size'	=> 'large'
		) );
	} else {
		$first_img = esc_url( get_stylesheet_directory_uri() . '/assets/images/logo.png' );
	}

	return $first_img;

}


// Retireve and format custom twitter handle or return author twitter handle
function pb_retrieve_sharing_twitter_handle() {

	// Variables
	$custom_twitter_handle = esc_html( get_option( 'options_shring_twitter_handle' ) );
	$author_twitter = esc_html( get_the_author_meta( 'twitter' ) );

	if ( !empty( $custom_twitter_handle ) ) {
		$twitter_handle = '@' . urlencode( $custom_twitter_handle );
	} elseif ( !empty( $author_twitter ) ) {
		$twitter_handle = '@' . urlencode( $author_twitter );
	} else {
		$twitter_handle = '';
	}

	return $twitter_handle;

}


// Output email subject for social share
function pb_social_share_email_subject() {

	// Variables
	$post_name = urlencode( get_bloginfo( 'name' ) );
	$email_subject = esc_html( get_option( 'options_sharing_email_subject' ) );
	

	if ( !empty( $email_subject ) ) {
		$subject = urlencode( $email_subject ) . '&nbsp;' .  $post_name;
	} else {
		$subject = urlencode( $post_name );
	}

	return $subject;

}


// Output email content for social share
function pb_social_share_email_content() {

	// Variables
	$post_url = urlencode( get_permalink() );
	$email_body	= esc_html( get_option( 'options_sharing_email_body' ) );
	

	if ( !empty( $email_body ) ) {
		$body = urlencode( $email_body ) . '&nbsp;' .  $post_url;
	} else {
		$body = $post_url;
	}

	return $body;

}


