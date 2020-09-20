<?php 
//Starting the session
session_start();

//Not giving access if user is not logged in
if (!$_SESSION['userid'] || $_SESSION['type'] != 'admin') {
    header('location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Deposit Page - The Online Bank</title>
</head>
<body>
<?php
    include('../view/header.html');
    echo '<div class="main-content">
    <a href="../admin.php" class="back">&larr; Back to Admin Panel</a>
    <h2>All Customers</h2>'
    .$_SESSION['admin-see'].
    '</div>';
    include('../view/footer.html');
?>
</body>
</html>