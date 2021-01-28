$(document).ready(function(){

	$("#open-menu").click(function(){
		$("#menu-background").css({"right":"-64%"});
		$("#mobile-links").removeClass("mobile-links-right");
		$("#mobile-links").addClass("mobile-links-left");
	});

	$("#close-menu").click(function(){
		$("#menu-background").css({"right":"-200%"});
		$("#mobile-links").removeClass("mobile-links-left");
		$("#mobile-links").addClass("mobile-links-right");
	});

	// Duration of the top scrolling animation (in ms)
	scroll_top_duration = 300,
	// Grab the "back to top" link
	$back_to_top = $('#top');

	// Smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

	// Fix Top Button after Certain Scroll
	var top = $("#top");

	$(window).on("scroll", function(e) {
	    
	  if ($(window).scrollTop() > 480) {
	    top.addClass("fixed");
	  } else {
	    top.removeClass("fixed");

	    //setTimeout(function() { top.removeClass("fixed"); } , 300);
	  }
	  
	});

});