<?php
ini_set('memory_limit', '256M');
$serverName = "10.17.6.125"; //serverName\instanceName
$connectionInfo = array( "Database"=>"WebDashboard", "UID"=>"web-dev", "PWD"=>"Password*1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


$queryshow = "SELECT DISTINCT a.[System]
      ,a.[SiteId] AS name
      ,a.[SiteName]
      ,a.[Rnc]
      ,a.[DateId]
      ,a.[HourId]
      ,a.[CellAvailabilitySYS]
      ,a.[CodeUtilization]
      ,a.[PowerUtilization]
      ,a.[HsUserUtilization]
      ,a.[NumOfTotalCongestion]
      ,a.[NumOfCeUlCong]
      ,a.[NumOfPowerCong]
      ,a.[NumOfCodeCong]
      ,a.[RowNo]
      ,a.[Remark Cogestion] as remark
	  ,b.[Long] as lng
	  ,b.[Lat] as lat
  FROM [WebDashboard].[dbo].[3GCapmanLatestHourRemark] a
  inner join [DBCapmanReference].[dbo].[Netsis] b
  on a.[SiteId]=b.[SITEID]";
$resultshow = sqlsrv_query($conn, $queryshow, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());

$rows = array();									
while($r = sqlsrv_fetch_array($resultshow))
	{
	$rows[] = $r;
	} 

print json_encode($rows);

?>