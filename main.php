<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>

table {
border-collapse: collapse;
width: 100%;
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
<div>
	<h1>List of Employee</h1>
</div>

<div>
<table>
<tr>
<th>ID</th>
<th>NAME</th>
<th>CSR COMPLETED</th>
<th>CUSTOMER RATING</th>
<th>PEERS RATING</th>
<th>POLICIES ADHERANCE</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "employee");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT ID, EMP_NAME, CSR_PARTS, CUSTOMER_RATING, PEERS_RATING, ADHERANCE FROM sample";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["EMP_NAME"] . "</td><td>"
. $row["CSR_PARTS"]."</td><td>". $row["CUSTOMER_RATING"] ."</td><td>". $row["PEERS_RATING"] ."</td><td>". $row["ADHERANCE"] ."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</div>
</body>
</html>