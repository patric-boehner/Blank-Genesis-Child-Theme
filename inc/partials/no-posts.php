<?php

/**
 * Update the genesis_loop_else structure
 * used when no posts are found.
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Output no post content and structure
echo '<div class="entry"><div class="entry-content">';

	printf( '<p class="no-posts-message">%s</p>', apply_filters( 'genesis_noposts_text', __( 'Sorry, no content matched your criteria.', 'blank-child-theme' ) ) );

	// Add widget area if needed

echo '</div></div><!-- End of No Posts -->';
