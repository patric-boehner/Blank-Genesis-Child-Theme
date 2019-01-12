<section class="author-box" itemprop="author" itemscope="" itemtype="https://schema.org/Person">
    <div class="author-avatar">
      <?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
    </div>
    <div class="author-box-content">
      <h2 class="author-box-title" itemprop="name">
        <?php the_author_meta( 'display_name' ); ?>
      </h2>
      <p itemprop="description">
        <?php the_author_meta( 'description' ); ?>
      </p>
      <?php if ( !empty( $facebook_link ) || !empty( $twitter_link ) || !empty( $linked_link ) ): ?>
        <h3 class="screen-reader-text"><?php esc_html_e( 'Author Contact Methods', 'blank-child-theme' ); ?></h3>
        <ul class="author-contact-list">
          <?php if( !empty( $facebook_link ) ): ?>
          <li>
            <a class="author-link" href="<?php echo $facebook_link; ?>"><?php echo $facebook; ?></a>
          </li>
        <?php endif; ?>
        <?php if( !empty( $twitter_link ) ): ?>
          <li>
            <a class="author-link" href="<?php echo $twitter_link; ?>"><?php echo $twitter; ?></a>
          </li>
        <?php endif; ?>
        <?php if( !empty( $linked_link ) ): ?>
          <li>
            <a class="author-link" href="<?php echo $linked_link; ?>"><?php echo $linkedin; ?></a>
          </li>
        <?php endif; ?>
        </ul>
      <?php endif; ?>
    </div>
</section>
<!-- End Author Profile -->
