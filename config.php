<?php 

    $dsn = 'mysql:host=localhost;dbname=bvn_system';
    $user = 'root';
    $pass = '';
    $option = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'Set NAMES utf8',
    );

    try{
        $con = new PDO($dsn, $user, $pass, $option);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo 'Failed To Connect'. '  ' . $e->getMessage();

    }
