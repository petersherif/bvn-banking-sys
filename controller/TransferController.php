<?php
$account = $_SESSION['loggedAccount'];
$sender_id = $_SESSION['user_id'];
$acc_id = $_SESSION['acc_id'];

if (isset($account)) {
    global $message;
    if (isset($_POST['amount'])) {
        $amount = $_POST['amount'];
        $receiver_num = $_POST['receiver_num'];

        if ($_POST['amount'] == "") {
            $message = 'error';
        } elseif ($_POST['receiver_num'] == "") {
            $message = 'error';
        } else {
            $sql = "SELECT * FROM accounts WHERE user_id='$sender_id'";
            $query = connect()->query($sql);
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    $sender_balance = $row['balance'];
                }
            }
            $sql = "SELECT * FROM accounts WHERE acc_num='$receiver_num'";
            $query = connect()->query($sql);
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    $account_id = $row['id'];
                    $receiver_id = $row['user_id'];
                    $receiver_balance = $row['balance'];

                }
                if ($receiver_id == $sender_id) {
                    $message = 'can';
                } else {

                    if ($sender_balance < $amount || $sender_balance == 0) {
                        $message = 'empty';

                    } else {


                        $newSenderBalance = ((float)$sender_balance) - ((float)$amount);
                        $sql = "UPDATE `accounts` SET balance='$newSenderBalance' WHERE user_id='$sender_id'";
                        $query = connect()->query($sql);
                        $sql = "SELECT * FROM accounts WHERE user_id='$receiver_id'";
                        $query = connect()->query($sql);
                        if ($query->num_rows > 0) {
                            while ($row = $query->fetch_assoc()) {
                                $receiver_balance = $row['balance'];
                            }
                            $newReceiverBalance = ((float)$receiver_balance) + ((float)$amount);
                            $sql = "UPDATE `accounts` SET balance='$newReceiverBalance' WHERE user_id='$receiver_id'";
                            $query = connect()->query($sql);
                            $sql = "INSERT INTO transfer(amount,sender_id,receiver_id)VALUE ($amount,$sender_id,$receiver_id)";
                            $query = connect()->query($sql);
                            $message = 'success';
                        }
                    }
                }
            } else {
                $message = 'exist';
            }
        }

    }
}
?>