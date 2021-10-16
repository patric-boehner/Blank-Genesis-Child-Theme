/*
 * Simpel Social Share Link Popouts
 * Original sample comes from Jared Atchison
 * http://www.jaredatchison.com/code/create-manual-social-media-share-share_links/
 *
 */

document.addEventListener("DOMContentLoaded", function(event) {

	var share_links = document.querySelectorAll('.share-links__link');

	for(var i = 0; i < share_links.length; i++){

	  share_links[i].addEventListener('click', function(e) {

		var window_size = "";
		var url = this.href;
		var domain = url.split("/")[2];
		switch(domain) {
			case "www.facebook.com":
				window_size = "width=585,height=368";
				break;
			case "www.twitter.com":
				window_size = "width=585,height=261";
				break;
			case "www.pinterest.com":
				window_size = "width=700,height=300";
				break;
			case "www.linkedin.com":
				window_size = "width=520,height=570";
				break;
			default:
				window_size = "width=585,height=511";
		}
		window.open(url, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,' + window_size);

		e.preventDefault();

	  }, false);

	}

  });