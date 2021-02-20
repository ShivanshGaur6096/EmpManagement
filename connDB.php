<?php
$username = "root";
$password = "";
$server = "localhost";
$db = "empdata";
#$conn = mysqli_connect("localhost", "root", "", "test);
$conn = mysqli_connect($server, $username, $password, $db);
if($conn){
    ?>
        <script>
            alert("Connection to Database Established");
        </script>
        <?php
    
}
else{
    ?>
        <script>
            alert("Unable to connect to Database");
        </script>
        <?php
}

?>