<?php

include'connDB.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Import File</title>

    <style>
td,
th,
caption {
  border: 1px solid black;
  padding: .3em font-weight: bold;
  font-size: 125%;
}
caption {
  background-color: gray;
  color: #fff
}
th,
tr {
  text-align:center;
  font-size: 24px;
  font-family: Futura, 'Trebuchet MS', Arial, sans-serif
}
tr:hover {
  background-color: #f5f5f5
}
table {
  border: 1px solid #000;
  width: 100%
}
</style>

</head>
<body>
<header>
<div class="topnav"> 
  <a class="active" href="#uploadData.php">Import Data</a>
  <a href="empRecord.php">Employee Table</a>
  <a href="searchEmp.php">Search Record</a>
  <a href="addEmp.php">Add Record</a>
  <a href="exportData.php">Export Data</a>
  <a href="logout.php" style="float:right;">Logout</a>

</div>
    </header>
<link rel="stylesheet" type="text/css" href="css/empRecordstyle.css">

	<div class="container">
		
	</div>

	<div class="row">
    <div align="center">
		<!-- form for uploading csv file --><br>
		<form action="importData.php" method="post" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="submit" name="importSubmit" value="UploadFile">
		</form>
    </div>
        <h1>Employee List</h1>
		<!-- table for listing data-->
		<table class="table table-striped table-bordered">
        <thead class="thead-dark">
			<tr>
				<th>Empid</th>
				<th>Name</th>
				<th>Technical Contribution</th>
				<th>CsrActivity</th>
				<th>CustomerRating</th>
				<th>PeersRating</th>
				<th>Adherence</th>
			</tr>
		</thead>
		<tbody>
			<?php


        // Get employee rows
        $sql = ("SELECT * FROM employee order by empid desc LIMIT 10 ");
        $result=$conn->query($sql);

		//$result = $db->query("SELECT * FROM employee");

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
        ?>
            <tr>
                <td><?php echo $row['empid']; ?></td>
                <td><?php echo $row['empName']; ?></td>
                <td><?php echo $row['techProject']; ?></td>
                <td><?php echo $row['csrActivity']; ?></td>
                <td><?php echo $row['custRating']; ?></td>
                <td><?php echo $row['peersRating']; ?></td>
                <td><?php echo $row['adherence']; ?></td>
            </tr>
        <?php } }else{ ?>
            <tr><td colspan="7">No member(s) found...</td></tr>
        <?php 
        }
			  ?>
		</tbody>
		</table>
	</div>

</body>
</html>