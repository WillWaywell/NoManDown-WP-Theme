/**
 * File: Servers Overlay Ajax
 * Copyright: 2012 nomandown.com
 * Author: Will Waywell
 */
$(function(){
	// SIX Servers Overlay
	$('#links .link.six').click(function(){
		var sixButton = $(this);
		$('#blackout').transition(true, function(){
			$('#loading').transition(true);
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
			success: function(result){
				$('.overlay.six .server.dayz .details .players .num').text(result['nmd_dayz']['numplayers'] + ' / ' + result['nmd_dayz']['maxplayers']);
				$('.overlay.six .server.ace .details .players .num').text(result['nmd_ace']['numplayers'] + ' / ' + result['nmd_ace']['maxplayers']);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				console.log(errorThrown);
			},
			complete: function(){
				$('#loading').transition(false, function(){
					overlay = $('.overlay.six');
					
					overlay.css('margin-top', -(overlay.outerHeight() / 2));
					overlay.css('margin-left', -(overlay.outerWidth() / 2));
					overlay.transition(true);
				});
			}
		});
	});
	
	// Handle overlay closing
	$('.overlay a.close, #blackout').click(function(){
		overlay = $('.overlay:visible');
		
		overlay.transition(false, function(){
			$('#blackout').transition(false);
		});
	});
});