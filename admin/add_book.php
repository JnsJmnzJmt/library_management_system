<?php

session_start();
    // $_SESSION['user_id'] = $row['id']; 
    // $_SESSION['role'] = $row['role'];

if(isset($_SESSION['user_id'])){

    if($_SESSION['role'] == "admin"){

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $title = $_POST['title'];
            $author = $_POST['author'];
            $isbn = $_POST['isbn'];
            $image = $_FILES['image'] ['name'];
            $quantity = $_POST['quantity'];

            include "../database.php";
            
            $sql = "INSERT INTO books(title, author, isbn, image, quantity) VALUES ('$title','$author','$isbn','$image','$quantity')";
            $result = mysqli_query($connection, $sql);

            if(!$result){
                echo "Error! : " . mysqli_error($connection);
            } else{
                $image_location = $_FILES['image'] ['tmp_name']; 
                $upload_location = "../image/";
                move_uploaded_file($image_location, $upload_location.$image);
                echo "Book added successfully!";
            }
        }
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
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Library</title>

    <style type="text/css"> 

        .admin{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 200px;
            background-color: green;
        }

        .admin input{
            padding: 20px;
            margin: 6px;
            border: none;
            border-bottom: 2px solid blue;
        }

        .admin button{
            margin: 6px;
            padding: 20px;
            border-radius: 6px;
            background-color: skyblue;
        }

        .file{
            border: none!important;
            width: 100%;
        }
    </style>        

</head>

<body>

    <div class="admin">
        <form action="add_book.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="book title"> <br>
            <input type="text" name="author" placeholder="author"> <br>
            <input type="text" name="isbn" placeholder="ISBN"> <br>
            <input type="file" name="image" placeholder="image" class="file"> <br>
            <input type="text" name="quantity" placeholder="quantity"> <br>
            <button type="submit"> Add Book </button>
        </form>
    </div>

</body>

</html>