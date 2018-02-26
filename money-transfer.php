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
	<title>BVN - Money Transfer</title>

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

		$MoneyTransActive = 'active';
		include_once($templates . 'sidebar.php');

	?>

	

	<!-- Money Transfer form -->
	<section class="money-trans-section">
		<div class="container">

			<div class="row">
				<div class="col-xs-12 text-center">
					<h2 class="section__heading text-center color-text">Money Transfer</h2>
				</div> <!-- Section Heading -->
			</div> <!-- Heading Row -->

			<div class="row">
				<div class="col-xs-12">

					<div class="light-box form-box">
						<form action="" class="form-box__form">
						
							<div class="form-group">
								<i class="fa fa-inbox"></i>
								<input type="text" placeholder="Enter the Reciever Account Number or BVN" id="acc-num" class="form-control">
							</div>

							<div class="form-group">
								<i class="fa fa-money"></i>
								<input type="text" placeholder="Enter the Amount to Transfer" id="deposit-amount" class="form-control">
							</div>

							<div class="form-group">
								<input type="submit" value="Transfer" class="submit form-control btn btn-block btn-primary">
							</div>

						</form>
					</div>
				</div> <!-- Money Transfer Form -->
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
