<?php
//Including Database details
include('db.php');

$name = $_POST['name'];
$password = $_POST['password'];
$userType = $_POST['userType'];
$balance = $_POST['balance'];

$lastRecordQuery = 'SELECT * FROM `users` ORDER BY userid DESC LIMIT 1';

if($lastRecord = mysqli_query($link,$lastRecordQuery)) {
  $lastRecordArray = mysqli_fetch_array($lastRecord);
  $nextUserId = $lastRecordArray[0]+1;
};

$query = "INSERT INTO `users` (userid, password, balance, userType, name) VALUES ('$nextUserId','$password','$balance','$userType','$name')";

if ($result = mysqli_query($link,$query)) {
    $error = 'User Successfully Added!<br>
    User ID: '.$nextUserId.'<br>
    Password: '.$password;
} else {
     //In case user is failed to be added
    $error = 'Failed to add User!';
}

?>