<?php 

//Starting the session
session_start();

if ($_POST) {
    $error = '';
    
    if (!$_POST['userid'] || !$_POST['password']) {
        $error = 'Please fill both User ID and Password';
    } else {
        include('./controller/login.php');
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to The Online Bank</title>
</head>
<body>
<?php
    include('./view/header.html');
    include('./view/index.html');
    echo $error,'</div>';
    include('./view/footer.html');
?>
</body>
</html>
