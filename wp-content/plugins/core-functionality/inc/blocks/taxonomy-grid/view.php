<div <?php echo $block_id; ?> class="<?php echo $block_classes; ?>">
    <div class="inner_content">
      <?php  foreach( $taxonomy as $term ):

        // Varaibels
        $link = esc_url( get_term_link($term->term_id) );
        $name = esc_html( $term->name );
        $class = esc_attr( $term->taxonomy );
        
      ?>
        <a class="taxonomy-link <?php echo $class; ?>" href="<?php echo $link; ?>">
          <span class="taxonomy-name"><?php echo $name; ?></span>
        </a>
      <?php endforeach; ?>
    </divl>
</div>