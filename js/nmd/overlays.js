/**
 * File: Servers Overlay Ajax
 * Copyright: 2012 NoManDown
 * Author: Will Waywell
 */
$(function(){

	// SIX Servers Overlay
	$('#head .links .link.six').click(function(){
		var sixButton = $(this);
		$('#blackout').show().animate({opacity: 1}, 400, function(){
			$('#loading').show().animate({opacity: 1}, 400);
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
				$('.overlay.six .server-list .server:nth-child(1) .players .num').text(result['nmd_dayz']);
				$('.overlay.six .server-list .server:nth-child(2) .players .num').text(result['nmd_ace']);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(errorThrown);
			},
			complete: function(){
				$('#loading').animate({opacity: 0}, 400, function(){
					$(this).hide();
					$('.overlay.six').css('scale', .7).show().animate({opacity: 1, scale: 1}, 400);
				});
			}
		});
	});	
	
	// Handle overlay closing
	$('.overlay a.close, #blackout').click(function(){
		var overlay = $('.overlay:visible');
		
		overlay.animate({opacity: 0, scale: .7}, 400, function(){
			$(this).hide();
			$('#blackout').animate({opacity: 0}, 400, function(){$(this).hide()});
		});
	});
});