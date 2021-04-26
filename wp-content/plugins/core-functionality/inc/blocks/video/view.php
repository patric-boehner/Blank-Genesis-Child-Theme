<figure id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="video-block__wrapper" data-embed="<?php echo $video_id; ?>" data-src="<?php echo $vidoe_url_host; ?>" data-title="<?php echo $title; ?>">
      <h2 class="screen-reader-text"><?php echo $title; ?></h2>
      <img class="video-block__thumbnail" alt="<?php echo $title; ?>" loading="lazy" width="560" height="315" src="<?php echo $img_url; ?>" aria-hidden="true">
      <button class="video-block__button button">
        <span aria-label="<?php echo esc_html( 'Play Video: ', 'core-functionality' ); echo $title; ?>"><?php echo esc_html( 'Play Video', 'core-functionality' ); ?></span>
      </button>
  </div>
</figure>