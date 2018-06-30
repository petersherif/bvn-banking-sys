<?php
$acc_id = $_SESSION['acc_id'];
$sql = "SELECT * FROM transaction WHERE acc_id= $acc_id ORDER BY id DESC $transactions_limit";
$query = connect()->query($sql);
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM transfer WHERE sender_id= $user_id || receiver_id=$user_id ORDER BY id DESC $transfer_limit";
$query = connect()->query($sql);
$row_transfer = mysqli_fetch_all($query, MYSQLI_ASSOC);