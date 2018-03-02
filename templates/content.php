<?php

if (isset($_GET['money-transfer'])) {
    ?>
    <?php include('./money-transfer.php');
} ?>

<?php
if (isset($_GET['deposit'])) {
    ?>
    <?php include('./deposit.php');
} ?>
<?php
if (isset($_GET['withdraw'])) {

    ?>
    <?php 
        if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST["withdraw"]) ){
            
            $value=$_POST['withdraw'];
            $stmt = $con -> prepare("SELECT id , balance FROM accounts WHERE acc_num = ?");
            $stmt -> execute(array($_SESSION['ClientAccountNum']));
            $row = $stmt -> fetch();
            $balance=$row['balance'];
            $newBalance=$balance - $value;
            if($balance > $value){
                $stmt = $con -> prepare("INSERT INTO transaction( amount, type, acc_id) VALUES (?,1,?)");
                $stmt -> execute(array($value,$row['id']));
                $stmt = $con -> prepare("UPDATE accounts set balance= $newBalance  WHERE acc_num = ?");
                $stmt -> execute(array($_SESSION['ClientAccountNum']));
                echo '<script> alert( "Successful process Your balance = '.$newBalance.'" )</script>';
                header("refresh:0;url=dashboard.php");
                exit();}
                    else {
                echo '<script> alert( "Enter number between 0 and '. $row['balance'] .'" )</script>';   
                header("refresh:0;url=dashboard.php");
                exit();

        } 

        }

    include('./withdraw.php');
} ?>
<?php
    if (isset($_GET['client']) == 'add') {
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $username   =$_POST['username'];
            $nat_id     =$_POST['nat_id'];
            $birthday   =$_POST['birthday'];
            $gender     =$_POST['gender'];
            $address    =$_POST['address'];
            $email      =$_POST['email'];
            $phone      =$_POST['phone'];
            $fingerprint=$_POST['fingerprint'];
            $photo      =$_POST['photo'];
            
            $count_username=retrieve_username($username,'users');
            $count_nat_id=retrieve_nat_id($nat_id,'users');
            $count_email=retrieve_email($email,'users');
            $count_phone=retrieve_phone($phone,'users');

            $formError= array();
            if(empty($username)){
                $formError['username']="Full Name Can not Be Empty";
            }elseif($count_username > 0){
                $formError['username']="Username already exist";
            }
            if(empty($nat_id)){
                $formError['nat_id']="National ID Can not Be Empty";
            }elseif($count_nat_id > 0){
                $formError['nat_id']="National ID already exist";
            }
            if(empty($birthday)){
                $formError['birthday']="Birthdate Can not Be Empty";
            }
            if(empty($gender)){
                $formError['gender']="Gender Can not Be Empty";
            }
            if(empty($address)){
                $formError['address']="Address Can not Be Empty";
            }
            if(empty($email)){
                $formError['email']="Email Can not Be Empty";
            }elseif($count_email > 0){
                $formError['email']="Email already exist";
            }
            if(empty($phone)){
                $formError['phone']="Phone Can not Be Empty";
            }elseif($count_phone > 0){
                $formError['phone']="Phone already exist";
            }
            if(empty($fingerprint)){
                $formError['fingerprint']="Fingerprint Can not Be Empty";
            }
            if(empty($photo )){
                $formError['photo']="Picture Can not Be Empty";
            }
            
            if(empty($formError)){
                $stmt=$con->prepare("INSERT INTO users(user_name,national_id,birthday,gender,address,email,phone,thumb,auth)                                  VALUE(?,?,?,?,?,?,?,?,0)");
                $stmt->execute(array($username,$nat_id,$birthday,$gender,$address,$email,$phone,$photo));
                echo '<script>alert("Client has been added");</script>';
            }


        } 
    }
?>
<?php
if (isset($_GET['new-client'])) {
    ?>
    
    <?php include('./new-client.php');
} ?>
<?php 
if(isset($_GET['done'])){
        

}
?>

<?php
if (isset($_GET['add-employee'])) {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get employee data with post method
        $fullname 	= $_POST['fullname'];
        $password	= $_POST['password'];
        $hashedPass	= sha1($password);
        $nat_id 	= $_POST['nat_id'];
        $birthdate 	= $_POST['birthdate'];
        $gender 	= $_POST['gender'];
        $address 	= $_POST['address'];
        $email 		= $_POST['email'];
        $phone		= $_POST['phone'];
        $auth 		= $_POST['auth'];

        // array to has form erros messages
        $formError	= array();

        // Upload Selected Photo To img folder
        $photoName 	= $_FILES['photo']['name'];
        $target_dir = 'img/';
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Select these data from database
        $count_username = retrieve_username($fullname,'users');
        $count_nat_id = retrieve_nat_id($nat_id, 'users');
        $count_email = retrieve_email($email, 'users');
        $count_phone = retrieve_phone($phone, 'users');

        // Handle form errors
        if(empty($fullname)){
            $formError['fullname'] 	= 'Full Name Can not Be Empty';
        } elseif ($count_username > 0) {
            $formError['fullname'] 	= 'Username already exist';
        }
        if(empty($password)){
            $formError['password'] 	= 'Password Can not Be Empty';
        }
        if(empty($nat_id)) {
            $formError['nat_id'] 	= 'National ID Can not Be Empty';
        } elseif($count_nat_id > 0) {
            $formError['nat_id'] 	= 'National ID already exist';
        }
        if(empty($birthdate)) {
            $formError['birthdate'] = 'Birthdate Can not Be Empty';
        }
        if(empty($gender)) {
            $formError['gender'] 	= 'Gender Can not Be Empty';
        }
        if(empty($address)) {
            $formError['address'] 	= 'Address Can not Be Empty';
        }
        if(empty($email)) {
            $formError['email'] 	= 'Email Can not Be Empty';
        } elseif($count_email > 0) {
            $formError['email'] 	= 'Email already exist';
        }
        if(empty($phone)) {
            $formError['phone'] 	= 'Phone Can not Be Empty';
        } elseif($count_phone > 0) {
            $formError['phone'] 	= 'Phone already exist';
        }
        if(empty($photoName)) {
            $formError['photoName'] = 'Picture Can not Be Empty'; 
        }
        if(empty($auth)) {
            $formError['auth'] 		= 'auth Can not Be Empty';
        }

        //if($count > 0){
        //    echo '<script> alert("Dublicated entry please check again") </script>';
        //}else{
            // Insert employee data into database if no errors found
            if(empty($formError)) {
                $stmt = $con -> prepare("INSERT INTO users (user_name, password, email, national_id, birthday, gender, phone, thumb, auth)
                                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt -> execute(array($fullname, $hashedPass, $email, $nat_id, $birthdate, $gender, $phone, $photoName, $auth));
    
                // Upload Image
                move_uploaded_file($_FILES['photo']['tmp_name'],$target_dir.$photoName);
                
            }
        //}
        
    }
    ?>
    <?php include('./add-employee.php');
} ?>

<?php
if (isset($_GET['dashboard.php'])) {
    ?>
    <?php 
    if (isset($_SESSION["ClientAccountNum"]) && !empty($_SESSION["ClientAccountNum"]))
    include('./client-profile.php');
    else
    include('./main.php');
} 
if(isset($_GET['newClient']))  {

    if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST["accountNumber"]) ){
        $accountNumber=$_POST['accountNumber'];
        $stmt = $con -> prepare("SELECT * FROM accounts WHERE acc_num = ?");
		$stmt -> execute(array($accountNumber));
		$row = $stmt -> fetch();
		$count = $stmt -> rowCount();
		if($count > 0){
			$_SESSION['ClientAccountNum'] 	= $accountNumber; // Add Session ClientAccountNum
            echo '<script> alert( "you are in client page" )</script>';
            header("refresh:0;url=dashboard.php");
            exit();}
                else {
            echo '<script> alert( "Invalid account number" )</script>';   
            header("refresh:0;url=dashboard.php");
            exit();
    
     } 

} } ?>
        
