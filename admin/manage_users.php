<?php

session_start();  // $_SESSION['user_id'] = $row['id']; 
                  // $_SESSION['role'] = $row['role'];

if(isset($_SESSION['user_id'])){
    if($_SESSION['role'] == "admin") {
        include "../database.php";
        $sql = "SELECT id, name, email, role FROM users WHERE role = 'user'";
        $result = mysqli_query($connection, $sql);

        if(!$result){
            echo "echo Error! :" . mysqli_error($connection);
        }

    } else{
        header("Location: ../dashboard.php");
        exit();
    }
} else{
    header("Location: ../login.php");
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

        .link{
            text-decoration: none;
            background-color: darkred;
            color: white;
        }

    </style>

</head>

<body>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>

            </tr>
        </thead>

        <tbody>
            <?php 
                while($row = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td> <?php echo "{$row['id']}" ?> </td>
                <td> <?php echo "{$row['name']}" ?> </td>
                <td> <?php echo "{$row['email']}" ?> </td>
                <td> <?php echo "{$row['role']}" ?> </td>

                <td> <a class="link" href="delete_user.php?user_id=<?php echo $row['id']; ?>"> delete user </a> </td>
            </tr>

            <?php } ?>
        </tbody>
    </table>


</body>

</html>