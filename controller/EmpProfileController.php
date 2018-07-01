<?php
global $message;
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $e_name = $_POST['full_name'];
    $e_email = $_POST['email'];
    $e_birthday = $_POST['birthday'];
    $e_address = $_POST['address'];
    $e_phone = $_POST['phone'];


    if ($_POST['full_name'] == "") {
        $message = 'error1';

    } elseif ($_POST['email'] == "") {
        $message = 'error1';

    } elseif ($_POST['address'] == "") {
        $message = 'error1';

    } elseif ($_POST['phone'] == "") {
        $message = 'error1';
    } else {
        $values = "full_name" . "=" . "'$e_name'" . "," . "email" . "=" . "'$e_email'" . "," . "birthday" . "=" . "'$e_birthday'" . "," . "address" . "=" . "'$e_address'" . "," . "phone" . "=" . "'$e_phone'";

        $sql = "update `users` set $values WHERE id =$id";
        $query = connect()->query($sql);
        $message = 'success';
    }
}
?>
<?php
$sql = "SELECT * FROM `users` WHERE id=$id";
$query = connect()->query($sql);

while ($row = $query->fetch_object()) {
    $id = $row->id;
    $name = $row->full_name;
    $email = $row->email;
    $phone = $row->phone;
    $img = $row->thumb;
    $nat_id = $row->national_id;
    $address = $row->address;
    $birthday = $row->birthday;
    $type = $row->auth;

}


if (isset($_POST['submit_delete'])) {
    $id3 = $_GET['id'];


    $sql = "DELETE FROM `users` WHERE id=$id3 ";
    $query1 = connect()->query($sql);
    if ($query1) {
        if ($id == $_SESSION['id']) {
            unset($_SESSION['loggedin']);
            unset($_SESSION['loggedbvn']);
            unset($_SESSION['id']);
            unset($_SESSION['username']);
            unset($_SESSION['acc_id']);
            unset($_SESSION['id']);
            header('location:Location: index.php');

        }
        if ($type == 0) {
            header('location:home.php?search-clients');
        } else {
            header('location:home.php?search-employees');

        }
    }
}
?>
