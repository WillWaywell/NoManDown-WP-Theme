/* File: No Man Down JS
 * Copyright: 2012 No Man Down
 * Author: Will Waywell
 */
nmd = {};

nmd.hasPlaceholderSupport = function(){
  var input = document.createElement('input');
  return ('placeholder' in input);
}

$(function(){

	if(!nmd.hasPlaceholderSupport()) {
		$('input[type=text]').each(function() {
			$(this).val($(this).attr('placeholder'));
			
			
			$(this).focus(function(){
				if($(this).attr('value') == $(this).attr('placeholder')) { $(this).val(''); }
			});
			$(this).blur(function(){
				if($(this).attr('value') == '') { $(this).val($(this).attr('placeholder')); }
			});
		});
	}
	
	// Ajax overlay Post
	$('#head .links .link.six').click(function(){
		var sixButton = $(this);
		$('#blackout').show().animate({opacity: 1}, 400, function(){
			$('#loading').show().animate({opacity: 1}, 400);
		});
		
		
	    var data = {
			action: 			'overlay_post_process',
			security: 			overlay_params.login_nonce
		};
		
		// Ajax action
		jQuery.ajax({
			url: overlay_params.ajax_url,
			data: data,
			type: 'POST',
			dataType: 'json',
			success: function( result ) {
				$('.overlay.six .server-list .server:nth-child(1) .players .num').text(result['nmd_dayz']);
				$('.overlay.six .server-list .server:nth-child(2) .players .num').text(result['nmd_ace']);
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(errorThrown);
			},
			complete : function(){
				$('#loading').animate({opacity: 0}, 400, function(){
					$(this).hide();
					$('.overlay.six').css('scale', .7).show().animate({opacity: 1, scale: 1}, 400);
				});
				
			}
		});
	});	
	
	$('.overlay a.close, #blackout').click(function(){
		var overlay = $('.overlay:visible');
		
		overlay.animate({opacity: 0, scale: .7}, 400, function(){
			$(this).hide();
			$('#blackout').animate({opacity: 0}, 400, function(){$(this).hide()});
		});
	});
});