<?php

/**
 * Resource Loading Help
 *
 * Borrowed from WPRig
 * https://github.com/wprig/wprig/blob/master/dev/functions.php
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Resource hinting with preconect and dns-preload
add_filter( 'wp_resource_hints', 'pb_resource_hints', 10, 2 );
function pb_resource_hints( $urls, $relation_type ) {

	if ( wp_style_is( 'wprig-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => '//fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;

}


/**
 * Adds async/defer attributes to enqueued / registered scripts.
 *
 * If #12009 lands in WordPress, this function can no-op since it would be handled in core.
 *
 * @link https://core.trac.wordpress.org/ticket/12009
 * @link https://github.com/wprig/wprig
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



// Register Google Fonts
function pb_fonts_url() {

	$fonts_url = '';
	/**
	 * Translator: If Source Sans pro does not support characters in your language, translate this to 'off'.
	 */
	$source_sans_pro = esc_html_x( 'on', 'Source Sans Pro font: on or off', 'blank-child-theme' );

	$font_families = array();

	if ( 'off' !== $source_sans_pro ) {

		$font_families[] = 'Source Sans Pro:400,600';

	}

	if ( in_array( 'on', array( $source_sans_pro ) ) ) {

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	}

	return esc_url_raw( $fonts_url );

}


/** Progressive Enhancements
 * Preload is a progressize enhacement.
 * For browsers that support it, it can be used and ignored by those who don't.
 */

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


		// Add Filamont Group LoadCSS js polyfill
		$js_file_inline = CHILD_DIR . '/assets/js/cssrelpreload.min.js';

		if ( file_exists( $js_file_inline ) ) {

			// Output the preload markup in <head>.
			foreach ( $preloads as $handle => $src ) {

				$onload  = "this.onload=null;";
			  $onload .= "this.rel='stylesheet'";

				echo '<link rel="preload" id="' . esc_attr( $handle ) . '-preload" href="' . esc_url( $src ) . '" as="style" onload="' .$onload. '"/>';
				echo "\n";
				echo '<noscript><link rel="stylesheet" id="' . esc_attr( $handle ) . '" href="' . esc_url( $src ) . '"/></noscript>';
				echo "\n";

			}

			$js_file_inline = file_get_contents( $js_file_inline );

			printf( "\n" . '<script type="text/javascript">%s</script>' . "\n", $js_file_inline );


		} else {

			//Output the preload markup in <head>.
			foreach ( $preloads as $handle => $src ) {

				echo '<link rel="preload" id="' . esc_attr( $handle ) . '-preload" href="' . esc_url( $src ) . '" as="style" />';
				echo "\n";

			}

		}


}
