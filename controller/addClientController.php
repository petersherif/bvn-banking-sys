<?php
global $message;
if (isset($_POST['submit'])) {
    $pin_code = $_POST['pin_code'];
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
    } elseif ($_POST['pin_code'] == "") {
        $message = 'error';
    } else {
        $nat_id = $_POST['national_id'];
        $sql = "select * from users WHERE national_id='$nat_id'";
        $query = connect()->query($sql);
        if ($query->num_rows != 0) {
            $message = "exist";
        } else {
            $values = "'" . $_POST['full_name'] . "','" . $_POST['email'] . "','" . $_POST['national_id'] . "','" . $_POST['birthday'] . "','" . $_POST['gender'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','0'";
            $sql_user = "INSERT INTO users (`full_name`,`email`,`national_id`,`birthday`,`gender`,`address`,`phone`,`auth`)VALUES ($values)";
            $link = mysqli_connect("localhost", "root", "", "bvn_system");
            mysqli_query($link, $sql_user);
            $last_user_id = mysqli_insert_id($link);

            do {
                $acc_num = mt_rand(10000000000, 99999999999);
                $sql = "select * from accounts WHERE acc_num='$acc_num'";
                $query = connect()->query($sql);
            } while ($query->num_rows != 0);
            $card_num = 520072 . mt_rand(10, 99) . 68 . mt_rand(10, 99) . mt_rand(1000, 9999);
            $sql_acc = "INSERT INTO accounts (acc_num,card_num ,pin_code,balance,user_id,bank_id) VALUES ($acc_num,$card_num,$pin_code,0,$last_user_id,1)";
            $link = mysqli_connect("localhost", "root", "", "bvn_system");
            mysqli_query($link, $sql_acc);
            $last_acc_id = mysqli_insert_id($link);
            do {
                $bvnNumber = mt_rand(10000000000, 99999999999);
                $sql = "select * from bvn WHERE bvn_num='$bvnNumber'";
                $query = connect()->query($sql);
            } while ($query->num_rows != 0);
            $sql_bvn = "INSERT INTO bvn (bvn_num,user_id)VALUES ($bvnNumber,$last_user_id)";
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
                $card_num = $row->card_num;
            }
            $message = "success";
        }
    }
}


if (isset($_POST['createAccount'])) {
    if ($_POST['bvn_num'] == "") {
        $message = 'acc_error';
    } elseif ($_POST['pin_code'] == "") {
        $message = 'acc_error';
    } else {
        $bvn = $_POST['bvn_num'];
        $sql = "SELECT * FROM bvn WHERE bvn_num = $bvn";
        $query = connect()->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_object()) {
                $bvn_id = $row->id;
                $bvn_user_id = $row->user_id;
            }
            $sql = "SELECT * FROM accounts WHERE user_id='$bvn_user_id' AND bank_id=1";
            $query = connect()->query($sql);
            if ($query->num_rows > 0) {
                $message = 'acc_exist';
            } else {
                $pin_code = $_POST['pin_code'];
                do {
                    $acc_num = mt_rand(10000000000, 99999999999);
                    $sql = "select * from accounts WHERE acc_num='$acc_num'";
                    $query = connect()->query($sql);
                } while ($query->num_rows != 0);
                $card_num = 520072 . mt_rand(10, 99) . 68 . mt_rand(10, 99) . mt_rand(1000, 9999);
                $sql_acc = "INSERT INTO accounts (acc_num,card_num ,pin_code,balance,user_id,bank_id) VALUES ($acc_num,$card_num,$pin_code,0,$bvn_user_id,1)";
                $link = mysqli_connect("localhost", "root", "", "bvn_system");
                mysqli_query($link, $sql_acc);
                $last_acc_id = mysqli_insert_id($link);
                $sql = "INSERT INTO bvn_acc (bvn_id,acc_id)VALUES ($bvn_id,$last_acc_id)";
                $query = connect()->query($sql);

                $message = 'acc_success';

            }

        } else {
            $message = 'acc_not_exist';
        }
    }
}
?>