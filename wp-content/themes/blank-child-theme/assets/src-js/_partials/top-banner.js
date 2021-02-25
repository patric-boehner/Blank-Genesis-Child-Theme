/* MIT: https://github.com/js-cookie/js-cookie */

jQuery(document).ready(function($){

	var $body = $( 'body' );

	// Show if no cookie set.
	if ( ! Cookies.get( 'banner-hidden' ) ) {

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
		$( '.header-banner' ).fadeIn(function() {
			$(this).children('#banner__close').animate({
				opacity: 1
			}, 1000);

		});

	}

	function closeBanner() {
		$( '#banner__close' ).click(function() {

			$(this).parent().slideUp(function() {
				$body.removeClass( 'top-banner-visible' );
				$body.addClass( 'top-banner-hidden' );
			});

		});
	}

});
