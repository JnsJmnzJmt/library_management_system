<?php 

include "database.php";

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";

    $result = mysqli_query($connection, $sql);

    if($result->num_rows>0) {
        $row = mysqli_fetch_assoc($result);
        if($row['password'] == $password) {
            $_SESSION['user_id'] = $row['id']; //yung id from the database ay stored sa session na may name na 'user_id'
            $_SESSION['role'] = $row['role'];
            // header("Location: dashboard.php");
            // exit();

            if($row['role'] == "admin") {
                header("Location: admin/dashboard.php");
            } else{
                header("Location: dashboard.php");
            }

        } else{
            header("Location: login.php");
        }

    } else {
        echo "Error! : " . mysqli_error($connection);
    }

}

?>

<!DOCTYPE html>
<html>

<!-- heading removed , put in separate file (heading.php)-->
<?php include "heading.php"; ?>

<body>

    <div class="register">
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Enter email"> <br>
            <input type="password" name="password" placeholder="Enter password"> <br>
            <button type="submit">Login</button> 
        </form>
    </div>
    
</body>

</html>