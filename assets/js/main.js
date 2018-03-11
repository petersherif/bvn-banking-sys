$(document).ready(function () {

	// Add padding-left to body and navbar if the page has a sidebar
	let bodyAndNavbar = $('body, .navbar-custom'),
			hasSidebar = $('body').find('.sidebar'),
			sidebarWidth;

	hasSidebar ? (sidebarWidth = $('.sidebar').width(), bodyAndNavbar.css('paddingLeft', sidebarWidth)) : '';
	

	// Hides the page loader when the page load completely
	// $(window).on('load', function() {
	// 	$('.page-loading').fadeOut();
	// 	// Body overflow is hidden by default. The next line adds to the body
	// 	// the class .loaded{overflow-x: hidden; overflow-y: auto;}
	// 	$('body').addClass('loaded');
	// });

	// Move placeholder when focus

	$('[placeholder]').focus(function(){
		$(this).attr('text',$(this).attr('placeholder'));
		$(this).attr('placeholder','');
	}).blur(function(){
		$(this).attr('placeholder',$(this).attr('text'));
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


	// Drawing Currency Rate Chart
	
	var rateChartOut = $("#rate-chart");
	var rateChart    = new Chart(rateChartOut, {
		type: 'line',
		data: {
        labels: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        datasets: [{
            label: 'Buy',
            data: [17.60, 17.60, 17.60, 17.60, 17.60, 17.60, 17.60],
            backgroundColor: 'rgba(54, 162, 235, 0.4)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            fill: false
        }, {
        		label: 'Sell',
            data: [18.00, 18.00, 18.00, 18.00, 18.00, 18.00, 18.00],
            backgroundColor: 'rgba(255, 99, 132, 0.4)',
            borderColor: 'rgba(255,99,132,1)',
            borderWidth: 1,
            fill: false
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                	beginAtZero: false
                }
            }]
        }
    }
	});


	// Search Clients & Search Employees pages: search feature
  $(".search-bar__input").on('keyup', function () {
    var searchVal = $(this).val().toString().toLowerCase();

    $(".data-row").each(function(index, element) {
        var dataCellVal =  $(this).data('search').toString().toLowerCase();       

        if(dataCellVal.indexOf(searchVal) != -1) {
          $(this).show('3000');
        } else if(searchVal === '') {
          // If text input is empty show all
          $(this).show('3000');

        } else {
          $(this).hide('3000');
        }

        // if(dataCellVal.indexOf(text_filter_value) != -1) {
        //     $(this).show('slow');
        // } else if(text_filter_value === '') {
        //     // If text input is empty show all
        //     $(this).show('slow');
        // } else {
        //     $(this).hide('slow');
        // }
    });
  });
});