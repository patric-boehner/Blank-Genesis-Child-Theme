jQuery(function( $ ){

	$("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .nav-secondary .genesis-nav-menu").addClass("responsive-menu").before('<div class="responsive-menu-icon"></div>');

	$(".responsive-menu-icon").click(function(){
		$(this).next("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .nav-secondary .genesis-nav-menu").slideToggle();
		// Add "menu-open" class to icon when menu is toggled to change style
		$(".responsive-menu-icon").toggleClass('menu-open');

	});

	$(window).resize(function(){
		// Largest breaking point
		if(window.innerWidth > 1139) {
			$("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .nav-secondary .genesis-nav-menu, nav .sub-menu").removeAttr("style");
			$(".responsive-menu > .menu-item").removeClass("menu-open");
			// Remove "menu-open" class when the the screen is greater-than to avoid the issue of the close icon staying on when the screen is resized when the mobile menu is open.
			$(".responsive-menu-icon").removeClass('menu-open');
		}
	});

	//* Submenu Support
	$(".responsive-menu > .menu-item").click(function(event){
		if (event.target !== this)
		return;
			$(this).find(".sub-menu:first").slideToggle(function() {
			$(this).parent().toggleClass("menu-open");
		});
	});

});
