<?php
$serverName = "10.17.6.125"; //serverName\instanceName
$connectionInfo = array( "Database"=>"WebDashboard", "UID"=>"web-dev", "PWD"=>"Password*1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$tsql = "SELECT [TOWER_ID] as name
      ,[SITEID]
      ,[SITENAME]
      ,[BSC]
      ,[BTS_TYPE]
      ,[SITE_LAYER]
      ,[LONGITUDE] as lng 
      ,[LATITUDE] as lat
  FROM [WebDashboard].[dbo].[Netsis]";
										 
$result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$rows = array();									
while($r = sqlsrv_fetch_array($result))
	{
	$rows[] = $r;
	} 

print json_encode($rows);

?>