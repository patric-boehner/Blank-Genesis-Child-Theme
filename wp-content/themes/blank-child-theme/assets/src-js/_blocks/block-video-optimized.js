// Optimized Video block

// https://webdesign.tutsplus.com/tutorials/how-to-lazy-load-embedded-youtube-videos--cms-26743

( function() {

	var embed_video = document.querySelectorAll( ".video-block__wrapper" );
	
	for (var i = 0; i < embed_video.length; i++) {
		
    embed_video[i].addEventListener( "click", function() {

					var iframe = document.createElement( "iframe" );

              iframe.setAttribute( "loading", "lazy" );
              iframe.setAttribute( "title", this.dataset.title );
              iframe.setAttribute( "width", "560" );
              iframe.setAttribute( "height", "315" );
              iframe.setAttribute( "allow", "autoplay; fullscreen; encrypted-media; gyroscope; picture-in-picture;" );
							iframe.setAttribute( "frameborder", "0" );
							iframe.setAttribute( "allowfullscreen", "" );

              // Youtube
              if( this.dataset.src === 'www.youtube.com' ){

                iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?autoplay=1&modestbranding=1&rel=0&iv_load_policy=3&color=white" );

              }
              // Vimeo
              if( this.dataset.src === 'player.vimeo.com' ){

                iframe.setAttribute( "src", "https://player.vimeo.com/video/"+ this.dataset.embed +"?autoplay=1&title=0&byline=0&portrait=0" );

              }
              

							this.innerHTML = "";
							this.appendChild( iframe );
				} );	
	}
	
} )();