/**
 * File: NoManDown - General Javascript
 * Copyright: 2012 nomandown.com
 * Author: Will Waywell
 */
nmd = {};

$(function(){
	$( '#title_console' ).teletype( { animDelay: 100, text: $( '#page_title noscript' ).text() } );
});