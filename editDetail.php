<html>
    <head>
        <title>editRecord</title>
        <? include 'style.css'?>
    </head>
<body>

<center>
<h2>Employee Register</h2>
<form action="" method="POST">
    
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
<div>
    <a href="empRecord.php">Check Database</a>
</div>



<!--
    <p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>
<button onclick="window.location.href='C:/xampp/htdocs/EmpManagement/templates/searchEmployee.html'"class="btn-sec" style="vertical-align:mclassdle"><span>Search Employee</span></button>

<div>
<a href="C:/xampp/htdocs/EmpManagement/templates/searchEmployee.html">Search Record </a>
</div>
-->
</body>
</html>
