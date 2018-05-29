<?php
    if (isset($_POST['id'])) {
        $id = $_POST['id'];


        $sql2 = "DELETE FROM `users` WHERE id=$id ";
        $query1 = connect()->query($sql2);
        if ($query1) {
            $message = 'success';
        }
    }

    $sql = "SELECT * FROM users WHERE auth != 0";
    $query = connect()->query($sql);
    $row = mysqli_fetch_all($query,MYSQLI_ASSOC);

    global $message;
