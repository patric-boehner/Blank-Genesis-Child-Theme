/*
 * Simpel Social Share Link Popouts
 * Original sample comes from Jared Atchison
 * http://www.jaredatchison.com/code/create-manual-social-media-share-buttons/
 *
 */

jQuery(document).ready(function($){

	$(".share-links__link").click(function(event){
		event.preventDefault();
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
	});

});
