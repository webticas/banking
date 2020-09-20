<?php

session_start(); 

include('db.php');

$query = "SELECT * FROM users WHERE userid=".$_SESSION['userid'];

//If connected, search for the user else return error
$returnUser =  mysqli_query($link,$query);
$userDetails = mysqli_fetch_array($returnUser);

//In case user is found
if ($userDetails) {
    $_SESSION['balance'] = $userDetails[2]; //Saving user balance in session to show on dashboard        
    header('Location: ../dashboard.php');
} 

?>