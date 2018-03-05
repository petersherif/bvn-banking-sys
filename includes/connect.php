<?php

function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bvn_system";
    $connect = mysqli_connect($servername, $username, $password, $dbname);
    return $connect;
}

?>

