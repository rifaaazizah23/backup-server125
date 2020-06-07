<?php
$serverName = "10.17.6.125"; //serverName\instanceName
$connectionInfo = array( "Database"=>"WebDashboard", "UID"=>"web-dev", "PWD"=>"Password*1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
// Select 
$tsql = "DELETE FROM [WebDashboard].[dbo].[MPLoadLatestHour]
INSERT INTO [WebDashboard].[dbo].[MPLoadLatestHour]
SELECT X.*
 ,b.[Long] as lng
,b.[Lat] as lat
FROM
(
select 
 'Ericsson' as [System]
,[RNC]
,[dateid]
,[hourid]
,max([MPLoadavgRate]) as [MP Load Rate]
,ROW_NUMBER() OVER(PARTITION BY [RNC] ORDER BY [DateId] DESC,[HourId] DESC) as [RowNo]
from [10.23.32.165].[MUtranRncCapacity].[dbo].[MRncLoadControlHour] 
where dateid >= getdate()-2
group by [RNC],[dateid],[hourid]
UNION
SELECT 
'Huawei' as [System]
,[BSC] as RNC
,[DateId]
,[hourid]
,max([VsCpuLoadMean]) as [MP Load Rate]
,ROW_NUMBER() OVER(PARTITION BY [BSC] ORDER BY [DateId] DESC,[HourId] DESC) as [RowNo]
FROM [10.23.32.165].[MUtranRncCapacity].[dbo].[MCpuLoadHour]
where bsc like 'RN%' and dateid >= getdate()-2 and 
SubSystemName Not like '%UUP' and 
SubSystemName not like '%NDM' and
SubSystemName not like '%URSCA' and
SubSystemName not like '%TRP' and 
SubSystemName not like '%NIU' and 
SubSystemName not like '%GRSCM' and
SubSystemName not like '%URSCM' and
SubSystemName not like '%POOLOM' and 
SubSystemName not like '%GCBS'
group by [BSC],[DateId],[hourid]

) X
inner join [WebDashboard].[dbo].[BscRnc] b 
on X.[RNC]=b.[Bsc_Rnc]
WHERE [RowNo] = 1"
;
$result2 = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());


$SQL1 ="DELETE FROM [WebDashboard].[dbo].[MPLoadLatestHourRemark]

insert into [WebDashboard].[dbo].[MPLoadLatestHourRemark]
Select *
,case 
	when [System] ='Ericsson' then
		case
			when [MP Load Rate] >='70' Then 'High'
			when [MP Load Rate] >='50' Then 'Warning'
			else 'Low'	End
	when [System] ='Huawei' then
		case
			when [MP Load Rate] >='60' Then 'High'
			when [MP Load Rate] >='45' Then 'Warning'
			else 'Low'	End
end [Remark_Mp_Load]
from [WebDashboard].[dbo].[MPLoadLatestHour]
";										 
$result = sqlsrv_query($conn, $SQL1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());


$queryshow = "SELECT [RNC] as name, lng ,lat , [MP Load Rate] as load , [Remark_Mp_Load] as remark
FROM [WebDashboard].[dbo].[MPLoadLatestHourRemark]
WHERE [Remark_Mp_Load] = 'High' AND [Remark_Mp_Load] = 'Warning' ";
$resultshow = sqlsrv_query($conn, $queryshow, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());

$rows = array();									
while($r = sqlsrv_fetch_array($resultshow))
	{
	$rows[] = $r;
	} 

print json_encode($rows);

?>