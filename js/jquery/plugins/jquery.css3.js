/**
 * File: CSS3 Transitions and Support
 * Copyright: 2012 nomandown.com
 * Author: Will Waywell
 */
(function($){

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

$.fn.prepareTransition = function(){
	if(!$.support.transition) return this;
    return this.each(function(){
        var el = $(this);
        // remove the transition class upon completion
        el.one('TransitionEnd webkitTransitionEnd transitionend oTransitionEnd MSTransitionEnd', function(){
            el.removeClass('is-transitioning');
        });

        // check the various CSS properties to see if a duration has been set
        var cl = ["transition-duration", "-moz-transition-duration", "-webkit-transition-duration", "-o-transition-duration", "-ms-transition-duration"];
        var duration = 0;
        $.each(cl, function(idx, itm){
            duration || (duration = parseFloat( el.css( itm ) ));
        });

        // if I have a duration then add the class
        if (duration != 0) {
            el.addClass('is-transitioning');
            el[0].offsetWidth; // check offsetWidth to force the style rendering
        };
    });
};

$.fn.transition = function(show, callback) {
	var el = $(this);
	
	if(show){
		el.prepareTransition().addClass('show');
	} else {
		el.prepareTransition().removeClass('show');
	}
	
	if(callback == undefined) return;
	if($.support.transition){
		el.one('TransitionEnd webkitTransitionEnd transitionend oTransitionEnd MSTransitionEnd', callback);
	} else {
		callback(el);
	}
};

}(jQuery));