<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit', '1024M');
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
<style>
.donutCell
{
    position: relative;
}

.donutDiv
{
    width: 560px;
    height: 256px;
}

.centerLabel
{
    position: absolute;
    left: 2px;
    top: 2px;
    width: 450px;
    line-height: 256px;
    text-align: right;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 15px;
    color: blue;
}
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Bandung -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>GGSN Throughput - Pool Bandung</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="T_GGSN_Chart" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>GGSN PDP - Pool Bandung</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="PDP_GGSN_Chart" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- End Bandung -->
<!-- Cibitung -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>GGSN Throughput - Pool Cibitung</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="T_GGSN_Cibitung" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>GGSN PDP - Pool Cibitung</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="PDP_GGSN_Cibitung" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- End Cibitung -->
<!-- Denpasar -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>GGSN Throughput - Pool Denpasar</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="T_GGSN_Denpasar" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>GGSN PDP - Pool Denpasar</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="PDP_GGSN_Denpasar" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- End Denpasar -->
<!-- Medan -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>GGSN Throughput - Pool Medan</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="T_GGSN_Medan" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>GGSN PDP - Pool Medan</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="PDP_GGSN_Medan" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- End Medan -->
<!-- Pekanbaru -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>GGSN Throughput - Pool Pekanbaru</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="T_GGSN_Pekanbaru" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>GGSN PDP - Pool Pekanbaru</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="PDP_GGSN_Pekanbaru" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- End Pekanbaru -->
<!-- Surabaya -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>GGSN Throughput - Pool Surabaya</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="T_GGSN_Surabaya" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>GGSN PDP - Pool Surabaya</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="PDP_GGSN_Surabaya" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- End Surabaya -->
<!----------------------------------------------- Bandung Script ------------------------------------------------->
<?php
$date = $_POST['Date'];

$SqlGGSN = "SELECT [date]
      ,sum([Capacity_throughput]) as Capacity_throughput
      ,sum([Throughput_Gbps]) as Throughput_Gbps
      ,sum([Capacity_PDP]) as Capacity_PDP
      ,sum([PDP_Total]) as PDP_Total
  FROM [WebDashboard].[dbo].[PS_CORE_GGSN]
  WHERE [Date] = '$date' AND [Pool] like '%Bandung'
  GROUP BY [Date]";
$ResultGGSN = sqlsrv_query($conn, $SqlGGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetGGSN = sqlsrv_fetch_array($ResultGGSN);
$getCapacity_throughput = $GetGGSN['Capacity_throughput'];
$getThroughput_Gbps = $GetGGSN['Throughput_Gbps'];
$getCapacity_PDP = $GetGGSN['Capacity_PDP'];
$getPDP_Total = $GetGGSN['PDP_Total'];
$Avaliable_T = $getCapacity_throughput - $getThroughput_Gbps ;
$Avaliable_PDP = $getCapacity_PDP - $getPDP_Total ;


?>

<!-- -----------------------------------------------Throughput GGSN Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'GGSN'],
          ['Throughput Gbps User  <?php echo $getThroughput_Gbps ; ?>', <?php echo $getThroughput_Gbps ; ?>],
          ['Avaliable  <?php echo $Avaliable_T ; ?>', <?php echo $Avaliable_T ; ?>],
        ]);

        var options = {
          title: 'GGSN Throughput - Capacity Throughput : <?php echo $getCapacity_throughput; ?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('T_GGSN_Chart'));
        chart.draw(data, options);
      }
</script>
<!-- -----------------------------------------------PDP GGSN Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'GGSN'],
          ['PDP TOTAL Used  <?php echo $getPDP_Total ; ?>', <?php echo $getPDP_Total ; ?>],
          ['Avaliable  <?php echo $Avaliable_PDP ; ?>', <?php echo $Avaliable_PDP ; ?>],
        ]);

        var options = {
          title: 'GGSN PDP  - Capacity PDP : <?php echo $getCapacity_PDP;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('PDP_GGSN_Chart'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Bandung Script -------------------------------------------->
<!----------------------------------------------- Cibitung Script ----------------------------------------------->
<?php
$date = $_POST['Date'];

$SqlGGSN = "SELECT [date]
      ,sum([Capacity_throughput]) as Capacity_throughput
      ,sum([Throughput_Gbps]) as Throughput_Gbps
      ,sum([Capacity_PDP]) as Capacity_PDP
      ,sum([PDP_Total]) as PDP_Total
  FROM [WebDashboard].[dbo].[PS_CORE_GGSN]
  WHERE [Date] = '$date' AND [Pool] like '%Cibitung'
  GROUP BY [Date]";
$ResultGGSN = sqlsrv_query($conn, $SqlGGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetGGSN = sqlsrv_fetch_array($ResultGGSN);
$getCapacity_throughput = $GetGGSN['Capacity_throughput'];
$getThroughput_Gbps = $GetGGSN['Throughput_Gbps'];
$getCapacity_PDP = $GetGGSN['Capacity_PDP'];
$getPDP_Total = $GetGGSN['PDP_Total'];
$Avaliable_T = $getCapacity_throughput - $getThroughput_Gbps ;
$Avaliable_PDP = $getCapacity_PDP - $getPDP_Total ;


?>

<!-- -----------------------------------------------Throughput GGSN Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'GGSN'],
          ['Throughput Gbps User  <?php echo $getThroughput_Gbps ; ?>', <?php echo $getThroughput_Gbps ; ?>],
          ['Avaliable  <?php echo $Avaliable_T ; ?>', <?php echo $Avaliable_T ; ?>],
        ]);

        var options = {
          title: 'GGSN Throughput - Capacity Throughput : <?php echo $getCapacity_throughput; ?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('T_GGSN_Cibitung'));
        chart.draw(data, options);
      }
</script>
<!-- -----------------------------------------------PDP GGSN Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'GGSN'],
          ['PDP TOTAL Used  <?php echo $getPDP_Total ; ?>', <?php echo $getPDP_Total ; ?>],
          ['Avaliable  <?php echo $Avaliable_PDP ; ?>', <?php echo $Avaliable_PDP ; ?>],
        ]);

        var options = {
          title: 'GGSN PDP  - Capacity PDP : <?php echo $getCapacity_PDP;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('PDP_GGSN_Cibitung'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Cibitung Script -------------------------------------------->
<!----------------------------------------------- Denpasar Script ------------------------------------------------>
<?php
$date = $_POST['Date'];

$SqlGGSN = "SELECT [date]
      ,sum([Capacity_throughput]) as Capacity_throughput
      ,sum([Throughput_Gbps]) as Throughput_Gbps
      ,sum([Capacity_PDP]) as Capacity_PDP
      ,sum([PDP_Total]) as PDP_Total
  FROM [WebDashboard].[dbo].[PS_CORE_GGSN]
  WHERE [Date] = '$date' AND [Pool] like '%Denpasar'
  GROUP BY [Date]";
$ResultGGSN = sqlsrv_query($conn, $SqlGGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetGGSN = sqlsrv_fetch_array($ResultGGSN);
$getCapacity_throughput = $GetGGSN['Capacity_throughput'];
$getThroughput_Gbps = $GetGGSN['Throughput_Gbps'];
$getCapacity_PDP = $GetGGSN['Capacity_PDP'];
$getPDP_Total = $GetGGSN['PDP_Total'];
$Avaliable_T = $getCapacity_throughput - $getThroughput_Gbps ;
$Avaliable_PDP = $getCapacity_PDP - $getPDP_Total ;


?>

<!-- -----------------------------------------------Throughput GGSN Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'GGSN'],
          ['Throughput Gbps User  <?php echo $getThroughput_Gbps ; ?>', <?php echo $getThroughput_Gbps ; ?>],
          ['Avaliable  <?php echo $Avaliable_T ; ?>', <?php echo $Avaliable_T ; ?>],
        ]);

        var options = {
          title: 'GGSN Throughput - Capacity Throughput : <?php echo $getCapacity_throughput; ?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('T_GGSN_Denpasar'));
        chart.draw(data, options);
      }
</script>
<!-- -----------------------------------------------PDP GGSN Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'GGSN'],
          ['PDP TOTAL Used  <?php echo $getPDP_Total ; ?>', <?php echo $getPDP_Total ; ?>],
          ['Avaliable  <?php echo $Avaliable_PDP ; ?>', <?php echo $Avaliable_PDP ; ?>],
        ]);

        var options = {
          title: 'GGSN PDP  - Capacity PDP : <?php echo $getCapacity_PDP;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('PDP_GGSN_Denpasar'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Denpasar Script -------------------------------------------->
<!----------------------------------------------- Medan Script ------------------------------------------------->
<?php
$date = $_POST['Date'];

$SqlGGSN = "SELECT [date]
      ,sum([Capacity_throughput]) as Capacity_throughput
      ,sum([Throughput_Gbps]) as Throughput_Gbps
      ,sum([Capacity_PDP]) as Capacity_PDP
      ,sum([PDP_Total]) as PDP_Total
  FROM [WebDashboard].[dbo].[PS_CORE_GGSN]
  WHERE [Date] = '$date' AND [Pool] like '%Medan'
  GROUP BY [Date]";
$ResultGGSN = sqlsrv_query($conn, $SqlGGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetGGSN = sqlsrv_fetch_array($ResultGGSN);
$getCapacity_throughput = $GetGGSN['Capacity_throughput'];
$getThroughput_Gbps = $GetGGSN['Throughput_Gbps'];
$getCapacity_PDP = $GetGGSN['Capacity_PDP'];
$getPDP_Total = $GetGGSN['PDP_Total'];
$Avaliable_T = $getCapacity_throughput - $getThroughput_Gbps ;
$Avaliable_PDP = $getCapacity_PDP - $getPDP_Total ;


?>

<!-- -----------------------------------------------Throughput GGSN Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'GGSN'],
          ['Throughput Gbps User  <?php echo $getThroughput_Gbps ; ?>', <?php echo $getThroughput_Gbps ; ?>],
          ['Avaliable  <?php echo $Avaliable_T ; ?>', <?php echo $Avaliable_T ; ?>],
        ]);

        var options = {
          title: 'GGSN Throughput - Capacity Throughput : <?php echo $getCapacity_throughput; ?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('T_GGSN_Medan'));
        chart.draw(data, options);
      }
</script>
<!-- -----------------------------------------------PDP GGSN Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'GGSN'],
          ['PDP TOTAL Used  <?php echo $getPDP_Total ; ?>', <?php echo $getPDP_Total ; ?>],
          ['Avaliable  <?php echo $Avaliable_PDP ; ?>', <?php echo $Avaliable_PDP ; ?>],
        ]);

        var options = {
          title: 'GGSN PDP  - Capacity PDP : <?php echo $getCapacity_PDP;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('PDP_GGSN_Medan'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Denpasar Script -------------------------------------------->
<!----------------------------------------------- Pekanbaru Script ----------------------------------------------->
<?php
$date = $_POST['Date'];

$SqlGGSN = "SELECT [date]
      ,sum([Capacity_throughput]) as Capacity_throughput
      ,sum([Throughput_Gbps]) as Throughput_Gbps
      ,sum([Capacity_PDP]) as Capacity_PDP
      ,sum([PDP_Total]) as PDP_Total
  FROM [WebDashboard].[dbo].[PS_CORE_GGSN]
  WHERE [Date] = '$date' AND [Pool] like '%Pekanbaru'
  GROUP BY [Date]";
$ResultGGSN = sqlsrv_query($conn, $SqlGGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetGGSN = sqlsrv_fetch_array($ResultGGSN);
$getCapacity_throughput = $GetGGSN['Capacity_throughput'];
$getThroughput_Gbps = $GetGGSN['Throughput_Gbps'];
$getCapacity_PDP = $GetGGSN['Capacity_PDP'];
$getPDP_Total = $GetGGSN['PDP_Total'];
$Avaliable_T = $getCapacity_throughput - $getThroughput_Gbps ;
$Avaliable_PDP = $getCapacity_PDP - $getPDP_Total ;


?>

<!-- -----------------------------------------------Throughput GGSN Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'GGSN'],
          ['Throughput Gbps User  <?php echo $getThroughput_Gbps ; ?>', <?php echo $getThroughput_Gbps ; ?>],
          ['Avaliable  <?php echo $Avaliable_T ; ?>', <?php echo $Avaliable_T ; ?>],
        ]);

        var options = {
          title: 'GGSN Throughput - Capacity Throughput : <?php echo $getCapacity_throughput; ?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('T_GGSN_Pekanbaru'));
        chart.draw(data, options);
      }
</script>
<!-- -----------------------------------------------PDP GGSN Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'GGSN'],
          ['PDP TOTAL Used  <?php echo $getPDP_Total ; ?>', <?php echo $getPDP_Total ; ?>],
          ['Avaliable  <?php echo $Avaliable_PDP ; ?>', <?php echo $Avaliable_PDP ; ?>],
        ]);

        var options = {
          title: 'GGSN PDP  - Capacity PDP : <?php echo $getCapacity_PDP;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('PDP_GGSN_Pekanbaru'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Pekanbaru Script ------------------------------------------>
<!----------------------------------------------- Surabaya Script ----------------------------------------------->
<?php
$date = $_POST['Date'];

$SqlGGSN = "SELECT [date]
      ,sum([Capacity_throughput]) as Capacity_throughput
      ,sum([Throughput_Gbps]) as Throughput_Gbps
      ,sum([Capacity_PDP]) as Capacity_PDP
      ,sum([PDP_Total]) as PDP_Total
  FROM [WebDashboard].[dbo].[PS_CORE_GGSN]
  WHERE [Date] = '$date' AND [Pool] like '%Surabaya'
  GROUP BY [Date]";
$ResultGGSN = sqlsrv_query($conn, $SqlGGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetGGSN = sqlsrv_fetch_array($ResultGGSN);
$getCapacity_throughput = $GetGGSN['Capacity_throughput'];
$getThroughput_Gbps = $GetGGSN['Throughput_Gbps'];
$getCapacity_PDP = $GetGGSN['Capacity_PDP'];
$getPDP_Total = $GetGGSN['PDP_Total'];
$Avaliable_T = $getCapacity_throughput - $getThroughput_Gbps ;
$Avaliable_PDP = $getCapacity_PDP - $getPDP_Total ;


?>

<!-- -----------------------------------------------Throughput GGSN Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'GGSN'],
          ['Throughput Gbps User  <?php echo $getThroughput_Gbps ; ?>', <?php echo $getThroughput_Gbps ; ?>],
          ['Avaliable  <?php echo $Avaliable_T ; ?>', <?php echo $Avaliable_T ; ?>],
        ]);

        var options = {
          title: 'GGSN Throughput - Capacity Throughput : <?php echo $getCapacity_throughput; ?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('T_GGSN_Surabaya'));
        chart.draw(data, options);
      }
</script>
<!-- -----------------------------------------------PDP GGSN Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'GGSN'],
          ['PDP TOTAL Used  <?php echo $getPDP_Total ; ?>', <?php echo $getPDP_Total ; ?>],
          ['Avaliable  <?php echo $Avaliable_PDP ; ?>', <?php echo $Avaliable_PDP ; ?>],
        ]);

        var options = {
          title: 'GGSN PDP  - Capacity PDP : <?php echo $getCapacity_PDP;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('PDP_GGSN_Surabaya'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Surabaya Script ------------------------------------------->

