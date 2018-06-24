<?php
$acc_id = $_SESSION['acc_id'];
$sql = "SELECT * FROM transaction WHERE acc_id= $acc_id ORDER BY id DESC $transactions_limit ";
$query = connect()->query($sql);
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);