<?php

/**
 * Alter Paragraph Block
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
 * From Mai theme | https://bizbudding.com
 * Remove empty paragraph block markup.
 *
 * For some reason, `' <p></p> ' === $block_content` doesn't work, so
 * instead we have to count the number of characters in the string.
 *
 * @since 2.0.1
 *
 * @param string $block_content Block HTML markup.
 * @param array  $block         Block data.
 *
 * @return string
 */
add_filter( 'render_block', 'pb_render_paragraph_block', 10, 2 );
function pb_render_paragraph_block( $block_content, $block ) {

	if ( 'core/paragraph' === $block['blockName'] && 9 === strlen( $block_content ) ) {
		$block_content = '';
	}

    return $block_content;
    
}
