// Smooth Scroll for Anchor Links
//**********************************************
//* https://gist.github.com/jaredatch/debb30da7b1912d52acf9201fd4fc478

jQuery(function($){
	//Smooth scrolling anchor links
    function ea_scroll( hash ) {
        var target = $( hash );
        target = target.length ? target : $('[name=' + hash.slice(1) +']');
        if (target.length) {
            var top_offset = 0;
            if( $('body').hasClass('admin-bar') ) {
                top_offset = top_offset + $('#wpadminbar').height();
            }
            $('html,body').animate({
                 scrollTop: target.offset().top - top_offset
            }, 1000);
            return false;
        } else {
            return true;
        }
    }

    $('a[href*="#"]:not([href="#"]):not(.no-scroll)').click(function() {
        if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') || location.hostname === this.hostname) {
            history.pushState(null, null, this.hash);
            return ea_scroll( this.hash );
        }
    });
});
