<html>
    <head>
        <title>addRecord</title>
    </head>
<body>
<header>
<div class="topnav">
  <a class="active" href="#addEmp.php">Add Employee</a>
  <a href="searchEmp.php">Search Record</a>
  <a href="empRecord.php">Employee Record</a>
  <a href="exportData.php">Export Data</a>
  <a href="uploadData.php">Import Data</a>
  <a href="logout.php">Logout</a>

</div>
    </header>
<link rel="stylesheet" type="text/css" href="css/empRecordstyle.css">
<center>
<div class="box">
<h2>Employee Register</h2>
<form action="" method="POST">
    <label for="empid">Employee ID</label><br>
    <input type="text" class="empid" name="empid" placeholder="Auto Generated" value="" disabled="disabled" /><br><br>

    <label for="fullname">Name</label><br>
    <input type="text" class="fullname"  name="empName" placeholder="Full Name*" value="" required/><br><br>
    
    <label for="techProject">Technical Contribution to the project</label><br>
    <input type="number" min="0" class="techProject" name="techProject" placeholder="Numeric Value*" value="" required/><br><br>
    
    <label for="csr">Participation in CSR activities</label><br>
    <input type="number" min="0" class="csr" name="csrActivity" placeholder="Numeric Value" value=""><br><br>
    
    <label for="custFeedback">Employee’s feedback from Customer</label><br>
    <input type="radio" class="custFeedback" name="custFeedback" value="1">
    <label for="custFeedback">1</label>
    <input type="radio" class="custFeedback" name="custFeedback" value="2">
    <label for="custFeedback">2</label>
    <input type="radio" class="custFeedback" name="custFeedback" value="3">
    <label for="custFeedback">3</label>
    <input type="radio" class="custFeedback" name="custFeedback" value="4">
    <label for="custFeedback">4</label>
    <input type="radio" class="custFeedback" name="custFeedback" value="5">
    <label for="custFeedback">5</label><br><br>

    <label for="peersFeedback">Employee’s feedback from Peers</label><br>
    <input type="radio" class="peersFeedback" name="peersFeedback" value="1">
    <label for="peersFeedback">1</label>
    <input type="radio" class="peersFeedback" name="peersFeedback" value="2">
    <label for="peersFeedback">2</label>
    <input type="radio" class="peersFeedback" name="peersFeedback" value="3">
    <label for="peersFeedback">3</label>
    <input type="radio" class="peersFeedback" name="peersFeedback" value="4">
    <label for="peersFeedback">4</label>
    <input type="radio" class="peersFeedback" name="peersFeedback" value="5">
    <label for="peersFeedback">5</label><br><br>

    <label for="adherence">Adherence to company’s policies</label><br>
    <select name="adherence" class="adherence">
    <option></option>
    <option value="High">High</option>
    <option value="Average">Average</option>
    <option value="Low">Low</option>
  </select><br><br>


  <input type="submit" name="addEmplyee" value="Add Employee">
</form> 
</center>

</body>
</html>
<?php
include 'connDB.php';
if(isset($_POST['addEmplyee'])){
    header ("Location: empRecord.php");

    $empname = $_POST['empName'];
    $techProject = $_POST['techProject'];
    $csrActivity = $_POST['csrActivity'];
    $custFeedback = $_POST['custFeedback'];
    $peersFeedback = $_POST['peersFeedback'];
    $adherence = $_POST['adherence']; 

    $addQuery = "INSERT INTO employee (empName, techProject, csrActivity, custRating, peersRating, adherence) 
                            VALUES ('$empname','$techProject','$csrActivity','$custFeedback','$peersFeedback','$adherence')";
    
    $result = mysqli_query($conn, $addQuery);

    if($result){
        ?>
        <script>
            alert("Data Added Successfuly");
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert("Failed To Store Data");
        </script>
        <?php
    }
}
?>