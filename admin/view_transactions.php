<?php

session_start();
// $_SESSION['user_id'] = $row['id']; 
// $_SESSION['role'] = $row['role'];

include "../database.php";

if(isset($_SESSION['user_id'])){

    if($_SESSION['role'] == "admin"){
        
        include "../database.php";

        $sql = "SELECT * FROM transactions";
        $result = mysqli_query($connection, $sql);

        if(!$result){
            echo "Error! : " . mysqli_error($connection);
        } else{
            
        }
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

    <table>
        <thead>
            <tr>
                <th>user id</th>
                <th>book id</th>
                <th>issue date</th>
                <th>return date</th>
                <th>status</th>
                <th>action</th>
                <th>action</th>
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
                <td> <a class="update" href="update_transactions.php?transaction_id=<?php echo $row['id']?>"> update </a> </td>
                <td> <a class="delete" href="delete_transactions.php?transaction_id=<?php echo $row['id']?>"> delete </a> </td>
            </tr>

            <?php } ?>
        </tbody>
    </table>


</body>

</html>