/**
 * File: NoManDown - General Javascript
 * Copyright: 2012 NoManDown
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
});