<?php
$servername = "localhost:3306";
$database = "bizzhelp_newsoundshop";
$username = "bizzhelp_bizzhelp_newsoundshop";
$password = "Ucsc@123";
 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

 if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
 }
 
?>