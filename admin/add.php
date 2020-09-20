<?php 
//Starting the session
session_start();

//Not giving access if user is not logged in
if (!$_SESSION['userid'] || $_SESSION['type'] != 'admin') {
    header('location: ../index.php');
}

if($_POST) {
    if (!$_POST['name'] || !$_POST['password'] || !$_POST['userType']) {
        $error = "Please fill all details before proceeding!";  
    } else {
        include('../controller/admin-add.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Add Customer - The Online Bank</title>
</head>
<body>
<?php
    include('../view/header.html');
?>

<div class="main-content dashboard">
    <a href="../admin.php" class="back">&larr; Back to Admin Panel</a>
    <h2>Add New Customer</h2>
    <form method="post">
        Name of the Customer: 
        <input type="text" name="name"><br><br>
        Set Password:  
        <input type="text" name="password"><br><br>
        Initial Balance: 
        <input type="number" name="balance"><br><br>
        User Type: 
        <select name="userType">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br><br>
        <input type="submit" value="Add Customer">
    </form>
    
    <?php echo $error ?>
</div>
    

<?php
    include('../view/footer.html');
?>
</body>
</html>