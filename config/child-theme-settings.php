<?php
/**
 * Genesis Sample theme settings.
 *
 * Genesis 2.9+ updates these settings when themes are activated.
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0-or-later
 * @link    http://example.com/
 * @link    https://studiopress.github.io/genesis/theme-setup/theme-settings/
 */

return [
	GENESIS_SETTINGS_FIELD => [
		'blog_title'								=> 'text', // or 'image'
		'header_right'              => 0,
		'feed_uri'                  => '',
		'comments_feed_uri'         => '',
		'blog_cat_num'              => '',
		'feed_uri'                  => '',
		'comments_feed_uri'         => '',
		'redirect_feeds'            => 0,
		'comments_pages'            => 0,
		'comments_posts'            => 1,
		'trackbacks_pages'          => 0,
		'trackbacks_posts'          => 0,
		'breadcrumb_home'           => 0,
		'breadcrumb_front_page'     => 0,
		'breadcrumb_posts_page'     => 0,
		'breadcrumb_single'         => 1,
		'breadcrumb_page'           => 0,
		'breadcrumb_archive'        => 1,
		'breadcrumb_404'            => 0,
		'breadcrumb_attachment'     => 0,
		'content_archive'           => 'excerpts', // excerpts, full
		'content_archive_limit'     => 0,
		'content_archive_thumbnail' => 1,
		'entry_meta_after_content'  => '[post_categories] [post_tags]',
		'entry_meta_before_content' => '[post_date] ' . __( 'by', 'genesis-sample' ) . ' [post_author_posts_link] [post_comments] [post_edit]',
		'image_size'                => 'genesis-singular-images',
		'image_alignment'           => 'alignnone', // 'aligncenter', 'alignleft' or 'alignright'
		'posts_nav'                 => 'older-newer', // older-newer, numeric
		'site_layout'               => 'full-width-content', // 'content-sidebar'
	],
	'posts_per_page'       => 6,
];
