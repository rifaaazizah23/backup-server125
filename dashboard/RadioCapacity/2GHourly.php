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
			<h3>Radio Capacity <small>2G Hourly</small></h3>
		</div>
	</div>
    <div class="row">
		  <!-- MULAI DARI SINI -->
        <div class="col-md-12 ">
            <div class="x_panel">
                <div class="x_title">
                  <h2>2G Tower Producivity Hourly CENTRAL </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="hourly_central" class="demo-placeholder"></div>
                </div>
            </div>
        </div>
		<div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                  <h2>2G Tower Producivity Hourly NORTH </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="hourly_north" class="demo-placeholder"></div>
                </div>
            </div>
        </div>
		<div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                  <h2>2G Tower Producivity Hourly NEAST</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="hourly_east" class="demo-placeholder"></div>
                </div>
            </div>
        </div>
		<div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                  <h2>2G Tower Producivity Hourly JABODETABEK </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="hourly_jabodetabek" class="demo-placeholder"></div>
                </div>
            </div>
        </div>
		<div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                  <h2>2G Tower Producivity Hourly WEST </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="hourly_west" class="demo-placeholder"></div>
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
<!---------------------------------------------HOURLY Region Central------------------------------ -->
<script>
      google.charts.load('current', {'packages':['corechart', 'line']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
             ['DateHour', 'TchAvail','TchTraffic','TotalPayloadGB'],
                    	<?php
                        $query = "SELECT [RegionFiv]
								  ,concat(CONVERT(CHAR(6), [DateId], 113), ' Time ', [HourId]) as [DateHour]
								  ,[TchAvail]
								  ,[TchTraffic]
								  ,[TotalPayloadGB]
							FROM [10.23.40.176].[MGeranLink].[dbo].[MRegionFivHour]
							WHERE [RegionFiv] ='CENTRAL' AND [DateId] = '$HMIN1' 
							order by [DateId],[HourId] asc
                              ";
                        $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());
                        
                        while($data = sqlsrv_fetch_array($result))
                        {//ambil semua hasil eksekusi $sql
                          echo "['".$data['DateHour']."',".$data['TchAvail'].",".$data['TchTraffic'].",".$data['TotalPayloadGB']."],";
                        }
                      ?>
      ]);
        var options = {
          title: '2G Tower Producivity Hourly CENTRAL',
          curveType: 'function',
		  pointSize: 4,
		//  chartArea: {
			//	backgroundColor: {
				//	stroke: '#4322c0',
					//strokeWidth: 1
				//}
			//},
          legend: { position: 'right' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('hourly_central'));
        chart.draw(data, options);
      }
</script>
<!-- -------------------------------------------HOURLY Region NORTH------------------------------ -->
<script>
      google.charts.load('current', {'packages':['corechart', 'line']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
             ['DateHour', 'TchAvail','TchTraffic','TotalPayloadGB'],
                    	<?php
                        $query = "SELECT [RegionFiv]
								  ,concat(CONVERT(CHAR(11), [DateId], 113), ' Hour ', [HourId]) as [DateHour]
								  ,[TchAvail]
								  ,[TchTraffic]
								  ,[TotalPayloadGB]
							FROM [10.23.40.176].[MGeranLink].[dbo].[MRegionFivHour]
							WHERE [RegionFiv] ='NORTH' AND [DateId] = '$HMIN1' 
							order by [DateId],[HourId] asc
                              ";
                        $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());
                        while($data = sqlsrv_fetch_array($result))
                        {//ambil semua hasil eksekusi $sql
                          echo "['".$data['DateHour']."',".$data['TchAvail'].",".$data['TchTraffic'].",".$data['TotalPayloadGB']."],";
                        }
                      ?>              
      ]);
        var options = {
          title: '2G Tower Producivity Hourly NORTH',
          curveType: 'function',
		  pointSize: 4,
		//  chartArea: {
			//	backgroundColor: {
				//	stroke: '#4322c0',
					//strokeWidth: 1
				//}
			//},
          legend: { position: 'right' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('hourly_north'));
        chart.draw(data, options);
      }
</script>
<!-- -------------------------------------------HOURLY Region EAST------------------------------ -->
<script>
      google.charts.load('current', {'packages':['corechart', 'line']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
             ['DateHour', 'TchAvail','TchTraffic','TotalPayloadGB'],
                    	<?php
                        $query = "SELECT [RegionFiv]
								  ,concat(CONVERT(CHAR(11), [DateId], 113), ' Hour ', [HourId]) as [DateHour]
								  ,[TchAvail]
								  ,[TchTraffic]
								  ,[TotalPayloadGB]
							FROM [10.23.40.176].[MGeranLink].[dbo].[MRegionFivHour]
							WHERE [RegionFiv] ='EAST' AND [DateId] = '$HMIN1' 
							order by [DateId],[HourId] asc
                              ";
                        $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors()); 
                        while($data = sqlsrv_fetch_array($result))
                        {//ambil semua hasil eksekusi $sql
                          echo "['".$data['DateHour']."',".$data['TchAvail'].",".$data['TchTraffic'].",".$data['TotalPayloadGB']."],";
                        }
                      ?> 
      ]);
        var options = {
          title: '2G Tower Producivity Hourly EAST',
          curveType: 'function',
		  pointSize: 4,
		//  chartArea: {
			//	backgroundColor: {
				//	stroke: '#4322c0',
					//strokeWidth: 1
				//}
			//},
          legend: { position: 'right' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('hourly_east'));
        chart.draw(data, options);
      }
</script>
<!-- -------------------------------------------HOURLY Region JABODETABEK------------------------------ -->
<script>
      google.charts.load('current', {'packages':['corechart', 'line']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
             ['DateHour', 'TchAvail','TchTraffic','TotalPayloadGB'],
                    	<?php
                        $query = "SELECT [RegionFiv]
								  ,concat(CONVERT(CHAR(11), [DateId], 113), ' Hour ', [HourId]) as [DateHour]
								  ,[TchAvail]
								  ,[TchTraffic]
								  ,[TotalPayloadGB]
							FROM [10.23.40.176].[MGeranLink].[dbo].[MRegionFivHour]
							WHERE [RegionFiv] ='JABODETABEK' AND [DateId] = '$HMIN1' 
							order by [DateId],[HourId] asc
                              ";
                        $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());     
                        while($data = sqlsrv_fetch_array($result))
                        {//ambil semua hasil eksekusi $sql
                          echo "['".$data['DateHour']."',".$data['TchAvail'].",".$data['TchTraffic'].",".$data['TotalPayloadGB']."],";
                        }
                      ?>  
      ]);
        var options = {
          title: '2G Tower Producivity Hourly JABODETABEK',
          curveType: 'function',
		  pointSize: 4,
		//  chartArea: {
			//	backgroundColor: {
				//	stroke: '#4322c0',
					//strokeWidth: 1
				//}
			//},
          legend: { position: 'right' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('hourly_jabodetabek'));
        chart.draw(data, options);
      }
</script>
<!-- -------------------------------------------HOURLY Region WEST------------------------------ -->
<script>
      google.charts.load('current', {'packages':['corechart', 'line']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
             ['DateHour', 'TchAvail','TchTraffic','TotalPayloadGB'],
                    	<?php
                        $query = "SELECT [RegionFiv]
								  ,concat(CONVERT(CHAR(11), [DateId], 113), ' Hour ', [HourId]) as [DateHour]
								  ,[TchAvail]
								  ,[TchTraffic]
								  ,[TotalPayloadGB]
							FROM [10.23.40.176].[MGeranLink].[dbo].[MRegionFivHour]
							WHERE [RegionFiv] ='WEST' AND [DateId] = '$HMIN1' 
							order by [DateId],[HourId] asc
                              ";
                        $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors()); 
                        while($data = sqlsrv_fetch_array($result))
                        {//ambil semua hasil eksekusi $sql
                          echo "['".$data['DateHour']."',".$data['TchAvail'].",".$data['TchTraffic'].",".$data['TotalPayloadGB']."],";
                        }
                      ?>         
      ]);
        var options = {
          title: '2G Tower Producivity Hourly WEST',
          curveType: 'function',
		  pointSize: 4,
		//  chartArea: {
			//	backgroundColor: {
				//	stroke: '#4322c0',
					//strokeWidth: 1
			//}
			//},
          legend: { position: 'right' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('hourly_west'));
        chart.draw(data, options);
      }
</script>
<?php
include 'footer.php';
?>