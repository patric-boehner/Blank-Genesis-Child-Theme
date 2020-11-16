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


function getVimeoVideoThumbnailByVideoId( $id = '', $thumbType = 'medium' ) {

$id = trim( $id );

if ( $id == '' ) {
    return FALSE;
}

$apiData = unserialize( file_get_contents( "http://vimeo.com/api/v2/video/$id.php" ) );

if ( is_array( $apiData ) && count( $apiData ) > 0 ) {

    $videoInfo = $apiData[ 0 ];

    switch ( $thumbType ) {
        case 'small':
            return $videoInfo[ 'thumbnail_small' ];
            break;
        case 'large':
            return $videoInfo[ 'thumbnail_large' ];
            break;
        case 'medium':
            return $videoInfo[ 'thumbnail_medium' ];
        default:
            break;
    }

}

return FALSE;

}
