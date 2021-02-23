<?php
$username = "root";
$password = "";
$server = "localhost";
$db = "empdata";
#$conn = mysqli_connect("localhost", "root", "", "test);
$conn = mysqli_connect($server, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>