(function( $ ){

	$.fn.teletype = function(opts){
			  var $el = this,
			  defaults = {
						animDelay: 200
			  },
			  settings = $.extend(defaults, opts);

			  $.each(settings.text.split(''), function(i, letter){
						setTimeout(function(){
								  $el.html($el.html() + letter);
						}, settings.animDelay * i);
			  });
	};

})( jQuery );