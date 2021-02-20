<!DOCTYPE html>
<html>
<head>
	<title>searchEmp</title>
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

<form action="" method="POST">
<label>Search</label>
<input type="text" name="search" placeholder="Search by Name">
<input type="submit" name="submit">
	
</form>



<?php

$con = new PDO("mysql:host=localhost;dbname=empdata",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
    $sth = $con->prepare("SELECT * FROM employee WHERE empName = '$str'");
    
    

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
		<thead>
			<tr>
				<th>ID</th>
                <th>NAME</th>
                <th>TECHNICAL CONTRIBUTION</th>
                <th>CSR COMPLETED</th>
                <th>CUSTOMER RATING</th>
                <th>PEERS RATING</th>
                <th>POLICIES ADHERANCE</th>
				<th colspan="2">Operation</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><?php echo $row->empid; ?></td>
				<td><?php echo $row->empName;?></td>
                <td><?php echo $row->techProject;?></td>
                <td><?php echo $row->csrActivity;?></td>
                <td><?php echo $row->custRating;?></td>
                <td><?php echo $row->peersRating;?></td>
                <td><?php echo $row->adherence;?></td>
				<td>
                    <a href="editDetail.php?empid=<?php echo $row['empid'] ?>">
                    <button class="actionButton" id="idEditButton" onclick="idEditButton_onclick();">
                    Edit
                    </button></a>
                </td>
                <td>
                    <a href="deleteEmp.php?empid=<?php echo $row['empid'] ?>">
                    <button class="actionButton" id="idDeleteButton" onclick="idDeleteButton_onclick();">
                    Delete
                    </button></a>
                </td>
			</tr>
			<tbody>
		</table>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?>

<br><br>
bababababababb
<div>
	<button><a href="addEmp.php">Add Record</a></button>
</div>

</body>
</html>