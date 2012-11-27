/**
 * File: NoManDown - General Javascript
 * Copyright: 2012 NoManDown
 * Author: Will Waywell
 */
nmd = {};

$.support.placeholder = (function(){ 
	var input = document.createElement('input');
	return ('placeholder' in input);
})();

$.support.transition = (function(){ 
    var thisBody = document.body || document.documentElement,
    thisStyle = thisBody.style,
    support = thisStyle.transition !== undefined || thisStyle.WebkitTransition !== undefined || thisStyle.MozTransition !== undefined || thisStyle.MsTransition !== undefined || thisStyle.OTransition !== undefined;
    
    return support; 
})();

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