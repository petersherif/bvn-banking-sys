<?php
include_once('../../includes/connect.php');


//$idd=34;
$idd=$_POST['userid'];


///////////// USERS table //////////////////
$quer=" SELECT * FROM users where id=$idd";
 $query = connect()->query($quer);
    while ($row = $query->fetch_object()) {

		$name= $row->full_name;
        $email= $row->email;
        $nat_id= $row->national_id;
        $birthday= $row->birthday;
        $gender= $row->gender;
        $address= $row->address;
		$phone= $row->phone;
		$img= $row->thumb;
    }
/////////////////////////////////////////////

      $quer = "SELECT * From accounts WHERE user_id=$idd"; 
                $query = connect()->query($quer);
                while ($row = $query->fetch_object()) {
                    $acc_num= $row->acc_num;
                    $balance= $row->balance;
                }
?>



<?php

  $data_to_return=array(
               "response"=>"0",
               "name"=>"$name",
               "email"=>"$email",
               "nat_id"=>"$nat_id",
               "birthday"=>"$birthday",
               "gender"=>"$gender",
               "address"=>"$address",
               "phone"=>"$phone",
               "img"=>"$img",
               "acc_num"=>"$acc_num",
               "balance"=>"$balance",
           );
 
           if($data_to_return['response']=="0"){echo json_encode($data_to_return);}
           else {
           $data_to_return=array("response"=>"1");
           echo json_encode($data_to_return);
           }

                                