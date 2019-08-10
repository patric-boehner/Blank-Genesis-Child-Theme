<?php

/**
 * Output of customizer css
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


add_action( 'wp_enqueue_scripts', 'genesis_sample_css' );
function genesis_sample_css() {

	$logo	= wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

	if ( $logo ) {

		$logo_height           = absint( $logo[2] );
		$logo_max_width        = get_theme_mod( 'genesis_sample_logo_width', 350 );
		$logo_width            = absint( $logo[1] );
		$logo_ratio            = $logo_width / max( $logo_height, 1 );
		$logo_effective_height = min( $logo_width, $logo_max_width ) / max( $logo_ratio, 1 );
		$logo_padding          = max( 0, ( 60 - $logo_effective_height ) / 2 );

	}

	$css = '';

	$css .= ( has_custom_logo() && ( 200 <= $logo_effective_height ) ) ?
		'
		.site-header {
			position: static;
		}
		'
	: '';

	$css .= ( has_custom_logo() && ( 350 !== $logo_max_width ) ) ? sprintf(
		'
		.wp-custom-logo .site-container .title-area {
			max-width: %spx;
		}
		',
		$logo_max_width
	) : '';

	// Place menu below logo and center logo once it gets big.
	$css .= ( has_custom_logo() && ( 600 <= $logo_max_width ) ) ?
		'
		.wp-custom-logo .title-area,
		.wp-custom-logo .menu-toggle,
		.wp-custom-logo .nav-primary {
			float: none;
		}
		.wp-custom-logo .title-area {
			margin: 0 auto;
			text-align: center;
		}
		@media only screen and (min-width: 960px) {
			.wp-custom-logo .nav-primary {
				text-align: center;
			}
			.wp-custom-logo .nav-primary .sub-menu {
				text-align: left;
			}
		}
		'
	: '';

	$css .= ( has_custom_logo() && $logo_padding && ( 1 < $logo_effective_height ) ) ? sprintf(
		'
		.wp-custom-logo .title-area {
			padding-top: %spx;
		}
		',
		$logo_padding + 5
	) : '';

	if ( $css ) {
		wp_add_inline_style( genesis_get_theme_handle(), $css );
	}

}
