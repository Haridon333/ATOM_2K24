<?php 

//Open a new connection to the MySQL server
$conn = new mysqli('localhost', 'root', '', 'atom2k24');


//Output any connection error
if ($conn->connect_error) {
    die('Error : (' . $conn->connect_errno . ') ' . $conn->connect_error);
}

return $conn;