<?php

//* Theme Function
//**********************************************

/**
* @package		[Blank Genesis Child Theme]
* @author		Patrick Boehner
* @copyright	Copyright (c) 2016, Patrick Boehner
* @license		GPL-2.0+
*/

/**
* Remember to replace [Blank Genesis Child Theme] with the final
* child theme name through the child theme files.
*/

//**********************************************
//* Security Updates
//**********************************************

//* Block Direct Acess
if( !defined( 'ABSPATH' ) ) exit;


//**********************************************
//* Add Site Library Files & Scripts
//**********************************************
// http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
// https://codex.wordpress.org/Function_Reference/wp_enqueue_style

//* Add Child Theme styles and scripts
function pb_child_theme_script_enqueue() {

	//* Load Google Web Fonts
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );

	//* Load Primary Stylesheet
	wp_enqueue_style( 'primary-style.min', get_stylesheet_directory_uri() . '/primary-style.min.css', false, pb_version_id() );

	//* Icon Font
	wp_enqueue_style( 'dashicons' );

	//* Mobile Responsive Menu
	wp_enqueue_script( 'responsive-menu.min', get_stylesheet_directory_uri() . '/js/responsive-menu.min.js', array( 'jquery' ), pb_version_id(), true );
	$output = array(
		'mainMenu' => __( 'Menu', 'genesis-sample' ),
		'subMenu'  => __( 'Menu', 'genesis-sample' ),
	);
	wp_localize_script( 'responsive-menu.min', 'genesisChildL10n', $output );

	//* Scroll To Top Script
	wp_enqueue_script( 'scroll-to-top.min', get_stylesheet_directory_uri() . '/js/scroll-to-top.min.js', array( 'jquery' ), pb_version_id(), true );

	//* Fitvid Script
	wp_enqueue_script( 'fitvids.combined.min', get_stylesheet_directory_uri() . '/js/fitvids.combined.min.js', array( 'jquery' ), pb_version_id(), true );

	//* Test Script
	wp_enqueue_script( 'test.min', get_stylesheet_directory_uri() . '/js/test.min.js', array( 'jquery' ), pb_version_id(), true );

}

//* Load Login Style
function pb_login_styles() {
	wp_enqueue_style( 'login_styles.min', get_stylesheet_directory_uri() . '/css/login.min.css', false, pb_version_id() );
}


//**********************************************
//* Backend
//**********************************************

//* Stop WordPress from Guessing Urls
function pb_stop_guessing($url) {
 if (is_404()) {
   return false;
 }
 return $url;
}


//* Admin Screen
//**********************

//* Hide Admin Areas that are not used
// https://codex.wordpress.org/Function_Reference/remove_menu_page
function pb_remove_menu_pages() {
	// remove_menu_page( 'index.php' );                  //Dashboard
	// remove_menu_page( 'edit.php' );                   //Posts
	// remove_menu_page( 'upload.php' );                 //Media
	// remove_menu_page( 'edit.php?post_type=page' );    //Pages
	// remove_menu_page( 'edit-comments.php' );          //Comments
	// remove_menu_page( 'themes.php' );                 //Appearance
	// remove_menu_page( 'plugins.php' );                //Plugins
	// remove_menu_page( 'users.php' );                  //Users
	// remove_menu_page( 'tools.php' );                  //Tools
	// remove_menu_page( 'options-general.php' );        //Settings
}

//* Hide Admin Bar options not in user
function pb_remove_admin_bar_options() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}

//* Change Admin Menu Order
function pb_custom_menu_order( $menu_order ) {
	if ( !$menu_order ) return true;
	return array(
		'index.php', // Dashboard
		'separator1', // First separator
		'edit.php', // Posts
		'edit.php?post_type=page', // Pages
		// 'edit.php?post_type=.....' // Add Custom Post Type
		'upload.php', // Media
		// 'genesis', // Genesis
		// 'edit-comments.php', // Comments
		// 'separator2', // Second separator
		// 'themes.php', // Appearance
		// 'plugins.php', // Plugins
		// 'users.php', // Users
		// 'tools.php', // Tools
		// 'options-general.php', // Settings
		// 'separator-last', // Last separator
	);
}

//* Remove Dashboard Meta Boxes
function pb_remove_dashboard_widgets() {
	global $wp_meta_boxes;
	// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}


//* Genesis Theme Settings
//**********************

//* Remove Genesis Theme Settings Metaboxes
// Remove from the Theme Settings and SEO Settings pages.
function pb_remove_genesis_metaboxes( $_genesis_theme_settings_pagehook ) {
	// remove_meta_box( 'genesis-theme-settings-feeds',      $_genesis_theme_settings_pagehook, 'main' );
	// remove_meta_box( 'genesis-theme-settings-header',     $_genesis_theme_settings_pagehook, 'main' );
	// remove_meta_box( 'genesis-theme-settings-nav',        $_genesis_theme_settings_pagehook, 'main' );
	// remove_meta_box( 'genesis-theme-settings-breadcrumb', $_genesis_theme_settings_pagehook, 'main' );
	// remove_meta_box( 'genesis-theme-settings-comments',   $_genesis_theme_settings_pagehook, 'main' );
	// remove_meta_box( 'genesis-theme-settings-posts',      $_genesis_theme_settings_pagehook, 'main' );
	// remove_meta_box( 'genesis-theme-settings-blogpage',   $_genesis_theme_settings_pagehook, 'main' );
	// remove_meta_box( 'genesis-theme-settings-scripts',    $_genesis_theme_settings_pagehook, 'main' );
}


//* In Post Settings
//**********************

//* Remove Genesis Page Templates
// http://www.billerickson.net/remove-genesis-page-templates
// If we need the functionality these page templates provide we should build them into page templates named for there use.

function pb_remove_genesis_page_templates( $page_templates ) {
	unset( $page_templates['page_archive.php'] );
	unset( $page_templates['page_blog.php'] );
	return $page_templates;
}


//* Menus
//**********************

//* Reduce the secondary navigation menu to one level depth
function pb_secondary_menu_args( $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}


//* Widgets
//**********************

//* Remove Genesis Widgets
function pb_unregister_genesis_widgets() {
	// unregister_widget( 'Genesis_eNews_Updates' );
	// unregister_widget( 'Genesis_Featured_Page' );
	// unregister_widget( 'Genesis_Featured_Post' );
	// unregister_widget( 'Genesis_Latest_Tweets_Widget' );
	// unregister_widget( 'Genesis_Menu_Pages_Widget' );
	// unregister_widget( 'Genesis_User_Profile_Widget' );
	// unregister_widget( 'Genesis_Widget_Menu_Categories' );
}


//* Media
//**********************

//* Change default link style for images
// https://gist.github.com/norcross/3815527#file-image-link-default-php
// https://codex.wordpress.org/Function_Reference/update_option

function pb_default_attachment_display_settings() {
	$image_link_setting  = get_option( 'image_default_link_type' );
	$image_align_setting = get_option( 'image_default_align' );
	$image_size_setting  = get_option( 'image_default_size' );

	// Avoid the option being set every time, and instead only do it if not allready set.
	if ( $image_link_setting && $image_align_setting && $image_size_setting  !== 'none' ) {
		update_option( 'image_default_link_type', 'none' );
		// Set link type (file, post, custom, none)
		update_option( 'image_default_align', 'center' );
		// Set image alignment (left, right, center, none)
		update_option( 'image_default_size', 'large' );
		// Set image size (thumbnail, medium, large, full)
	}
}


//**********************************************
//* Frontend
//**********************************************

//* Modify Head
//**********************

//* Strip out Comments RSS feed
// This function will reinsert the main RSS feed *after* the others have been removed
function pb_reinsert_rss_feed() {
   echo '<link rel="alternate" type="application/rss+xml" title="' . get_bloginfo('sitename') . ' &raquo; RSS Feed" href="' . get_bloginfo('rss2_url') . '" />';
}

//* Remove Query Strings From Static Resources
function pb_remove_script_version( $src ){
	$parts = explode( '?ver', $src );
	return $parts[0];
}


//* Footer
//**********************

//* Customize Footer Credits
function pb_footer_creds_text() {

	$back_totop = 'Return To Top of Page';

	echo '<div class="creds"><p>';
	echo 'Copyright &copy; ';
	echo date('Y');
	echo ' &middot; <a href="' .home_url(). '">' .get_bloginfo( 'name' ). '</a>';
	echo ' &middot <a href="#" class="to-top">' .$back_totop. '</a>';
	echo '</p></div>';
}

// * Scoll Back to The Button
function pb_scroll_to_top() {

	$back_totop = 'Return To Top of Page';

	echo '<a href="#0" class="to-top" title="' .$back_totop. '">^</a>';
}


//* Breadcrumbs
//**********************

//* Add Blog to Breadcrumbs, and remove category
// https://bitbucket.org/snippets/patrick_boehner/pknje/
function pb_add_blog_crumb( $crumb, $args ) {
	if( is_singular( 'post' ) )
		$crumb = get_the_title();
	if ( is_singular( 'post' ) || is_category() || is_date() )
		return '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">' . get_the_title( get_option( 'page_for_posts' ) ) .'</a> ' . $args['sep'] . ' ' . $crumb;
	else
		return $crumb;
}


//* Comments
//**********************

//* Remove comments entirely from frontend
function pb_remove_genesis_comments() {
remove_action( 'genesis_after_post', 'genesis_get_comments_template' );
}

//* Remove comment form allowed tags
function pb_remove_comment_form_allowed_tags( $defaults ) {
	$defaults['comment_notes_after'] = '';
	return $defaults;
}


//**********************************************
//* WP Admin - Login
//**********************************************

//* Change Loging URL
function pb_login_logo_url() {
    return home_url();
}

//* Change Logo Title
function pb_login_logo_url_title() {
    return get_bloginfo( 'name' );
}


//**********************************************
//* Misc Theme Functions
//**********************************************

//* Unregister the superfish scripts
function pb_unregister_superfish() {
	wp_deregister_script( 'superfish' );
	wp_deregister_script( 'superfish-args' );
}

//* Disable Emojie Scripts
//* @link https://gist.github.com/Otto42/b79ff5428993fcff45bb
function pb_disable_wp_emojicons() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_tinymce_emoji' );
}

//* Filter function used to remove the tinymce emoji plugin
function disable_tinymce_emoji( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

// Remove jQuery Migrate script
function pb_unregister_jquery_migrate( &$scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
}

// Filter Yoast SEO Metabox Priority
function pb_filter_yoast_seo_metabox() {
	return 'low';
}
