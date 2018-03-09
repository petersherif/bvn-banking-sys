<?php

if (isset($_POST['submit'])) {
    $values = "'" . $_POST['full_name'] . "','" . $_POST['email'] . "','" . $_POST['national_id'] . "','" . $_POST['birthday'] . "','" . $_POST['gender'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','0','" . $_SESSION["bank_id"] . "'";
    $sql = "insert into users (`full_name`,`email`,`national_id`,`birthday`,`gender`,`address`,`phone`,`auth`,bank_id)VALUES ($values)";
    echo mysql_insert_id();
    $query = connect()->query($sql);
    $message = 'success';
    
    

}
?>