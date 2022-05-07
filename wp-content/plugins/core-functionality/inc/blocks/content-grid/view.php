<?php
/**
 * Block Output
 *
 * @package    CoreFunctionality
 * @since      2.0.0
 * @copyright  Copyright (c) 2020, Patrick Boehner
 * @license    GPL-2.0+
 */

//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// WP Qery of Block
$posts = new WP_Query( $args );


// Loop
if ( $posts->have_posts() ) :

  // Opening Strcutre
  echo sprintf(
      '<section %s class="%s"><div class="inner_content">',
      $block_id,
      $block_classes
  );

  // Loop
  while ( $posts->have_posts() ) : $posts->the_post();

      // Exclude Posts
      if ( in_array( get_the_ID(), $posts_to_exclude ) ) {
          continue;
      }

      // Post Strucutre
      include CORE_DIR . '/inc/blocks/content-grid/template-part.php';

  endwhile;
endif;

// Reset
wp_reset_postdata();

// Closing Content
echo sprintf(
  '</div></section>',
);

?>
