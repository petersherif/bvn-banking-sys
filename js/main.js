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


	// Append date and time to date and time box
	var dateTimeBox = $('.date-time-box'),
			dOut 				= dateTimeBox.find('.date'),
			hOut				= dateTimeBox.find('.hr'),
			mOut				= dateTimeBox.find('.min'),
			sOut				= dateTimeBox.find('.sec'),
			ampmOut				= dateTimeBox.find('.ampm');

	var months = [
		'January', 'February', 'March', 'April', 'May',
		'June', 'July', 'August', 'September', 'October',
		'November', 'December'
	];

	var days = [
		'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday',
		'Friday', 'Saturday'
	];

	function updateClock() {
		var date = new Date();

		// Initializing Date
		var dayOfWeek = days[date.getDay()];
		var month		= months[date.getMonth()];
		var day  			= date.getDate();
		var year			= date.getFullYear();

		var dateString = dayOfWeek + ' ' + day + ' ' + month + ' ' + year;
		
		// Initializing Clock
		var hours = date.getHours() == 0
								? 12
								: date.getHours() > 12
									? date.getHours() - 12
									: date.getHours();

		var minutes = date.getMinutes() < 10
									? '0' + date.getMinutes()
									: date.getMinutes();

		var seconds = date.getSeconds() < 10
									? '0' + date.getSeconds()
									: date.getSeconds();

		// Stting AM or PM
		var ampm = date.getHours() < 12
								? 'AM'
								: 'PM';

		dOut.text(dateString);
		hOut.text(hours + ':');
		mOut.text(minutes + ':');
		sOut.text(seconds + ' ');
		ampmOut.text(ampm);

	}

	updateClock();
	window.setInterval(updateClock, 1000);

});