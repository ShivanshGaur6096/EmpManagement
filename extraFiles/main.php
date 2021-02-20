<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<!-- <?php include'css/main.css'; ?> -->


</head>
<body>
<div>
	<center><h1>List of Employee</h1></center>
</div>

<div>
<table>
<tr>
<th>ID</th>
<th>NAME</th>
<th>TECHNICAL CONTRIBUTION</th>
<th>CSR COMPLETED</th>
<th>CUSTOMER RATING</th>
<th>PEERS RATING</th>
<th>POLICIES ADHERANCE</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "empdata");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM employee";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<tr><td>" . $row["empid"]. "</td><td>" . $row["empName"] . "</td><td>". $row["techProject"]
		."</td><td>". $row["csrActivity"]."</td><td>". $row["custRating"] ."</td><td>". $row["peersRating"] ."</td><td>"
		. $row["adherence"] ."</td></tr>";
	}echo "</table>";
} 
else {
	 echo "Error or 0 Result"; 
	}
$conn->close();
?>
</table>
</div>
<br><br>
<div>
    <a href="addEmp.php">Add Record</a>
</div>
</body>
</html>