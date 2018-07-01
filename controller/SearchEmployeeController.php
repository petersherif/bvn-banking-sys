<?php
global $message;
if (isset($_POST['id'])) {
    $id = $_POST['id'];


    $sql = "DELETE FROM `users` WHERE id=$id ";
    $query1 = connect()->query($sql);
    if ($query1) {
        $message = 'success';
    }
}

$sql = "SELECT * FROM users WHERE auth = 1";
$query = connect()->query($sql);
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

