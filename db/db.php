<?php
$servername = "localhost:3306";
$database = "bizzhelp_newsoundkade";
$username = "bizzhelp_newsndkade";
$password = "123456789!";
 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

 if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
 }
 
?>