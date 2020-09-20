<?php
include('db.php');
$query = "SELECT * FROM users WHERE userid=".$_POST['userid'];

//If connected, search for the user else return error
$returnUser =  mysqli_query($link,$query);
$userDetails = mysqli_fetch_array($returnUser);

//In case user is found
if ($userDetails) {
    //In case of correct user ID and password
    if ($userDetails[1] === $_POST['password']) {
        $_SESSION['userid'] = $userDetails[0]; //Saving user ID in session to show on dashboard
        $_SESSION['balance'] = $userDetails[2]; //Saving user balance in session to show on dashboard        
        $_SESSION['name'] = $userDetails[4]; //Saving user name in session to show on dashboard
        $_SESSION['type'] = $userDetails[3]; //Saving user type in session to determine whether it's admin or user       

        if ($_SESSION['type'] === 'admin') {
            header('Location: admin.php');
        } else {
            header('Location: dashboard.php');
        }
    } else {
        //In case of wrong password
        $error = 'Wrong User ID or Password';
    }
} else {
     //In case if user ID is not found
    $error = 'Wrong User ID or Password';
}

?>