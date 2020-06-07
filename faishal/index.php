<?php
ini_set('max_execution_time', 0);
$serverName = "10.17.6.125"; //serverName\instanceName
$connectionInfo1 = array("UID"=>"web-dev", "PWD"=>"Password*1");
$conn = sqlsrv_connect( $serverName, $connectionInfo1);
if( $conn ) {
     echo "konek-si";
}else{
     echo "Connection could not be established.<br />";
     echo
     die( print_r( sqlsrv_errors(), true));
}
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!--<div id="curve_chart" style="height: 700px"></div> -->
<div id="curve" style="height: 700px"></div>
  
		<script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'UtranCellHour','UtranCellDay','UtranSiteDayNetBH','UtranSiteDayCE','LranCellHour','LranCellDay','LranSiteDayNetBH'],

                    	<?php
                        $query = "SELECT  [DateId]
                                ,[UtranCellHour]
                                ,[UtranCellDay]
                                ,[UtranSiteDayNetBH]
                                ,[UtranSiteDayCE]
                                ,[LranCellHour]
                                ,[LranCellDay]
                                ,[LranSiteDayNetBH]
                              FROM [WebDashboard].[dbo].[CheckData]
                              order by [DateId] asc
                              ";
                        $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());
                        
                        while($data = sqlsrv_fetch_array($result))
                        {//ambil semua hasil eksekusi $sql
                          echo "['".$data['DateId']->format('Y-m-d')."',".$data['UtranCellHour'].",".$data['UtranCellDay'].",".$data['UtranSiteDayNetBH'].",".$data['UtranSiteDayCE'].",".$data['LranCellHour'].",".$data['LranCellDay'].",".$data['LranSiteDayNetBH']."],";
                        }
                      ?>
                     
      ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }

		</script>
		
<script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'UtranCellHour','UtranCellDay','UtranSiteDayNetBH','UtranSiteDayCE','LranCellHour','LranCellDay','LranSiteDayNetBH'],

                    	<?php
                        $query = "declare @StartDate smalldatetime

set @StartDate = GETDATE()-31

--

SELECT * INTO #TEMPORARY

FROM

(

       SELECT [DateId], COUNT(DISTINCT [CellName]) as [CountCell], 'UtranCellHour'       as [Table] FROM [DBCapmanRaw].[dbo].[UtranCellHour]

       WHERE [DateId] >= @StartDate GROUP BY [DateId]

              UNION

       SELECT [DateId], COUNT(DISTINCT [CellName]) as [CountCell], 'UtranCellDay'        as [Table] FROM [DBCapman].[dbo].[UtranCellDay]

       WHERE [DateId] >= @StartDate GROUP BY [DateId]

              UNION

       SELECT [DateId], COUNT(DISTINCT [SiteId]) as [CountCell], 'UtranSiteDayNetBH'      as [Table] FROM [DBCapman].[dbo].[UtranSiteDayNetBH]

       WHERE [DateId] >= @StartDate GROUP BY [DateId]

              UNION

       SELECT [DateId], COUNT(DISTINCT [SiteId]) as [CountCell], 'UtranSiteDayCE'  as [Table] FROM [DBCapman].[dbo].[UtranSiteDayCE]

       WHERE [DateId] >= @StartDate GROUP BY [DateId]

              UNION

       SELECT [DateId], COUNT(DISTINCT [CellName]) as [CountCell], 'LranCellHour'        as [Table] FROM [DBCapmanRaw].[dbo].[LranCellHour]

       WHERE [DateId] >= @StartDate GROUP BY [DateId]

              UNION

       SELECT [DateId], COUNT(DISTINCT [CellName]) as [CountCell], 'LranCellDay'         as [Table] FROM [DBCapman].[dbo].[LranCellDay]

       WHERE [DateId] >= @StartDate GROUP BY [DateId]

              UNION

       SELECT [DateId], COUNT(DISTINCT [eNodebId]) as [CountCell], 'LranSiteDayNetBH'    as [Table] FROM [DBCapman].[dbo].[LranSiteDayNetBH]

       WHERE [DateId] >= @StartDate GROUP BY [DateId]

) as X

 

 

SELECT [DateId],[UtranCellHour],[UtranCellDay],[UtranSiteDayNetBH],[UtranSiteDayCE],[LranCellHour],[LranCellDay],[LranSiteDayNetBH]

FROM

                     (SELECT [DateId],[CountCell],[Table] from #TEMPORARY) as Y

              PIVOT

                     (MAX([CountCell]) FOR [Table] IN ([UtranCellHour],[UtranCellDay],[UtranSiteDayNetBH],[UtranSiteDayCE],[LranCellHour],[LranCellDay],[LranSiteDayNetBH])) as Z

 

ORDER BY [DateId] DESC

 

DROP TABLE #TEMPORARY";
                        $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());
                        
                        while($data = sqlsrv_fetch_array($result))
                        {//ambil semua hasil eksekusi $sql
                          echo "['".$data['DateId']->format('Y-m-d')."',".$data['UtranCellHour'].",".$data['UtranCellDay'].",".$data['UtranSiteDayNetBH'].",".$data['UtranSiteDayCE'].",".$data['LranCellHour'].",".$data['LranCellDay'].",".$data['LranSiteDayNetBH']."],";
                        }
                      ?>
                     
      ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve'));

        chart.draw(data, options);
      }

</script>