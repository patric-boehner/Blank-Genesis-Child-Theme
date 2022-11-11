<?php
/**
* Block Template
*
* @package    CoreFunctionality
* @since      2.0.0
* @copyright  Copyright (c) 2019, Patrick Boehner
* @license    GPL-2.0+
*/

//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;

?>

<figure id="<?php echo $block_id; ?>" class="<?php echo $block_classes; ?>">
  <div class="video-block__wrapper" data-embed="<?php echo $video_id; ?>" data-src="<?php echo $video_url_host; ?>" data-title="<?php echo $data[ 'video_title' ]; ?>">
      <h2 id="video-title" class="screen-reader-text">
        <?php echo esc_html__('Video', 'core-functionality');
          if( !empty( $data[ 'video_title' ] ) ) {
            echo ': ' . $data[ 'video_title' ];
          }
        ?>
      </h2>
      <?php echo $responsive; ?>
      <button class="video-block__button button">
        <span><?php echo esc_html( 'Play Video', 'core-functionality' ); ?></span>
        <?php if( !empty( $data[ 'video_title' ] ) ): ?>
          <span class="screen-reader-text">: <?php echo $data[ 'video_title' ]; ?></span>
        <?php endif; ?>
      </button>
  </div>
</figure>


