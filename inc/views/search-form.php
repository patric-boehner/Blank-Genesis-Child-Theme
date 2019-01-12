<form role="search" method="get" class="search-form" itemprop="potentialAction" itemscope="" itemtype="https://schema.org/SearchAction" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo $label_text; ?></span>
		<input type="search" class="search-field" placeholder="<?php echo $placeholder_text; ?>&hellip;" value="<?php echo get_search_query(); ?>" name="s" title="Search for" />
	</label>
	<button type="submit" class="search-submit">
		<?php echo $button; ?>
	</button>
</form>
<!-- End Search -->
