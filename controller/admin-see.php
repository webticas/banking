<?php
//Including Database details
include('db.php');

//Query to get all users from database
$query = "SELECT * FROM `users`";

if ($result = mysqli_query($link,$query)) {
    
    $trnHolder = array(); //Array to hold return values of users data
    
    while($row = mysqli_fetch_array($result)) {
        array_push($trnHolder,$row); //Adding each user array to the trnHolder array
    }
    
    if (count($trnHolder) < 1) {
        $error = 'No User Found!'; //In case there is no user
    } else {
        
        //Since there are users, we will prepare table
        $seeData = '<table class="table" id="#users"><tr><th>User ID</th><th>Balance</th><th>User Type</th><th>Name</th></tr>';
        
        //Now adding each transaction detail to the table
        foreach($trnHolder as $key=>$trnArray) {
            $seeData .= '<tr>
                <td>'.$trnArray[0].'</td>
                <td>'.$trnArray[2].'</td>
                <td>'.$trnArray[3].'</td>
                <td>'.$trnArray[4].'</td>
            </tr>';
        }
        
        $seeData .= '</table>';
        
        $_SESSION['admin-see'] = $seeData; //saving table in the session to show on See Page
        
        header('location: admin/see.php'); //Redirecting to See Page
    }
} else {
     //In case if user ID is not found
    $error = 'Failed to load users! Please try again!';
}