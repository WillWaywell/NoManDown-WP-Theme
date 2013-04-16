/**
 * File: Servers Overlay Ajax
 * Copyright: 2012 nomandown.com
 * Author: Will Waywell
 */
jQuery(function(){
	// SIX Servers Overlay
	jQuery('#links .link.six').click(function(){
		var sixButton = jQuery(this);
		jQuery('#blackout').transition(true, function(){
			jQuery('#loading').transition(true);
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
				jQuery('.overlay.six .server.dayz .details .players .num').text(result['nmd_dayz']['numplayers'] + ' / ' + result['nmd_dayz']['maxplayers']);
				jQuery('.overlay.six .server.ace .details .players .num').text(result['nmd_ace']['numplayers'] + ' / ' + result['nmd_ace']['maxplayers']);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				console.log(errorThrown);
			},
			complete: function(){
				jQuery('#loading').transition(false, function(){
					overlay = jQuery('.overlay.six');
					
					overlay.css('margin-top', -(overlay.outerHeight() / 2));
					overlay.css('margin-left', -(overlay.outerWidth() / 2));
					overlay.transition(true);
				});
			}
		});
	});
	
	// Handle overlay closing
	jQuery('.overlay a.close, #blackout').click(function(){
		overlay = jQuery('.overlay:visible');
		if(!overlay.hasClass('show')) return;
		
		overlay.transition(false, function(){
			jQuery('#blackout').transition(false);
		});
	});
});