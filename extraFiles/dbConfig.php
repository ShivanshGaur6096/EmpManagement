<?php
$username = "root";
$password = "";
$server = "localhost";
$db = "employee";
$conn = mysqli_connect($server, $username, $password, $db);
if($conn){
    ?>
        <script>
            alert("Connection to Database Established ");
        </script>
        <?php
    //echo "Connected to Database";
}
else{
    echo "Unable to connect to Database";
}

?>