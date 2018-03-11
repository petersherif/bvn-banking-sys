<?php

if (isset($_POST['email'])) {
    $values = "'" . $_POST['full_name'] . "','" . $_POST['email'] . "','" . $_POST['national_id'] . "','" . $_POST['birthday'] . "','" . $_POST['gender'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','0','" . $_SESSION["bank_id"] . "'";
    $sql = "INSERT INTO users (`full_name`,`email`,`national_id`,`birthday`,`gender`,`address`,`phone`,`auth`,bank_id)VALUES ($values)";
    $query = connect()->query($sql);
    $sql = "SELECT id from users ORDER BY id DESC LIMIT 1";
    $query = connect()->query($sql);
    $row = $query->fetch_assoc();
    $id=$row['id'];
    $sql = "SELECT acc_num from accounts ORDER BY acc_num DESC LIMIT 1";
    $query = connect()->query($sql);
    $row = $query->fetch_assoc();
    if(count($row)==0)
    $acc_num=10000;
  	else
    $acc_num=$row['acc_num'] + 1;
    $sql = "INSERT INTO accounts (acc_num , user_id) VALUES ($acc_num,$id)";
    $query = connect()->query($sql);



}
?>