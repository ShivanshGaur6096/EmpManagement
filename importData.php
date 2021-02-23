<?php
// Load the database configuration file
include 'connDB.php';

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){

                header("Location: uploadData.php");
                // Get row data
                $empid        = $line[0];
                $empName     = $line[1];
                $techProject  = $line[2];
                $csrActivity = $line[3];
                $custRating = $line[4];
                $peersRating = $line[5];
                $adherence = $line[6];
                
                // Check whether member already exists in the database with the same email
                $prevResult="INSERT INTO employee (empid, empName, techProject, csrActivity, custRating, peersRating ,adherence) 
                VALUES ('$empid', '$empName', '$techProject', '$csrActivity','$custRating','$peersRating','$adherence')";

                $result1=mysqli_query($conn,$prevResult);

            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}
