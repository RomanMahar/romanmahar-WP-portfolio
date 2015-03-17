//load in jQuery plugin dependencies (eg. flexslider, smoothScroll etc.) in this file

// SMARTTIPS PLUGIN
var definitions = {
	'smarttips.js': "Tooltips appear whenever you hover over a <span> with the class of smartTip.",
  'javascript': "a dynamic computer programming language. It is most commonly used as part of Web browsers, whose implementations allow client-side scripts to interact with the user, control the browser, communicate asynchronously, and alter the document content that is displayed.",
  'tooltip': "A media popup with information. Often a definition or set of instructions."
}

// This function will find the strings in "words :" and surround them with a span tag
$.fn.wrapInTag = function(opts) {
  
  var tag = opts.tag || 'strong',
  // Here we are passing the 'Keys' from the definitions object
      words = Object.keys(opts.definitions) || [],
      regex = RegExp(words.join('|'), 'gi'),
      replacement = '<'+ tag +'>$&</'+ tag +'>';
  
  return this.html(function() {
    return $(this).text().replace(regex, replacement);
  });
};

// for this demo file I have chosen to select strings 
// within 'h1', 'p', 'ol li', and 'a' elements
// You can choose to look for strings in just 'p' or 
// anything that you would like to search in
$('h2, #smartTips').wrapInTag({
  tag: 'span class="smartTip"',
  // applies Span tag to strings that match definitions.
  definitions : definitions
});

// This activates the tooltip when the mouse enters the smartTip span
$('span.smartTip').on('mouseenter', function(){
  $(this).addClass('animate');
  var tip = $('<div>').addClass('tooltip').fadeIn( 300 );
  // this next line is meant to store the string within span so that we can search it
  var thisString = $(this).text().toLowerCase();
  console.log(thisString);
  $(this).append(tip.text(definitions[thisString]));

// this chains another .on event 
}).on('mouseleave', function (){
  console.log("hi!");
  $(this).removeClass('animate');
  $(this).find(".tooltip").remove();
});


// END OF SMARTTIPS PLUGIN

