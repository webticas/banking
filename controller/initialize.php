<?php
include('db.php');

$tableQuery = "CREATE TABLE users (
userid INT(7) UNSIGNED,
password VARCHAR(30) NOT NULL,
balance INT(11) NOT NULL,
userType ENUM('user','admin') NOT NULL,
name VARCHAR(30) NOT NULL
)";

$tableQuery2 = "CREATE TABLE transactions (
date DATE NOT NULL,
amount INT(11) NOT NULL,
sender INT(7) NOT NULL,
receiver INT(7) NOT NULL,
type VARCHAR(16) NOT NULL,
balance INT(11) NOT NULL
)";

if(mysqli_query($link,$tableQuery)) {
    mysqli_query($link,$tableQuery2);
    $query = "INSERT INTO `users` (userid,password,userType,name) VALUES (1110001,'abcdef','admin','Victor Font')";
    $query2 = "INSERT INTO `users` (userid,password,name) VALUES (1110002,'123456','Joseph Bartomeu')";
    
    if (mysqli_query($link,$query)) {
        mysqli_query($link,$query2);
        echo "The Database has been successfully initialized!<br>
        User 1 (Admin) : User ID: 1110001 Password: abcdef<br>
        User 2 (User) : User ID: 1110002 Password: 123456<br>";
    } else {
        echo "Database failed to initialize!";
    }
} else {
    echo "Database failed to initialize!";
}
?>