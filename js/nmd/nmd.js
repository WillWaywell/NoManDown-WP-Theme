/**
 * File: NoManDown - General Javascript
 * Copyright: 2012 nomandown.com
 * Author: Will Waywell
 */
nmd = {};

$(function(){
	if(!$.support.placeholder) {
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
});