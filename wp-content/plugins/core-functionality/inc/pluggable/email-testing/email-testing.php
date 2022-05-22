<?php
/**
* Cron Email Testing
*
* Setup a custom cron action that runs daily and sends an email
* using the wp_mail function to an address defined via CORON_EMAIL.
* The email goes to a ping testing service that ntofies the developer
* when the email fails to be delviered. This is to test and monitor the
* websites email sending ability or connection to a transactional email
* provider.
*
* The cron wont run if the email isn't defined or if the site isn't live.
* The cron will be removed when the plugin is deleated but not deactivated.
*
* @package    CoreFunctionality
* @since      2.0.0
* @copyright  Copyright (c) 2019, Patrick Boehner
* @license    GPL-2.0+
*/

//* Block Acess
//**********************
if( !defined( 'ABSPATH' ) ) exit;


// Cron action, ping URL
add_action( 'cf_cron_email_test', 'cf_run_cron_email_test' );
function cf_run_cron_email_test() {

    // Don't run if the test email isn't define and only on the live site.
    if ( !defined( 'CRON_EMAIL' ) || ( cf_is_local_dev_site() || cf_is_development_staging_site() || cf_is_staging_site() ) ) {
        return;
    }

	$to = CRON_EMAIL;
	$subject = esc_html( 'Email Test', 'core-functionality' );
	$body = esc_html( 'The email sent', 'core-functionality' );
	$headers = array('Content-Type: text/plain; charset=UTF-8');

	// Send email to corn monitor
	wp_mail( $to, $subject, $body, $headers );

}


function cf_add_cron_event_email_test() {

	// Don't run if not setup or not on live site
	if ( !defined( 'CRON_EMAIL' ) || ( cf_is_local_dev_site() || cf_is_development_staging_site() || cf_is_staging_site() ) ) {
        return;
    }


	// Check the task is not allready schedualed
	if ( ! wp_next_scheduled( 'cf_cron_email_test' ) ) {

		// Setup cron time stamp for midnight based on site gmt offset
		$gmt = get_option( 'gmt_offset' );
        $time = strtotime('midnight') + ((24 - $gmt) * HOUR_IN_SECONDS);
		if($time < time()) $time + (24 * HOUR_IN_SECONDS);

		wp_schedule_event( $time, 'daily', 'cf_cron_email_test' );

	}

}