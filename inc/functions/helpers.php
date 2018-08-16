<?php

/**
 * Helper functions
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


/**
 * Helper function to check if we're on a WooCommerce page.
 *
 * @since  2.0.0
 *
 * @link   https://docs.woocommerce.com/document/conditional-tags/.
 *
 * @return bool
 */
function pb_is_woocommerce_page() {

	if ( ! class_exists( 'WooCommerce' ) ) {
		return false;
	}

	if ( is_woocommerce() || is_shop() || is_product_category() || is_product_tag() || is_product() || is_cart() || is_checkout() || is_account_page() ) {
		return true;
	} else {
		return false;
	}

}


// Output link to comments more then two deep
/*
 * http://justintadlock.com/archives/2016/11/16/designing-better-nested-comments
 */
function pb_comment_parent_link( $args = array() ) {

    echo pb_get_comment_parent_link( $args );
}

function pb_get_comment_parent_link( $args = array() ) {

    $link = '';

    $defaults = array(
        'text'   => '%s', // Defaults to comment author.
        'depth'  => 2,    // At what level should the link show.
        'before' => '',   // String to output before link.
        'after'  => ''    // String to output after link.
    );

    $args = wp_parse_args( $args, $defaults );

    if ( $args['depth'] <= $GLOBALS['comment_depth'] ) {

        $parent = get_comment()->comment_parent;

        if ( 0 < $parent ) {

            $url  = esc_url( get_comment_link( $parent ) );
            $text = sprintf( $args['text'], get_comment_author( $parent ) );

            $link = sprintf( '%s<a class="comment-parent-link" href="%s">%s</a>%s', $args['before'], $url, $text, $args['after'] );
        }
    }

    return $link;
}


/**
 * Adds async/defer attributes to enqueued / registered scripts.
 *
 * If #12009 lands in WordPress, this function can no-op since it would be handled in core.
 *
 * @link https://core.trac.wordpress.org/ticket/12009
 * @param string $tag    The script tag.
 * @param string $handle The script handle.
 * @return array
 */
add_filter( 'script_loader_tag', 'wprig_filter_script_loader_tag', 10, 2 );
function wprig_filter_script_loader_tag( $tag, $handle ) {

	foreach ( array( 'async', 'defer' ) as $attr ) {

		if ( ! wp_scripts()->get_data( $handle, $attr ) ) {
			continue;
		}
		// Prevent adding attribute when already added in #12009.
		if ( ! preg_match( ":\s$attr(=|>|\s):", $tag ) ) {
			$tag = preg_replace( ':(?=></script>):', " $attr", $tag, 1 );
		}
		// Only allow async or defer, not both.
		break;

	}

	return $tag;

}



/**
 * Generate preload markup for stylesheets.
 *
 * @param object $wp_styles Registered styles.
 * @param string $handle The style handle.
 */
function wprig_get_preload_stylesheet_uri( $wp_styles, $handle ) {
	$preload_uri = $wp_styles->registered[ $handle ]->src . '?ver=' . $wp_styles->registered[ $handle ]->ver;
	return $preload_uri;
}


/**
 * Adds preload for in-body stylesheets depending on what templates are being used.
 * Disabled when AMP is active as AMP injects the stylesheets inline.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Preloading_content
 */
add_action( 'wp_head', 'wprig_add_body_style' );
function wprig_add_body_style() {

		// Get registered styles.
		$wp_styles = wp_styles();

		$preloads = array();

		// Preload Header CSS
		$preloads['site-header-partial'] = wprig_get_preload_stylesheet_uri( $wp_styles, 'site-header-partial' );

		// Preload Content CSS
		$preloads['site-content-area-partial'] = wprig_get_preload_stylesheet_uri( $wp_styles, 'site-content-area-partial' );

		// Preload Footer CSS
		$preloads['site-footer-partial'] = wprig_get_preload_stylesheet_uri( $wp_styles, 'site-footer-partial' );

		// Preload Comments CSS
		if ( is_singular() && comments_open() ) {
			$preloads['site-comment-partial'] = wprig_get_preload_stylesheet_uri( $wp_styles, 'site-comment-partial' );
		}

		// Output the preload markup in <head>.
		foreach ( $preloads as $handle => $src ) {
			echo '<link rel="preload" id="' . esc_attr( $handle ) . '-preload" href="' . esc_url( $src ) . '" as="style" />';
			echo "\n";

		}

}
