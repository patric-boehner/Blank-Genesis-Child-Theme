<?php

/**
 * Post Pagination Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Links
$previous_post_link = get_previous_post_link( '%link' );
$next_post_link = get_next_post_link( '%link' );

// Nav Titles
$previous_post_text = '<span class="nav-title">' .__( 'Previous Post:', 'blank_child_theme' ). '</span>';
$next_post_text = '<span class="nav-title">' .__( 'Next Post:', 'blank_child_theme' ). '</span>';

// Link Structure
if ( $next_post_link ) {
	$next_post_link = '<div class="post-pagination pagination-previous first one-half">' . $next_post_text . ' ' . $next_post_link . '</div>';
}

if ( $previous_post_link ) {
	$previous_post_link = '<div class="post-pagination pagination-next one-half">' . $previous_post_text . ' ' . $previous_post_link . '</div>';
}

// Screen Reader Text
$screen_reader = '<h2 id="pagination-nav" class="screen-reader-text">' . __( 'Pagination Menu', 'blank_child_theme' ) .  '</h2>';

// Output if either post is available
if ( $next_post_link || $previous_post_link ) {

	genesis_markup( array(
		'open'	 => '<nav %s>',
		'close'	 => '</nav><!-- End of Post Pagination -->',
		'content' => $screen_reader . $next_post_link . $previous_post_link,
		'context' => 'adjacent-entry-pagination',
	) );

}
