<?php
/**
 * 404 Structure
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Fix 404 page strucutre
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'genesis_404');
function genesis_404() {

  // Fires inside the standard loop, before the entry opening markup.
  do_action( 'genesis_before_entry' );

  genesis_markup(
    [
      'open'    => '<article class="entry">',
      'context' => 'entry-404',
    ]
  );

  genesis_markup(
    [
      'open'    => '<header class="entry-header 404-description"><h1 %s>',
      'close'   => '</h1></header>',
      'content' => apply_filters( 'genesis_404_entry_title', __( 'Not found, error 404', 'blank-child-theme' ) ),
      'context' => 'entry-title',
    ]
  );

  $genesis_404_content = sprintf(
    /* translators: %s: URL for current website. */
    __( 'The page you are looking for no longer exists. Perhaps you can return back to the <a href="%s">homepage</a> and see if you can find what you are looking for. Or, you can try finding it by using the search form below.', 'blank-child-theme' ),
    esc_url( trailingslashit( home_url() ) )
  );

  $genesis_404_content = sprintf( '<p>%s</p>', $genesis_404_content );

  /**
   * The 404 content (wrapped in paragraph tags).
   *
   * @since 2.2.0
   *
   * @param string $genesis_404_content The content.
   */
  $genesis_404_content = apply_filters( 'genesis_404_entry_content', $genesis_404_content );


  // Fires inside the standard loop, after the entry header action hook, before the entry content.
  do_action( 'genesis_before_entry_content' );

  genesis_markup(
    [
      'open'    => '<div %s>',
      'context' => 'entry-content',
    ]
  );


  // Output 404 defualts
  echo $genesis_404_content . get_search_form( 0 );


  // Output content area
  if ( function_exists( 'cf_show_content_area' ) ) {
    cf_show_content_area( array(
      'location' => '404',
    ) );
  }

  genesis_markup(
    [
      'close'   => '</div>',
      'context' => 'entry-content',
    ]
  );

  // genesis_markup(
  //   [
  //     'open'    => '<div %s>',
  //     'close'   => '</div>',
  //     // 'content' => $genesis_404_content . get_search_form( 0 ),
  //     // 'content' => pb_404_content(),
  //   ]
  // );

  // Fires inside the standard loop, before the entry footer action hook, after the entry content.
  do_action( 'genesis_after_entry_content' );

  genesis_markup(
    [
      'close'   => '</article>',
      'context' => 'entry-404',
    ]
  );


  // Fires inside the standard loop, after the entry closing markup.
  do_action( 'genesis_after_entry' );

}


//* Run the Genesis loop
genesis();



// str_replace