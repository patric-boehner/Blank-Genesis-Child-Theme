//* http://janhoek.com/a-simple-smooth-back-to-top-button-for-genesis/
//* http://codyhouse.co/gem/back-to-top/

jQuery(document).ready(function($){
	// Scroll (in pixels) after which the "To Top" link is shown
	var offset = 300,
		//Scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//Duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//Get the "To Top" link
		$back_to_top = $('.to-top');
 
	//Visible or not "To Top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('top-is-visible') : $back_to_top.removeClass('top-is-visible top-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('top-fade-out');
		}
	});
 
	//Smoothy scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});
 
});