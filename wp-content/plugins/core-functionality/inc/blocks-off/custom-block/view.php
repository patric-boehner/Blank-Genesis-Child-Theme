<div <?php echo $block_id; ?> class="<?php echo $block_classes; ?>">
  <div class="block__inner" template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>">
    <?php echo $text; ?>
  </div>
</div>