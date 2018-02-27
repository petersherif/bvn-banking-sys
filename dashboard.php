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
<?php
if (str_replace('/bvn-banking-sys', '', $_SERVER['REQUEST_URI']) == '/' || str_replace('/bvn-banking-sys', '', $_SERVER['REQUEST_URI']) == '/dashboard.php' || str_replace('/bvn-banking-sys', '', $_SERVER['REQUEST_URI']) == '') {
    include('./main.php');
} else {
    include_once($templates . 'content.php');
}
?>

<?php
//include_once($templates . 'shared-components.php');

//<!-- *********** Scripts *********** -->
include_once($templates . 'scripts.php');
?>

</body>
</html>
