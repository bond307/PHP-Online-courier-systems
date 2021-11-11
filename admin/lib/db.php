<?php
$DBserver = "localhost";
$DBuser = "root";
$DBpass = "";
$DBname = "dhakacit_couriar";

// Create connection
$conn = new mysqli($DBserver, $DBuser, $DBpass, $DBname);
mysqli_set_charset($conn,"utf8");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>