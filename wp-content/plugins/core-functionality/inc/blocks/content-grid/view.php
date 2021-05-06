<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="block__inner">

    <?php
        // Query
        if( $get_content->have_posts() ):
          while( $get_content->have_posts() ) : $get_content->the_post();

            // Exclude Posts
            if( in_array( get_the_ID(), $posts_to_exclude ) ) {
              continue;
            }

            // Display a card
            if ( function_exists( 'cf_acf_blocks_display_card' ) ) {
              cf_acf_blocks_display_card(
                array(
                  'title' => get_the_title(),
                  'image' => wp_get_attachment_image( get_post_thumbnail_id(), 'genesis-singular-images', false ),
                  'meta' => get_the_date(),
                  'text'  => cf_custom_excerpt(
                    array(
                      'length' => 35,
                      'more'   => '...',
                      )
                    ),
                  'url'   => get_the_permalink(),
                  'button' => '',
                )
            );
          }

          endwhile;
        endif;
        // End Loop
        /* Restore original Post Data */
        wp_reset_postdata();
      ?>
    
  </div>
</div>