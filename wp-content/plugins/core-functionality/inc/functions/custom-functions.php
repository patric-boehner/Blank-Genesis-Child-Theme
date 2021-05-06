<?php

/**
 * Custom functions
 *
 * @author      Patrick Boehner
 * @link        http://www.patrickboehner.com
 * @package     Core Functionality
 * @copyright   Copyright (c) 2012, Patrick Boehner
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


/**
 * Get posts
 *
 * If no taxonomies are provided, the most recent posts will be displayed.
 * Otherwise, posts from specified categories and tags will be displayed.
 *
 * @param  array $args   WP_Query arguments.
 * @return object        The related posts object.
 * @author Greg Rickaby, Eric Fuller, Jeffrey de Wit
 * @since 1.0
 * 
 * @link https://github.com/WebDevStudios/wds-acf-blocks
 */
function cf_acf_blocks_get_query_content( $args = array() ) {

	// Setup default WP_Query args.
	$defaults = array(
		'post_type'			  	 => 'post',
		'ignore_sticky_posts'    => 1,
		'order'                  => 'DESC',
		'orderby'                => 'date',
		'paged'                  => 1,
		'posts_per_page'         => 3,
		'post__not_in'           => array( get_the_ID() ),
        'offset'                 => 0,
        'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
	);

	// Parse arguments.
	$args = wp_parse_args( $args, $defaults );

	// Run the query!
	$posts_output = new WP_Query( $args );

	return $posts_output;

}

// Get manual array of posts
function cf_acf_blocks_get_selected_content( $args = array() ) {

	// Setup default WP_Query args.
	$defaults = array(
		'post_type'			  	 => 'post',
		'ignore_sticky_posts'    => 1,
		'post__in'				 => array( 0 ),
		'orderby'                => 'post__in',
        'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
	);

	// Parse arguments.
	$args = wp_parse_args( $args, $defaults );

	// Run the query!
	$posts_output = new WP_Query( $args );

	return $posts_output;

}


/**
 * Get recent posts query arguments.
 *
 * @author Ashar Irfan
 * @since 1.0
 *
 * @param array $categories List of categories.
 * @param array $tags List of tags.
 * @return array
 * 
 * @link https://github.com/WebDevStudios/wds-acf-blocks
 */
function cf_acf_blocks_get_content_query_arguments( $categories, $tags ) {

	$args = array();

	// If no tags and just categories.
	if ( ! $tags && $categories ) {
		$args['category__in'] = $categories;
	}

	// If no categories and just tags.
	if ( ! $categories && $tags ) {
		$args['tag__in'] = $tags;
	}

	// If both categories and tags.
	if ( $categories && $tags ) {
		$args = array_merge(
			$args,
			array(
				'tax_query' => array(
					'relation' => 'OR',
					array(
						'taxonomy' => 'category',
						'terms'    => $categories,
					),
					array(
						'taxonomy' => 'post_tag',
						'terms'    => $tags,
					),
				),
			)
		);
	}

	return $args;
}


/**
 * Display a card.
 *
 * @author WDS
 * @param array $args Card defaults.
 * @since 1.0
 * 
 * @link https://github.com/WebDevStudios/wds-acf-blocks
 */
function cf_acf_blocks_display_card( $args = array() ) {

	// Setup defaults.
	$defaults = array(
		'title' => '',
		'image' => '',
		'meta'  => '',
		'text'  => '',
		'button' => '',
		'url'   => '',
		'class' => '', // add space at beging
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );
	?>
	<article class="content-grid-block__item<?php echo esc_attr( $args['class'] ); ?>" aria-label="<?php echo esc_html( $args['title'] ); ?>">
		<?php if ( $args['image'] ) : ?>
			<div class="content-grid-block__media">
				<a href="<?php echo esc_url( $args['url'] ); ?>" tabindex="-1">
					<?php echo wp_kses_post( $args['image'] ); ?>
				</a>
			</div>
		<?php endif; ?>

		<div class="content-grid-block__body">
			<header class="content-grid-block__header">
				<?php if ( $args['title'] ) : ?>
					<h3>
						<a href="<?php echo esc_url( $args['url'] ); ?>"><?php echo esc_html( $args['title'] ); ?></a>
					</h3>
				<?php endif; ?>
				<?php if ( $args['meta'] ) : ?>
					<p class="content-grid-block__meta">
						<?php echo esc_html( $args['meta'] ); ?>
					</p>
				<?php endif; ?>
			</header>

			<?php if ( $args['text'] ) : ?>
				<div class="content-grid-block__content">
					<p>
						<?php echo esc_html( $args['text'] ); ?>
					</p>
					<?php if ( $args['button'] && $args['url'] ) : ?>
							<a class="button" href="<?php echo esc_url( $args['url'] ); ?>" aria-hidden="true" tabindex="-1">
								<?php esc_html_e( $args['button'], 'core-functionality' ); ?>
							</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</article>
	<?php
}


/**
 * Limit the excerpt length.
 *
 * @param array $args Parameters include length and more.
 *
 * @author WDS
 * @return string
 * @since 1.0
 * 
 * @link https://github.com/WebDevStudios/wds-acf-blocks
 */
function cf_custom_excerpt( $args = array() ) {

	// Set defaults.
	$defaults = array(
		'length' => 20,
		'more'   => '...',
		'post'   => '',
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Trim the excerpt.
	return wp_trim_words( get_the_excerpt( $args['post'] ), absint( $args['length'] ), esc_html( $args['more'] ) );

}