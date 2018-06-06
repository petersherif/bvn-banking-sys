<?php
global $message;

if (isset($_POST['amount'])) {
    $amount = $_POST['amount'];
    $account_id = $_SESSION['acc_id'];
    $account = $_SESSION['bvn'];
    if ($_POST['amount'] == "") {
        $message = 'error';
    } else {
        $sql = "INSERT INTO `transaction`(`amount`,`type`,`acc_id`)VALUE ($amount,1,$account_id)";
        $query = connect()->query($sql);
        ?><?php
        $sql = "SELECT * FROM accounts WHERE id='$account_id'";
        $query = connect()->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $balance = $row['balance'];
            }
            if ($balance <= 0 || $balance < $amount) {
                $message = 'error';
            } else {
                $newBalance = $balance - $amount;
                $sql = "UPDATE `accounts` SET balance='$newBalance' WHERE id='$account_id'";
                $query = connect()->query($sql);
                $message = 'success';

            }
        }
    }

} ?>