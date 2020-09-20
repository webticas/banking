<?php
//Including Database details
include('db.php');

//Query to get transactions as per user's command
if ($_POST['trn_type'] === 'all') {
    $query = "SELECT * FROM `transactions` WHERE sender=".$_SESSION['userid'];
} else {
    $query = "SELECT * FROM `transactions` WHERE sender='".$_SESSION['userid']."' AND type='".$_POST['trn_type']."'";
}

//If deposit is successful or not
if ($result = mysqli_query($link,$query)) {
    
    $trnHolder = array(); //Array to hold return values of transaction data
    
    while($row = mysqli_fetch_array($result)) {
        array_push($trnHolder,$row); //Adding each transaction array to the trnHolder array
    }
    
    if (count($trnHolder) < 1) {
        $error = 'No Transaction Found!'; //In case user has done no transaction of specific Transaction Type
    } else {
        
        //Since there are transactions, we will prepare table to return to the user
        $error = '<table class="table"><tr><th>Date</th><th>Type</th><th>Amount</th><th>Receiver</th><th>Balance</th></tr>';
        
        //Now adding each transaction detail to the table
        foreach($trnHolder as $key=>$trnArray) {
            $error .= '<tr>
                <td>'.$trnArray[0].'</td>
                <td>'.$trnArray[4].'</td>
                <td>'.$trnArray[1].'</td>
                <td>'.$trnArray[3].'</td>
                <td>'.$trnArray[5].'</td>
            </tr>';
        }
        
        $error .= '</table>';
    }
} else {
     //In case if user ID is not found
    $error = 'Failed to load transactions! Please try again!';
}