$(function(){

	// ADD CLASS TO NAVE BAR AFTER CROLLING DOWN
	$(window).scroll(function(){

		var testScroll = $(window).scrollTop();	
		

		if(testScroll > 150){
			$("header, .headerBG").addClass("scrollin");
		} else{
			$("header, .headerBG").removeClass("scrollin");
		}

	});


	// FADE IN/OUT "MESSAGE" LABEL IN FOOTER TEXTAREA
	//FADEOUT
	$("#fadeMessage").focus(function() {
        	$('#fadeLabel').addClass('hider');
	});

	//FADEIN
	$("#fadeMessage").focusout(function() {
        	$('#fadeLabel').removeClass('hider');
	});




	//DISPLAY BIG IMAGE ON CLICK ON PORTFOLIO PAGE

	var fullDiv = $('#spotlightImage');
	// bind all `.previews` anchor tags with a click event handler
	$('.imageHolder a').on('click', function(e) {

	console.log("hi People");

	//prevent default action
	e.preventDefault();

	// cache the item being clicked for later reference
	var clickedThumb = $(this);

	 // create an image element in the DOM
    var $img = $('<img>').attr('src', clickedThumb.data('largeimage'));

    // empty the `.full` div and `append` our newly created `$img`
    fullDiv.empty().append($img.hide().fadeIn('slow'));

    console.log("hi People");

	});



});