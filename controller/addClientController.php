<?php

if (isset($_POST['submit'])) {

    global $message;
    $email = $_POST['email'];
    if ($_POST['full_name'] == "") {
        $message = 'error';
    } elseif ($_POST['email'] == "") {
        $message = 'error';
    } elseif ($_POST['national_id'] == "") {
        $message = 'error';
    } elseif ($_POST['birthday'] == "") {
        $message = 'error';
    } elseif ($_POST['phone'] == "") {
        $message = 'error';
    } elseif ($_POST['address'] == "") {
        $message = 'error';
    } else {
        if ($_POST['bvn_check']) {
            $values = "'" . $_POST['full_name'] . "','" . $_POST['email'] . "','" . $_POST['national_id'] . "','" . $_POST['birthday'] . "','" . $_POST['gender'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','0','" . $_SESSION["bank_id"] . "'";
            $sql = "INSERT INTO users (`full_name`,`email`,`national_id`,`birthday`,`gender`,`address`,`phone`,`auth`,bank_id)VALUES ($values)";
            $query = connect()->query($sql);
            $sql = "SELECT id from users ORDER BY id DESC LIMIT 1";
            $query = connect()->query($sql);
            $row = $query->fetch_assoc();
            $id = $row['id'];
            $sql = "SELECT bvn_num from bvn ORDER BY bvn_num DESC LIMIT 1";
            $query = connect()->query($sql);
            $row = $query->fetch_assoc();
            if (count($row) == 0)
                $bvnNumber = 100000000;
            else
                $bvnNumber = $row['bvn_num'] + 1;

            $sql = "INSERT INTO bvn (bvn_num,user_id)VALUES ($bvnNumber,$id)";
            $query = connect()->query($sql);
            $message = "success";


        } elseif ($_POST['acc_check']) {

            $sql = "select * from users WHERE email='$email'";
            $query = connect()->query($sql);

            if ($query->num_rows != 0) {
                $message = "exist";
            } else {
                $message = "success";
                $values = "'" . $_POST['full_name'] . "','" . $_POST['email'] . "','" . $_POST['national_id'] . "','" . $_POST['birthday'] . "','" . $_POST['gender'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','0','" . $_SESSION["bank_id"] . "'";
                $sql = "INSERT INTO users (`full_name`,`email`,`national_id`,`birthday`,`gender`,`address`,`phone`,`auth`,bank_id)VALUES ($values)";
                $query = connect()->query($sql);
                $sql = "SELECT id from users ORDER BY id DESC LIMIT 1";
                $query = connect()->query($sql);
                $row = $query->fetch_assoc();
                $id = $row['id'];
                $sql = "SELECT acc_num from accounts ORDER BY acc_num DESC LIMIT 1";
                $query = connect()->query($sql);
                $row = $query->fetch_assoc();
                if (count($row) == 0)
                    $acc_num = 10000;
                else
                    $acc_num = $row['acc_num'] + 1;
                $sql = "INSERT INTO accounts (acc_num , user_id) VALUES ($acc_num,$id)";
                $query = connect()->query($sql);

            }
        } else {
            $sql = "select * from users WHERE email='$email'";
            $query = connect()->query($sql);

            if ($query->num_rows != 0) {
                $message = "exist";
            } else {
                $message = "success";
                $values = "'" . $_POST['full_name'] . "','" . $_POST['email'] . "','" . $_POST['national_id'] . "','" . $_POST['birthday'] . "','" . $_POST['gender'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','0','" . $_SESSION["bank_id"] . "'";
                $sql2 = "INSERT INTO users (`full_name`,`email`,`national_id`,`birthday`,`gender`,`address`,`phone`,`auth`,bank_id)VALUES ($values)";
                $query = connect()->query($sql2);
                $sql = "SELECT id from users ORDER BY id DESC LIMIT 1";
                $query = connect()->query($sql);
                $row = $query->fetch_assoc();
                $id = $row['id'];
                $sql = "SELECT acc_num from accounts ORDER BY acc_num DESC LIMIT 1";
                $query = connect()->query($sql);
                $row = $query->fetch_assoc();
                if (count($row) == 0)
                    $acc_num = 10000;
                else
                    $acc_num = $row['acc_num'] + 1;
                $sql = "INSERT INTO accounts (acc_num , user_id) VALUES ($acc_num,$id)";
                $query = connect()->query($sql);

                $link = mysqli_connect("localhost", "root", "", "bvn_system");
                mysqli_query($link, $sql2);
                $last_id = mysqli_insert_id($link);

                $sql = "INSERT INTO bvn (bvn_num,user_id)VALUES ($bvnNumber,$last_id)";
                $query = connect()->query($sql);


            }
        }
    }

}
?>