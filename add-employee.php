<?php
 	include_once('init.php'); 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$fullname 	= $_POST['fullname'];
		$password	= $_POST['password'];
		$hashedPass	= sha1($password);
		$nat_id 	= $_POST['nat_id'];
		$birthdate 	= $_POST['birthdate'];
		$gender 	= $_POST['gender'];
		$address 	= $_POST['address'];
		$email 		= $_POST['email'];
		$phone		= $_POST['phone'];
		$auth 		= $_POST['auth'];
		$formError	= array();

		// Upload Selected Photo To img folder
		$photoName 	= $_FILES['photo']['name'];
		$target_dir = 'img/';
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
       
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       
        // Valid file extensions
		$extensions_arr = array("jpg","jpeg","png","gif");
		
		if(empty($fullname)){
			$formError['fullname'] 	= 'Full Name Can not Be Empty';
		}
		if(empty($password)){
			$formError['password'] 	= 'Password Can not Be Empty';
		}
		if(empty($nat_id)) {
			$formError['nat_id'] 	= 'National ID Can not Be Empty';
		}
		if(empty($birthdate)) {
			$formError['birthdate'] = 'Birthdate Can not Be Empty';
		}
		if(empty($gender)) {
			$formError['gender'] 	= 'Gender Can not Be Empty';
		}
		if(empty($address)) {
			$formError['address'] 	= 'Address Can not Be Empty';
		}
		if(empty($email)) {
			$formError['email'] 	= 'Email Can not Be Empty';
		}
		if(empty($phone)) {
			$formError['phone'] 	= 'Phone Can not Be Empty';
		}
 		if(empty($photoName)) {
			$formError['photoName'] = 'Picture Can not Be Empty'; 
		}
		if(empty($phone)) {
			$formError['auth'] 		= 'auth Can not Be Empty';
		}

		if(empty($formError)) {
			$stmt = $con -> prepare("INSERT INTO users (user_name, password, email, national_id, birthday, gender, phone, thumb, auth)
												 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt -> execute(array($fullname, $hashedPass, $email, $nat_id, $birthdate, $gender, $phone, $photoName, $auth));

			// Upload Image
			move_uploaded_file($_FILES['photo']['tmp_name'],$target_dir.$photoName);
			
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
						<form action="add-employee.php" class="form-box__form" method="POST" enctype='multipart/form-data'>
						
							<div class="form-group">
								<i class="fa fa-user"></i>
								<input type="text" name="fullname" placeholder="Enter the Employee's Full Name" id="fullname" class="form-control" required="required">
							</div>
							<?php if(isset($formError['fullname'])) echo $formError['fullname'] ?>

							<div class="form-group">
								<i class="fa fa-user"></i>
								<input type="password" name="password" placeholder="Enter the Employee's password" id="password" class="form-control" required="required">
							</div>
							<?php if(isset($formError['password'])) echo $formError['password'] ?>

							<div class="form-group">
								<i class="fa fa-barcode"></i>
								<input type="text" name="nat_id" placeholder="Enter the Employee's Nationallity ID" id="nat-id" class="form-control" required="required">
							</div>
							<?php if(isset($formError['nat_id'])) echo $formError['nat_id'] ?>
							
							<div class="form-group">
								<i class="fa fa-birthday-cake"></i>
								<input type="date" name="birthdate" placeholder="Enter the Employee's Birthdate" id="birthdate" class="form-control" required="required">
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
								<input type="text" name="address" placeholder="Enter the Employee's Address" id="address" class="form-control" required="required">
							</div>
							<?php if(isset($formError['address'])) echo $formError['address'] ?>

							<div class="form-group">
								<i class="fa fa-envelope"></i>
								<input type="email" name="email" placeholder="Enter the Employee's Email Address" id="email" class="form-control" required="required">
							</div>
							<?php if(isset($formError['email'])) echo $formError['email'] ?>

							<div class="form-group">
								<i class="fa fa-phone"></i>
								<input type="text" name="phone" placeholder="Enter the Employee's Phone Number" id="phone-num" class="form-control" required="required">
							</div>
							<?php if(isset($formError['phone'])) echo $formError['phone'] ?>

							<div class="form-group">
								<i class="fa fa-user-circle"></i>
								<input type="file" name="photo" placeholder="Upload the Employee's Picture" id="photo" class="form-control" required="required">
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
