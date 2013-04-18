/**
 * File: Intel Slider plugin for jQuery
 * Copyright: 2012 nomandown.com
 * Author: Will Waywell
 */
(function($){

	$(function(){
		
		$( '.intel-slider .head .navigation a' ).click(function( e ){
			e.preventDefault();
			clearInterval( intervalHandle );
			changeSlide( this );
		});

		changeSlide = function( navLink ) {
			var $linkTo = $( navLink );
			var $slider = $linkTo.parents( '.intel-slider' );
			var index = $linkTo.index();
			var $linkFrom = $slider.find( '.navigation a.active' );
			var $slideFrom = $slider.find( '.slides .slide.active' );
			var $slideTo = $slider.find( '.slides .slide:eq(' + index + ')' );
			
			if( $linkTo.hasClass( 'active' ) ) return;
			
			$linkFrom.removeClass( 'active' );
			$linkTo.addClass( 'active' );
			$slideFrom.transition( false, 'active' );
			$slideTo.transition( true, 'active' );
		}; 
		
		var intervalHandle = setInterval(function(){
				var navLinkCount = $( '.intel-slider .head .navigation a' ).length;
				var $navLinkActive = $( '.intel-slider .head .navigation a.active' );
				
				if( ( $navLinkActive.index() + 1 ) == navLinkCount) {
					changeSlide( ( $navLinkActive.siblings()[0] ) );
				} else {
					changeSlide( ( $navLinkActive.next() ) );
				}

		}, 5000);
		
	});

}(jQuery));