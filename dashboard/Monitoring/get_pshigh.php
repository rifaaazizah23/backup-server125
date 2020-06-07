<?php
$serverName = "10.17.6.125"; //serverName\instanceName
$connectionInfo = array( "Database"=>"WebDashboard", "UID"=>"web-dev", "PWD"=>"Password*1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//query show 
$queryshow = "SELECT a.[System]
      ,a.[Rnc] as name
      ,a.[DateId]
      ,a.[HourId]
      ,a.[ThpCapMbps] as ThpCapMbps
      ,a.[Throughput] as Throughput
      ,a.[Utilization] as Utilization
      ,a.[RowNo]
      ,a.[Remark PS Throughput]
	  ,b.[Long] as lng
      ,b.[Lat] as lat
  FROM [WebDashboard].[dbo].[PSThpRNC] a
  inner join [WebDashboard].[dbo].[BscRnc] b 
  on a.[Rnc] = b.[Bsc_Rnc] 
  WHERE a.[Remark PS Throughput] = 'High' ";
$resultshow = sqlsrv_query($conn, $queryshow, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());

$rows = array();									
while($r = sqlsrv_fetch_array($resultshow))
	{
	$rows[] = $r;
	} 

print json_encode($rows);

?>