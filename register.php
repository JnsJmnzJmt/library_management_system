<?php

include "database.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name','$email','$password','$role')";

    $result = mysqli_query($connection, $sql);

    if(!$result){
        echo "Error! : " . mysqli_error($connection); //not the same with the actual code
    }
    else{
        echo "You have successfully connected!";
    }
}

?>

<!DOCTYPE html>
<html>

<!-- heading removed , put in separate file (heading.php)-->
<?php include "heading.php"; ?>

<body>

    <div class="register">

    <div class="form-box">
        <form action="register.php" method="POST">
            <input type="text" name="name" placeholder="Enter name"> <br>
            <input type="email" name="email" placeholder="Enter email"> <br>
            <input type="password" name="password" placeholder="Enter password"> <br>
            <input type="text" name="role" value="user" hidden> <br>
            <button type="submit">Sign up</button> 
        </form>

        <p>Already have an account?</p>

        <a href="login.php">
            <button type="button" class="login-btn">Login</button>
        </a>
    </div>


    </div>
    
</body>

</html>