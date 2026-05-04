<?php

include "database.php";

$sql = "SELECT * FROM books";
$result = mysqli_query($connection, $sql);

if(!$result){
    echo "Error! : " . mysqli_error($connection);
} else{
            
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    
    <style type="text/css">
        
        *{
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        header{
            padding: 30px;
            background-color: gray;
            position: fixed;
            top: 0;
            width: 100%;

        }

        footer{
            position: fixed;
            bottom: 0;
            background-color: gray;
            width: 100%;
            padding: 10px;
            text-align: center;
        }

        .index-section{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 100px;
            background-color: green;
        }

        .index-section div{
            width: 200px;
            text-align: center; 
        }

        .index-section img{
            width: 60%;
        }

    </style>
</head>

<body>
    <header> 
        <h1>Library Home Page</h1> 
    </header>

    <section class="index-section">

        <?php 
            while($row = mysqli_fetch_assoc($result)) {
        ?>

        <div>
            <img src="image/<?php echo "{$row['image']}" ?>">
            <p> Book Title: <?php echo "{$row['title']}" ?> </p>
            <p> Author: <?php echo "{$row['author']}" ?> </p>
            <p> ISBN: <?php echo "{$row['isbn']}" ?> </p>
            <p> Quantity: <?php echo "{$row['quantity']}" ?> </p>
        </div>

        <?php } ?>

    </section>

    <footer>Copyright @Jonas_JJ</footer>
</body>

</html>