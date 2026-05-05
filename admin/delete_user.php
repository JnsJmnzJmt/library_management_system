<?php

session_start();
// $_SESSION['user_id'] = $row['id']; 
// $_SESSION['role'] = $row['role'];

include "../database.php";

if(isset($_SESSION['user_id'])){

    if($_SESSION['role'] == "admin"){
        
        if(isset($_GET['user_id'])){
            $user_id = $_GET['user_id']; 
        }

            $sql = "DELETE FROM users WHERE id = '$user_id'"; 
            $result = mysqli_query($connection, $sql);

            if(!$result){
                echo "Error! : " . mysqli_error($connection);
            } else{
                header("Location: manage_users.php");
            }

    } else{
    header("Location: manage_users.php");
    } 

} else{
    header("Location: ../login.php"); 
}

?>