<?php

// include "database.php";

// session_start(); 

echo "Welcome to dashboard";


session_start();  // $_SESSION['user_id'] = $row['id']; 
                  // $_SESSION['role'] = $row['role'];

if(isset($_SESSION['user_id'])){
    if($_SESSION['role'] == "user") {
        echo "You are user";
    } else{
        header("Location: admin/dashboard.php");
    }
} else{
    header("Location: login.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="request_check.php">request updates</a> <br>
    <a href="logout.php">Logout</a> 
    <!-- ?user_id=echo $user_id;  -->
</body>

</html>