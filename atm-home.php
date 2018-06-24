<?php
ob_start();
session_start();
include_once('includes/connect.php');
if (isset($_GET['atmEndProcess'])) {
    unset($_SESSION['loggedatmbvn']);
    unset($_SESSION['atm_bvn_id']);
    unset($_SESSION['atm_acc_id']);
    unset($_SESSION['atm_user_id']);
    unset($_SESSION['atm_acc_num']);
    $URL = "Location: atm-home.php";
    header($URL);
}
if (!$_SESSION['loggedatmbvn']) {
    $URL = "Location: atm-index.php";
    header($URL);
    exit;
}

if (isset($_SESSION['loggedatmbvn'])){
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="csrf_token()">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/base/jquery-ui.css" rel="stylesheet"
          type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
    <script type="text/javascript">
    <![endif]-->
</head>

<body class="loaded">

<!-- Content -->
<?php
if (str_replace('/bvn-banking-sys', '', $_SERVER['REQUEST_URI']) == '/atm-home.php') {
    include('dashboard/atm-main.php');
} else {
    include('includes/content.php');

}
} else {
    header('location:atm-index.php');
    exit();
}
?>


<!-- jQuery v.3.3.1 Library -->
<script src="assets/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap v.3.3.7 JS -->
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Chart.js Library -->
<script src="assets/vendor/chart.js/Chart.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/main.js"></script>

<script src="assets/ajax/ajax.js"></script>
</body>
</html>