//load in jQuery plugin dependencies (eg. flexslider, smoothScroll etc.) in this file

// SMARTTIPS PLUGIN
var definitions = {
	'smarttips.js': "The smart and easy tooltip generator"
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
$('h2').wrapInTag({
  tag: 'span class="smartTip"',
  // applies Span tag to strings that match definitions.
  definitions : definitions
});


// END OF SMARTTIPS PLUGIN

