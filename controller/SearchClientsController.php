<?php
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM `users` WHERE id=$id ";
        $query = connect()->query($sql);
            $message = 'success';
        }
    $sql = "SELECT * FROM accounts JOIN users WHERE users.auth = 0 and users.id= accounts.user_id";
    $query = connect()->query($sql);
    $row = mysqli_fetch_all($query,MYSQLI_ASSOC);

    global $message;

?>