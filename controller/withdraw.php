<?php
include('db.php');

//Query to update user's balance after withdraw
$query = "UPDATE `users` SET balance=balance-".$_POST['withdraw']." WHERE userid=".$_SESSION['userid'];

//Query to add transaction details in `transaction` database
$balance = $_SESSION['balance']-$_POST['withdraw'];
$query2 = "INSERT INTO `transactions` (date,amount,sender,type,balance) VALUES ('".date('Y-m-d')."','".$_POST['withdraw']."','".$_SESSION['userid']."','withdraw','$balance')";

//If deposit is successful or not
if (mysqli_query($link,$query)) {
    
    mysqli_query($link,$query2);
    
    $_SESSION['balance'] = intval($_SESSION['balance'])-$_POST['withdraw']; //Saving user balance in session to show on dashboard        

    //Giving out success message since deposit is successful
    $error = 'Withdrawal is successfull! <br><a href="dashboard.php">Go Back to Dashboard</a>';
} else {
     //In case if user ID is not found
    $error = 'Something went wrong! Please re-login';
}