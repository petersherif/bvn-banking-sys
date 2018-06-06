<?php
global $message;
if (isset($_POST['createBvn'])) {
    $acc_number = $_POST['acc_number'];
    if ($_POST['acc_number'] == "") {
        $message = 'error';
    } else {
        $sql = "SELECT * FROM accounts WHERE acc_num='$acc_number'";
        $query = connect()->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_object()) {
                $acc_id = $row->id;
                $user_id = $row->user_id;
            }
            $sql = "select bvn.id,bvn.bvn_num
from bvn inner join bvn_acc
on bvn_acc.bvn_id=bvn.id
WHERE bvn_acc.acc_id='$acc_id'";
            $query = connect()->query($sql);
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_object()) {
                    $bvn_num = $row->bvn_num;
                }
                $message = 'exist';
            } else {
                $sql = "SELECT * FROM users WHERE id='$user_id'";
                $query = connect()->query($sql);
                while ($row = $query->fetch_object()) {
                    $id = $row->id;
                }
                $sql = "SELECT bvn_num from bvn ORDER BY bvn_num DESC LIMIT 1";
                $query = connect()->query($sql);

                $row = $query->fetch_assoc();
                if (count($row) == 0)
                    $bvnNumber = 100000000;
                else
                    $bvnNumber = $row['bvn_num'] + 1;

                $sql = "INSERT INTO bvn (bvn_num,user_id)VALUES ($bvnNumber,$id)";
                $link = mysqli_connect("localhost", "root", "", "bvn_system");
                mysqli_query($link, $sql);
                $last_id = mysqli_insert_id($link);

                $sql = "INSERT INTO bvn_acc (bvn_id,acc_id)VALUES ($last_id,$acc_id)";
                $query = connect()->query($sql);
                $message = 'success';

                $sql = "select bvn.id,bvn.bvn_num
from bvn inner join bvn_acc
on bvn_acc.bvn_id=bvn.id
WHERE bvn_acc.bvn_id='$last_id'";
                $query = connect()->query($sql);
                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_object()) {
                        $bvn_num = $row->bvn_num;
                    }
                }
            }
        } else {
            $message = 'error2';
        }
    }

}

?>