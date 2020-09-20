<?php 
//Starting the session
session_start();

//Not giving access if user is not logged in
if (!$_SESSION['userid']) {
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard - The Online Bank</title>
</head>
<body>
<?php
    include('./view/header.html');
    echo '<div class="dashboard-text left-text">Welcome, <span class="dynamic-text">'.$_SESSION["name"].'!</span></div>';
    echo '<div class="dashboard-text left-text">Your User ID: <span class="dynamic-text">'.$_SESSION['userid'].'</span></div>';
    echo '<div class="dashboard-text right-text">Current Balance: <span class="dynamic-text">A$ '.$_SESSION['balance'].'</span></div>';
    include('./view/dashboard.html');
    include('./view/footer.html');
?>
</body>
</html>