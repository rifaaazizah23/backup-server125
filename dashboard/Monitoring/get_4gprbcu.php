<?php
$serverName = "10.17.6.125"; //serverName\instanceName
$connectionInfo = array( "Database"=>"WebDashboard", "UID"=>"web-dev", "PWD"=>"Password*1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$queryremark = "DELETE FROM [WebDashboard].[dbo].[4GCapmanLatestHourRemarkAll]
			INSERT INTO [WebDashboard].[dbo].[4GCapmanLatestHourRemarkAll]
			Select distinct a.*
				,case 
					when a.[Remark PRB] ='HIgh' and  a.[Remark CU] ='High' Then 'High'
					when a.[Remark PRB] ='HIgh' Then 'MediumHigh'
					when a.[Remark CU] ='High' Then 'Medium'
					else 'Low'
				end [Remark_PRB_CU]
				,b.[LONGITUDE] as lng
				,b.[LATITUDE] as lat
				from [WebDashboard].[dbo].[4GCapmanLatestHourRemark] a
				inner join [DBCapmanReference].[dbo].[Netsis] b
				on a.[eNodebId]=b.[SITEID]
				order by [Remark PRB],[Remark CU]";
$resultremark = sqlsrv_query($conn, $queryremark, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
 
//query show 
$queryshow = "SELECT [eNodebId] as name 
	  ,[eNodebName] as name2
	  ,[lng] as lng
	  ,[lat] as lat
	  ,[HourId]
	  ,[Bandwidth] as Bandwidth
	  ,[Remark_PRB_CU] as remark
	  ,[LDLResourceBlockUtilizingRate] as LDL 
	  FROM [WebDashboard].[dbo].[4GCapmanLatestHourRemarkAll]";
$resultshow = sqlsrv_query($conn, $queryshow, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());

$rows = array();									
while($r = sqlsrv_fetch_array($resultshow))
	{
	$rows[] = $r;
	} 

print json_encode($rows);

?>