<?php

/**
 * Social Sharing Options
 *
 * Can be styled as text or icons.
 * Assumes the theme has an image folder with an logo.png file
 * If you are using text with your links, remove the aria-label attribute.
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


// Bring in the options
require_once( CORE_DIR . 'inc/pluggable/social-share/social-share-options.php' );


/**
 * Function for outputing the formated social share links
 * 
 * Place on any hook you like within a loop.
 */
function cf_add_social_share_options() {

	// If this is the admin page, do nothing.
	if ( is_admin() ) {
		return;
	}

	// If share options is disabled do nothing.
	if( cf_display_sharing_feature() == false ){
		return;
	}

	// Setup Variables
	$url				= urlencode( get_permalink() );
	$title				= urlencode( esc_attr( strip_tags( get_the_title() ) ) );
	$name				= urlencode( get_bloginfo( 'name' ) );
	$sharing_options 	= get_option( 'options_sharing_options' );


	// 
	/**
	 * Formated Sharing URLS
	 * 
	 * The $share_url array is used to pull in the related value in
	 * the foreach loop
	 * 
	 * Returns an array of urls
	 */
	$share_urls = array(
		'facebook' => sprintf(
			'https://www.facebook.com/sharer/sharer.php?u=%s&t=%s',
			$url,
			$title
		),
		'twitter'  => sprintf(
			'https://www.twitter.com/intent/tweet?url=%s&text=%s+%s',
			$url,
			$title,
			cf_retrieve_sharing_twitter_handle()
		),
		'pinterest' => sprintf(
			'https://pinterest.com/pin/create/button/?url=%s&media=%s&nbsp;&description=%s',
			$url,
			cf_retrieve_sharing_featured_image(),
			$title
		),
		'linkedin' => sprintf(
			'https://www.linkedin.com/shareArticle?min=true&url=%s&title=%s&source=%s',
			$url,
			$title,
			$name
		),
		'email' => sprintf(
			'mailto:?subject=%s&body=%s',
			cf_social_share_email_subject(),
			cf_social_share_email_content()
		)
	);


	// Empty Variable
	$share_links = '';

	/**
	 * Output Link Strucutre
	 * 
	 * Foreach through an array of social share options stored
	 * in options meta to construct the final list element link structure.
	*/
	foreach( $sharing_options as $option ) {

		if( !empty( $option ) ) {
			
			// Variables
			$class = esc_attr( $option ); // lowercase service name for class and id
			$name = esc_html( ucfirst( $option ) ); // Uppercas service name
			
			// Get the url from the $share_urls variable
			$share_link = $share_urls[ esc_attr( $option ) ];

			// Get the icon
			$icon = cf_sharing_button_icon( $class ); 
			
			// Get the text that acompanies the link
			$link_text = cf_sharing_button_text( $name );
			
			// Put the list element together
			$share_item = sprintf(
				'<li class="share-links__item">%s</li>',
				cf_sharing_button_link( $share_link, $class, $icon, $link_text )
			);

			// Put together all the list elements into one variable
			$share_links .= $share_item;

		}

	}

	// Final Output
	$output = sprintf(
		'<div class="share-links">%s<ul class="share-links__list">%s</ul></div>',
		cf_sharing_heading(),
		$share_links
	);

	echo $output;

}


/**
 * Check if social share is set to display
 * 
 * Return true if the option is on and false otherwise
 */
function cf_display_sharing_feature() {

	if ( !empty( get_option( 'options_show_social_sharing' ) == 0  ) ) {
		return false;
	}

	return true;

}


/**
 * Construct the social sahre section heading
 * 
 * Return the html for an H3 heading
 */
function cf_sharing_heading() {
	
	// Variables
	$heading 			= esc_html__( get_option( 'options_sharing_heading' ) );
	$default_heading 	= esc_html__( 'Share this Post', 'blank-child-theme' );

	if ( !empty( $heading ) ) {
		$text = $heading;
	} else {
		$text = $default_heading;
	}

	$social_share_heading = sprintf(
		'<h2 class="share-links__heading">%s</h2>',
		$text
	);

	return $social_share_heading;

}


/**
 * Construct the link text
 * 
 * Requires the permater for the sharing service name
 * 
 * Returns a formated string of html link text
 */
function cf_sharing_button_text( $service_name ) {

	// Get the style option
	$option = get_option( 'options_sharing_button_style' );

	// Setup screen reader text strings
	$screen_reader_share_text = esc_html__( 'Share on', 'blank-child-theme' );
	$screen_reader_print_text = esc_html__( 'this page', 'blank-child-theme' );
	$screen_reader_warning_text = esc_html__( 'Opens in new window', 'blank-child-theme' );

	// Default
	$text = 'icon-text';

	if ( $option == 'icon-text' ) {
		$text = $screen_reader_share_text;
	}

	if ( $option == 'icon' ) {
		$text = $screen_reader_share_text . ' ' . $service_name;
	}

	// Format the link text based on style
	if (  $option == 'icon'  ) {

		$formated_text = sprintf(
			'<span class="screen-reader-text">%s (%s)</span>',
			$text,
			$screen_reader_warning_text
		);
	

	} else {

		$formated_text = sprintf(
			'<span class="screen-reader-text">%s&#32;</span>%s <span class="screen-reader-text">(%s)</span>',
			$text,
			$service_name,
			$screen_reader_warning_text
		);

	}

	// The visable text of the share link
	$link_text = sprintf(
		'<span class="share-links__name">%s</span>',
		$formated_text
	);

	return $link_text;

}


/**
 * Construct the link element
 * 
 * Requires peramaters for the unqiue share url, the service and style class,
 * and the name of the service
 * 
 * Return a formated link
 */
function cf_sharing_button_link( $share_url, $service_class, $icon, $text ) {

	$style = esc_attr( get_option( 'options_sharing_button_style' ) );
	$style_class = 'style-' . $style;

	$link = sprintf(
		'<a href="%s" class="share-links__link %s %s" target="_blank" rel="noopener noreferrer nofollow">%s %s</a>',
		$share_url,
		$service_class,
		$style_class,
		$icon,
		$text
	);

	return $link;

}


/**
 * Display the icon based on the button style options
 * 
 * Requires a paramter for the name of the social service
 * in order to find the icon file.
 * 
 * Returns an inlien svg file or nothing
 */
function cf_sharing_button_icon( $share_name ) {

	// Default to empty SVG
	$svg = '';

	// Check if the SVG function is present
	if ( function_exists( 'pb_load_inline_svg' ) ) {

		// If button style is set to anything over then text, return the icon
		if ( get_option( 'options_sharing_button_style' ) !== 'text'  ) {
			$svg = pb_load_inline_svg( array(
				'directory' => 'social',
				'filename' => $share_name,
			) );
		}
	}

	return $svg;

}


/**
 * Retireve the first image of a post otherwise returns logo
 * 
 * Return the post's featured image, otherwise default to the theme logo
 */
function cf_retrieve_sharing_featured_image() {

	// Default image as logo
	$first_img = esc_url( get_stylesheet_directory_uri() . '/assets/images/logo.png' );

	if ( !empty( genesis_get_image() ) ) {

		$first_img = genesis_get_image( array(
			'format' => 'url',
			'size'	=> 'large'
		) );

	}

	return $first_img;

}


/**
 * Format the twitter handle for social share link
 * 
 * Retunrs a url encoded string that includes the company twitter handle
 * as set in the settings page, otherwise will output the authors twitter handle if set.
 */
function cf_retrieve_sharing_twitter_handle() {

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


/**
 * Format the email subject file for social share link
 * 
 * Retunrs a url encoded string of text that includes the email subject text
 * from the settings page, otherwise retunrs just the post name.
 */
function cf_social_share_email_subject() {

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


/**
 * Format the email body content for social share link
 * 
 * Returns a url encoded string of text that includes the body copy
 * from the settings page, else returns just the post url.
 */
function cf_social_share_email_content() {

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


