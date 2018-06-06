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
        if ($_POST['customRadio'] == 0) {
            $nat_id = $_POST['national_id'];
            $sql = "select * from users WHERE national_id='$nat_id'";
            $query = connect()->query($sql);

            if ($query->num_rows != 0) {
                $message = "exist";
            } else {

                $values = "'" . $_POST['full_name'] . "','" . $_POST['email'] . "','" . $_POST['national_id'] . "','" . $_POST['birthday'] . "','" . $_POST['gender'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','0'";
                $sql = "INSERT INTO users (`full_name`,`email`,`national_id`,`birthday`,`gender`,`address`,`phone`,`auth` )VALUES ($values)";
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

                $sql_only_bvn = "INSERT INTO bvn (bvn_num,user_id)VALUES ($bvnNumber,$id)";
                $link = mysqli_connect("localhost", "root", "", "bvn_system");
                mysqli_query($link, $sql_only_bvn);
                $last_only_bvn_id = mysqli_insert_id($link);

                $sql = "SELECT * From bvn WHERE id='$last_only_bvn_id'";
                $query = connect()->query($sql);
                while ($row = $query->fetch_object()) {
                    $only_bvn_num = $row->bvn_num;
                }

                $message = "success_bvn";
            }

        } elseif ($_POST['customRadio'] == 1) {

            $nat_id = $_POST['national_id'];
            $sql = "select * from users WHERE national_id='$nat_id'";
            $query = connect()->query($sql);

            if ($query->num_rows != 0) {
                $message = "exist";
            } else {
                $values = "'" . $_POST['full_name'] . "','" . $_POST['email'] . "','" . $_POST['national_id'] . "','" . $_POST['birthday'] . "','" . $_POST['gender'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','0'";
                $sql = "INSERT INTO users (`full_name`,`email`,`national_id`,`birthday`,`gender`,`address`,`phone`,`auth`)VALUES ($values)";
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
                $sql_only_acc = "INSERT INTO accounts (acc_num , user_id,bank_id) VALUES ($acc_num,$id,1)";
                $link = mysqli_connect("localhost", "root", "", "bvn_system");
                mysqli_query($link, $sql_only_acc);
                $last_only_acc_id = mysqli_insert_id($link);
                $message = "success";
                $sql = "SELECT * From accounts WHERE id='$last_only_acc_id'";
                $query = connect()->query($sql);
                while ($row = $query->fetch_object()) {
                    $only_acc_num = $row->acc_num;
                }
                $message = "success_acc";
            }
        } else if ($_POST['customRadio'] == 2) {
            $nat_id = $_POST['national_id'];
            $sql = "select * from users WHERE national_id='$nat_id'";
            $query = connect()->query($sql);

            if ($query->num_rows != 0) {
                $message = "exist";
            } else {
                $values = "'" . $_POST['full_name'] . "','" . $_POST['email'] . "','" . $_POST['national_id'] . "','" . $_POST['birthday'] . "','" . $_POST['gender'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','0'";
                $sql = "INSERT INTO users (`full_name`,`email`,`national_id`,`birthday`,`gender`,`address`,`phone`,`auth`)VALUES ($values)";
                $query = connect()->query($sql);
                $sql = "SELECT id from users ORDER BY id DESC LIMIT 1";
                $query = connect()->query($sql);
                $row = $query->fetch_assoc();
                $id = $row['id'];
                $sql = "SELECT acc_num from accounts ORDER BY acc_num DESC LIMIT 1";
                $query = connect()->query($sql);
                $row = $query->fetch_assoc();
                if (count($row) == 0) {
                    $acc_num = 10000;
                } else {
                    $acc_num = $row['acc_num'] + 1;
                    $sql_acc = "INSERT INTO accounts (acc_num , user_id,bank_id) VALUES ($acc_num,$id,1)";
                    $link = mysqli_connect("localhost", "root", "", "bvn_system");
                    mysqli_query($link, $sql_acc);
                    $last_acc_id = mysqli_insert_id($link);

                }
                $sql = "SELECT bvn_num from bvn ORDER BY bvn_num DESC LIMIT 1";
                $query = connect()->query($sql);
                $row = $query->fetch_assoc();
                if (count($row) == 0)
                    $bvnNumber = 100000000;
                else
                    $bvnNumber = $row['bvn_num'] + 1;

                $sql_bvn = "INSERT INTO bvn (bvn_num,user_id)VALUES ($bvnNumber,$id)";
                $link = mysqli_connect("localhost", "root", "", "bvn_system");
                mysqli_query($link, $sql_bvn);
                $last_bvn_id = mysqli_insert_id($link);

                $sql_bvn_acc = "INSERT INTO bvn_acc (bvn_id,acc_id)VALUES ($last_bvn_id,$last_acc_id)";
                $link = mysqli_connect("localhost", "root", "", "bvn_system");
                mysqli_query($link, $sql_bvn_acc);
                $last_bvn_acc = mysqli_insert_id($link);
                $message = "success";

                $sql = "SELECT * From bvn WHERE id='$last_bvn_id'";
                $query = connect()->query($sql);
                while ($row = $query->fetch_object()) {
                    $bvn_num = $row->bvn_num;
                }
                $sql = "SELECT * From accounts WHERE id='$last_acc_id'";
                $query = connect()->query($sql);
                while ($row = $query->fetch_object()) {
                    $acc_num = $row->acc_num;
                }
                $message = "success_both";

            }
        }
    }

}
?>