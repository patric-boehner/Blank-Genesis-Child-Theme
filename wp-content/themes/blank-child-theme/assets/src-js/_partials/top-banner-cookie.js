jQuery(document).ready(function($){

	// Key under which name the cookie is saved
    const cookieName = 'banner-hidden';
    // The value could be used to store different levels of consent
    const cookieValue = 'true';
    // Number of days the banner is dismissed
    var days_to_expire = dismissal_length.days;

    function dismiss() {
        const date = new Date();
        // Cookie is valid for preset time: now + (days x hours x minutes x seconds x milliseconds)
        date.setTime(date.getTime() + (days_to_expire * 24 * 60 * 60 * 1000));
        // Set cookie
        document.cookie = `${cookieName}=${cookieValue};expires=${date.toUTCString()};path=/;samesite=strict;strict`;

        // You probably want to remove the banner
        document.querySelector('.header-banner').remove();
    }

    // Get button element
    const buttonElement = document.querySelector('#banner__close');
    // Maybe cookie consent is not present
    if (buttonElement) {
        // Listen on button click
        buttonElement.addEventListener('click', dismiss);
    }
	
});