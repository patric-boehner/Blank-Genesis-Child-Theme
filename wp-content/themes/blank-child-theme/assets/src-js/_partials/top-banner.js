/* MIT: https://github.com/js-cookie/js-cookie */

(function($, Cookies) {
	var socialnav = false;
	var socialnavtop = 0;
	var $body = $( 'body' );
	var days_to_expire = dismissal_length.value.days;

	// Alway show top banner in Customizer.
	$( document ).ready( function() {

		if ( $body.hasClass( 'customizer-preview' ) ) {
			$body.removeClass( 'top-banner-hidden' );
			$body.addClass( 'top-banner-visible' );
			showBanner();
		}

	});

	// Show if no cookie set.
	if ( ! Cookies.get( 'top-banner-hidden' ) ) {

		$( document ).ready( function() {

			// Replace body class.
			if ( $body.hasClass( 'top-banner-hidden' ) ) {
				$body.removeClass( 'top-banner-hidden' );
				$body.addClass( 'top-banner-visible' );
			}

			// Show banner.
			showBanner();

			// Set cookie when closing.
			closeBanner();
		});


	}

	function showBanner() {
		$( '.top-banner' ).fadeIn(function() {
			$(this).children('#top-banner__close').animate({
				opacity: 1
			}, 1000);

		});

	}

	function closeBanner() {
		$( '#top-banner__close' ).click(function() {

			$(this).parent().slideUp(function() {
				$body.removeClass( 'top-banner-visible' );
				$body.addClass( 'top-banner-hidden' );
			});
			Cookies.set( 'top-banner-hidden', 'true', { expires: days_to_expire } );

		});
	}

})(jQuery, Cookies);
