<?php

session_start();  // $_SESSION['user_id'] = $row['id']; 
                  // $_SESSION['role'] = $row['role'];

if(isset($_SESSION['user_id'])){
    if($_SESSION['role'] == "admin") {
        echo "You are admin";
    } else{
        header("Location: ../dashboard.php");
    }
} else{
    header("Location: ../login.php");
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
    <a href="../logout.php">Logout</a> 
    <!-- ?user_id=echo $user_id;  -->
</body>

</html>