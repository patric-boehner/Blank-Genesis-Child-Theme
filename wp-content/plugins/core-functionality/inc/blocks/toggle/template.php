<?php
/**
* Block Template
*
* @package    CoreFunctionality
* @since      2.0.0
* @copyright  Copyright (c) 2019, Patrick Boehner
* @license    GPL-2.0+
*/

//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;

?>

<div id="<?php echo $block_id; ?>" class="<?php echo $block_classes; ?>">
    <<?php echo $data['toggle_heading_size']; ?> class="toggle-block__header">
        <button id="<?php echo esc_attr($toggle_id); ?>" class="toggle__button">
        <?php echo $icon_svg; ?>
        <span class="button_text"><?php echo $data['toggle_heading']; ?></span>
        </button>
    </<?php echo $data['toggle_heading_size']; ?>>
    <div id="<?php echo esc_attr($content_id); ?>" class="block__inner toggle__content open" aria-labelledby="<?php echo esc_attr($toggle_id); ?>">
        <InnerBlocks />
    </div>
</div>


