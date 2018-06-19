<?php
include "controller/atmLoginController.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">

	<!-- favicon -->
	<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
	<title>BVN - ATM</title>

	<!-- Normalize libirary - To Make browsers render all elements more consistently. -->
	<link href="assets/vendor/normalize.min.css" rel="stylesheet">

	<!-- Bootstrap v.3.3.7 CSS -->
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Tachyons css library - Allows us to write less custom css code -->
	<link href="assets/vendor/tachyons/css/tachyons.min.css" rel="stylesheet">

	<!-- Fontawesome library - for icons -->
	<link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="assets/css/main.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body class="">

<!-- ATM Login -->
<section class="login-section">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">

				<div class="light-box form-box form-box--full-width ba color-border-primary">
						
					<?php if (isset($message)) { ?>

						<div class="alert alert-danger">
							<button class="close" data-close="alert"></button>
							<span><?php echo $message; ?></span>
						</div>
						<?php
					} ?>

					<h2 class="text-center color-primary mb3 mt1">Welcome to BVN ATM</h2>
					<hr class="mt0 color-border-primary">
					<div class="row">

						<div class="col-xs-12 col-sm-3 col-sm-offset-0">
							<div class="row">
								<div class="col-xs-3 col-xs-offset-3 col-sm-12 col-sm-offset-0">
									<img src="assets/img/full-logo.png" alt="BVN" class="img-responsive mt3 mt5-l mb4"/>
								</div>
								<div class="col-xs-2 col-xs-offset-2 col-sm-6 col-sm-offset-2 text-center mt3 bt bw2 color-border-primary ph0">
									<i class="fa fa-credit-card icon-primary fa-3x rotate-90"></i>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-9">
							<p>Kindly, put your fingerprint to approve your identity!</p>
							<form class="form-box__form" method="post">
								<div class="form-group">
									<i class="fa fa-address-card"></i>
									<input type="text"
												 placeholder="Please insert your card number"
												 name="card_num"
												 id="cardnum"
										   	 class="form-control"
										   	 required="required">
								</div>

								<div class="form-group">
									<i class="fa fa-lock"></i>
									<input type="password"
												 placeholder="Please insert your BVN number"
												 name="bvn"
												 id="bvn"
										     class="form-control"
										     required="required">
								</div>

								<div class="form-group">
									<input type="submit" name="submit" value="enter"
										   class="submit form-control btn btn-block btn-primary">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div> <!-- Login Form -->
		</div> <!-- Login Form Row -->
	</div> <!-- Container -->
</section>

<!-- jQuery v.3.3.1 Library -->
<script src="assets/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap v.3.3.7 JS -->
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Chart.js Library -->
<script src="assets/vendor/chart.js/Chart.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/main.js"></script>

</body>
</html>
