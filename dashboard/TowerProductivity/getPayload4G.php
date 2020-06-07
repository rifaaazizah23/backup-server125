<?php
ini_set('memory_limit', '256M');
$serverName = "10.17.6.125"; //serverName\instanceName
$connectionInfo = array( "Database"=>"WebDashboard", "UID"=>"web-dev", "PWD"=>"Password*1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


$queryshow = "SELECT DISTINCT a.[region]
      ,a.[System]
      ,a.[eNodebId]
      ,convert(varchar, a.[DateId], 107) as DateId
      ,a.[TotalPayloadGB]
	  ,b.[LONGITUDE] as lng
      ,b.[LATITUDE] as lat
  FROM [WebDashboard].[dbo].[LowPayload4G] a
  inner join [DBCapmanReference].[dbo].[Netsis] b 
  on a.[eNodebId] = b. [SITEID]
  where a.[DateId] = (select max([DateId]) from [WebDashboard].[dbo].[LowPayload4G])";
$resultshow = sqlsrv_query($conn, $queryshow, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());

$rows = array();									
while($r = sqlsrv_fetch_array($resultshow))
	{
	$rows[] = $r;
	} 

print json_encode($rows);

?>