<?php
global $message;
if (isset($_POST['submit'])) {
    $bvn = $_POST['bvn'];
    if ($bvn) {
        global $message;
        if ($_POST['bvn'] == "") {
        } else {
            $sql = "SELECT * FROM bvn WHERE bvn_num = $bvn";
            $query = connect()->query($sql);
            if ($query->num_rows != 0) {
                while ($row = $query->fetch_assoc()) {
                    $bvn_id = $row['id'];
                    $user_id = $row['user_id'];
                    $bvn = $row['bvn_num'];
                    $_SESSION['loggedbvn'] = "yes";
                    $_SESSION['bvn_id'] = $bvn_id;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['bvn'] = $bvn;
                    $URL = "Location: home.php";
                    header($URL);
                    exit;
                }
            } else {
                $message = "Please, Enter Valid BVN OR Account Number";
            }
        }
    } else {
        $message = "Please, Enter Valid BVN OR Account Number";

    }
}
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * From bvn WHERE user_id='$user_id'";
    $query = connect()->query($sql);
    while ($row = $query->fetch_object()) {
        $bvn_num = $row->bvn_num;
    }

    $sql = "SELECT * From users WHERE id='$user_id'";
    $query = connect()->query($sql);
    while ($row = $query->fetch_object()) {

        $name = $row->full_name;
        $address = $row->address;
        $img = $row->thumb;
    }

}
if (isset($_SESSION['bvn_id'])) {
    $bvn_id = $_SESSION['bvn_id'];
    $sql = "select accounts.id,accounts.acc_num,accounts.balance
from accounts inner join bvn_acc
on bvn_acc.acc_id=accounts.id
WHERE bvn_acc.bvn_id='$bvn_id'";
    $query = connect()->query($sql);
    $row = mysqli_fetch_all($query, MYSQLI_ASSOC);
}
?>
