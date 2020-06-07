<?php 
include '../header2.php';
ini_set('max_execution_time', 0);
$serverName = "10.17.6.125"; //serverName\instanceName
$connectionInfo1 = array("UID"=>"web-dev", "PWD"=>"Password*1");
$conn = sqlsrv_connect( $serverName, $connectionInfo1);
if( $conn ) {
     echo "";
}else{
     echo "Connection could not be established.<br />";
     echo
     die( print_r( sqlsrv_errors(), true));
}
?>
<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h3>Radio Capacity <small>2G Daily</small></h3>
		</div>
	</div>
    <div class="row">
<!-- MULAI DARI SINI -->
        <div class="col-md-12 ">
            <div class="x_panel">
                <div class="x_title">
                  <h2>Total Payload (GB) </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="chart_payload" class="demo-placeholder"></div>
                </div>
            </div>
        </div>
		<div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                  <h2>Traffic Erlang </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="chart_traffic" class="demo-placeholder"></div>
                </div>
            </div>
        </div>		
<!-- END -->
    </div>
</div>
<!-- /page content -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php
$AmbilTanggalTerakhir = date("Y-m-d") ;
$now = strtotime($AmbilTanggalTerakhir);
$Tanggal14haritrakhir = date('Y-m-j', strtotime('- 14 day',$now));
$HMIN1 = date('Y-m-j', strtotime('- 1 day',$now));
?>
<script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Central','East','Jabodetabek','North','West'],
                    	<?php
                        $query = "SELECT [DateId]
								  ,[Resource]
								  ,[Central]
								  ,[East]
								  ,[Jabodetabek]
								  ,[North]
								  ,[West]
							  FROM [WebDashboard].[dbo].[2GAmpuhDaily] where [Resource]='TotalPayloadGb' 
							  order by [DateId] asc
                              ";
                        $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());
                        
                        while($data = sqlsrv_fetch_array($result))
                        {//ambil semua hasil eksekusi $sql
                          echo "['".$data['DateId']->format('M j')."',".$data['Central'].",".$data['East'].",".$data['Jabodetabek'].",".$data['North'].",".$data['West']."],";
                        }
                      ?>      
      ]);
        var options = {
          title: 'Total Payload (GB)',
		  pointSize: 4,
		  //chartArea: {
		//		backgroundColor: {
			//		stroke: '#4322c0',
				//	strokeWidth: 1
				//}
			//},
          curveType: 'function',
          legend: { position: 'right' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_payload'));
        chart.draw(data, options);
      }
</script>
<script>
      google.charts.load('current', {'packages':['corechart', 'line']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Central','East','Jabodetabek','North','West'],
                    	<?php
                        $query = "SELECT [DateId]
								  ,[Resource]
								  ,[Central]
								  ,[East]
								  ,[Jabodetabek]
								  ,[North]
								  ,[West]
							  FROM [WebDashboard].[dbo].[2GAmpuhDaily] where [Resource]='SumTchTraffic' and [DateId] between '$Tanggal14haritrakhir' and '$HMIN1'
                              order by [DateId] asc
							  ";
                        $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());
                        
                        while($data = sqlsrv_fetch_array($result))
                        {//ambil semua hasil eksekusi $sql
                          echo "['".$data['DateId']->format('M j')."',".$data['Central'].",".$data['East'].",".$data['Jabodetabek'].",".$data['North'].",".$data['West']."],";
                        }
                      ?>      
      ]);
        var options = {
          title: 'Total Traffic (Erlang)',
          curveType: 'function',
		  pointSize: 4,
		//  chartArea: {
			//	backgroundColor: {
				//	stroke: '#4322c0',
					//strokeWidth: 1
				//}
			//},
          legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('chart_traffic'));

        chart.draw(data, options);
      }
		</script>
<?php
include 'footer.php';
?>