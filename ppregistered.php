<?php

session_start();

$ppname = $_POST['ppname'];
$email = $_SESSION['email'];

include_once 'includes/dbh.inc.php'; 

$query = "SELECT pp FROM members WHERE email='$email'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$num_row = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if ($num_row = 1) {

    $_SESSION['pp'] = $row['pp'];
    $ev_arr = explode (", ", $_SESSION['pp']); 
    
    if (in_array($ppname, $ev_arr)){
        echo 'rem';
    }else {
        $query = "UPDATE members SET pp=concat('$ppname' , ', ' , pp) WHERE email = '$email'" ;
        $sql = "UPDATE pp SET `$ppname`='yes' WHERE email = '$email'";
        $update = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if ($email){
            echo 'true';
        }else {
            echo 'false';
        }
        
    }

} else{
    echo 'false';
}

?>