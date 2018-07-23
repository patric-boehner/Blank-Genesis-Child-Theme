<div class="social-share-links">
	<span class="screen-reader-text"><?php echo _e( 'Share on social media (Links open in new window)', 'blank-child-theme' ) ?></span>
	<span><i class="fas fa-share-square"></i><?php _e( 'Share:', 'blank-child-theme' ); ?></span>
	<ul class="social-links-list">

		<li class="social-share-item">
			<a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>&t=<?php echo $title; ?>" class="social-link icon-facebook" target="_blank" rel="noopener noreferrer">
				<i class="fab fa-facebook-f"></i>
				<?php _e( 'Share on Facebook', 'blank-child-theme' ); ?>
			</a>
		</li>

		<li class="social-share-item">
			<a href="http://pinterest.com/pin/create/button/?url=<?php echo $url; ?>&media=<?php echo $first_img; ?>&nbsp;&description=<?php echo $title; ?>" class="social-link icon-pinterest" target="_blank" rel="noopener noreferrer">
				<i class="fab fa-pinterest-p"></i>
				<?php _e( 'Share on Pinterest', 'blank-child-theme' ); ?>
			</a>
		</li>

		<li class="social-share-item">
			<a href="http://www.twitter.com/intent/tweet?url=<?php echo $url_short; ?>&text=<?php echo $title; ?>+<?php echo $twitter; ?>" class="social-link icon-twitter" target="_blank" rel="noopener noreferrer">
				<i class="fab fa-twitter"></i>
				<?php _e( 'Tweet This Post', 'blank-child-theme' ); ?>
			</a>
		</li>

		<li class="social-share-item">
			<a href="https://www.linkedin.com/shareArticle?min=true&url=<?php echo $url_short; ?>&title=<?php echo $title; ?>&source=<?php echo $name; ?>" class="social-link icon-linkedin" target="_blank" rel="noopener noreferrer">
				<i class="fab fa-linkedin-in"></i>
				<?php _e( 'Share on LinkedIn', 'blank-child-theme' ); ?>
			</a>
		</li>

		<li class="social-share-item">
			<a href="mailto:?subject=<?php echo $name; ?>&body=<?php echo $name; ?>&nbsp;blog&nbsp;post:&nbsp;<?php echo $title; ?>&nbsp;&ndash;&nbsp;<?php echo $url; ?>" class="social-link icon-envelope" target="_blank" rel="noopener noreferrer">
				<i class="fas fa-envelope-open"></i>
				<?php _e( 'Email This Post', 'blank-child-theme' ); ?>
			</a>
		</li>

	</ul>
</div>
<!-- End Social Share -->
