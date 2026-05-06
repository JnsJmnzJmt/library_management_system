<?php

session_start();

// if (isset($_GET['user_id'])){
//     session_destroy();
// }

session_destroy();


header("Location: login.php");

exit();
