<?php

/**
 * Add inline SVG files,
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
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
  	);

  	// Parse args.
  	$args = wp_parse_args( $args, $defaults );

    //Check the SVG file exists
    if ( ! file_exists( CHILD_DIR . $svg_path . esc_attr( $args['filename'] ) . $file_end ) ) {
      // Return a blank string if we can't find the file.
      return '';
    }

    // Additonal Class
    if ( $args['class'] ) {
      $class = ' ' . sanitize_html_class( $args['class'] );// code...
    } else {
      $class = '';
    }

  	// Set aria hidden.
  	$aria_hidden = ' ' . 'aria-hidden="true"';

  	// Set ARIA.
  	$aria_labelledby = '';

    // Titles and Desciption.
    if ( $args['title'] ) {
  		$aria_hidden     = '';
  		$unique_id       = uniqid();
  		$aria_labelledby = ' ' . 'aria-labelledby="title-' . $unique_id . '"';

  		if ( $args['desc'] ) {
  			$aria_labelledby = ' ' . 'aria-labelledby="title-' . $unique_id . ' ' . 'desc-' . $unique_id . '  ';
  		}
  	}

    // Load and return the contents of the file
    $svg_file = file_get_contents( CHILD_DIR . $svg_path . esc_attr( $args[ 'filename' ] ) . $file_end );

    // Remove width and height info
	$svg_content = preg_replace( '/(width|height)="\d*"\s/', "", $svg_file );


    // Begin SVG markup.
	  $svg = str_replace( '<svg', '<svg class="icon icon-' . sanitize_html_class( $args['filename'] ) . $class .'"' . $aria_hidden . $aria_labelledby . ' role="img"', $svg_content );

  	// Display the title.
  	if ( $args['title'] ) {
  		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

  		// Display the desc only if the title is already set.
  		if ( $args['desc'] ) {
  			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
  		}
  	}

  	return $svg;

}
