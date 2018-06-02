<?php
if (isset($_POST['submit'])) {
    $bvn = $_POST['bvn'];
    if ($bvn) {
        global $message;
        if ($_POST['bvn'] == "") {
        } else {
            $sql = "SELECT * FROM accounts WHERE acc_num = $bvn";
            $query = connect()->query($sql);
            if ($query->num_rows != 0) {
                while ($row = $query->fetch_assoc()) {
                    $id = $row['id'];
                    $user_id = $row['user_id'];
                    $bvn = $row['bvn_num'];
                    $_SESSION['loggedbvn'] = "yes";
                    $_SESSION['id'] = $sender_id;
                    $_SESSION['id'] = $id;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['bvn'] = $bvn;
                    $_SESSION['acc_id'] = $acc_id;
                    $URL = "Location: home.php";
                    header($URL);
                    exit;
                }
            } else {
                $message = "Please, Enter Valid BVN OR Account Number";
            }
        }
    } else {
        $message = "Please, Enter Valid BVN OR Account Number";

    }
}


if (isset($_POST['submit_bvn'])) {
    global $message;
    $bvnNumber = $_POST['bvnNumber'];
    $user_id = $_SESSION["user_id"];
    if ($_POST['bvnNumber'] == "") {
        $message = 'error';
    } else {

        $sql = "select * from bvn WHERE  user_id=$user_id";
        $query = connect()->query($sql);

        if ($query->num_rows != 0) {
            $message = "exist";
        } else {
            $values = "'" . $_POST['bvnNumber'] . "','" . $_SESSION["user_id"] . "'";
            $sql3 = "insert into bvn (`bvn_num`,`user_id`)VALUES ($values)";
            $query = connect()->query($sql3);
            $link = mysqli_connect("localhost", "root", "", "bvn_system");
            mysqli_query($link, $sql3);
            $last_id = mysqli_insert_id($link);
            $acc_id = $_SESSION['id'];

            $sql = "insert into bvn_acc (`bvn_id`,`acc_id`)VALUES ($last_id,$acc_id)";
            $query = connect()->query($sql);
            $message = 'success';

        }
    }
}


?>