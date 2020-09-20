<?php

//Database Variables
$host = "";  
$user = "";  
$password = "";  
$db_name = "";
    
//Connecting to Database
$link = mysqli_connect($host, $user,$password,$db_name);

//If failed to connect then return error
if (mysqli_connect_error()) {
    die('Server Error! Please Try Again');
}

?>