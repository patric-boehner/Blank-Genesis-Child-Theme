<div class="<?php echo esc_attr($className); ?>">
  <?php if( !empty( $icon_name ) ): ?>
    <?php echo $icon_svg; ?>
  <?php endif; ?>
  <div class="block__inner">
    <InnerBlocks />
  </div>
</div>