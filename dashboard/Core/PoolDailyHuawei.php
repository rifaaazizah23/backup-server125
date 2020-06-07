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
<!-- 1 -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>AXISMMS</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="IPPOOL_AXISMMS" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>BLACKBERRY</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="IPPOOL_BLACKBERRY" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- 1 -->
<!-- 2 -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>INTERNET</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="IPPOOL_INTERNET" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>INTERNET_V6</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="IPPOOL_INTERNET_V6" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- 2 -->
<!-- 3 -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>INTERNET2</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="IPPOOL_INTERNET2" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>XLMMS</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="IPPOOL_XLMMS" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- 3 -->
<!------------------------------------------------------- 1 --------------------------------------------------->
<?php
$date = $_POST['Date'];


$SqlIPPOOL_HUAWEI = "SELECT [Date]
      ,sum([Capacity]) as Capacity
      ,sum([IP_Pool_Usage]) as IP_Pool_Usage
  FROM [WebDashboard].[dbo].[PS_CORE_IP_POOL_HUAWEI]
   WHERE [Date] = '$date' AND [Pool_Name] like  '%axismms'
  GROUP BY [Date]";
$ResultIPPOOL_HUAWEI = sqlsrv_query($conn, $SqlIPPOOL_HUAWEI, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetIPPOOL_HUAWEI = sqlsrv_fetch_array($ResultIPPOOL_HUAWEI);
$getCapacity = $GetIPPOOL_HUAWEI['Capacity'];
$getIP_Pool_Usage = $GetIPPOOL_HUAWEI['IP_Pool_Usage'];
$Avaliable_IPPOOL_HUAWEI = $getCapacity - $getIP_Pool_Usage ;


?>

<!-- -----------------------------------------------IP POOL HUAWEI  Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'IPPOOL'],
          ['IP POOL USAGE  <?php echo $getIP_Pool_Usage ; ?>', <?php echo $getIP_Pool_Usage ; ?>],
          ['Avaliable  <?php echo $Avaliable_IPPOOL_HUAWEI ; ?>', <?php echo $Avaliable_IPPOOL_HUAWEI ; ?>],
        ]);

        var options = {
          title: 'IP POOL HUAWEI - Capacity : <?php echo $getCapacity; ?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('IPPOOL_AXISMMS'));
        chart.draw(data, options);
      }
</script>
<?php
$date = $_POST['Date'];


$SqlIPPOOL_HUAWEI = "SELECT [Date]
      ,sum([Capacity]) as Capacity
      ,sum([IP_Pool_Usage]) as IP_Pool_Usage
  FROM [WebDashboard].[dbo].[PS_CORE_IP_POOL_HUAWEI]
   WHERE [Date] = '$date' AND [Pool_Name] like '%blackberry'
  GROUP BY [Date]";
$ResultIPPOOL_HUAWEI = sqlsrv_query($conn, $SqlIPPOOL_HUAWEI, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetIPPOOL_HUAWEI = sqlsrv_fetch_array($ResultIPPOOL_HUAWEI);
$getCapacity = $GetIPPOOL_HUAWEI['Capacity'];
$getIP_Pool_Usage = $GetIPPOOL_HUAWEI['IP_Pool_Usage'];
$Avaliable_IPPOOL_HUAWEI = $getCapacity - $getIP_Pool_Usage ;


?>

<!-- -----------------------------------------------IP POOL HUAWEI  Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'IPPOOL'],
          ['IP POOL USAGE  <?php echo $getIP_Pool_Usage ; ?>', <?php echo $getIP_Pool_Usage ; ?>],
          ['Avaliable  <?php echo $Avaliable_IPPOOL_HUAWEI ; ?>', <?php echo $Avaliable_IPPOOL_HUAWEI ; ?>],
        ]);

        var options = {
          title: 'IP POOL HUAWEI - Capacity : <?php echo $getCapacity; ?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('IPPOOL_BLACKBERRY'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------------- End 1 ---------------------------------------------------->
<!------------------------------------------------------- 2 ----------------------------------------------------->
<?php
$date = $_POST['Date'];


$SqlIPPOOL_HUAWEI = "SELECT [Date]
      ,sum([Capacity]) as Capacity
      ,sum([IP_Pool_Usage]) as IP_Pool_Usage
  FROM [WebDashboard].[dbo].[PS_CORE_IP_POOL_HUAWEI]
   WHERE [Date] = '$date' AND [Pool_Name] like '%internet'
  GROUP BY [Date]";
$ResultIPPOOL_HUAWEI = sqlsrv_query($conn, $SqlIPPOOL_HUAWEI, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetIPPOOL_HUAWEI = sqlsrv_fetch_array($ResultIPPOOL_HUAWEI);
$getCapacity = $GetIPPOOL_HUAWEI['Capacity'];
$getIP_Pool_Usage = $GetIPPOOL_HUAWEI['IP_Pool_Usage'];
$Avaliable_IPPOOL_HUAWEI = $getCapacity - $getIP_Pool_Usage ;


?>

<!-- -----------------------------------------------IP POOL HUAWEI  Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'IPPOOL'],
          ['IP POOL USAGE  <?php echo $getIP_Pool_Usage ; ?>', <?php echo $getIP_Pool_Usage ; ?>],
          ['Avaliable  <?php echo $Avaliable_IPPOOL_HUAWEI ; ?>', <?php echo $Avaliable_IPPOOL_HUAWEI ; ?>],
        ]);

        var options = {
          title: 'IP POOL HUAWEI - Capacity : <?php echo $getCapacity; ?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('IPPOOL_INTERNET'));
        chart.draw(data, options);
      }
</script>
<?php
$date = $_POST['Date'];


$SqlIPPOOL_HUAWEI = "SELECT [Date]
      ,sum([Capacity]) as Capacity
      ,sum([IP_Pool_Usage]) as IP_Pool_Usage
  FROM [WebDashboard].[dbo].[PS_CORE_IP_POOL_HUAWEI]
   WHERE [Date] = '$date' AND [Pool_Name] like '%internet_v6'
  GROUP BY [Date]";
$ResultIPPOOL_HUAWEI = sqlsrv_query($conn, $SqlIPPOOL_HUAWEI, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetIPPOOL_HUAWEI = sqlsrv_fetch_array($ResultIPPOOL_HUAWEI);
$getCapacity = $GetIPPOOL_HUAWEI['Capacity'];
$getIP_Pool_Usage = $GetIPPOOL_HUAWEI['IP_Pool_Usage'];
$Avaliable_IPPOOL_HUAWEI = $getCapacity - $getIP_Pool_Usage ;


?>

<!-- -----------------------------------------------IP POOL HUAWEI  Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'IPPOOL'],
          ['IP POOL USAGE  <?php echo $getIP_Pool_Usage ; ?>', <?php echo $getIP_Pool_Usage ; ?>],
          ['Avaliable  <?php echo $Avaliable_IPPOOL_HUAWEI ; ?>', <?php echo $Avaliable_IPPOOL_HUAWEI ; ?>],
        ]);

        var options = {
          title: 'IP POOL HUAWEI - Capacity : <?php echo $getCapacity; ?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('IPPOOL_INTERNET_V6'));
        chart.draw(data, options);
      }
</script>

<!----------------------------------------------------- End 2 ---------------------------------------------------->
<!------------------------------------------------------- 3 ----------------------------------------------------->
<?php
$date = $_POST['Date'];


$SqlIPPOOL_HUAWEI = "SELECT [Date]
      ,sum([Capacity]) as Capacity
      ,sum([IP_Pool_Usage]) as IP_Pool_Usage
  FROM [WebDashboard].[dbo].[PS_CORE_IP_POOL_HUAWEI]
   WHERE [Date] = '$date' AND [Pool_Name] like '%internet2'
  GROUP BY [Date]";
$ResultIPPOOL_HUAWEI = sqlsrv_query($conn, $SqlIPPOOL_HUAWEI, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetIPPOOL_HUAWEI = sqlsrv_fetch_array($ResultIPPOOL_HUAWEI);
$getCapacity = $GetIPPOOL_HUAWEI['Capacity'];
$getIP_Pool_Usage = $GetIPPOOL_HUAWEI['IP_Pool_Usage'];
$Avaliable_IPPOOL_HUAWEI = $getCapacity - $getIP_Pool_Usage ;


?>

<!-- -----------------------------------------------IP POOL HUAWEI  Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'IPPOOL'],
          ['IP POOL USAGE  <?php echo $getIP_Pool_Usage ; ?>', <?php echo $getIP_Pool_Usage ; ?>],
          ['Avaliable  <?php echo $Avaliable_IPPOOL_HUAWEI ; ?>', <?php echo $Avaliable_IPPOOL_HUAWEI ; ?>],
        ]);

        var options = {
          title: 'IP POOL HUAWEI - Capacity : <?php echo $getCapacity; ?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('IPPOOL_INTERNET2'));
        chart.draw(data, options);
      }
</script>
<?php
$date = $_POST['Date'];


$SqlIPPOOL_HUAWEI = "SELECT [Date]
      ,sum([Capacity]) as Capacity
      ,sum([IP_Pool_Usage]) as IP_Pool_Usage
  FROM [WebDashboard].[dbo].[PS_CORE_IP_POOL_HUAWEI]
   WHERE [Date] = '$date' AND [Pool_Name] like '%xlmms'
  GROUP BY [Date]";
$ResultIPPOOL_HUAWEI = sqlsrv_query($conn, $SqlIPPOOL_HUAWEI, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetIPPOOL_HUAWEI = sqlsrv_fetch_array($ResultIPPOOL_HUAWEI);
$getCapacity = $GetIPPOOL_HUAWEI['Capacity'];
$getIP_Pool_Usage = $GetIPPOOL_HUAWEI['IP_Pool_Usage'];
$Avaliable_IPPOOL_HUAWEI = $getCapacity - $getIP_Pool_Usage ;


?>

<!-- -----------------------------------------------IP POOL HUAWEI  Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'IPPOOL'],
          ['IP POOL USAGE  <?php echo $getIP_Pool_Usage ; ?>', <?php echo $getIP_Pool_Usage ; ?>],
          ['Avaliable  <?php echo $Avaliable_IPPOOL_HUAWEI ; ?>', <?php echo $Avaliable_IPPOOL_HUAWEI ; ?>],
        ]);

        var options = {
          title: 'IP POOL HUAWEI - Capacity : <?php echo $getCapacity; ?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('IPPOOL_XLMMS'));
        chart.draw(data, options);
      }
</script>
<!----------------------------------------------------- End 3 ---------------------------------------------------->
