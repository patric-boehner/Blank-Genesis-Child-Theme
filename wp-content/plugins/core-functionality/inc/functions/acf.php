<?php

/**
 * Customize ACF functions
 *
 * @author      Patrick Boehner
 * @link        http://www.patrickboehner.com
 * @package     Core Functionality
 * @copyright   Copyright (c) 2012, Patrick Boehner
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Post archive theme settings page
// if( function_exists('acf_add_options_page') ) {
 
// 	acf_add_options_sub_page(array(
// 		'page_title' 	=> 'Posts Archive Settings',
// 		'menu_title'	=> 'Archive Settings',
// 		'parent_slug'	=> 'edit.php',
// 	));
	
// }


// Block Catoegires
// add_filter( 'block_categories', 'cf_plugin_block_categories', 10, 2 );
// function  cf_plugin_block_categories( $categories, $post ) {
// //  if ( $post->post_type !== array( 'post', 'block_area', 'page', 'presenters' )  ) {
// //      return $categories;
// //  }
//     return array_merge(
//         $categories,
//         array(
//             array(
//                 'slug' => 'content',
//                 'title' => __( 'Content', 'core-functionality' ),
//             ),
//             array(
//             'slug' => 'donations',
//             'title' => __( 'Donations', 'core-functionality' ),
//         ),
//         )
//     );
    
// }