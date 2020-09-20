<?php 
//Starting the session
session_start();

//Not giving access if user is not logged in
if (!$_SESSION['userid']) {
    header('location: index.php');
}

if ($_POST) {
    $error = '';
    
    //Checking if user entered all details
    if (!$_POST['transfer'] || !$_POST['userid']) {
        $error = 'Please enter full details before proceeding.';
    } else if($_POST['transfer'] > $_SESSION['balance']) {
        $error = 'Your account does not have enough balance to transfer!'; //If transfer amount is higher than the user balance
    } else if ($_POST['transfer'] < 1) {
        $error = 'Please enter minimum amount of A$ 1!'; //If transfer amount is lower than 1, return an error
    } else if ($_POST['userid'] === $_SESSION['userid']) {
        $error = 'You cannot send funds to yourself!'; //If receiver user ID is same as user's then reject the transfer
    } else {
        include('./controller/transfer.php');
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Transfer Page - The Online Bank</title>
</head>
<body>
<?php
    include('./view/header.html');
    include('./view/transfer.html');
    echo '<br><br>'.$error.'</div>';
    include('./view/footer.html');
?>
</body>
</html>