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
				<div id="SGSN_Sulam2" class="donutDiv"></div>
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
				<div id="SGSN_Sulam1" class="donutDiv"></div>
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
				<div id="SGSN_South2" class="donutDiv"></div>
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
				<div id="SGSN_South1" class="donutDiv"></div>
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
				<div id="SGSN_North2" class="donutDiv"></div>
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
				<div id="SGSN_North1" class="donutDiv"></div>
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
				<div id="SGSN_Klm2" class="donutDiv"></div>
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
				<div id="SGSN_Klm1" class="donutDiv"></div>
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
				<div id="SGSN_Jb2" class="donutDiv"></div>
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
				<div id="SGSN_Jb1" class="donutDiv"></div>
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
				<div id="SGSN_Est2" class="donutDiv"></div>
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
				<div id="SGSN_Est1" class="donutDiv"></div>
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
				<div id="SGSN_Bls2" class="donutDiv"></div>
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
				<div id="SGSN_Bls1" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- Balomsum -->
<!----------------------------------------------- Sulampapua Script ------------------------------------------->
<?php
$week = $_POST['Week'];

$SqlSGSN_S = "SELECT [Week]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]
  		WHERE [Week] = '$week' AND [Pool] = 'Sulampapua'
  		GROUP BY [Week]";
$ResultSGSN_S = sqlsrv_query($conn, $SqlSGSN_S, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN_S = sqlsrv_fetch_array($ResultSGSN_S);
$getCapacity_SimulPDP_SGSN = $GetSGSN_S['Capacity_SimulPDP_SGSN'];
$getSimulPDP_Number = $GetSGSN_S['SimulPDP_Number'];
$Avaliable_S = $getCapacity_SimulPDP_SGSN - $getSimulPDP_Number ;

$SqlSGSN = "SELECT [Week]
      	,sum([Capacity_SAU]) as [Capacity_SAU]
      	,sum([SAU_Total_Number]) as [SAU_Total_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]
  		WHERE [Week] = '$week' AND [Pool] = 'Sulampapua'
  		GROUP BY [Week]";
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

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Sulam1'));
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

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Sulam2'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Sulampapua ---------------------------------------------->
<!----------------------------------------------- Southern Script ------------------------------------------->
<?php
$week = $_POST['Week'];

$SqlSGSN_S = "SELECT [Week]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]
  		WHERE [Week] = '$week' AND [Pool] = 'Southern West'
  		GROUP BY [Week]";
$ResultSGSN_S = sqlsrv_query($conn, $SqlSGSN_S, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN_S = sqlsrv_fetch_array($ResultSGSN_S);
$getCapacity_SimulPDP_SGSN = $GetSGSN_S['Capacity_SimulPDP_SGSN'];
$getSimulPDP_Number = $GetSGSN_S['SimulPDP_Number'];
$Avaliable_S = $getCapacity_SimulPDP_SGSN - $getSimulPDP_Number ;

$SqlSGSN = "SELECT [Week]
      	,sum([Capacity_SAU]) as [Capacity_SAU]
      	,sum([SAU_Total_Number]) as [SAU_Total_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]
  		WHERE [Week] = '$week' AND [Pool] = 'Southern West'
  		GROUP BY [Week]";
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

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_South1'));
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

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_South2'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Southern ---------------------------------------------->
<!----------------------------------------------- Northern Script ------------------------------------------->
<?php
$week = $_POST['Week'];

$SqlSGSN_S = "SELECT [Week]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]
  		WHERE [Week] = '$week' AND [Pool] = 'Northern West'
  		GROUP BY [Week]";
$ResultSGSN_S = sqlsrv_query($conn, $SqlSGSN_S, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN_S = sqlsrv_fetch_array($ResultSGSN_S);
$getCapacity_SimulPDP_SGSN = $GetSGSN_S['Capacity_SimulPDP_SGSN'];
$getSimulPDP_Number = $GetSGSN_S['SimulPDP_Number'];
$Avaliable_S = $getCapacity_SimulPDP_SGSN - $getSimulPDP_Number ;

$SqlSGSN = "SELECT [Week]
      	,sum([Capacity_SAU]) as [Capacity_SAU]
      	,sum([SAU_Total_Number]) as [SAU_Total_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]
  		WHERE [Week] = '$week' AND [Pool] = 'Northern West'
  		GROUP BY [Week]";
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

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_North1'));
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

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_North2'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Northern ---------------------------------------------->
<!----------------------------------------------- Kalimantan Script ------------------------------------------->
<?php
$week = $_POST['Week'];

$SqlSGSN_S = "SELECT [Week]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]
  		WHERE [Week] = '$week' AND [Pool] = 'Kalimantan'
  		GROUP BY [Week]";
$ResultSGSN_S = sqlsrv_query($conn, $SqlSGSN_S, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN_S = sqlsrv_fetch_array($ResultSGSN_S);
$getCapacity_SimulPDP_SGSN = $GetSGSN_S['Capacity_SimulPDP_SGSN'];
$getSimulPDP_Number = $GetSGSN_S['SimulPDP_Number'];
$Avaliable_S = $getCapacity_SimulPDP_SGSN - $getSimulPDP_Number ;

$SqlSGSN = "SELECT [Week]
      	,sum([Capacity_SAU]) as [Capacity_SAU]
      	,sum([SAU_Total_Number]) as [SAU_Total_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]
  		WHERE [Week] = '$week' AND [Pool] = 'Kalimantan'
  		GROUP BY [Week]";
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

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Klm1'));
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

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Klm2'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Kalimantan ---------------------------------------------->
<!----------------------------------------------- Jabo Script ------------------------------------------->
<?php
$week = $_POST['Week'];

$SqlSGSN_S = "SELECT [Week]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]
  		WHERE [Week] = '$week' AND [Pool] = 'Jabo'
  		GROUP BY [Week]";
$ResultSGSN_S = sqlsrv_query($conn, $SqlSGSN_S, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN_S = sqlsrv_fetch_array($ResultSGSN_S);
$getCapacity_SimulPDP_SGSN = $GetSGSN_S['Capacity_SimulPDP_SGSN'];
$getSimulPDP_Number = $GetSGSN_S['SimulPDP_Number'];
$Avaliable_S = $getCapacity_SimulPDP_SGSN - $getSimulPDP_Number ;

$SqlSGSN = "SELECT [Week]
      	,sum([Capacity_SAU]) as [Capacity_SAU]
      	,sum([SAU_Total_Number]) as [SAU_Total_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]
  		WHERE [Week] = '$week' AND [Pool] = 'Jabo'
  		GROUP BY [Week]";
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

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Jb1'));
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

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Jb2'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Jabo ---------------------------------------------->
<!----------------------------------------------- East Script ------------------------------------------->
<?php
$week = $_POST['Week'];

$SqlSGSN_S = "SELECT [Week]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]
  		WHERE [Week] = '$week' AND [Pool] = 'East'
  		GROUP BY [Week]";
$ResultSGSN_S = sqlsrv_query($conn, $SqlSGSN_S, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN_S = sqlsrv_fetch_array($ResultSGSN_S);
$getCapacity_SimulPDP_SGSN = $GetSGSN_S['Capacity_SimulPDP_SGSN'];
$getSimulPDP_Number = $GetSGSN_S['SimulPDP_Number'];
$Avaliable_S = $getCapacity_SimulPDP_SGSN - $getSimulPDP_Number ;

$SqlSGSN = "SELECT [Week]
      	,sum([Capacity_SAU]) as [Capacity_SAU]
      	,sum([SAU_Total_Number]) as [SAU_Total_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]
  		WHERE [Week] = '$week' AND [Pool] = 'East'
  		GROUP BY [Week]";
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

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Est1'));
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

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Est2'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End East ---------------------------------------------->
<!----------------------------------------------- Balomsum Script ------------------------------------------->
<?php
$week = $_POST['Week'];

$SqlSGSN_S = "SELECT [Week]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]
  		WHERE [Week] = '$week' AND [Pool] = 'Balomsum'
  		GROUP BY [Week]";
$ResultSGSN_S = sqlsrv_query($conn, $SqlSGSN_S, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN_S = sqlsrv_fetch_array($ResultSGSN_S);
$getCapacity_SimulPDP_SGSN = $GetSGSN_S['Capacity_SimulPDP_SGSN'];
$getSimulPDP_Number = $GetSGSN_S['SimulPDP_Number'];
$Avaliable_S = $getCapacity_SimulPDP_SGSN - $getSimulPDP_Number ;

$SqlSGSN = "SELECT [Week]
      	,sum([Capacity_SAU]) as [Capacity_SAU]
      	,sum([SAU_Total_Number]) as [SAU_Total_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]
  		WHERE [Week] = '$week' AND [Pool] = 'Balomsum'
  		GROUP BY [Week]";
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

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Bls1'));
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

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Bls2'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------- End Balomsum ---------------------------------------------->
