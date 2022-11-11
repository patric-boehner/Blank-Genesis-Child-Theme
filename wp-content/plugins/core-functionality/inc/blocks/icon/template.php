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
    <?php if( !empty( $data['icon_name'] ) ): ?>
        <?php echo $icon_svg; ?>
    <?php endif; ?>
</div>


