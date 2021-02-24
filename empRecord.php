<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
<html>
<head>
<title>Employee Record</title>
<link rel="stylesheet" type="text/css" href="css/empRecordstyle.css">
</head>

<body>
<header>
<div class="topnav">
  <a class="active" href="#empRecord.php">Employee Table</a>
  <a href="searchEmp.php">Search Record</a>
  <a href="addEmp.php">Add Record</a>
  <a href="exportData.php">Export Data</a>
  <a href="uploadData.php">Import Data</a>
  <a href="logout.php" style="float:right;">Logout</a>

</div>
    </header>
    <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
<div>

<h1>List of Employee</h1>
</div>

<div>
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

</body>
</html>
<?php
}
else{
    header("Location: userLogin.php");
    exit();
}
?>




