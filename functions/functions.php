<?php 
/*
** retrieve_username Function with parameter
** Functiuon to select username data form desired table
** $username  --> the username to select
** $table     --> the table name to select data from it
*/
    function retrieve_username($username, $table){
        // Make Variable $con Global To Can Be Accessed 
        global $con;

        $stmt2 = $con -> prepare("SELECT user_name FROM $table WHERE user_name = ? ");
        $stmt2 -> execute(array($username));
        $count = $stmt2 -> rowCount();

        return $count;
    }

    
/*
** retrieve_nat_id Function with parameter
** Functiuon to select national_id data form desired table
** $nat_id  --> the national_id to select
** $table     --> the table name to select data from it
*/
function retrieve_nat_id($nat_id, $table){
    // Make Variable $con Global To Can Be Accessed 
    global $con;

    $stmt2 = $con -> prepare("SELECT national_id FROM $table WHERE national_id = ? ");
    $stmt2 -> execute(array($nat_id));
    $count = $stmt2 -> rowCount();

    return $count;
}

/*
** retrieve_email Function with parameter
** Functiuon to select email data form desired table
** $email  --> the useremailname to select
** $table     --> the table name to select data from it
*/
function retrieve_email($email, $table){
    // Make Variable $con Global To Can Be Accessed 
    global $con;

    $stmt2 = $con -> prepare("SELECT email FROM $table WHERE email = ? ");
    $stmt2 -> execute(array($email));
    $count = $stmt2 -> rowCount();

    return $count;
}

/*
** retrieve_phone Function with parameter
** Functiuon to select phone data form desired table
** $phone  --> the phone to select
** $table     --> the table name to select data from it
*/
function retrieve_phone($phone, $table){
    // Make Variable $con Global To Can Be Accessed 
    global $con;

    $stmt2 = $con -> prepare("SELECT phone FROM $table WHERE phone = ? ");
    $stmt2 -> execute(array($phone));
    $count = $stmt2 -> rowCount();

    return $count;
}
