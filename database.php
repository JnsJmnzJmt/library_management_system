<?php

$server = "localhost";
$user = "root";
$password = "";
$database_name = "library_database";

$connection = new mysqli($server, $user, $password, $database_name);

if(!$connection){
    echo "Error! : {$connection -> connect_error}";
}
// else{
//     echo "Connected Successfully";
// }

?>