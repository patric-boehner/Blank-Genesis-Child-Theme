<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="block__inner" template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>">
    <?php echo $text; ?>
  </div>
</div>