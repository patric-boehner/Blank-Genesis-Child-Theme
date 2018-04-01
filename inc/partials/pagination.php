<?php

/**
 * Modify Archive Pagination
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
$prev_link = get_previous_posts_link( apply_filters( 'genesis_prev_link_text', '' . __( 'Previous Page', 'blank_child_theme' ) ) );
$next_link = get_next_posts_link( apply_filters( 'genesis_next_link_text', __( 'Next Page', 'blank_child_theme' ) . '' ) );

// Screen Reader Text
$screen_reader = '<h2 id="pagination-nav" class="screen-reader-text">' . __( 'Pagination Menu', 'blank_child_theme' ) .  '</h2>';

// Output
if ( $prev_link || $next_link ) {

	$pagination = $prev_link ? sprintf( '<div class="pagination-previous first one-half">%s</div>', $prev_link ) : '';
	$pagination .= $next_link ? sprintf( '<div class="pagination-next one-half">%s</div>', $next_link ) : '';

	genesis_markup( array(
		'open'	 => '<nav %s>',
		'close'	 => '</nav><!-- End of Pagination -->',
		'content' => $screen_reader . $pagination,
		'context' => 'archive-pagination',
	) );

}
