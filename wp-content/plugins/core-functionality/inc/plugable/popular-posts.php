<?php
/**
* Record Post Visits
*
* @package    CoreFunctionality
* @since      2.0.0
* @copyright  Copyright (c) 2019, Patrick Boehner
* @license    GPL-2.0+
*/

//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;



/**
 * Update post count when wp_head is loaded
 * 
 * @link https://digwp.com/2016/03/diy-popular-posts/
 * @link https://gist.github.com/Kevinlearynet/3852648
 */
add_action('wp_head', 'cf_track_post_view');
function cf_track_post_view( $post_id ) {

    // Exit early if not on single view or if user is logged in
	if ( !is_single( ) || is_user_logged_in() ) {
        return;
    }

	if ( empty( $post_id ) ) {

		global $post;
		$post_id = $post->ID;

	}

	cf_update_popular_post_count( $post_id );

}


// check post count to see if it needs updating
function cf_update_popular_post_count( $post_id ) {

	global $post;
	$count_key = '_cf_post_count';
	$view_count = get_post_meta( $post_id, $count_key, true );

	// Check and set a session if none is set
	if ( !session_id() ) {
		session_start();
	}

	// Only track a one view per post for a single visitor session to avoid duplications
	if( isset( $_SESSION[ "post-count-{$post->ID}" ] ) ) {
		return;
	}
	
	if ( $view_count == '' ) {

		$view_count = 0;

		delete_post_meta( $post_id, $count_key );
		add_post_meta( $post_id, $count_key, '0') ;

	} else {

		$view_count++;
		update_post_meta( $post_id, $count_key, $view_count );

		// Store session in "viewed" state
		$_SESSION[ "post-count-{$post->ID}" ] = 1;

	}

}