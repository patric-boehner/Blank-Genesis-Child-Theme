<?php
/**
 * Searchform template
 *
 * @package Blank Child Theme
 * @author  Patrick Boehner
 * @license GPL-2.0+
 * @link    http://example.com/
 */

// If this file is called directly, abort.
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Search Form
//**********************

// Variables
$label_text = esc_html__( 'Search for content', 'blank-child-theme' );
$text = esc_html__( 'Submit', 'blank-child-theme' );
$button = $text;


// Form Output
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo $label_text; ?></span>
		<input type="search" class="search-field" placeholder="" value="<?php echo get_search_query(); ?>" name="s" required="required"/>
	</label>
	<button type="submit" class="search-submit"><?php echo $button; ?></button>
</form>
<!-- End Search Form -->
