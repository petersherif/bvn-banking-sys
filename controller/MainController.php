<?php
if (isset($_POST['go'])) {
    $account_number = $_POST['account_number'];
    if ($account_number) {
        global $message;
        if ($_POST['account_number'] == "") {
            echo 'dd';
        } else {
            unset($_SESSION['loggedAccount']);
            unset($_SESSION['account_number']);
            unset($_SESSION['acc_id']);
            $sql = "SELECT * FROM accounts WHERE acc_num = $account_number";
            $query = connect()->query($sql);
            if ($query->num_rows != 0) {
                while ($row = $query->fetch_assoc()) {
                    $acc_id = $row['id'];
                    $user_id = $row['user_id'];
                    $account_number = $row['acc_num'];
                    $balance = $row['balance'];
                    $_SESSION['loggedAccount'] = "yes";
                    $_SESSION['id'] = $sender_id;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['account_number'] = $account_number;
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

if (isset($_SESSION['acc_id'])) {
    $acc_id = $_SESSION['acc_id'];

    $sql = "SELECT * From accounts WHERE id='$acc_id'";
    $query = connect()->query($sql);
    while ($item = $query->fetch_object()) {
        $acc_num = $item->acc_num;
        $balance = $item->balance;
        $bank_id = $item->bank_id;
    }
    $sql = "SELECT * FROM banks JOIN accounts WHERE accounts.bank_id=banks.id AND accounts.bank_id = '$bank_id' ";
    $query = connect()->query($sql);
    while ($items = $query->fetch_object()) {
        $banks_name = $items->bank_name;
    }
}


?>