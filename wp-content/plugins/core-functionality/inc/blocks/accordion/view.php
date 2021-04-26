<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <<?php echo $heading; ?> class="accordion-block__header"><?php echo $text; ?></<?php echo $heading; ?>>
  <div class="block__inner">
    <InnerBlocks />
  </div>
</section>