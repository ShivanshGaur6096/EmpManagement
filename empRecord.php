<html>
<head>
    <title>empRecord</title>
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
	<button><a href="employeedata.php">Search Record</a></button>
</div>
    <br><br>
    <div>
        <center><h1>List of Employee</h1></center>
    </div>

    <div>
        <heading>
        <div class='center'>
        <div class='table'>
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
                        
                        $select = "SELECT * FROM employee";
                        $query = mysqli_query($conn,$select);
                        $row = mysqli_num_rows($query);

                        while($res = mysqli_fetch_array($query)) {
                                ?>
                        <tr>
                            <td> <?php echo $res['empid'] ?> </td>
                            <td> <?php echo $res['empName'] ?> </td>
                            <td> <?php echo $res['techProject'] ?> </td>
                            <td> <?php echo $res['csrActivity'] ?> </td>
                            <td> <?php echo $res['custRating'] ?> </td>
                            <td> <?php echo $res['peersRating'] ?> </td>
                            <td> <?php echo $res['adherence'] ?> </td>
                            
                            <td>
                                <a href="editDetail.php?empid=<?php echo $res['empid'] ?>">
                                <button class="actionButton" id="idEditButton" onclick="idEditButton_onclick();">
                                    Edit
                                </button></a>
                            </td>
                            
                            <td>
                                <a href="deleteEmp.php?empid=<?php echo $res['empid'] ?>">
                                <button class="actionButton" id="idDeleteButton" onclick="idDeleteButton_onclick();">
                                    Delete
                                </button></a>
                            </td>
                        </tr>
                                <?php

                            }
                        ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>

    <br><br>

    <div>
        <button><a href="addEmp.php">Add Record</a></button>
    </div>

</body>
</html>





