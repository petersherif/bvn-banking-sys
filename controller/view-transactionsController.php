<?php
$id=$_SESSION['id'];
$sql = "SELECT * FROM transaction WHERE acc_id= $id ORDER BY id DESC $transactions_limit ";
$query = connect()->query($sql);
$row = mysqli_fetch_all($query,MYSQLI_ASSOC);