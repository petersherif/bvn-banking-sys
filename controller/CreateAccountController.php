<?php
global $message;
if (isset($_POST['createAccount'])) {
    $bvn_id = $_SESSION['bvn_id'];

    $sql = "SELECT * FROM bvn WHERE id='$bvn_id'";
    $query = connect()->query($sql);
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_object()) {
            $bvn = $row->id;
            $user_id = $row->user_id;
        }
        $sql = "SELECT * FROM users WHERE id='$user_id'";
        $query = connect()->query($sql);
        while ($row = $query->fetch_object()) {
            $id = $row->id;
        }
        $sql = "SELECT acc_num from accounts ORDER BY acc_num DESC LIMIT 1";
        $query = connect()->query($sql);

        $row = $query->fetch_assoc();
        if (count($row) == 0)
            $accNumber = 10505650000;
        else
            $accNumber = $row['acc_num'] + 1;

        $sql = "INSERT INTO accounts (acc_num,user_id,bank_id)VALUES ($accNumber,$id,1)";
        $link = mysqli_connect("localhost", "root", "", "bvn_system");
        mysqli_query($link, $sql);
        $last_id = mysqli_insert_id($link);

        $sql = "INSERT INTO bvn_acc (bvn_id,acc_id)VALUES ($bvn_id,$last_id)";
        $query = connect()->query($sql);

        $sql = "select accounts.id,accounts.acc_num
from accounts inner join bvn_acc
on bvn_acc.acc_id=accounts.id
WHERE bvn_acc.acc_id='$last_id'";
        $query = connect()->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_object()) {
                $account_num = $row->acc_num;
            }
            $message = 'success';

        }
    }
}

if (isset($_POST['selectAccount'])) {
    if ($_POST['nat_id'] == "") {
        $message = 'error';
    } else {
        $nat_id = $_POST['nat_id'];
        $user = $_SESSION['user_id'];
        $sql = "SELECT accounts.id,accounts.acc_num FROM accounts JOIN users WHERE accounts.user_id=users.id AND  users.national_id='$nat_id'  ";
        $query = connect()->query($sql);
        if ($query->num_rows > 0) {
            $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
        } else {
            $message = 'error2';
        }

    }
} else if (isset($_POST['add-account'])) {
    $account_id = $_POST['check_number'];
    $sql = "SELECT * FROM bvn_acc WHERE acc_id='$account_id'";
    $query = connect()->query($sql);
    if ($query->num_rows > 0) {
        $message = 'exist';
    } else {
        $bvn_id = $_SESSION['bvn_id'];
        $sql = "INSERT INTO bvn_acc (bvn_id,acc_id)VALUES ($bvn_id,$account_id)";
        $query = connect()->query($sql);
        $message = 'success';
    }
}


?>