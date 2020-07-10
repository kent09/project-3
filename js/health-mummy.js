(function($) {

	$(".view-package").click(function(e) {
		e.preventDefault();
		var $href = $(this).attr('href');
	    $('html, body').animate({
	        scrollTop: $($href).offset().top
	    }, 800);
	});

})( jQuery );