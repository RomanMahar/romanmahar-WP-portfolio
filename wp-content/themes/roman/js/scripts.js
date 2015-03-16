$(function(){
	$(window).scroll(function(){

		var testScroll = $(window).scrollTop();	
		console.log("testing >>", testScroll);

		if(testScroll > 150){
			$("header, .headerBG").addClass("scrollin");
		} else{
			$("header, .headerBG").removeClass("scrollin");
		}

	});

	$("#fadeMessage").focus(function() {
        	$('#fadeLabel').addClass('hider');
	});

	$("#fadeMessage").focusout(function() {
        	$('#fadeLabel').removeClass('hider');
	});
});