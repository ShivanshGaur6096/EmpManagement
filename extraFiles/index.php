<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 40%;
color: #0D0C0C;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #2F6866;
color: whITE;
}
tr:nth-child(even) {background-color: #748829}
</style>
</head>
<body>
<table>
<tr>

<th>Username</th>
<th>Password</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "test");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM test1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Username"]. "</td><td>" . $row["Password"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>