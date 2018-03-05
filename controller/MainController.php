<?php
global $message;

if (isset($_POST['submit'])) {
    $bvn = $_POST['bvn'];
    if ($bvn) {

        $sql = "SELECT * FROM bvn JOIN accounts WHERE bvn.bvn_num='$bvn'OR accounts.acc_num='$bvn'";
        $query = connect()->query($sql);
        if ($query->num_rows != 0) {
            while ($row = $query->fetch_assoc()) {
                $id = $row['id'];
                $bvn = $row['bvn_num'];
                $_SESSION['loggedbvn'] = "yes";
                $_SESSION['id'] = $sender_id;
                $_SESSION['id'] = $id;
                $_SESSION['bvn'] = $bvn;
                $_SESSION['acc_id'] = $acc_id;
                $URL = "Location: home.php?new-client";
                header($URL);
                exit;

            }
        } else {
            $message = "Please, Enter Valid Bvn Number";
        }
    }
} ?>