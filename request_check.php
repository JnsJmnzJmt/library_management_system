<?php

session_start();  // $_SESSION['user_id'] = $row['id']; 
                  // $_SESSION['role'] = $row['role'];

include "database.php";

echo "Welcome to dashboard";


if(isset($_SESSION['user_id'])){
    if($_SESSION['role'] == "user") {
        
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM transactions WHERE user_id='$user_id'";
        $result = mysqli_query($connection, $sql);

        if(!$result){
            echo "Error! : " . mysqli_error($connection);
        } else{
            
        }
    } else{
        header("Location: admin/dashboard.php");
        exit();
    }
} else{
    header("Location: login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>

    <style type="text/css">
        table{
            border: none;
            width: 100%;
        }

        tr, th{
            border-bottom: 2px solid green;
        }

        td{
            border: none;
            background-color: gray;
            text-align: center;
        }

        img{
            width: 70px;
        }

        .update{
            text-decoration: none;
            background-color: green;
            color: white;
        }

        .delete{
            text-decoration: none;
            background-color: red;
            color: white;
        }

    </style>

</head>

<body>

    <a href="dashboard.php">Back</a>

    <table>
        <thead>
            <tr>
                <th>user id</th>
                <th>book id</th>
                <th>issue date</th>
                <th>return date</th>
                <th>status</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                while($row = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td> <?php echo "{$row['user_id']}" ?> </td>
                <td> <?php echo "{$row['book_id']}" ?> </td>
                <td> <?php echo "{$row['issue_date']}" ?> </td>
                <td> <?php echo "{$row['return_date']}" ?> </td>
                <td> <?php echo "{$row['status']}" ?> </td>
            </tr>

            <?php } ?>
        </tbody>
    </table>

</body>

</html>