<?php 
//Starting the session
session_start();

//Not giving access if user is not logged in
if (!$_SESSION['userid'] || $_SESSION['type'] != 'admin') {
    header('location: index.php');
}

//Handling Form Submissions
if ($_POST['form1']) {
    include('controller/admin-see.php');
} else if ($_POST['form2']) {
    $editVariable = 'select';
    include('controller/admin-edit.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Panel - The Online Bank</title>
</head>
<body>
<?php
    include('./view/header.html');
    echo '<div class="dashboard-text left-text">Welcome, <span class="dynamic-text">'.$_SESSION["name"].'!</span></div>';
    echo '<div class="dashboard-text left-text">Your User ID: <span class="dynamic-text">'.$_SESSION['userid'].'</span></div>';
    echo '<div class="dashboard-text right-text">You are administrator!</span></div>';
    include('./view/admin.html');
    echo $error.'</div>'; //showing return value from PHP commands
    include('./view/footer.html');
?>
</body>
</html>