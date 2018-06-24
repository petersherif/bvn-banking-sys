<?php
global $message;
	// Balance inquery
	if (isset($_SESSION['atm_acc_id'])) {
		$acc_id = $_SESSION['atm_acc_id'];

		$sql = "SELECT * FROM accounts WHERE id = '$acc_id'";
		$query = connect()->query($sql);
		while ($item = $query->fetch_object()) {
			$balance = $item->balance;
		}
	}

	if (isset($_POST['atm_withdraw_amount'])) {
		$amount = $_POST['atm_withdraw_amount'];
		$account_id = $_SESSION['atm_acc_id'];
		if ($_POST['atm_withdraw_amount'] == "") {
			$message = 'empty';
		} else {
			$sql = "SELECT * FROM accounts WHERE id='$account_id'";
			$query = connect()->query($sql);
			if ($query->num_rows > 0) {
				while ($row = $query->fetch_assoc()) {
					$balance = $row['balance'];
				}
				if ($balance <= 0 || $balance < $amount) {
					$message = 'error';
				} else {
					$newBalance = $balance - $amount;
					$sql = "UPDATE `accounts` SET balance='$newBalance' WHERE id='$account_id'";
					$query = connect()->query($sql);
					$sql = "INSERT INTO `transaction`(`amount`,`type`,`acc_id`)VALUE ($amount,1,$account_id)";
					$query = connect()->query($sql);
					$message = 'success';
				}
			}
		}

	} 

	// ATM Deposit
	if (isset($_POST['atm_deposit_amount'])) {
    $amount = $_POST['atm_deposit_amount'];
    $account_id = $_SESSION['atm_acc_id'];

    if ($_POST['atm_deposit_amount'] == "") {
      $message = 'empty';
    } else {
      $sql = "SELECT * FROM accounts WHERE id='$account_id'";
      $query = connect()->query($sql);
      if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $balance = $row['balance'];
        }
        $newBalance = $balance + $amount;
        $sql = "UPDATE `accounts` SET balance='$newBalance' WHERE id='$account_id'";
        $query = connect()->query($sql);
        $sql = "INSERT INTO `transaction`(`amount`,`type`,`acc_id`)VALUE ($amount,0,$account_id)";
        $query = connect()->query($sql);
        $message = 'success';
      }
    }
	} 



?>
