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
    $position=$row->auth;

    if($position==1)
      $position="Employee";
    elseif($position==2)
      $position="Bank Manager";
    elseif($position==3)
      $position="Central Bank Manager";
    }
/////////////////////////////////////////////

?>



<?php

  $data_to_return=array(
               "response"=>"0",
               "name"=>"$name",
               "email"=>"$email",
               "nat_id"=>"$nat_id",
               "phone"=>"$phone",
               "img"=>"$img",
               "position"=>"$position",
           );
 
           if($data_to_return['response']=="0"){echo json_encode($data_to_return);}
           else {
           $data_to_return=array("response"=>"1");
           echo json_encode($data_to_return);
           }

                                