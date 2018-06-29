// Hides the page loader when the page load completely
$(window).on('load', function() {
	$('#page-loading').fadeOut();
	// Body overflow is hidden by default. The next line adds to the body
	// the class .loaded{overflow-x: hidden; overflow-y: auto;}
	$('body').addClass('loaded');
});