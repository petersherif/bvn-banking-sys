<?php 
	// Start Session
	session_start();
	
	if(isset($_SESSION['username'])){
		header('location:dashboard.php'); // Redirect To Dashboard Page
		exit();
	}

	include_once('init.php');

	// Check If The User Coming From HTTP POST Request 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$username = $_POST['username'];
		$password = $_POST['password'];
		$bankName = $_POST['bankName'];
		$hashedPassword = sha1($password);

		// select the required user form database
		$stmt = $con -> prepare("SELECT * FROM users WHERE user_name = ? AND password = ?");
		$stmt -> execute(array($username, $hashedPassword));
		$row = $stmt -> fetch();
		$count = $stmt -> rowCount();

		if($count > 0){
			$_SESSION['username'] = $username; // Add Session UserName
			$_SESSION['id'] = $row['id'];  // Add Session ID
			header('location:dashboard.php'); // Redirect To Dashboard Page
			exit();
		}
		if($username != $row['user_name']){
			$error = 'Invalid Username Or Password';
		}
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
						<form action="index.php" class="form-box__form" method="POST"> 
							<?php
								if(isset($error)){
									echo $error;
								} 
							?> 
							<div class="form-group">
								<i class="fa fa-user"></i>
								<input type="text" placeholder="Username" name="username" id="username" class="form-control" autocomplete="off" required="required">
							</div>
						
							<div class="form-group">
								<i class="fa fa-lock"></i>
								<input type="password" placeholder="Password" name="password" id="password" class="form-control" autocomplete="new-password" required="required">
								<a href="#" class="helper">Forgot?</a>
							</div>

							<div class="form-group">
								<i class="fa fa-university"></i>
								<input type="text" placeholder="Bank Name" name="bankName" id="bank-name" class="form-control" required="required">
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

	<?php
	
		//include_once($templates . 'shared-components.php');

		// *********** Scripts *********** 
		include_once($templates . 'scripts.php');

	 ?>
	
</body>
</html>
