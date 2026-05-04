<?php

session_start();  // $_SESSION['user_id'] = $row['id']; 
                  // $_SESSION['role'] = $row['role'];

if(isset($_SESSION['user_id'])){
    if($_SESSION['role'] == "admin") {
        echo "Welcome to Admin dashboard";
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

    <style type="text/css">
        
        .admin-navbar{
            background-color: green;
            display: flex;
            width: 200px;
            flex-direction: column;
            color: white;
        }

        .admin-navbar a{
            color: white;
            text-decoration: none;
        }

        .admin-navbar ul li{
            list-style: none;
        }

    </style> 

</head>

<body>
    <nav class="admin-navbar">
        <ul>
            <li> <a href="view_transactions.php"> view transactions </a> </li>
        </ul>
    </nav>

    <a href="../logout.php">Logout</a> 
    <!-- ?user_id=echo $user_id;  -->
</body>

</html>