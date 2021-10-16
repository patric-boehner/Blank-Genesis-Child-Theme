<figure id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="video-block__wrapper" data-embed="<?php echo $video_id; ?>" data-src="<?php echo $video_url_host; ?>" data-title="<?php echo $title; ?>" aria-labelledby="video-title">
      <h2 id="video-title" class="screen-reader-text"><?php echo esc_html__('Video:', 'core-functionality') . ' ' . $title; ?></h2>
      <?php echo $responsive; ?>
      <button class="video-block__button button">
        <span aria-label="<?php echo esc_html( 'Play Video: ', 'core-functionality' ); echo $title; ?>"><?php echo esc_html( 'Play Video', 'core-functionality' ); ?></span>
      </button>
  </div>
</figure>