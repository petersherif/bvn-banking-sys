<?php
global $message;
if (isset($_POST['submit'])) {
    if ($_POST['acc_num'] == "") {
        $message = "error";
    } else {
        $acc_num = $_POST['acc_num'];
        $sql = "SELECT * FROM accounts WHERE acc_num='$acc_num'";
        $query = connect()->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_object()) {
                $account_id = $row->id;
                $user_id = $row->user_id;
            }
            $sql = "SELECT bvn_num from bvn ORDER BY bvn_num DESC LIMIT 1";
            $query = connect()->query($sql);
            $row = $query->fetch_assoc();
            if (count($row) == 0)
                $bvnNumber = 100000000;
            else
                $bvnNumber = $row['bvn_num'] + 1;
            $sql_bvn = "INSERT INTO bvn (bvn_num,user_id)VALUES ($bvnNumber,$user_id)";
            $link = mysqli_connect("localhost", "root", "", "bvn_system");
            mysqli_query($link, $sql_bvn);
            $last_bvn_id = mysqli_insert_id($link);
            $sql_bvn_acc = "INSERT INTO bvn_acc (bvn_id,acc_id)VALUES ($last_bvn_id,$account_id)";
            $link = mysqli_connect("localhost", "root", "", "bvn_system");
            mysqli_query($link, $sql_bvn_acc);
            $last_bvn_acc = mysqli_insert_id($link);
            $message = "success";
            $sql = "SELECT * From bvn WHERE id='$last_bvn_id'";
            $query = connect()->query($sql);
            while ($row = $query->fetch_object()) {
                $bvn_num = $row->bvn_num;
            }
            $message = "success";
        }
    }
}


if (isset($_POST['add'])) {
    $acc_num = $_POST['acc_num'];
    $bvn_num = $_POST['bvn_num'];
    if ($_POST['acc_num'] == "") {
        $message = "error";
    } else if ($_POST['bvn_num'] == "") {
        $message = "error";
    } else {
        $sql = "select * from bvn WHERE  bvn_num='$bvn_num'";
        $query = connect()->query($sql);
        while ($row = $query->fetch_object()) {
            $bvn_id = $row->id;
            $bvn_user_id = $row->user_id;
        }
        if ($query->num_rows != 0) {
            $sql = "select * from accounts WHERE  acc_num='$acc_num'";
            $query = connect()->query($sql);
            while ($row = $query->fetch_object()) {
                $acc_id = $row->id;
                $acc_user_id = $row->user_id;
            }
            if ($bvn_user_id == $acc_user_id) {
                $sql_bvn_acc = "INSERT INTO bvn_acc (bvn_id,acc_id)VALUES ($bvn_id,$acc_id)";
                $query = connect()->query($sql_bvn_acc);
                $message = "success";
            } else {
                $message = 'error';
            }

        } else {
            $message = "exist";
        }
    }
}


?>

