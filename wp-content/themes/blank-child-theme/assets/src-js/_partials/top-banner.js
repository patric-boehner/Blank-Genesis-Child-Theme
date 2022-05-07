// Top Banner
// https://web-crunch.com/posts/lets-build-with-javascript-broadcast-bar-cookies

// Banner vars
var banner = document.querySelector('.block-content-area.banner');
var close_banner = document.querySelector('#banner__close');

// Cookie vars
var cookie_name = cookie_banner.name;
var cookie = readCookie( cookie_name );


// Show if no cookie set then run
if( cookie !== "true"  ) {

	// If the banner is set to hidden by default, set it to visible
	if( document.body.classList.contains('top-banner-hidden') ) {

		// Remove the hidden class
		document.body.classList.remove('top-banner-hidden');
		// Add the visible class
		document.body.classList.add('top-banner-visible');

	}

	// If the banner is set to be dismissable
	if( document.querySelector('.dismissable__button') ) {

		// Close banner on click and set cookie
		close_banner.addEventListener('click', function(e) {

			var cookie_name = cookie_banner.name;
			var cookie_value = 'true';
			var days_to_expire = cookie_banner.days;

			if( cookie !== "true") {

				// Add banner hidden class
				banner.classList.add('hidden');

				// Remove the visible class
				document.body.classList.remove('top-banner-visible');
				// Add the hidden class
				document.body.classList.add('top-banner-hidden');
				

				// Change area expanded state
				document.getElementById('banner__close').setAttribute('aria-expanded', 'false');


				// Create cookie
				createCookie(cookie_name, cookie_value, days_to_expire);

			}

			e.preventDefault();

		});

	}

}


// Create cookie
function createCookie(name, value, days) {

    var expires;
  
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = '; expires=' + date.toGMTString();
    } else {
      expires = '';
    }
  
    document.cookie = name + '=' + value + expires + '; path=/;samesite=strict;strict';

}


// Check if the cookie is present
function readCookie(name) {

	var nameEQ = name + "=";
	var ca = document.cookie.split(';');

	for (var i = 0; i < ca.length; i++) {
	  var c = ca[i];
	  while (c.charAt(0) == ' ') c = c.substring(1, c.length);
	  if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  
	}

	return null;

}