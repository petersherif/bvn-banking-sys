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
	$bvn = $_POST['bvn'];
	if ($bvn && $cardNumber) {
		if ($_POST['bvn'] == "" || $_POST['card_num'] == "") {
			$message = "error";
		} else {
			$sql = "SELECT * FROM bvn WHERE bvn_num = '$bvn' AND card_num = '$cardNumber'";
			$query = connect()->query($sql);
			if ($query->num_rows != 0) {
				while ($row = $query->fetch_assoc()) {
					$atm_bvn_id = $row['id'];
					$atm_user_id = $row['user_id'];
					$atm_bvn = $row['bvn_num'];
					$atm_card_number = $row['card_num'];
					$_SESSION['loggedatmbvn'] = "yes";
					$_SESSION['atm_bvn_id'] = $atm_bvn_id;
					$_SESSION['atm_user_id'] = $atm_user_id;
					$_SESSION['atm_bvn'] = $atm_bvn;
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
}
if (isset($_SESSION['atm_user_id'])) {
	$user_id = $_SESSION['atm_user_id'];
	$sql = "SELECT * From bvn WHERE user_id='$user_id'";
	$query = connect()->query($sql);
	while ($row = $query->fetch_object()) {
		$bvn_num = $row->bvn_num;
	}

	$sql = "SELECT * From users WHERE id='$user_id'";
	$query = connect()->query($sql);
	while ($row = $query->fetch_object()) {

		$atm_name = $row->full_name;
		$atm_address = $row->address;
		$atm_img = $row->thumb;
	}

}
?>
