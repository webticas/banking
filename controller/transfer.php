<?php
//Importing database
include('db.php');

$transfer = $_POST['transfer'];
$receiver = $_POST['userid'];
$sender = $_SESSION['userid'];

//Query to update balance of receiver
$query = "UPDATE `users` SET balance=balance+'$transfer' WHERE userid='$receiver'";

//Query to update balance of sender
$query2 = "UPDATE `users` SET balance=balance-'$transfer' WHERE userid='$sender'";

//Query to add transaction details in `transaction` database
$balance = $_SESSION['balance']-$transfer;
$query3 = "INSERT INTO `transactions` (date,amount,sender,receiver,type,balance) VALUES ('".date('Y-m-d')."','".$_POST['transfer']."','".$_SESSION['userid']."','".$_POST['userid']."','transfer','$balance')";


//If receiver's User ID is correct then send him amount else return error
if (mysqli_query($link,$query) && mysqli_query($link,$query2)) {
    mysqli_query($link,$query3);
     
    $_SESSION['balance'] = intval($_SESSION['balance'])-$transfer; //Saving user balance in session to show on dashboard        

    //Giving out success message since transfer is successful
    $error = 'Transfer is successfull! <br><a href="dashboard.php">Go Back to Dashboard</a>';
} else {
     //In case if user ID is not found
    $error = 'The User ID of the receiver is wrong!';
}