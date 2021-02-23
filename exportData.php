<?php
//include database configuration file
include 'connDB.php';

//get records from database
$select = "SELECT * FROM employee";
$query = mysqli_query($conn,$select);

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "employeeRecords_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('Id', 'Name', 'TechProject', 'CsrActivity', 'CustomerRating', 'PeersRating','Adherence');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $lineData = array($row['empid'], $row['empName'], $row['techProject'], $row['csrActivity'], $row['custRating'], $row['peersRating'],$row['adherence']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;
?>