<?php include_once('init.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	
	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo $img; ?>favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo $img; ?>favicon.ico" type="image/x-icon">
	<title>BVN - Dashboard</title>

	<!-- Normalize libirary - To Make browsers render all elements more consistently. -->
	<link href="<?php echo $vendor; ?>normalize.min.css" rel="stylesheet">

	<!-- Bootstrap v.3.3.7 CSS -->
	<link href="<?php echo $vendor; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Tachyons css library - Allows us to write less custom css code -->
	<link href="<?php echo $vendor; ?>tachyons/css/tachyons.min.css" rel="stylesheet">

	<!-- Fontawesome library - for icons -->
	<link href="<?php echo $vendor; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?php echo $css; ?>main.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body class="">

	<!-- Navbar -->
	<?php include_once($templates . 'navbar.php'); ?>


	<!-- Sidebar -->
	<?php

		$DashboardActive = 'active';
		include_once($templates . 'sidebar.php');

	?>

	<!-- BVN login form -->
	<section class="login-section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">

					<div class="light-box light-box--small form-box">
						<form action="" class="form-box__form">
						
							<div class="form-group">
								<i class="fa fa-user"></i>
								<input type="text" placeholder="Enter client BVN or account number" id="username" class="form-control">
							</div>
						
							<div class="form-group">
								<input type="submit" value="enter" class="submit form-control btn btn-block btn-primary">
							</div>
						
						</form>
					</div>
				</div> <!-- BVN login Form -->
			</div> <!-- Row -->
		</div> <!-- Container -->
	</section>

	<!-- Date and Time box, Currency Rate Graph and Table -->
	<section class="dashboard-components">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-sm-offset-1 col-lg-3">
					<div class="row">
						<div class="col-xs-12">
							<div class="light-box light-box--small date-time-box">
								<p class="date"></p>
								<p class="time">
									<span class="hr"></span>
									<span class="min"></span>
									<span class="sec"></span>
									<span class="ampm"></span></p>
							</div>
						</div> <!-- Date and Time Box -->
					</div>

					<div class="row">
						<div class="col-xs-12">
							<div class="light-box light-box--small cur-rate-box">
								<h4 class="cur-rate__heading">Currency Exchange Rate</h4>
								<ul class="cur-rate__table">
									<li class="table__row">
										<span class="row__cell row__cell--heading">cur</span>
										<span class="row__cell row__cell--heading">Sell</span>
										<span class="row__cell row__cell--heading">Buy</span>
									</li>
									<li class="table__row">
										<span class="row__cell row__cell--heading">usd</span>
										<span class="row__cell">18.00</span>
										<span class="row__cell">17.60</span>
									</li>
									<li class="table__row">
										<span class="row__cell row__cell--heading">eur</span>
										<span class="row__cell">23.00</span>
										<span class="row__cell">20.83</span>
									</li>
									<li class="table__row">
										<span class="row__cell row__cell--heading">gdp</span>
										<span class="row__cell">23.40</span>
										<span class="row__cell">22.30</span>
									</li>
									<li class="table__row">
										<span class="row__cell row__cell--heading">cad</span>
										<span class="row__cell">16.40</span>
										<span class="row__cell">15.30</span>
									</li>
								</ul>
							</div>
						</div> <!-- Currency Rate Box -->
					</div>
				</div> <!-- Date and Time Box & Cur Rate Table -->

				<div class="col-xs-12 col-sm-6 col-lg-7">
					<div class="row">
						<div class="col-xs-12">
							<div class="light-box light-box--small rate-chart-box">
								<canvas id="rate-chart"></canvas>
							</div>
						</div>
					</div>
				</div> <!-- Cur Rate Chart -->
			</div>
		</div>
	</section>

	<?php
		//include_once($templates . 'shared-components.php'); 

		//<!-- *********** Scripts *********** -->
		include_once($templates . 'scripts.php');
	  ?>

</body>
</html>
