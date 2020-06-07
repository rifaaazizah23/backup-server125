<?php
//load the database configuration file
//load the database configuration file
ini_set('max_execution_time', 0);
ini_set('memory_limit', '1024M');
$serverName = "10.17.6.125"; //serverName\instanceName
$connectionInfo1 = array("UID"=>"web-dev", "PWD"=>"Password*1");
$conn = sqlsrv_connect( $serverName, $connectionInfo1);

if(isset($_POST['importSubmit'])){
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            $DELETE ="DELETE FROM [WebDashboard].[dbo].[PDTNumber4G] ";
            $resultDelete = sqlsrv_query($conn, $DELETE, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
               $PDTNumber = $line[0];
               $G = $line[1] ;
               $Cluster = $line[2];
               $Kab =$line[3];
               $Long =$line[4];
               $Lat = $line[5];
             //insert member data into database
            $INSERT ="INSERT INTO [WebDashboard].[dbo].[PDTNumber4G]  VALUES ('$PDTNumber','$G','$Cluster','$Kab','$Long','$Lat')";
            $resultSCTP = sqlsrv_query($conn, $INSERT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
            }
            
            //close opened csv file
            //fclose($csvFile);
            
        }else{
            
        }
    }else{
        
    }
}
$qstring = "Upload Sukses";
//redirect to the listing page
header("Location: 4GPDTNumber.php");