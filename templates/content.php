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
        
