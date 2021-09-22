<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <<?php echo $heading; ?> class="toggle-block__header">
    <button id="<?php echo esc_attr($toggle_id); ?>" class="toggle__button">
      <?php echo $icon_svg; ?>
      <span class="button_text"><?php echo $text; ?></span>
    </button>
  </<?php echo $heading; ?>>
  <div id="<?php echo esc_attr($content_id); ?>" class="block__inner toggle__content open" aria-labelledby="<?php echo esc_attr($toggle_id); ?>">
    <InnerBlocks template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
  </div>
</section>