<?php
    
    session_start(); // Start The Session 
    if(isset($_GET['endProcess'])){
    $_SESSION['ClientAccountNum']="";
    header("location:dashboard.php");
    exit(); }
    session_unset(); // Unset The Data
    session_destroy(); // Destroy The Session

    header('location: index.php');
    exit();