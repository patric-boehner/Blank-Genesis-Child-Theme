<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="<?php echo esc_attr($style_name); ?>">
  <div class="block__inner">
  <?php

    if( $method == 'default' ) {

      $args = array(
        'post_type'			  => 'post',
        'cat'             => $cat_to_include,
        'posts_per_page'	=> $limit + count($posts_to_exclude),
        'orderby'         => $order_by,
        'order'           => $order,
        'offset'          => $offset,
        'no_found_rows'   => true,
        'update_post_term_cache' => false,
      );
  

    } else {

      $args = array(
        'post_type'			  => 'post',
        'post__in'        => $entry_ids,
        'orderby'         => 'post__in',
        'no_found_rows'   => true,
        'update_post_term_cache' => false,
      );

    }

      // Query
      $the_query = new WP_Query( $args );
      if( $the_query->have_posts() ):
        while( $the_query->have_posts() ) : $the_query->the_post();

          // Exclude Posts
          if( in_array( get_the_ID(), $posts_to_exclude ) ) {
            continue;
          }
    ?>
            <article class="content-grid-block__item" aria-label="<?php the_title(); ?>">
              <div class="content-grid-block__media">
              <a href="<?php esc_url( the_permalink() ); ?>" aria-hidden="true" tabindex="-1">
                <?php the_post_thumbnail( 'genesis-singular-images' ); ?>
              </a>
              </div>
              <div class="content-grid-block__body">
                <header class="content-grid-block__header">
                  <h3>
                    <a href="<?php esc_url( the_permalink() ); ?>"><?php esc_html( the_title() ); ?></a>
                  </h3>
                  <p class="content-grid-block__meta">
                    <?php the_date(); ?>
                  </p>
                </header>
                <div class="content-grid-block__content">
                  <?php the_excerpt(); ?>
                </div>
              </div>
            </article>

    <?php
        endwhile;
      endif;
      // End Loop
      /* Restore original Post Data */
      wp_reset_postdata();
    ?>
  </div>
</div>