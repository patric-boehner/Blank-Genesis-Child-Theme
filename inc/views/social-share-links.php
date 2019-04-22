<div class="social-share-links">
	<h3><?php echo esc_html_e( 'Share this page', 'blank-child-theme' ) ?><span class="screen-reader-text"><?php _e( ' (Links open in new window)', 'blank-child-theme' ); ?></span></h3>
	<ul class="social-links-list">
		<?php if( get_theme_mod( 'social_share_facebook_option' ) ) : ?>
			<li class="social-share-item">
				<a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>&t=<?php echo $title; ?>" class="social-link facebook" target="_blank" rel="noopener noreferrer"><?php echo $facebook; ?></a>
			</li>
		<?php endif; ?>
		<?php if( get_theme_mod( 'social_share_pinterest_option' ) ) : ?>
			<li class="social-share-item">
				<a href="http://pinterest.com/pin/create/button/?url=<?php echo $url; ?>&media=<?php echo $first_img; ?>&nbsp;&description=<?php echo $title; ?>" class="social-link pinterest" target="_blank" rel="noopener noreferrer"><?php echo $pinterest; ?></a>
			</li>
		<?php endif; ?>
		<?php if( get_theme_mod( 'social_share_twitter_option' ) ) : ?>
			<li class="social-share-item ">
				<a href="http://www.twitter.com/intent/tweet?url=<?php echo $url_short; ?>&text=<?php echo $title; ?>+<?php echo $twitter_user; ?>" class="social-link twitter" target="_blank" rel="noopener noreferrer"><?php echo $twitter; ?></a>
			</li>
		<?php endif; ?>
		<?php if( get_theme_mod( 'social_share_linkedin_option' ) ) : ?>
			<li class="social-share-item">
				<a href="https://www.linkedin.com/shareArticle?min=true&url=<?php echo $url_short; ?>&title=<?php echo $title; ?>&source=<?php echo $name; ?>" class="social-link linkedin" target="_blank" rel="noopener noreferrer"><?php echo $linkedin; ?></a>
			</li>
		<?php endif; ?>
		<?php if( get_theme_mod( 'social_share_email_option' ) ) : ?>
			<li class="social-share-item">
				<a href="mailto:?subject=<?php echo $subject; ?>&body=<?php echo $body; ?>" class="social-link mail" target="_blank" rel="noopener noreferrer"><?php echo $mail; ?></a>
			</li>
		<?php endif; ?>
	</ul>
</div>
<!-- End Social Share -->
