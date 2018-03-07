<?php session_start();
include('includes/connect.php');
if (isset($_SESSION['loggedin'])) {

    $url = "location: home.php";
    header($url);
    exit;
}
global $message;

if (isset($_POST['login'])) {
    $username = $_POST['user_name'];
    $password = sha1($_POST['password']);


    if ($username && $password) {
        $sql = "SELECT * FROM `users` WHERE user_name='$username' AND password='$password 'AND auth!='0' ";
        $query = connect()->query($sql);

        if ($query->num_rows != 0) {
            while ($row = $query->fetch_assoc()) {
                $id = $row['id'];
                $username = $row['user_name'];
                $password = $row['password'];
                $_SESSION['loggedin'] = "yes";
                $_SESSION['id'] = $id;
                $_SESSION['user_name'] = $username;
                $url = "location: home.php";
                header($url);
                exit;
            }

        } else {
            $message = "Please, Enter Valid Username OR Password";
        }
    } else {
        $message = "Please, Enter Valid Username OR Password";
    }
}
?>