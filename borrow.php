<?php 

include "database.php";

session_start();
// $_SESSION['user_id'] = $row['id']; 
// $_SESSION['role'] = $row['role'];


if(isset($_GET['book_id'])){
    $book_id = $_GET['book_id'];
} else{
    echo "No books selected. <a href='index.php'> Go back </a>";
    exit();
}

if(isset($_SESSION['user_id'])){

    $user_id = $_SESSION['user_id'];

    if($_SESSION['role'] == "user"){
        
        $sql = "INSERT INTO transactions (user_id, book_id, issue_date, status) 
                VALUES ('$user_id', '$book_id', CURDATE(), 'borrowed')";
        $result = mysqli_query($connection, $sql);

        if($result){

            $sql2 = "UPDATE books SET quantity = quantity - 1 WHERE id = '$book_id' "; //query for updating the quantity of a book in 'books' table 
            $result2 = mysqli_query($connection, $sql2);
            echo "Your request has been sent to librarian! <a href='index.php'> Go Back </a>";

        } else{
            echo "Error! : " . mysqli_error($connection);
        }

    } else{
        header("Location: admin/dashboard.php");
    }

} else{
    header("Location: login.php");
}

?>