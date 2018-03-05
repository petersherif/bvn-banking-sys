<?php
if (isset($_POST['acc_num'])) {
    $account_id = $_POST['acc_num'];
    $amount = $_POST['amount'];
    $sql = "SELECT * FROM  accounts WHERE acc_num='$account_id'";
    $query = connect()->query($sql);
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $balance = $row['balance'];
            $account_id = $row['id'];
            $_SESSION['id'] = $account_id;


        }
        $sql = "INSERT INTO `transaction`(`amount`,`type`,`acc_id`)VALUE ($amount,1,$account_id)";
        $query = connect()->query($sql);
        $newBalance = $balance + $amount;
    }
    $sql = "UPDATE `accounts` SET balance='$newBalance' WHERE id='$account_id'";
    $query = connect()->query($sql);
}
?>
