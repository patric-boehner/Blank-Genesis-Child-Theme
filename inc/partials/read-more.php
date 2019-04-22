 <?php

/**
 * Read More Link Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Read More Link
$end_of_line = '...';

$link_text = esc_html__( 'Continue Reading', 'blank-child-theme' );

$screen_reader = '<span class="screen-reader-text">: ' .esc_html( get_the_title() ). '</span>';

$continue_reading = $end_of_line . '<a class="more-link" href="' .esc_url( get_permalink() ). '">' . $link_text . $screen_reader . '</a>';
