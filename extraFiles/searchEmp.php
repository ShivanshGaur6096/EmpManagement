<!DOCTYPE html>
<html>

<body>

<form action="" method="POST">
<label>Search</label>
<input type="text" name="searchEmp" placeholder="Search by Name">
<input type="submit" name="searchEmp">
</form>

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

		<?php

		include 'connDB.php';

		if (isset($_POST['searchEmp'])) {

			$searchEmp = $_POST['searchEmp'];

			$searchQuery = "SELECT * FROM employee WHERE empName={$searchEmp}";
			
			$result = mysqli_query($conn, $searchQuery);
			$row = mysqli_num_rows($result);
				
			if($row = mysqli_fetch_array($query)){
				?>
		
			<tr>
				<td> <?php echo $row['empid'] ?> </td>
            	<td> <?php echo $row['empName'] ?> </td>
            	<td> <?php echo $row['techProject'] ?> </td>
            	<td> <?php echo $row['csrActivity'] ?> </td>
            	<td> <?php echo $row['custRating'] ?> </td>
            	<td> <?php echo $row['peersRating'] ?> </td>
            	<td> <?php echo $row['adherence'] ?> </td>
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
				<?php
			}else{
				echo "No record Found";
			}
			?>
		</tbody>
		</table>
		<br><br>

<div>
	<button><a href="empRecord.php">Add Record</a></button>
</div>

</body>
</html>
