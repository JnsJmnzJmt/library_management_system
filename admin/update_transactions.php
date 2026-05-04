<?php

session_start();
// $_SESSION['user_id'] = $row['id']; 
// $_SESSION['role'] = $row['role'];

include "../database.php";

if(isset($_SESSION['user_id'])){

    if($_SESSION['role'] == "admin"){
        
        if(isset($_GET['transaction_id'])){
            $transaction_id = $_GET['transaction_id']; 

                if(isset($_POST['update_button'])){
                $return_date = $_POST['return_date'];
                $status = $_POST['status'];

                $sql = "UPDATE transactions SET return_date = '$return_date', status = '$status' WHERE id = '$transaction_id' "; 
                $result = mysqli_query($connection, $sql);

                if(!$result){
                    echo "Error! : " . mysqli_error($connection);
                } else{
                    header("Location: view_transactions.php");
                }
            }
        } else{
            header("Location: view_transactions.php");
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
    <title>Document</title>
</head>

<body>
    <form action="update_transactions.php?transaction_id=<?php echo $transaction_id; ?>" method="POST">
        <input type="text" name="return_date" required placeholder="date-format: 2026-03-04">
        
        <select name="status">
            <option value="borrowed"> borrowed </option>
            <option value="returned"> returned </option>
        </select>


        <input type="submit" name="update_button" value="update">
    </form>    
</body>

</html>