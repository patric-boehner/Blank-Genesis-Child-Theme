<section class="author-profile">
  <h2 class="screen-reader-text"><?php esc_html_e( 'Author Profile', 'blank-child-theme' ); ?></h2>
    <?php echo $avatar; ?>
    <div class="author-profile__content">
      <h3 class="author-profile__title"><?php echo $name; ?></h3>
      <p class="author-profile__description">
        <?php echo $description; ?>
      </p>
    </div>
</section>
<!-- End Author Profile -->
