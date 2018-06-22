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
            $sql = "SELECT acc_num from accounts ORDER BY acc_num DESC LIMIT 1";
            $query = connect()->query($sql);
            $row = $query->fetch_assoc();
            if (count($row) == 0)
                $acc_num = 15789711190111589;
            else
                $acc_num = $row['acc_num'] + 8848;
            $card_num = 5264730568882987 + $last_user_id + $pin_code;
            echo $last_user_id;
            $sql_acc = "INSERT INTO accounts (acc_num,card_num ,pin_code,balance,user_id,bank_id) VALUES ($acc_num,$card_num,$pin_code,0,$last_user_id,1)";
            $link = mysqli_connect("localhost", "root", "", "bvn_system");
            mysqli_query($link, $sql_acc);
            $last_acc_id = mysqli_insert_id($link);
            $sql = "SELECT bvn_num from bvn ORDER BY bvn_num DESC LIMIT 1";
            $query = connect()->query($sql);
            $row = $query->fetch_assoc();
            if (count($row) == 0)
                $bvnNumber = 100000000;
            else
                $bvnNumber = $row['bvn_num'] + 1;
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
?>