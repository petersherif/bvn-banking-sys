$(document).ready(function () {
	$('.send_id').click(function(){
		var id=$(this).val();
	   $( '#get_id' ).val( id );
   });

	// Add padding-left to body and navbar if the page has a sidebar
	let bodyAndNavbar = $('body .container, body .container-fluid, .navbar-custom'),
			hasSidebar = $('body').find('.sidebar'),
			sidebarWidth;

	hasSidebar ? (sidebarWidth = $('.sidebar').width(), bodyAndNavbar.css('paddingLeft', sidebarWidth)) : '';
	
	$(window).resize(function() {
		hasSidebar ? (sidebarWidth = $('.sidebar').width(), bodyAndNavbar.css('paddingLeft', sidebarWidth)) : '';
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

	// Search Clients & Search Employees feature
  $(".search-bar__input").keyup(function () {
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

	// Confirm Deletion


  //Print Receipt
  $('.yes-print-receipt, .no-go-green').click(function(event) {
  	event.preventDefault();
  	$('.atm-receipt-box').addClass('dn');
  	$('.atm-finish-box').removeClass('dn');
  	if ($(this).hasClass('yes-print-receipt')) {
  		$('.atm__receipt-wrapper').removeClass('dn')
  		$('.atm__receipt-paper').addClass('print-receipt')
  	}
  });

  //Show last active tab after a page reload
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
		localStorage.setItem('lastActiveTab', $(e.target).attr('href'));
	});
	var lastActiveTab = localStorage.getItem('lastActiveTab');
	if(lastActiveTab){
		$('#main-tabs a[href="' + lastActiveTab + '"]').tab('show');
	}
});