<?php

/**
 * Post Author Profile
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


// Customize author box
add_action( 'genesis_author_box', 'pb_modify_author_profile', 10, 6 );
function pb_modify_author_profile() {

	// Variables
	$id = get_the_author_meta( 'ID' );
	$link = esc_url( get_author_posts_url( $id ) );
	$avatar = get_avatar( $id ); // $size is the second peramater, ex: 100
	$name = esc_html( get_the_author_meta( 'display_name' ) );
	$prepend = esc_attr__( 'About:' , 'blank-child-theme' );
	$description = wp_kses_post( ( get_the_author_meta( 'description' ) ) );

	// Exit early if no bio
	if( empty( $description ) && get_the_author_meta( 'genesis_author_box_single', $id ) ) {
		return;
	}
	
	// Author heading strucutre
	if( get_the_author_meta( 'genesis_author_box_archive', $id ) ) {
		$heading = sprintf(
			'<a href="%s"><h3 class="author-profile__title">%s %s</h3></a>',
			$link,
			$prepend,
			$name
		);
	} else {
		$heading = sprintf(
			'<h3 class="author-profile__title">%s %s</h3>',
			$prepend,
			$name
		);
	}

	// Include authoe profile
	include CHILD_DIR . '/inc/views/author-profile.php';

}

