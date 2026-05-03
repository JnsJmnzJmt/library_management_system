<?php

session_start();
    // $_SESSION['user_id'] = $row['id']; 
    // $_SESSION['role'] = $row['role'];

if(isset($_SESSION['user_id'])){

    if($_SESSION['role'] == "admin"){
        
        include "../database.php";

        $sql = "SELECT * FROM books";
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

    </style>

</head>

<body>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Image</th>
                <th>Quantity</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                while($row = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td> <?php echo "{$row['title']}" ?> </td>
                <td> <?php echo "{$row['author']}" ?> </td>
                <td> <?php echo "{$row['isbn']}" ?> </td>
                <td> <img src="../image/<?php echo "{$row['image']}" ?>"></td>
                <td> <?php echo "{$row['quantity']}" ?> </td>
            </tr>

            <?php } ?>
        </tbody>
    </table>


</body>

</html>