<?php

include 'connDB.php';
    $id = $_GET['empid'];

    $deleteQuery = "DELETE FROM employee where empid=$id";
    $result = mysqli_query($conn, $deleteQuery);
    header ("Location: empRecord.php");
?>