<?php 
	if (isset($_SESSION["ClientAccountId"]) && !empty($_SESSION["ClientAccountId"])){
		
		header("location:dashboard.php");
		exit();
	}
?>
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
						<form action="dashboard.php?add-employee&done" class="form-box__form" method="POST" enctype='multipart/form-data'>
						
							<div class="form-group">
								<i class="fa fa-user"></i>
								<input type="text" name="fullname" placeholder="Enter the Employee's Full Name" id="fullname" class="form-control" >
							</div>
							<?php if(isset($formError['fullname'])) echo $formError['fullname'] ?>

							<div class="form-group">
								<i class="fa fa-user"></i>
								<input type="password" name="password" placeholder="Enter the Employee's password" id="password" class="form-control" >
							</div>
							<?php if(isset($formError['password'])) echo $formError['password'] ?>

							<div class="form-group">
								<i class="fa fa-barcode"></i>
								<input type="text" name="nat_id" placeholder="Enter the Employee's Nationallity ID" id="nat-id" class="form-control" >
							</div>
							<?php if(isset($formError['nat_id'])) echo $formError['nat_id'] ?>
							
							<div class="form-group">
								<i class="fa fa-birthday-cake"></i>
								<input type="date" name="birthdate" placeholder="Enter the Employee's Birthdate" id="birthdate" class="form-control" >
							</div>
							<?php if(isset($formError['birthdate'])) echo $formError['birthdate'] ?>

							<div class="form-group">
								<i class="fa fa-transgender"></i>
								<select id="gender" name="gender" class="form-control">
									<option value="0">Select the Employee's Gender</option>
									<option value="1">Male</option>
									<option value="2">Female</option>
								</select>
							</div>
							<?php if(isset($formError['gender'])) echo $formError['gender'] ?>

							<div class="form-group">
								<i class="fa fa-map-marker"></i>
								<input type="text" name="address" placeholder="Enter the Employee's Address" id="address" class="form-control" >
							</div>
							<?php if(isset($formError['address'])) echo $formError['address'] ?>

							<div class="form-group">
								<i class="fa fa-envelope"></i>
								<input type="email" name="email" placeholder="Enter the Employee's Email Address" id="email" class="form-control" >
							</div>
							<?php if(isset($formError['email'])) echo $formError['email'] ?>

							<div class="form-group">
								<i class="fa fa-phone"></i>
								<input type="text" name="phone" placeholder="Enter the Employee's Phone Number" id="phone-num" class="form-control" >
							</div>
							<?php if(isset($formError['phone'])) echo $formError['phone'] ?>

							<div class="form-group">
								<i class="fa fa-user-circle"></i>
								<input type="file" name="photo" placeholder="Upload the Employee's Picture" id="photo" class="form-control" >
							</div>
							<?php if(isset($formError['photoName'])) echo $formError['photoName'] ?>

							<div class="form-group">
								<i class="fa fa-briefcase"></i>
								<select id="gender" name="auth" class="form-control">
									<option value="0">Select the Employee's Authorization</option>
									<option value="1">Employee</option>
									<option value="2">Manager</option>
								</select>
							</div>
							<?php if(isset($formError['auth'])) echo $formError['auth'] ?>

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