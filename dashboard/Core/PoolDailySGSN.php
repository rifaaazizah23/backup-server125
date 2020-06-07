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
<!-- Sulampapua -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>SGSN SAU - Sulampapua</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="SGSN_Sulampapua2" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>SGSN Simul PDP - Sulampapua</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="SGSN_Sulampapua1" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- Sulampapua -->
<!-- Southern -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>SGSN SAU - Southern</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="SGSN_Southern2" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>SGSN Simul PDP - Southern</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="SGSN_Southern1" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- Southern -->
<!-- Northern -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>SGSN SAU - Northern</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="SGSN_Northern2" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>SGSN Simul PDP - Northern</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="SGSN_Northern1" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- Northern -->
<!-- Kalimantan -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>SGSN SAU - Kalimantan</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="SGSN_Kalimantan2" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>SGSN Simul PDP - Kalimantan</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="SGSN_Kalimantan1" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- Kalimantan -->
<!-- Jabo -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>SGSN SAU - Jabo</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="SGSN_Jabo2" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>SGSN Simul PDP - Jabo</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="SGSN_Jabo1" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- Jabo -->
<!-- East -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>SGSN SAU - East</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="SGSN_East2" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>SGSN Simul PDP - East</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="SGSN_East1" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- East -->
<!-- Balomsum -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>SGSN SAU - Balomsum</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="SGSN_Balomsum2" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>SGSN Simul PDP - Balomsum</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="SGSN_Balomsum1" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- Balomsum -->
<!----------------------------------------------- Sulampapua Script ---------------------------------------------->
<?php
$date = $_POST['Date'];

$SqlSGSN_S = "SELECT [Date]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] = '$date' AND [Pool] like '%Sulampapua'
  		GROUP BY [Date]";
$ResultSGSN_S = sqlsrv_query($conn, $SqlSGSN_S, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN_S = sqlsrv_fetch_array($ResultSGSN_S);
$getCapacity_SimulPDP_SGSN = $GetSGSN_S['Capacity_SimulPDP_SGSN'];
$getSimulPDP_Number = $GetSGSN_S['SimulPDP_Number'];
$Avaliable_S = $getCapacity_SimulPDP_SGSN - $getSimulPDP_Number ;

$SqlSGSN = "SELECT [Date]
      	,sum([Capacity_SAU]) as [Capacity_SAU]
      	,sum([SAU_Total_Number]) as [SAU_Total_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] = '$date' AND [Pool] like '%Sulampapua'
  		GROUP BY [Date]";
$ResultSGSN = sqlsrv_query($conn, $SqlSGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN = sqlsrv_fetch_array($ResultSGSN);
$getCapacity_SAU = $GetSGSN['Capacity_SAU'];
$getSAU_Total_Number = $GetSGSN['SAU_Total_Number'];
$Avaliable = $getCapacity_SAU - $getSAU_Total_Number ;


?>
<!-- -----------------------------------------------SGSN CHART SIMUL PDP ------------------------------------------------------------- -->

<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'SGSN'],
          ['SAU Total Number Used  <?php echo $getSimulPDP_Number ; ?>', <?php echo $getSimulPDP_Number ; ?>],
          ['Avaliable  <?php echo $Avaliable_S ; ?> ', <?php echo $Avaliable_S ; ?>],
        ]);

        var options = {
          title: 'SGSN Simul PDP - Capacity SimulPDP SGSN : <?php echo $getCapacity_SimulPDP_SGSN ;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Sulampapua1'));
        chart.draw(data, options);
      }
</script>

<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'SGSN'],
          ['SimulPDP Number  <?php echo $getSAU_Total_Number ; ?>', <?php echo $getSAU_Total_Number ; ?>],
          ['Avaliable  <?php echo $Avaliable ; ?> ', <?php echo $Avaliable ; ?>],
        ]);

        var options = {
          title: 'SGSN SAU - Capacity SAU : <?php echo $getCapacity_SAU ;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Sulampapua2'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Sulampapua ------------------------------------------------->
<!----------------------------------------------- Southern Script ---------------------------------------------->
<?php
$date = $_POST['Date'];

$SqlSGSN_S = "SELECT [Date]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] = '$date' AND [Pool] like '%Southern West'
  		GROUP BY [Date]";
$ResultSGSN_S = sqlsrv_query($conn, $SqlSGSN_S, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN_S = sqlsrv_fetch_array($ResultSGSN_S);
$getCapacity_SimulPDP_SGSN = $GetSGSN_S['Capacity_SimulPDP_SGSN'];
$getSimulPDP_Number = $GetSGSN_S['SimulPDP_Number'];
$Avaliable_S = $getCapacity_SimulPDP_SGSN - $getSimulPDP_Number ;

$SqlSGSN = "SELECT [Date]
      	,sum([Capacity_SAU]) as [Capacity_SAU]
      	,sum([SAU_Total_Number]) as [SAU_Total_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] = '$date' AND [Pool] like '%Southern West'
  		GROUP BY [Date]";
$ResultSGSN = sqlsrv_query($conn, $SqlSGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN = sqlsrv_fetch_array($ResultSGSN);
$getCapacity_SAU = $GetSGSN['Capacity_SAU'];
$getSAU_Total_Number = $GetSGSN['SAU_Total_Number'];
$Avaliable = $getCapacity_SAU - $getSAU_Total_Number ;


?>
<!-- -----------------------------------------------SGSN CHART SIMUL PDP ------------------------------------------------------------- -->

<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'SGSN'],
          ['SAU Total Number Used  <?php echo $getSimulPDP_Number ; ?>', <?php echo $getSimulPDP_Number ; ?>],
          ['Avaliable  <?php echo $Avaliable_S ; ?> ', <?php echo $Avaliable_S ; ?>],
        ]);

        var options = {
          title: 'SGSN Simul PDP - Capacity SimulPDP SGSN : <?php echo $getCapacity_SimulPDP_SGSN ;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Southern1'));
        chart.draw(data, options);
      }
</script>

<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'SGSN'],
          ['SimulPDP Number  <?php echo $getSAU_Total_Number ; ?>', <?php echo $getSAU_Total_Number ; ?>],
          ['Avaliable  <?php echo $Avaliable ; ?> ', <?php echo $Avaliable ; ?>],
        ]);

        var options = {
          title: 'SGSN SAU - Capacity SAU : <?php echo $getCapacity_SAU ;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Southern2'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Southern ------------------------------------------------->
<!----------------------------------------------- Northern Script ---------------------------------------------->
<?php
$date = $_POST['Date'];

$SqlSGSN_S = "SELECT [Date]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] = '$date' AND [Pool] like '%Northern West'
  		GROUP BY [Date]";
$ResultSGSN_S = sqlsrv_query($conn, $SqlSGSN_S, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN_S = sqlsrv_fetch_array($ResultSGSN_S);
$getCapacity_SimulPDP_SGSN = $GetSGSN_S['Capacity_SimulPDP_SGSN'];
$getSimulPDP_Number = $GetSGSN_S['SimulPDP_Number'];
$Avaliable_S = $getCapacity_SimulPDP_SGSN - $getSimulPDP_Number ;

$SqlSGSN = "SELECT [Date]
      	,sum([Capacity_SAU]) as [Capacity_SAU]
      	,sum([SAU_Total_Number]) as [SAU_Total_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] = '$date' AND [Pool] like '%Northern West'
  		GROUP BY [Date]";
$ResultSGSN = sqlsrv_query($conn, $SqlSGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN = sqlsrv_fetch_array($ResultSGSN);
$getCapacity_SAU = $GetSGSN['Capacity_SAU'];
$getSAU_Total_Number = $GetSGSN['SAU_Total_Number'];
$Avaliable = $getCapacity_SAU - $getSAU_Total_Number ;


?>
<!-- -----------------------------------------------SGSN CHART SIMUL PDP ------------------------------------------------------------- -->

<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'SGSN'],
          ['SAU Total Number Used  <?php echo $getSimulPDP_Number ; ?>', <?php echo $getSimulPDP_Number ; ?>],
          ['Avaliable  <?php echo $Avaliable_S ; ?> ', <?php echo $Avaliable_S ; ?>],
        ]);

        var options = {
          title: 'SGSN Simul PDP - Capacity SimulPDP SGSN : <?php echo $getCapacity_SimulPDP_SGSN ;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Northern1'));
        chart.draw(data, options);
      }
</script>

<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'SGSN'],
          ['SimulPDP Number  <?php echo $getSAU_Total_Number ; ?>', <?php echo $getSAU_Total_Number ; ?>],
          ['Avaliable  <?php echo $Avaliable ; ?> ', <?php echo $Avaliable ; ?>],
        ]);

        var options = {
          title: 'SGSN SAU - Capacity SAU : <?php echo $getCapacity_SAU ;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Northern2'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Northern ------------------------------------------------->
<!----------------------------------------------- Kalimantan Script ---------------------------------------------->
<?php
$date = $_POST['Date'];

$SqlSGSN_S = "SELECT [Date]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] = '$date' AND [Pool] like '%Kalimantan'
  		GROUP BY [Date]";
$ResultSGSN_S = sqlsrv_query($conn, $SqlSGSN_S, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN_S = sqlsrv_fetch_array($ResultSGSN_S);
$getCapacity_SimulPDP_SGSN = $GetSGSN_S['Capacity_SimulPDP_SGSN'];
$getSimulPDP_Number = $GetSGSN_S['SimulPDP_Number'];
$Avaliable_S = $getCapacity_SimulPDP_SGSN - $getSimulPDP_Number ;

$SqlSGSN = "SELECT [Date]
      	,sum([Capacity_SAU]) as [Capacity_SAU]
      	,sum([SAU_Total_Number]) as [SAU_Total_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] = '$date' AND [Pool] like '%Kalimantan'
  		GROUP BY [Date]";
$ResultSGSN = sqlsrv_query($conn, $SqlSGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN = sqlsrv_fetch_array($ResultSGSN);
$getCapacity_SAU = $GetSGSN['Capacity_SAU'];
$getSAU_Total_Number = $GetSGSN['SAU_Total_Number'];
$Avaliable = $getCapacity_SAU - $getSAU_Total_Number ;


?>
<!-- -----------------------------------------------SGSN CHART SIMUL PDP ------------------------------------------------------------- -->

<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'SGSN'],
          ['SAU Total Number Used  <?php echo $getSimulPDP_Number ; ?>', <?php echo $getSimulPDP_Number ; ?>],
          ['Avaliable  <?php echo $Avaliable_S ; ?> ', <?php echo $Avaliable_S ; ?>],
        ]);

        var options = {
          title: 'SGSN Simul PDP - Capacity SimulPDP SGSN : <?php echo $getCapacity_SimulPDP_SGSN ;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Kalimantan1'));
        chart.draw(data, options);
      }
</script>

<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'SGSN'],
          ['SimulPDP Number  <?php echo $getSAU_Total_Number ; ?>', <?php echo $getSAU_Total_Number ; ?>],
          ['Avaliable  <?php echo $Avaliable ; ?> ', <?php echo $Avaliable ; ?>],
        ]);

        var options = {
          title: 'SGSN SAU - Capacity SAU : <?php echo $getCapacity_SAU ;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Kalimantan2'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Kalimantan ------------------------------------------------->
<!----------------------------------------------- Jabo Script ---------------------------------------------->
<?php
$date = $_POST['Date'];

$SqlSGSN_S = "SELECT [Date]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] = '$date' AND [Pool] like '%Jabo'
  		GROUP BY [Date]";
$ResultSGSN_S = sqlsrv_query($conn, $SqlSGSN_S, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN_S = sqlsrv_fetch_array($ResultSGSN_S);
$getCapacity_SimulPDP_SGSN = $GetSGSN_S['Capacity_SimulPDP_SGSN'];
$getSimulPDP_Number = $GetSGSN_S['SimulPDP_Number'];
$Avaliable_S = $getCapacity_SimulPDP_SGSN - $getSimulPDP_Number ;

$SqlSGSN = "SELECT [Date]
      	,sum([Capacity_SAU]) as [Capacity_SAU]
      	,sum([SAU_Total_Number]) as [SAU_Total_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] = '$date' AND [Pool] like '%Jabo'
  		GROUP BY [Date]";
$ResultSGSN = sqlsrv_query($conn, $SqlSGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN = sqlsrv_fetch_array($ResultSGSN);
$getCapacity_SAU = $GetSGSN['Capacity_SAU'];
$getSAU_Total_Number = $GetSGSN['SAU_Total_Number'];
$Avaliable = $getCapacity_SAU - $getSAU_Total_Number ;


?>
<!-- -----------------------------------------------SGSN CHART SIMUL PDP ------------------------------------------------------------- -->

<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'SGSN'],
          ['SimulPDP Number  <?php echo $getSimulPDP_Number ; ?>', <?php echo $getSimulPDP_Number ; ?>],
          ['Avaliable  <?php echo $Avaliable_S ; ?> ', <?php echo $Avaliable_S ; ?>],
        ]);

        var options = {
          title: 'SGSN Simul PDP - Capacity SimulPDP SGSN : <?php echo $getCapacity_SimulPDP_SGSN ;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Jabo1'));
        chart.draw(data, options);
      }
</script>

<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'SGSN'],
          ['SAAU Total Number  <?php echo $getSAU_Total_Number ; ?>', <?php echo $getSAU_Total_Number ; ?>],
          ['Avaliable  <?php echo $Avaliable ; ?> ', <?php echo $Avaliable ; ?>],
        ]);

        var options = {
          title: 'SGSN SAU - Capacity SAU : <?php echo $getCapacity_SAU ;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Jabo2'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Jabo ------------------------------------------------->
<!----------------------------------------------- East Script ---------------------------------------------->
<?php
$date = $_POST['Date'];

$SqlSGSN_S = "SELECT [Date]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] = '$date' AND [Pool] like '%East'
  		GROUP BY [Date]";
$ResultSGSN_S = sqlsrv_query($conn, $SqlSGSN_S, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN_S = sqlsrv_fetch_array($ResultSGSN_S);
$getCapacity_SimulPDP_SGSN = $GetSGSN_S['Capacity_SimulPDP_SGSN'];
$getSimulPDP_Number = $GetSGSN_S['SimulPDP_Number'];
$Avaliable_S = $getCapacity_SimulPDP_SGSN - $getSimulPDP_Number ;

$SqlSGSN = "SELECT [Date]
      	,sum([Capacity_SAU]) as [Capacity_SAU]
      	,sum([SAU_Total_Number]) as [SAU_Total_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] = '$date' AND [Pool] like '%East'
  		GROUP BY [Date]";
$ResultSGSN = sqlsrv_query($conn, $SqlSGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN = sqlsrv_fetch_array($ResultSGSN);
$getCapacity_SAU = $GetSGSN['Capacity_SAU'];
$getSAU_Total_Number = $GetSGSN['SAU_Total_Number'];
$Avaliable = $getCapacity_SAU - $getSAU_Total_Number ;


?>
<!-- -----------------------------------------------SGSN CHART ------------------------------------------------ -->

<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'SGSN'],
          ['SimulPDP Number  <?php echo $getSimulPDP_Number ; ?>', <?php echo $getSimulPDP_Number ; ?>],
          ['Avaliable  <?php echo $Avaliable_S ; ?> ', <?php echo $Avaliable_S ; ?>],
        ]);

        var options = {
          title: 'SGSN Simul PDP - Capacity SimulPDP SGSN : <?php echo $getCapacity_SimulPDP_SGSN ;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_East1'));
        chart.draw(data, options);
      }
</script>

<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'SGSN'],
          ['SAU Total Number Used  <?php echo $getSAU_Total_Number ; ?>', <?php echo $getSAU_Total_Number ; ?>],
          ['Avaliable  <?php echo $Avaliable ; ?> ', <?php echo $Avaliable ; ?>],
        ]);

        var options = {
          title: 'SGSN SAU - Capacity SAU : <?php echo $getCapacity_SAU ;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_East2'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End East ------------------------------------------------->
<!----------------------------------------------- Balomsum Script ---------------------------------------------->
<?php
$date = $_POST['Date'];

$SqlSGSN_S = "SELECT [Date]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] = '$date' AND [Pool] like '%Balomsum'
  		GROUP BY [Date]";
$ResultSGSN_S = sqlsrv_query($conn, $SqlSGSN_S, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN_S = sqlsrv_fetch_array($ResultSGSN_S);
$getCapacity_SimulPDP_SGSN = $GetSGSN_S['Capacity_SimulPDP_SGSN'];
$getSimulPDP_Number = $GetSGSN_S['SimulPDP_Number'];
$Avaliable_S = $getCapacity_SimulPDP_SGSN - $getSimulPDP_Number ;

$SqlSGSN = "SELECT [Date]
      	,sum([Capacity_SAU]) as [Capacity_SAU]
      	,sum([SAU_Total_Number]) as [SAU_Total_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] = '$date' AND [Pool] like '%Balomsum'
  		GROUP BY [Date]";
$ResultSGSN = sqlsrv_query($conn, $SqlSGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN = sqlsrv_fetch_array($ResultSGSN);
$getCapacity_SAU = $GetSGSN['Capacity_SAU'];
$getSAU_Total_Number = $GetSGSN['SAU_Total_Number'];
$Avaliable = $getCapacity_SAU - $getSAU_Total_Number ;


?>
<!-- -----------------------------------------------SGSN CHART SIMUL PDP ------------------------------------------------------------- -->

<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'SGSN'],
          ['SAU Total Number Used  <?php echo $getSimulPDP_Number ; ?>', <?php echo $getSimulPDP_Number ; ?>],
          ['Avaliable  <?php echo $Avaliable_S ; ?> ', <?php echo $Avaliable_S ; ?>],
        ]);

        var options = {
          title: 'SGSN Simul PDP - Capacity SimulPDP SGSN : <?php echo $getCapacity_SimulPDP_SGSN ;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Balomsum1'));
        chart.draw(data, options);
      }
</script>

<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'SGSN'],
          ['SimulPDP Number  <?php echo $getSAU_Total_Number ; ?>', <?php echo $getSAU_Total_Number ; ?>],
          ['Avaliable  <?php echo $Avaliable ; ?> ', <?php echo $Avaliable ; ?>],
        ]);

        var options = {
          title: 'SGSN SAU - Capacity SAU : <?php echo $getCapacity_SAU ;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Balomsum2'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Balomsum ------------------------------------------------->
