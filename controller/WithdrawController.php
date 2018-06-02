<?php
 $account_id = $_SESSION['id'];
$sql = "SELECT * FROM accounts WHERE id='$account_id'";
$query = connect()->query($sql);
if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $balance = $row['balance'];
    }
}

if (isset($_POST['amount']) && $balance > $_POST['amount']) {
    $amount = $_POST['amount'];
    $account_id = $_SESSION['id'];
    $account = $_SESSION['bvn'];
    $description = "You have Withdrawed: ".$amount. " L.E";
    $sql = "INSERT INTO `transaction`(`amount`,`type`,`acc_id`,`description`)VALUE ($amount,1,$account_id,'$description')";
    $query = connect()->query($sql);
    ?><?php
    $sql = "SELECT * FROM accounts WHERE id='$account_id'";
    $query = connect()->query($sql);
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $balance = $row['balance'];
        }
            $newBalance = $balance - $amount;
            $sql = "UPDATE `accounts` SET balance='$newBalance' WHERE id='$account_id'";
            $query = connect()->query($sql);
    }


} ?>