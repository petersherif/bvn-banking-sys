<?php session_start();
include('includes/connect.php');
if (isset($_SESSION['loggedatmbvn'])) {

	$url = "location: atm-home.php";
	header($url);
	exit;
}
global $message;
if (isset($_POST['submit'])) {
	$cardNumber = $_POST['card_num'];
	$pinCode = $_POST['pin_code'];
	if ($pinCode && $cardNumber) {
		if ($_POST['pin_code'] == "" || $_POST['card_num'] == "") {
			$message = "error";
		} else {
			$sql = "SELECT * FROM accounts WHERE card_num = '$cardNumber' AND pin_code = '$pinCode'";
			$query = connect()->query($sql);
			if ($query->num_rows != 0) {
				while ($row = $query->fetch_assoc()) {
					$atm_acc_id = $row['id'];
					$atm_user_id = $row['user_id'];
					$atm_acc_num = $row['acc_num'];
					$_SESSION['loggedatmbvn'] = "yes";
					$_SESSION['atm_acc_id'] = $atm_acc_id;
					$_SESSION['atm_user_id'] = $atm_user_id;
					$_SESSION['atm_acc_num'] = $atm_acc_num;
					$URL = "Location: atm-home.php";
					header($URL);
					exit;
				}
			} else {
				$message = "<strong>Oops, action failed!</strong> Please, retry putting your fingerprint or insert a valid card!";
			}
		}
	} else {
		$message = "<strong>Oops, action failed!</strong> Please, retry putting your fingerprint or insert a valid card!";

	}
} ?>
