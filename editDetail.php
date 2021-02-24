<?php
                        include 'connDB.php';

                        $empID = $_GET['empid'];
                        $dataInput = "select * from employee where empid={$empID}";
                        $showData = mysqli_query($conn, $dataInput);
                        $printData = mysqli_fetch_array($showData);
                         
                        if(isset($_POST['submit'])){
                            header ("Location: empRecord.php");

                            $dataUpdate = $_GET['empid'];
                                                        
                            $empname = $_POST['empName'];
                            $techProject = $_POST['techProject'];
                            $csrActivity = $_POST['csrActivity'];
                            $custFeedback = $_POST['custFeedback'];
                            $peersFeedback = $_POST['peersFeedback'];
                            $adherence = $_POST['adherence']; 

                                                       
                            $updateQuery = "UPDATE employee set empName='$empname', techProject=$techProject, csrActivity=$csrActivity, 
                                            custRating=$custFeedback, peersRating=$peersFeedback, adherence='$adherence'
                                            WHERE empid=$dataUpdate";


                            $result = mysqli_query($conn, $updateQuery);

                            if($result){
                                ?>
                                <script>
                                    alert("Data Updated Successfuly");
                                </script>
                                <?php
                            }
                            else{
                                ?>
                                <script>
                                    alert("Failed To Update Data");
                                </script>
                                <?php
                            }


                        }
                        ?>
<html>
    <head>
        <title>editRecord</title>
    </head>
<body>
<header>
<div class="topnav"> 
  <a class="active" href="#editDetail.php">Edit Detail</a>
  <a href="empRecord.php">Employee Table</a>
  <a href="searchEmp.php">Search Record</a>
  <a href="addEmp.php">Add Record</a>
  <a href="uploadData.php">Import Data</a>
  <a href="exportData.php">Export Data</a>
  <a href="logout.php" style="float:right;">Logout</a>

</div>
    </header>
<link rel="stylesheet" type="text/css" href="css/empRecordstyle.css">
<center>
<h2>Edit Record of <?php echo $printData['empName'] ?></h2>

<div class="box">
<form action="" method="POST">
    



    <label for="empid">Employee ID</label><br>
    <input type="text" class="empid" name="empid" value="<?php echo $printData['empid'] ?>" disabled><br>
<!--
    1. class of all field can be replaced by class and class name should be same to apply css effect same on all.
    2. if we put placeholder="enter name*"
    3. to fetch/autofill details to update Fill value="" from empRecord.php
    4. Use required in of <input> to mark field as compulsory -  required/disabled 
-->

    <label for="fullname">Name</label><br>
    <input type="text" class="fullname"  name="empName" placeholder="Enter Full Name*" value="<?php echo $printData['empName'] ?>" required/><br>
    
    <label for="techProject">Technical Contribution to the project</label><br>
    <input type="number" class="techProject" name="techProject" placeholder="Numeric Value*" value="<?php echo $printData['techProject'] ?>" required/><br>
    
    <label for="csr">Participation in CSR activities</label><br>
    <input type="number" class="csr" name="csrActivity" value="<?php echo $printData['csrActivity'] ?>"><br>
    
    <label for="custFeedback">Employee’s feedback from Customer</label><br>
    <input type="number" min="1" max="5" class="custFeedback" name="custFeedback" placeholder="1 to 5" value="<?php echo $printData['custRating'] ?>"><br>
    <label for="peersFeedback">Employee’s feedback from Peers</label><br>
    <input type="number" min="1" max="5" class="peersFeedback" name="peersFeedback" placeholder="1 to 5" value="<?php echo $printData['peersRating'] ?>"><br>
    
    <label for="adherence">Adherence to company’s policies</label><br>
    <input type="text" class="adherence" name="adherence" placeholder="High,Average,Low" value="<?php echo $printData['adherence'] ?>"><br><br><br>
   
    <input type="submit" name="submit" value="Update Record">
</form> 
</center>
</div>

</body>
</html>
