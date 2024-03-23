<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$response = '';
require './includes/dbh.inc.php';

$query = "SELECT * FROM members WHERE email = '$email'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$num_row = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);



if ($num_row >=1 ){
    
    if (password_verify($password, $row['password'])){

        $uemail = $row['email'];

        $sql = "SELECT * FROM members WHERE email = '$uemail'";
        $result1 = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $num_row = mysqli_num_rows($result1);
        $row1 = mysqli_fetch_array($result1);

        $_SESSION['login'] = $row1['id'];
        $_SESSION['fname'] = $row1['fname'];
        $_SESSION['email'] = $row1['email'];

   
        // $_SESSION['genfee'] = $row['genfee'];


        // $_SESSION['genfee'] = $row['genfee'];
        // $response = 'You have successfully logged in';
        // echo 'You have successfully logged in';
        echo 'true';
    }
    else{
        // $response = 'Login Failed';
        // echo 'Login Failed';
        echo 'pass';
    }
} else {
echo 'false';
}