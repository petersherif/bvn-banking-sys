<?php

if (isset($_POST['email'])) {

    $target_dir = "./assets/files/users/thumb/";
    $target_file = $target_dir . basename($_FILES["thumb"]["name"]);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file);

    $values = "'" . $_POST['user_name'] . "','" . $_POST['full_name'] . "','" . $_POST['email'] . "','" . md5($_POST['password']) . "','" . $_POST['national_id'] . "','" . $_POST['birthday'] . "','" . $_POST['gender'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','" . $_FILES["thumb"]["name"] . "','" . $_POST['auth'] . "','" . $_SESSION["bank_id"] . "'";
    $sql = "insert into users (`user_name`,`full_name`,`email`,`password`,`national_id`,`birthday`,`gender`,`address`,`phone`,`thumb`,`auth`,bank_id)VALUES ($values)";
    $query = connect()->query($sql);
    $message = 'success';


}
?>