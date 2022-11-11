<?php
/**
 * Event Functions
 * 
 * Run searhc and replace on 'events' and 'Event' with the post type name
 *
 * @package    CoreFunctionality
 * @since      2.0.0
 * @copyright  Copyright (c) 2020, Patrick Boehner
 * @license    GPL-2.0+
 */


//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Alter post edit title
add_filter( 'enter_title_here', 'cf_change_event_placeholder_title_text' );
function cf_change_event_placeholder_title_text( $title ){

	$screen = get_current_screen();

	if( isset( $screen->post_type ) ) {

		if  ( 'events' == $screen->post_type ) {
			$title = esc_html__( 'Add title of event', 'core-functionality' );
		}

	}

	return $title;

}


// Event Settings
// if (function_exists('acf_add_options_page')) {

//    acf_add_options_page(array(
//       'page_title' 	=> __( 'Events Settings', 'core-functionality' ),
//       'menu_title'	=> __( 'Settings', 'core-functionality' ),
//       'parent_slug'	=> 'edit.php?post_type=events',
//       'capability'   => 'manage_options'
//    ));
   
// }


// Filter date and date time field to unix timestamp
add_filter('acf/update_value/type=date_time_picker', 'cf_update_value_date_time_picker', 10, 3);
add_filter('acf/update_value/type=date_picker', 'cf_update_value_date_time_picker', 10, 3);
function cf_update_value_date_time_picker( $value, $post_id, $field ) {

    return strtotime( $value );

}


/**
 * Returns the event date information with formating
 * 
 * @param bool $args optional. Year adds the year of the event.
 * Seperator adds a vertical dash btween dates and times
 */
function cf_get_event_dates( $args = array() ) {

   // Set defaults
   $defaults = array(
      'year'  => false,
      'seperator' => false
   );

   // Parse args.
   $args = wp_parse_args( $args, $defaults );

   // Date time setup
	$end_date_time = intval( get_post_meta( get_the_ID(), 'event_end_date', true ) );
	$start_date_time = intval( get_post_meta( get_the_ID(), 'event_start_date', true ) );

   // Exist early
   if( empty( $end_date_time ) && $start_date_time ) {
      return;
   }
 
	$start_time = date( 'g:i a', $start_date_time );
	$end_time = date( 'g:i a', $end_date_time );

   $times_formatted = sprintf(
      '<span class="event-times">%s - %s</span>',
      $start_time,
		$end_time
   );

   // Don't output times if start and dend time is set to 12am
   $no_time = ('12:00 am' == $start_time) && ('12:00 am' == $start_time) ? true : false;
   $times_default = ( $no_time ) ? '' : $times_formatted;
 
	$repeate_dates_status = get_post_meta( get_the_ID(), 'event_repeat', true );
	$repeater = get_post_meta( get_the_ID(), 'event_multiple_dates', true );

   //Icon 
   if( function_exists( 'pb_load_inline_svg' ) ) {
      $svg = pb_load_inline_svg( array(
         'filename' => 'calendar',
      ) );
   }

   // Optional peramaters
   $end_year = ( $args[ 'year' ] == true ) ? ', ' . date( 'Y', $end_date_time ) : '' ;
   $seperator = ( $args[ 'seperator' ] == true && $no_time == false ) ? ' | ' : ' ' ;
   
 
   // Repeating events else single date event
	if( $repeater && $repeate_dates_status == 1 ) {

	   $dates_array = array();
 
	   for( $i = 0; $i < $repeater; $i++ ) {
 
		  $date = get_post_meta( get_the_ID(), 'event_multiple_dates_' . $i . '_event_date', true );
		  $date_formated = date( "j", $date );
 
		  $dates_array[] = $date_formated;
 
	   }
 
	   $start_month = date( 'F', $start_date_time );
	   $dates_list = implode( ', ', $dates_array );
 
	   $output = sprintf(
		  '<div class="event-dates-times">%s<span class="event-dates">%s %s%s</span>%s%s</div>',
        $svg,
		  $start_month,
		  $dates_list,
        $end_year,
        $seperator,
		  $times_default
 
	   );
 
	} else {
 
	   $date = date( 'F j', $start_date_time );
 
	   $output = sprintf(
		  '<div class="event-dates-times">%s<span class="event-dates">%s%s<span>%s%s</div>',
        $svg,
		  $date,
        $end_year,
        $seperator,
		  $times_default
 
	   );
 
	}

   return $output;
 
 }


 /**
  * Retrieve event location information for the current event
  *
  * @return array All the values for the first lcoation term that
  * has been set for the current post
  */
function cf_get_event_location_meta() {

   global $post;

   $location_tax = get_the_terms( $post->ID, 'locations' );
   $term_id = (int) $location_tax[0]->term_id;

   // Exit early
   if( empty( $term_id ) && ! is_singular( 'events' ) ) {
      return;
   }

   $location_name = $location_tax[0]->name;
   $street_address = esc_html( get_term_meta( $term_id, 'address_street', true ) );
   $postal_code = esc_html( get_term_meta( $term_id, 'address_postal', true ) );
   $locality = esc_html( get_term_meta( $term_id, 'address_locality', true ) );
   $region = esc_html( get_term_meta( $term_id, 'address_region', true ) );
   $country = esc_html( get_term_meta( $term_id,  'address_country', true ) );
   $url = esc_url( get_term_meta( $term_id,  'address_url', true ) );

   $location_array = array(
      'name'         => $location_name,
      'street'       => $street_address,
      'postal_clode' => $postal_code,
      'locality'     => $locality,
      'region'       => $region,
      'country'      => $country,
      'url'          => $url
   );

   return $location_array;

}


// Sort admin events column by start date
add_action( 'pre_get_posts', 'cf_sort_events_by_start_time', 10, 1 );
function cf_sort_events_by_start_time( $query ) {

   global $typenow;

   // Exit early
   if ( ! is_admin() || 'events' != $typenow ) {
     return;
   }

   $query->set( 'orderby', 'meta_value_num' );
   $query->set( 'meta_key', 'event_start_date' );
   $query->set( 'order', 'ASC' );

}