<?php
if (isset($_POST['submit'])) {
    global $message;
    $account_id = $_POST['acc_num'];
    $amount = $_POST['amount'];
    $sender_name = $_POST['sender_name'];
    $nat_id = $_POST['nat_id'];

    if ($_POST['amount'] == "") {
        $message = 'error';
    } elseif ($_POST['acc_num'] == "") {
        $message = 'error';
    } elseif ($_POST['nat_id'] == "") {
        $message = 'error';
    } else {
        $sql = "SELECT * FROM  accounts WHERE acc_num='$account_id'";
        $query = connect()->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $balance = $row['balance'];
                $account_id = $row['id'];
                $_SESSION['id'] = $account_id;
            }
            $sql = "INSERT INTO `transaction`(amount,type,acc_id,sender_name,nat_id)VALUE ($amount,0,$account_id,'$sender_name','$nat_id')";
            $query = connect()->query($sql);
            $newBalance = $balance + $amount;
            $sql = "UPDATE `accounts` SET balance='$newBalance' WHERE id='$account_id'";
            $query = connect()->query($sql);
            $message = 'success';

        } else {
            $message = 'exist';

        }
    }
}
?>
