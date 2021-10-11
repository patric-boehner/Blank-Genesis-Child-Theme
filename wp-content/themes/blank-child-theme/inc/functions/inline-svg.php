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

    // Set defaults.
  	$defaults = array(
		'directory'	  => 'theme',
  		'filename'    => '',
      	'title'       => '',
  		'desc'        => '',
  		'class'       => '',
  	);

  	// Parse args.
  	$args = wp_parse_args( $args, $defaults );

	// Add the path to your SVG directory inside your theme.
	$svg_path = '/assets/icons/' . $args['directory'] . '/';
	$file_end = '.svg';

    //Check the SVG file exists
    if ( ! file_exists( CHILD_DIR . $svg_path . esc_attr( $args['filename'] ) . $file_end ) ) {
      // Return a blank string if we can't find the file.
      return '';
    }

    // Additonal Class
	$class = ( $args['class'] ) ? ' ' . sanitize_html_class( $args['class'] ) : '';

  	// Set aria hidden.
  	$screen_reader_hidden = ' ' . 'aria-hidden="true" focusable="false"';

  	// Set ARIA.
  	$aria_labelledby = '';

    // Titles and Desciption.
    if ( $args['title'] ) {
  		$screen_reader_hidden     = '';
  		$unique_id       = uniqid();
  		$aria_labelledby = ' ' . 'aria-labelledby="title-' . $unique_id . '"';

  		if ( $args['desc'] ) {
  			$aria_labelledby = ' ' . 'aria-labelledby="title-' . $unique_id . ' ' . 'desc-' . $unique_id . '  ';
  		}
  	}

    // Load and return the contents of the file
    $svg_file = file_get_contents( CHILD_DIR . $svg_path . esc_attr( $args[ 'filename' ] ) . $file_end );

    // Remove width and height info
	// $svg_file = preg_replace( '/(width|height)="\d*"\s/', "", $svg_file );


    // Begin SVG markup.
	  $svg = str_replace( '<svg', '<svg class="icon icon-' . sanitize_html_class( $args['filename'] ) . $class .'"' . $screen_reader_hidden . $aria_labelledby . ' role="img"', $svg_file );

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
