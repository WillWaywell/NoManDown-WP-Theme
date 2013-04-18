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

$.fn.setupTransition = function(){
	if(!$.support.transition) return this;
    return this.each(function(){
        var el = $(this);
        // remove the transition class upon completion
        el.one('TransitionEnd webkitTransitionEnd transitionend oTransitionEnd MSTransitionEnd', function(){
            el.removeClass('is-transitioning');
        });

		el.addClass('is-transitioning');
		el[0].offsetWidth; // check offsetWidth to force the style rendering
    });
};

$.fn.transition = function(show, className,callback) {
	var el = $(this);
	
	if(show){
		el.setupTransition().addClass(className);
	} else {
		el.setupTransition().removeClass(className);
	}
	
	if(callback == undefined) return;
	if($.support.transition){
		el.one('TransitionEnd webkitTransitionEnd transitionend oTransitionEnd MSTransitionEnd', callback);
	} else {
		callback(el);
	}
};

}(jQuery));