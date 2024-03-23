<?php
@ob_start();
session_start();

$email = $_SESSION['email'];

if (isset($email) && $email == 'karthikeyan20030106@gmail.com') {

include_once '../includes/dbh.inc.php'; 
$id = $_GET['id'];
//echo "<h1>" . $id . "</h1>";

$query = "SELECT * FROM members WHERE id = '$id'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$num_row = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

$fname = $row['fname'];
$email = $row['email'];
$mobile = $row['mobile'];
$department = $row['department'];
$events = $row['events'];
$workshops = $row['workshops'];
$flagship = $row['flagship'];

echo "<h1>ATOM2k23" . $id . "</h1>";
echo "<h2>" . $fname . "</h2>";
echo "<h2>" . $email . "</h2>";
echo "<h2>" . $mobile . "</h2>";
echo "<h2>" . $department . "</h2>";






?>


<?php

} else {
    header("location:../index.php ");
}

?>