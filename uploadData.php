<?php

include'connDB.php';


if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Employee data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>ImportCsvFile</title>

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
<div>
	<button><a href="searchEmp.php">Search Record</a></button>
</div>

	<div class="container">
		<th>Employee List</th>
	</div>

	<div class="row">
		<!-- form for uploading csv file -->
		<form action="importData.php" method="post" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="submit" name="importSubmit" value="UploadFile">

		</form>


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
        $sql = ("SELECT * FROM employee LIMIT 3 ");
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
        <?php } 


			  ?>
		</tbody>
		</table>
	</div>

    <div>
	<button><a href="empRecord.php">Employee Table</a></button>
</div>
</body>
</html>