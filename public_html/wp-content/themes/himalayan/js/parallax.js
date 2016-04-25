$(document).ready(function() {
	
	redrawDotNav();
	
	/* Scroll event handler */
    $(window).bind('scroll',function(e){
    	parallaxScroll();
		redrawDotNav();
    });
    
	/* Next/prev and primary nav btn click handlers */
	$('a.itinerary').click(function(){
    	$('html, body').animate({
    		scrollTop:0
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
	});
    $('a.glance').click(function(){
    	$('html, body').animate({
    		scrollTop:$('#glance').offset().top
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
    });
    $('a.accomodation_detail').click(function(){
    	$('html, body').animate({
    		scrollTop:$('#accomodation_detail').offset().top
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
    });
	 $('a.facts').click(function(){
    	$('html, body').animate({
    		scrollTop:$('#facts').offset().top
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
    });
	$('a.gallery').click(function(){
    	$('html, body').animate({
    		scrollTop:$('#gallery').offset().top
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
    });
	$('a.videos').click(function(){
    	$('html, body').animate({
    		scrollTop:$('#videos').offset().top
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
    });
	$('a.reviews').click(function(){
    	$('html, body').animate({
    		scrollTop:$('#reviews').offset().top
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
    });
	$('a.faqs').click(function(){
    	$('html, body').animate({
    		scrollTop:$('#faqs').offset().top
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
    });
	$('a.date_price1').click(function(){
    	$('html, body').animate({
    		scrollTop:$('#date_price1').offset().top
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
    });
	$('a.useful_info').click(function(){
    	$('html, body').animate({
    		scrollTop:$('#useful_info').offset().top
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
    });
	$('a.equipments').click(function(){
    	$('html, body').animate({
    		scrollTop:$('#equipments').offset().top
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
    });
    
    /* Show/hide dot lav labels on hover */
    $('nav#primary a').hover(
    	function () {
			$(this).prev('h1').show();
		},
		function () {
			$(this).prev('h1').hide();
		}
    );
    
});

/* Scroll the background layers */
function parallaxScroll(){
	var scrolled = $(window).scrollTop();
	$('#parallax-bg1').css('top',(0-(scrolled*.25))+'px');
	$('#parallax-bg2').css('top',(0-(scrolled*.5))+'px');
	$('#parallax-bg3').css('top',(0-(scrolled*.75))+'px');
}

/* Set navigation dots to an active state as the user scrolls */
function redrawDotNav(){
	var section1Top =  0;
	// The top of each section is offset by half the distance to the previous section.
	var section2Top =  $('#glance').offset().top - (($('#accomodation_detail').offset().top - $('#glance').offset().top) / 2);
	var section3Top =  $('#accomodation_detail').offset().top - (($('#facts').offset().top - $('#accomodation_detail').offset().top) / 2);
	var section4Top =  $('#facts').offset().top - (($('#gallery').offset().top - $('#facts').offset().top) / 2);
	var section5Top =  $('#gallery').offset().top - (($('#videos').offset().top - $('#gallery').offset().top) / 2);
	var section6Top =  $('#videos').offset().top - (($('#reviews').offset().top - $('#videos').offset().top) / 2);
	var section7Top =  $('#reviews').offset().top - (($('#faqs').offset().top - $('#reviews').offset().top) / 2);
	var section8Top =  $('#faqs').offset().top - (($('#date_price1').offset().top - $('#faqs').offset().top) / 2);
	var section9Top =  $('#date_price1').offset().top - (($('#useful_info').offset().top - $('#date_price1').offset().top) / 2);
	var section10Top =  $('#useful_info').offset().top - (($('#equipments').offset().top - $('#useful_info').offset().top) / 2);
	var section11Top =  $('#equipments').offset().top - (($(document).height() - $('#equipments').offset().top) / 2);
	$('nav#primary a').removeClass('active');
	if($(document).scrollTop() >= section1Top && $(document).scrollTop() < section2Top){
		$('nav#primary a.itinerary').addClass('active');
	} else if ($(document).scrollTop() >= section2Top && $(document).scrollTop() < section3Top){
		$('nav#primary a.glance').addClass('active');
	} else if ($(document).scrollTop() >= section3Top && $(document).scrollTop() < section4Top){
		$('nav#primary a.accomodation_detail').addClass('active');
	} else if ($(document).scrollTop() >= section4Top && $(document).scrollTop() < section5Top){
		$('nav#primary a.facts').addClass('active');
	} else if ($(document).scrollTop() >= section5Top && $(document).scrollTop() < section6Top){
		$('nav#primary a.gallery').addClass('active');
	} else if ($(document).scrollTop() >= section6Top && $(document).scrollTop() < section7Top){
		$('nav#primary a.video').addClass('active');
	} else if ($(document).scrollTop() >= section7Top && $(document).scrollTop() < section8Top){
		$('nav#primary a.reviews').addClass('active');
	} else if ($(document).scrollTop() >= section8Top && $(document).scrollTop() < section9Top){
		$('nav#primary a.faqs').addClass('active');
	} else if ($(document).scrollTop() >= section9Top && $(document).scrollTop() < section10Top){
		$('nav#primary a.date_price1').addClass('active');
	} else if ($(document).scrollTop() >= section10Top && $(document).scrollTop() < section11Top){
		$('nav#primary a.useful_info').addClass('active');
	} else if ($(document).scrollTop() >= section11Top){
		$('nav#primary a.equipments').addClass('active');
	}
	
}
