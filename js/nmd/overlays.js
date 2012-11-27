/**
 * File: Servers Overlay Ajax
 * Copyright: 2012 NoManDown
 * Author: Will Waywell
 */
(function($){

	$.fn.transitionElement = function(show, callback) {
		if(show){
			this.prepareTransition().addClass('show');
		} else {
			this.prepareTransition().removeClass('show');
		}
		
		if(callback == undefined) return;
		if($.support.transition){
			this.one('TransitionEnd webkitTransitionEnd transitionend oTransitionEnd MSTransitionEnd', callback);
		} else {
			callback(this);
		}
	};
  
})(jQuery);
 
$(function(){

	// SIX Servers Overlay
	$('#head .links .link.six').click(function(){
		var sixButton = $(this);
		$('#blackout').transitionElement(true, function(){
			$('#loading').transitionElement(true);
		});
			
	    var data = {
			action: 			'servers_overlay_process',
			security: 			servers_overlay_params.login_nonce
		};
		
		jQuery.ajax({
			url: ajaxurl,
			data: data,
			type: 'POST',
			dataType: 'json',
			success: function(result) {
				$('.overlay.six .server-list .server:nth-child(1) .players .num').text(result['nmd_dayz']['numplayers'] + ' / ' + result['nmd_dayz']['maxplayers']);
				$('.overlay.six .server-list .server:nth-child(2) .players .num').text(result['nmd_ace']['numplayers'] + ' / ' + result['nmd_ace']['maxplayers']);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(errorThrown);
			},
			complete: function(){
				$('#loading').transitionElement(false, function(){
					$('.overlay.six').transitionElement(true);
				});
			}
		});
	});	
	
	// Handle overlay closing
	$('.overlay a.close, #blackout').click(function(){
		var overlay = $('.overlay:visible');
		
		overlay.transitionElement(false, function(){
			$('#blackout').transitionElement(false);
		});
	});
});