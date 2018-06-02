<?php

if (isset($_POST['submit'])) {
    global $message;
    $username = $_POST['user_name'];
    $email = $_POST['email'];
    if ($_POST['user_name'] == "") {
        $message = 'error';

    } elseif ($_POST['email'] == "") {
        $message = 'error';
    } elseif ($_POST['password'] == "") {
        $message = 'error';
    } elseif ($_POST['full_name'] == "") {
        $message = 'error';
    } elseif ($_POST['national_id'] == "") {
        $message = 'error';
    } elseif ($_POST['birthday'] == "") {
        $message = 'error';
    } elseif ($_POST['phone'] == "") {
        $message = 'error';
    } elseif ($_POST['address'] == "") {
        $message = 'error';
    } elseif ($_POST['auth'] == "") {
        $message = 'error';
    } else {

        $sql = "select * from users WHERE user_name='$username' OR email='$email'";
        $query = connect()->query($sql);

        if ($query->num_rows != 0) {
            $message = "exist";
        } else {
            $target_dir = "./assets/files/users/thumb/";
            $target_file = $target_dir . basename($_FILES["thumb"]["name"]);
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["thumb"]["tmp_name"], $target_file);

            $values = "'" . $_POST['user_name'] . "','" . $_POST['full_name'] . "','" . $_POST['email'] . "','" . md5($_POST['password']) . "','" . $_POST['national_id'] . "','" . $_POST['birthday'] . "','" . $_POST['gender'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','" . $_FILES["thumb"]["name"] . "','" . $_POST['auth'] . "','" . $_SESSION["bank_id"] . "'";
            $sql = "insert into users (`user_name`,`full_name`,`email`,`password`,`national_id`,`birthday`,`gender`,`address`,`phone`,`thumb`,`auth`,bank_id)VALUES ($values)";
            $query = connect()->query($sql);
            $message = 'success';


        }
    }
}
?>