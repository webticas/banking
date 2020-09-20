<?php 
//Starting the session
session_start();

//Not giving access if user is not logged in
if (!$_SESSION['userid'] || $_SESSION['type'] != 'admin') {
    header('location: ../index.php');
}

if($_POST['form1']) {
    $bool = true;
    
    foreach ($_POST['field'] as $checked) {
        if(!$_POST[$checked]) {
           $bool = false; 
    }}
    
    if ($bool) {
         $editVariable = 'edit';
        include('../controller/admin-edit.php');  
    } else {
        $error = "No value provided";
    }
} else if ($_POST['form2']) {
    $editVariable = 'delete';
    include('../controller/admin-edit.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Edit Customer - The Online Bank</title>
</head>
<body>
<?php
    include('../view/header.html');
?>

<div class="main-content dashboard">
    <a href="../admin.php" class="back">&larr; Back to Admin Panel</a>
    <h2>Edit/Delete Customer</h2>
    <p>First select the fields you want to edit. Then edit the new value for those fields in the form and then click 'Edit Customer'.</p>
    <?php 
    echo $_SESSION['edit-form'];
    ?>
    <br><br>OR<br><br>
    <form method="post">
        <input type="submit" value="DELETE THIS CUSTOMER" style="background:red;color:#fff" name="form2">
    </form>
    <?php echo '<br>'.$error; ?>
</div>
    

<?php
    include('../view/footer.html');
?>
</body>
</html>