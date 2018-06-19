<?php
global $message;
if (isset($_POST['select_acc'])) {
    if (isset($_POST['account_number'])) {
        $account_number = $_POST['account_number'];
        if ($_POST['account_number'] == "") {
            $message = 'error';
        } else {
            $sql = "SELECT * FROM accounts WHERE acc_num = $account_number";
            $query = connect()->query($sql);
            if ($query->num_rows != 0) {
                while ($row = $query->fetch_assoc()) {
                    $acc_id = $row['id'];
                    $user_id = $row['user_id'];
                    $account_number = $row['acc_num'];
                    $balance = $row['balance'];
                    $_SESSION['loggedAtmAccount'] = "yes";
                    $_SESSION['atm_user_id'] = $user_id;
                    $_SESSION['atm_account_number'] = $account_number;
                    $_SESSION['atm_acc_id'] = $acc_id;
                    $URL = "Location: atm-home.php?atm-main-options";
                    header($URL);
                    exit;
                }
            } else {
                $message = "<strong>Oops, action failed!</strong> Please, select account number to continue!";
            }
        }
    } else {
        $message = 'error';

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