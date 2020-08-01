<?php

/**
 * Add inline SVG files,
 *
 * @package Life After Divorce Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    https://lifeafterdivorcecoaching.com
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Load inline SVG's
// https://enshrined.co.uk/2018/09/19/how-to-properly-include-inline-svgs-in-a-wordpress-theme/

function pb_load_inline_svg( $args = array()) {

    // Add the path to your SVG directory inside your theme.
    $svg_path = '/assets/icons/';
    $file_end = '.svg';

    // Set defaults.
  	$defaults = array(
  		'filename'    => '',
      'title'       => '',
  		'desc'        => '',
  		'class'       => '',
  		'width'		  	=> '28px',
  		'height'		  => '28px'
  	);

  	// Parse args.
  	$args = wp_parse_args( $args, $defaults );

    //Check the SVG file exists
    if ( ! file_exists( CHILD_DIR . $svg_path . esc_attr( $args['filename'] ) . $file_end ) ) {
      // Return a blank string if we can't find the file.
      return '';
    }

  	// Set default width and height.
  	$svg_width = ' width="'.esc_attr( $args['width'] ).'" ';
  	$svg_height = 'height="'.esc_attr( $args['height'] ).'" ';

    // Strip out PX and return an integer
    $width = intval( str_replace( 'px', '', esc_attr( $args['width'] ) ) );
    $height = intval( str_replace( 'px', '', esc_attr( $args['height'] ) ) );

    // Viewbox
    $svg_viewbox = ' ' . 'viewBox="0 0 ' . $width . ' ' . $height . '" ';

    // Additonal Class
    if ( $args['class'] ) {
      $class = ' ' . sanitize_html_class( $args['class'] );// code...
    } else {
      $class = '';
    }

  	// Set aria hidden.
  	$aria_hidden = ' ' . 'aria-hidden="true" tab-index="-1"';

  	// Set ARIA.
  	$aria_labelledby = '';

    // Titles and Desciption.
    if ( $args['title'] ) {
  		$aria_hidden     = '';
  		$unique_id       = uniqid();
  		$aria_labelledby = ' ' . 'aria-labelledby="title-' . $unique_id . '"';

  		if ( $args['desc'] ) {
  			$aria_labelledby = ' ' . 'aria-labelledby="title-' . $unique_id . ' ' . 'desc-' . $unique_id . '"';
  		}
  	}

    // Load and return the contents of the file
    $svg_file = file_get_contents( CHILD_DIR . $svg_path . esc_attr( $args[ 'filename' ] ) . $file_end );

    // Remove the wrapping svg
    $svg_content = preg_replace( '/^\<[\/]{0,1}svg[^\>]*\>/i', '', $svg_file );

    // Begin SVG markup.
  	$svg = '<svg class="icon icon-' . sanitize_html_class( $args['filename'] ) . $class .'"' . $svg_width . $svg_height . $svg_viewbox . $aria_hidden . $aria_labelledby . ' role="img">';

  	// Display the title.
  	if ( $args['title'] ) {
  		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

  		// Display the desc only if the title is already set.
  		if ( $args['desc'] ) {
  			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
  		}
  	}

    $svg .= $svg_content;
  	$svg .= '</svg>';

  	return $svg;

}
