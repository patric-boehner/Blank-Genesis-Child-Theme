<div <?php echo $block_id; ?> class="<?php echo $block_classes; ?>">
  <?php if( !empty( $icon_name ) ): ?>
    <?php echo $icon_svg; ?>
  <?php endif; ?>
  <div class="block__inner">
    <InnerBlocks />
  </div>
</div>