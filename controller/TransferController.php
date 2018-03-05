<?php
$account = $_SESSION['loggedbvn'];
$sender_id = $_SESSION['id'];
if (isset($account)) {
    if (isset($_POST['amount'])) {
        $amount = $_POST['amount'];
        $receiver_id = $_POST['receiver_id'];
        $sql = "SELECT * FROM bvn JOIN accounts WHERE  accounts.acc_num='$receiver_id'";
        $query = connect()->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $receiver_id = $row['id'];
                $balance = $row['balance'];
                $newSenderBalance = ($balance) - ($amount);
                $ReceiverBalance = ($balance) + ($amount);
            }


        };

        $sql = "INSERT INTO `transfer`(`amount`,`sender_id`,`reciever_id`)VALUE ($amount,$sender_id,$receiver_id)";
        $query = connect()->query($sql);
        $sql = "UPDATE `accounts` SET balance='$newSenderBalance' WHERE id='$sender_id'";
        $query = connect()->query($sql);
        $sql = "UPDATE `accounts` SET balance='$ReceiverBalance' WHERE id='$receiver_id'";
        $query = connect()->query($sql);
        $message = 'success';
    }

}

?>