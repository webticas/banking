<?php
//Including Database details
include('db.php');

$userid = $_POST['edit_customer'];

if($editVariable === 'select') {
    $getUserQuery = "SELECT * FROM `users` WHERE userid='$userid'";
    
    if($getUser = mysqli_query($link,$getUserQuery)) {
        $getUserArray = mysqli_fetch_array($getUser);
        $_SESSION['edit-form'] = '
            User Selected: '.$getUserArray[0].'
            <form method="post">
                Check the fields, you want to change: 
                <input type="checkbox" name="field[]" value="name" />Name
                <input type="checkbox" name="field[]" value="password" />Password
                <input type="checkbox" name="field[]" value="balance" />Balance
                <input type="checkbox" name="field[]" value="userType" />User Type<br><br>
                Name of the Customer: 
                <input type="text" name="name" value="'.$getUserArray[4].'"><br><br>
                Password:  
                <input type="text" name="password" value="'.$getUserArray[1].'"><br><br>
                Balance: 
                <input type="number" name="balance" value="'.$getUserArray[2].'"><br><br>
                User Type: 
                <select name="userType">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select><br><br>
                <input type="submit" value="Edit Customer" name="form1">
            </form>
        ';
        
        $_SESSION['user-to-edit'] = $getUserArray[0];
        header('location: admin/edit.php');
    } else {
        $error = 'Failed to find the user';
    }
} else if ($editVariable === 'delete') {
    $userToDelete = $_SESSION['user-to-edit'];
    $deleteUserQuery = "DELETE FROM `users` WHERE userid='$userToDelete' LIMIT 1";
    
    if (mysqli_query($link,$deleteUserQuery)) {
        $error = 'User with User ID: '.$userToDelete.' has been successfully deleted!<br>
        <a href="../admin.php">Back to Admin Panel</a>';
    } else {
        $error = 'Fail to delete user';
    }
} else if ($editVariable === 'edit') {
    $editString = "";

    foreach ($_POST['field'] as $key=>$checked) {
        if($key === count($_POST['field'])-1) {
            if ($checked === 'balance') {
                $editString .= ' '.$checked."=".$_POST[$checked];
            } else {
                $editString .= ' '.$checked."='".$_POST[$checked]."'";
            }
        } else {
            if ($checked === 'balance') {
                $editString .= ' '.$checked."=".$_POST[$checked].',';
            } else {
                $editString .= ' '.$checked."='".$_POST[$checked]."',";
            }
        }
    }
    
    $userToEdit = $_SESSION['user-to-edit'];

    $editQuery = "UPDATE `users` SET".$editString." WHERE userid='$userToEdit'";
    
    if (mysqli_query($link,$editQuery)) {
        $error = 'User with User ID: '.$userToEdit.' has been successfully edited!<br>
        <a href="../admin.php">Back to Admin Panel</a>';
    } else {
        $error = 'Fail to edit user';
    }
}
?>