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

		$AddEmpActive = 'active';
		include_once($templates . 'sidebar.php');

	?>

	

	<!-- New Employee form -->
	<section class="new-employee-section">
		<div class="container">

			<div class="row">
				<div class="col-xs-12 text-center">
					<h2 class="section__heading text-center color-text">Add New Employee</h2>
				</div> <!-- Section Heading -->
			</div> <!-- Heading Row -->

			<div class="row">
				<div class="col-xs-12">

					<div class="light-box form-box">
						<form action="" class="form-box__form">
						
							<div class="form-group">
								<i class="fa fa-user"></i>
								<input type="text" placeholder="Enter the Employee's Full Name" id="fullname" class="form-control">
							</div>

							<div class="form-group">
								<i class="fa fa-barcode"></i>
								<input type="text" placeholder="Enter the Employee's Nationallity ID" id="nat-id" class="form-control">
							</div>

							<div class="form-group">
								<i class="fa fa-birthday-cake"></i>
								<input type="date" placeholder="Enter the Employee's Birthdate" id="birthdate" class="form-control">
							</div>

							<div class="form-group">
								<i class="fa fa-transgender"></i>
								<select id="gender" class="form-control">
									<option>Select the Employee's Gender</option>
									<option>Male</option>
									<option>Female</option>
								</select>
							</div>

							<div class="form-group">
								<i class="fa fa-map-marker"></i>
								<input type="text" placeholder="Enter the Employee's Address" id="address" class="form-control">
							</div>

							<div class="form-group">
								<i class="fa fa-envelope"></i>
								<input type="text" placeholder="Enter the Employee's Email Address" id="email" class="form-control">
							</div>

							<div class="form-group">
								<i class="fa fa-phone"></i>
								<input type="text" placeholder="Enter the Employee's Phone Number" id="phone-num" class="form-control">
							</div>

							<div class="form-group">
								<i class="fa fa-thumbs-up"></i>
								<input type="text" placeholder="Scan the Employee's Fingerprint" id="fingerprint" class="form-control">
							</div>

							<div class="form-group">
								<i class="fa fa-user-circle"></i>
								<input type="file" placeholder="Upload the Employee's Picture" id="picture" class="form-control">
							</div>
						
							<div class="form-group">
								<input type="submit" value="add new Employee" class="submit form-control btn btn-block btn-primary">
							</div>
						
						</form>
					</div>
				</div> <!-- New Employee Form -->
			</div> <!-- Row -->
		</div> <!-- Container -->
	</section>
	
	<?php
		//include_once($templates . 'shared-components.php'); 

		//<!-- *********** Scripts *********** -->
		include_once($templates . 'scripts.php');
	  ?>

</body>
</html>
