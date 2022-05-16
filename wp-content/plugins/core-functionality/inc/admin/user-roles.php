<?php

/**
* User Roles
*
* @author      Patrick Boehner
* @link        http://www.patrickboehner.com
* @package     CoreFunctionality
* @copyright   Copyright (c) 2022, Patrick Boehner
* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
*/


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;;


//**********************

// Add the simple_role. 

/**
 * Alter the admin role capabilities
 * 
 * Removing sertin cpapabilities and limitign them to the
 * developer role.
 * 
 * * https://speckyboy.com/creating-a-custom-user-role-in-wordpress/
 */

function cf_admin_user_role() {

    // Get the admin user role
    $role = get_role(  'administrator' );

    // Add capabilities
    $role->add_cap( 'publish_content_areas' );
    $role->add_cap( 'read_private_content_areas' );
    $role->add_cap( 'edit_content_areas' );
    $role->add_cap( 'edit_content_area' );
    $role->add_cap( 'edit_others_content_area' );
    $role->add_cap( 'edit_others_content_areas' );

	// Remove capabilities
	// $role->remove_cap( 'install_plugins' );

}



/** 
 * Alter the editor user to resitrct custom post types
 * 
 * Add acess to Content Areas post type
*/

function cf_editor_user_role() {

    // Get the admin user role
    $role = get_role(  'editor' );

    // Add capabilities
    $role->add_cap( 'publish_content_areas' );
    $role->add_cap( 'read_private_content_areas' );
    $role->add_cap( 'edit_content_areas' );
    $role->add_cap( 'edit_content_area' );
    $role->add_cap( 'edit_others_content_area' );
    $role->add_cap( 'edit_others_content_areas' );
}



/** 
 * Alter the editor user to resitrct custom post types
 * 
 * remove acess to Content Areas post type
*/

function cf_author_user_role() {

    // Get the admin user role
    $role = get_role(  'author' );

    // Remove capabilities
    $role->remove_cap( 'edit_content_areas' );
    $role->remove_cap( 'edit_content_area' );
    $role->remove_cap( 'edit_others_content_area' );
    $role->remove_cap( 'edit_others_content_areas' );
}



/** 
 * Alter the contributor user to resitrct custom post types
 * 
 * Remove acess to Content Areas post type
*/

function cf_contributor_user_role() {

    // Get the admin user role
    $role = get_role(  'contributor' );

    // Remove capabilities
    $role->remove_cap( 'edit_content_areas' );
    $role->remove_cap( 'edit_content_area' );
    $role->remove_cap( 'edit_others_content_area' );
    $role->remove_cap( 'edit_others_content_areas' );

}


/** 
 * Add Developer User Role
 * 
 * Clone of Administrator
 * 
 * Use this user role to hide or control acess to certin admin items and controls
 * instead of doing it programaticaly, that forces other developer to have to figure 
 * out how you removed the items rather then just switching user roles.
 * 
 * https://developer.wordpress.org/reference/functions/add_role/
 * https://wordpress.org/support/article/roles-and-capabilities/#capability-vs-role-table
 * 
*/

function cf_developer_user_role() {

    add_role(
        'developer', // System name for the role
        __( 'Developer', 'core-functionality' ), // Display name for the role

        get_role( 'administrator' )->capabilities

    );

    // Get the developer user role
    $role = get_role(  'developer' );


    // Add capabilities
    $role->add_cap( 'publish_content_areas' );
    $role->add_cap( 'read_private_content_areas' );
    $role->add_cap( 'edit_content_areas' );
    $role->add_cap( 'edit_content_area' );
    $role->add_cap( 'edit_others_content_area' );
    $role->add_cap( 'edit_others_content_areas' );
    $role->add_cap( 'install_plugins' );

}

