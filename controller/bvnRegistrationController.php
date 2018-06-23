<?php
global $message;
if (isset($_POST['generate_bvn'])) {
	if ($_POST['acc_num'] == "") {
		$message = "generate-error";
	} else {
		$acc_num = $_POST['acc_num'];
		$sql = "SELECT * FROM accounts WHERE acc_num='$acc_num'";
		$query = connect()->query($sql);
		if ($query->num_rows > 0) {
			while ($row = $query->fetch_object()) {
				$account_id = $row->id;
				$user_id = $row->user_id;
			}
			$sql = "SELECT * FROM bvn WHERE user_id='$user_id'";
			$query = connect()->query($sql);
			if ($query->num_rows > 0 ) {
				$message = "generate-exist";
			} else {
				do {
	        $bvnNumber = mt_rand(1000000000, 9999999999);
	        $sql = "select * from bvn WHERE bvn_num='$bvnNumber'";
	        $query = connect()->query($sql);
	      } while ($query->num_rows != 0);
				$sql_bvn = "INSERT INTO bvn (bvn_num,user_id)VALUES ($bvnNumber,$user_id)";
				$link = mysqli_connect("localhost", "root", "", "bvn_system");
				mysqli_query($link, $sql_bvn);
				$last_bvn_id = mysqli_insert_id($link);
				$sql_bvn_acc = "INSERT INTO bvn_acc (bvn_id,acc_id)VALUES ($last_bvn_id,$account_id)";
				$link = mysqli_connect("localhost", "root", "", "bvn_system");
				mysqli_query($link, $sql_bvn_acc);
				$last_bvn_acc = mysqli_insert_id($link);
				$sql = "SELECT * From bvn WHERE id='$last_bvn_id'";
				$query = connect()->query($sql);
				while ($row = $query->fetch_object()) {
					$bvn_num = $row->bvn_num;
				}
				$message = "generate-success";
			}
		}
	}
}

if (isset($_POST['connect_bvn'])) {
	$acc_num = $_POST['acc_num'];
	$bvn_num = $_POST['bvn_num'];
	if ($_POST['acc_num'] == "" || $_POST['bvn_num'] == "") {
		$message = "connect-error";
	} else {
		$sql = "select * from bvn WHERE bvn_num='$bvn_num'";
		$query = connect()->query($sql);
		if ($query->num_rows != 0) {
			while ($row = $query->fetch_object()) {
				$bvn_id = $row->id;
				$bvn_user_id = $row->user_id;
			}
			$sql = "select * from accounts WHERE acc_num='$acc_num'";
			$query = connect()->query($sql);
			if ($query->num_rows != 0) {
				while ($row = $query->fetch_object()) {
					$acc_id = $row->id;
					$acc_user_id = $row->user_id;
				}
				$sql = "select * from bvn_acc WHERE bvn_id = '$bvn_id' AND acc_id = '$acc_id'";
				$query = connect()->query($sql);
				if ($query->num_rows != 0) {
					$message = "connect-connected";
				} else {
					if ($bvn_user_id == $acc_user_id) {
						$sql_bvn_acc = "INSERT INTO bvn_acc (bvn_id,acc_id)VALUES ($bvn_id,$acc_id)";
						$query = connect()->query($sql_bvn_acc);
						$message = "connect-success";
					} else {
						$message = 'connect-error';
					}
				}
			} else {
				$message = "connect-not-exist";
			}

		} else {
			$message = "connect-not-exist";
		}
	}
}
?>

