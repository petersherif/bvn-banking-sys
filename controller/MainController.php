<?php
if (isset($_POST['submit'])) {
    $bvn = $_POST['bvn'];
    if ($bvn) {
        global $message;
        if ($_POST['bvn'] == "") {
        } else {
            $sql = "SELECT * FROM accounts WHERE acc_num = $bvn";
            $query = connect()->query($sql);
            if ($query->num_rows != 0) {
                while ($row = $query->fetch_assoc()) {
                    $id = $row['id'];
                    $user_id= $row['user_id'];
                    $bvn = $row['bvn_num'];
                    $_SESSION['loggedbvn'] = "yes";
                    $_SESSION['id'] = $sender_id;
                    $_SESSION['id'] = $id;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['bvn'] = $bvn;
                    $_SESSION['acc_id'] = $acc_id;
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
?>