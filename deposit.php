<?php 
//Starting the session
session_start();

//Not giving access if user is not logged in
if (!$_SESSION['userid']) {
    header('location: index.php');
}


if ($_POST) {
    $error = '';
    
    if (!$_POST['deposit']) {
        $error = 'Please enter valid amount!';
    } else {
        include('./controller/deposit.php');
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Deposit Page - The Online Bank</title>
</head>
<body>
<?php
    include('./view/header.html');
    include('./view/deposit.html');
    echo '<br><br>'.$error.'</div>';
    include('./view/footer.html');
?>
</body>
</html>