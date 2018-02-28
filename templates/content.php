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
    <?php include('./withdraw.php');
} ?>

<?php
if (isset($_GET['new-client'])) {
    ?>
    <?php include('./new-client.php');
} ?>
<?php
if (isset($_GET['add-employee'])) {
    ?>
    <?php include('./add-employee.php');
} ?>

<?php
if (isset($_GET['dashboard.php'])) {
    ?>
    <?php include('./main.php');
} ?>
<?php 
if(isset($_GET['done'])){
        
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_start();
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

        // Handle form errors
        if(empty($fullname)){
            $formError['fullname'] 	= 'Full Name Can not Be Empty';
        }
        if(empty($password)){
            $formError['password'] 	= 'Password Can not Be Empty';
        }
        if(empty($nat_id)) {
            $formError['nat_id'] 	= 'National ID Can not Be Empty';
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
        }
        if(empty($phone)) {
            $formError['phone'] 	= 'Phone Can not Be Empty';
        }
        if(empty($photoName)) {
            $formError['photoName'] = 'Picture Can not Be Empty'; 
        }
        if(empty($phone)) {
            $formError['auth'] 		= 'auth Can not Be Empty';
        }

        // Insert employee data into database if no errors found
        if(empty($formError)) {
            $stmt = $con -> prepare("INSERT INTO users (user_name, password, email, national_id, birthday, gender, phone, thumb, auth)
                                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt -> execute(array($fullname, $hashedPass, $email, $nat_id, $birthdate, $gender, $phone, $photoName, $auth));

            // Upload Image
            move_uploaded_file($_FILES['photo']['tmp_name'],$target_dir.$photoName);
            
        }
        
    }
}
?>
