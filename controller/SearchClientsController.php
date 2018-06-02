<?php
    if (isset($_POST['id'])) {
        $id = $_POST['id'];


        $sql2 = "DELETE FROM `users` WHERE id=$id ";
        $query1 = connect()->query($sql2);
        if ($query1) {
            $message = 'success';
        }
    }
    $sql = "SELECT * FROM accounts JOIN users WHERE users.auth = 0 and users.id= accounts.user_id";
    $query = connect()->query($sql);
    $row = mysqli_fetch_all($query,MYSQLI_ASSOC);

    global $message;

?>