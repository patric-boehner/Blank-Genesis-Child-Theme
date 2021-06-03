<div class="share-links">
	<h3 class="share-links__heading"><?php echo esc_html__( 'Share this Article', 'life-after-divorce' ) ?>:<span class="screen-reader-text"> (<?php _e( 'Links open in new window', 'life-after-divorce' ); ?>)</span></h3>
	<ul class="share-links__list">
		<?php if( get_theme_mod( 'social_share_facebook_option' ) ) : ?>
			<li class="share-links__item">
				<a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>&t=<?php echo $title; ?>" class="share-links__link facebook" target="_blank" rel="noopener noreferrer"><?php echo $facebook; ?></a>
			</li>
		<?php endif; ?>
		<?php if( get_theme_mod( 'social_share_pinterest_option' ) ) : ?>
			<li class="share-links__item">
				<a href="http://pinterest.com/pin/create/button/?url=<?php echo $url; ?>&media=<?php echo $first_img; ?>&nbsp;&description=<?php echo $title; ?>" class="share-links__link pinterest" target="_blank" rel="noopener noreferrer"><?php echo $pinterest; ?></a>
			</li>
		<?php endif; ?>
		<?php if( get_theme_mod( 'social_share_twitter_option' ) ) : ?>
			<li class="share-links__item ">
				<a href="http://www.twitter.com/intent/tweet?url=<?php echo $url_short; ?>&text=<?php echo $title; ?>+<?php echo $twitter_user; ?>" class="share-links__link twitter" target="_blank" rel="noopener noreferrer"><?php echo $twitter; ?></a>
			</li>
		<?php endif; ?>
		<?php if( get_theme_mod( 'social_share_linkedin_option' ) ) : ?>
			<li class="share-links__item">
				<a href="https://www.linkedin.com/shareArticle?min=true&url=<?php echo $url_short; ?>&title=<?php echo $title; ?>&source=<?php echo $name; ?>" class="share-links__link linkedin" target="_blank" rel="noopener noreferrer"><?php echo $linkedin; ?></a>
			</li>
		<?php endif; ?>
		<?php if( get_theme_mod( 'social_share_email_option' ) ) : ?>
			<li class="share-links__item">
				<a href="mailto:?subject=<?php echo $subject; ?>&body=<?php echo $body; ?>" class="share-links__link mail" target="_blank" rel="noopener noreferrer"><?php echo $mail; ?></a>
			</li>
		<?php endif; ?>
	</ul>
</div>
<!-- End Social Share -->
