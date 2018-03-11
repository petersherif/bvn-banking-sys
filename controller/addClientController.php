<?php

if (isset($_POST['email'])) {
    $values = "'" . $_POST['full_name'] . "','" . $_POST['email'] . "','" . $_POST['national_id'] . "','" . $_POST['birthday'] . "','" . $_POST['gender'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','0','" . $_SESSION["bank_id"] . "'";
    $sql = "INSERT INTO users (`full_name`,`email`,`national_id`,`birthday`,`gender`,`address`,`phone`,`auth`,bank_id)VALUES ($values)";
    $query = connect()->query($sql);


}
?>