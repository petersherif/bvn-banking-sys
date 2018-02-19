$(document).ready(function () {

	// Add padding-left to body and navbar if the page has a sidebar
	let bodyAndNavbar = $('body, .navbar-custom'),
			hasSidebar = $('body').find('.sidebar'),
			sidebarWidth;

	hasSidebar ? (sidebarWidth = $('.sidebar').width(), bodyAndNavbar.css('paddingLeft', sidebarWidth)) : '';
	

	// Hides the page loader when the page load completely
	$(window).on('load', function() {
		$('.page-loading').fadeOut();
		// Body overflow is hidden by default. The next line adds to the body
		// the class .loaded{overflow-x: hidden; overflow-y: auto;}
		$('body').addClass('loaded');
	});
});