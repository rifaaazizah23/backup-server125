<?php
ini_set('memory_limit', '256M');
$serverName = "10.17.6.125"; //serverName\instanceName
$connectionInfo = array( "Database"=>"WebDashboard", "UID"=>"web-dev", "PWD"=>"Password*1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


$queryshow = "SELECT [PDTNumber]
      ,[3G] as Site
      ,[Cluster]
      ,[Kab]
      ,[Long] as lng
      ,[Lat] as lat
  FROM [WebDashboard].[dbo].[PDTNumber3G]
  where [Long] is not null AND [Lat] is not null";
$resultshow = sqlsrv_query($conn, $queryshow, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());

$rows = array();									
while($r = sqlsrv_fetch_array($resultshow))
	{
	$rows[] = $r;
	} 

print json_encode($rows);

?>