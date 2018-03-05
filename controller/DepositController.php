<?php
if (isset($_POST['amount'])) {
    $amount = $_POST['amount'];
    $account_id = $_SESSION['id'];
    $sql = "INSERT INTO `transaction`(`amount`,`type`,`acc_id`)VALUE ($amount,0,$account_id)";
    $query = connect()->query($sql);
    ?><?php
    $sql = "SELECT * FROM bvn JOIN accounts WHERE  accounts.id='$account_id'";
    $query = connect()->query($sql);
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $balance = $row['balance'];
        }
        $newBalance = $balance + $amount;
    }
    $sql = "UPDATE `accounts` SET balance='$newBalance' WHERE id='$account_id'";
    $query = connect()->query($sql);

} ?>
