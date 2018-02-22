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
	<title>BVN - Login</title>

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

	<!-- Login Page Header -->
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center">
					<img src="<?php echo $img; ?>full-logo.png" alt="BVN" class="header__logo v-mid" />
				</div>
			</div>
		</div>
	</header>

	<!-- Login form -->
	<section class="login-section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center">
					<h2 class="section__heading text-center color-text">Login to BVN</h2>
				</div> <!-- Section Heading -->
			</div> <!-- Heading Row -->

			<div class="row">
				<div class="col-xs-12">

					<div class="light-box light-box--small form-box">
						<!-- action="dashboard.php" is a placeholder and must be changed for backend -->
						<form action="dashboard.php" class="form-box__form">
						
							<div class="form-group">
								<i class="fa fa-user"></i>
								<input type="text" placeholder="Username or Email" id="username" class="form-control">
							</div>
						
							<div class="form-group">
								<i class="fa fa-lock"></i>
								<input type="password" placeholder="Password" id="password" class="form-control">
								<a href="#" class="helper">Forgot?</a>
							</div>
						
							<div class="form-group">
								<i class="fa fa-university"></i>
								<input type="text" placeholder="Bank Name" id="bank-name" class="form-control">
							</div>
							
							<div class="form-group">
								<input type="submit" value="log in" class="submit form-control btn btn-block btn-primary">
							</div>
						
							<div class="form-group form-group--options">
								<input type="checkbox" class="remember-me" id="remember-me">
								<label for="remember-me">
									<span>Remember me</span>
								</label>
							</div>
						
						</form>
					</div>
				</div> <!-- Login Form -->
			</div> <!-- Login Form Row -->
		</div> <!-- Container -->
	</section>

	<?php include_once($templates . 'shared-components.php'); ?>

	<!-- *********** Scripts *********** -->
	<?php include_once($templates . 'scripts.php'); ?>
	
</body>
</html>
