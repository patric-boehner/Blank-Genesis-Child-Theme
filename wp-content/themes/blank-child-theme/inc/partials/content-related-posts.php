<?php

/**
 * Related Posts Contwnt
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */


// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Variables
$heading = esc_html( get_the_title() );
$url = esc_url( get_the_permalink() );
if( function_exists( 'pb_custom_excerpt' ) ) {
    $excerpt = pb_custom_excerpt(
        array(
            'length' => 15,
            'more'   => '...',
            'post'   =>  $post->ID,
            )
    );
}
$featured_image = get_the_post_thumbnail(
    get_the_ID(),
    'genesis-singular-images',
    array( 'class' => 'entry-image' )
);

?>

<article <?php post_class(); ?> aria-label="<?php echo $heading; ?>">
    <header class="entry-header">
        <?php echo $featured_image; ?>
        <h4 class="entry-title">
            <a class="entry-title-link" rel="bookmark" href="<?php echo $url; ?>">
                <?php echo $heading; ?>
            </a>
        </h4>
    </header>
    <div class="entry-content">
        <p>
            <?php echo $excerpt; ?>
        </p>
    </div>
</article>