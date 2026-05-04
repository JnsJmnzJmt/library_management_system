<?php

session_start();
// $_SESSION['user_id'] = $row['id']; 
// $_SESSION['role'] = $row['role'];

include "../database.php";

if(isset($_SESSION['user_id'])){

    if($_SESSION['role'] == "admin"){
        
        if(isset($_GET['transaction_id'])){
            $transaction_id = $_GET['transaction_id']; 
        }

            // $return_date = $_POST['return_date'];

            $sql = "DELETE FROM transactions WHERE id = '$transaction_id'"; 
            $result = mysqli_query($connection, $sql);

            if(!$result){
                echo "Error! : " . mysqli_error($connection);
            } else{
                header("Location: view_transactions.php");
            }

    } else{
    header("Location: ../dashboard.php");
    } 

} else{
    header("Location: ../login.php"); 
}

?>