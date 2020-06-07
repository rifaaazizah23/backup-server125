<?php
include 'header.php';
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

.donutDiv
{	
    width: 600px;
    height: 500px;
}

.centerLabel
{
    position: absolute;
    left: 1px;
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

<!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          
          <!-- /top tiles -->

          <br />
<div class="page-title">
	<div class="title_left">
		<h3>Core <small>Nationweekly</small></h3>
	</div>
</div>
<div class="x_panel">
		<div class="x_content">
			<div class="row">
			<form method="post" action="NationWeekly.php">
				<div class="col-md-3">
					<fieldset>
                        <div class="form-group">
						<select class='form-control' name='Week' id="Week" >
			            <?php
								$tsql = "SELECT Week FROM [WebDashboard].[dbo].[PS_CORE_GGSN_Week] GROUP BY Week";
										 
								$result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
																	
								while($data = sqlsrv_fetch_array($result))
									{
									 echo "<option value=".$data[Week]."> Week ".$data[Week]."</option>";
									} 
						?>
						</select>
					</div>
                    </fieldset>
                </div>
				<div class="form-group">
				</div>
				<div class="col-md-3 col-sm-12 col-xs-12 form-group">
					<button type="submit" class="btn btn-primary" name="submit">Tampil</button>
				</div>
					</form>
			</div>
		</div>
	</div>
        

      <!-- MULAI DARI SINI -->
  <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Daily SGSN SAU </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="SGSN_Chart" class="donutDiv"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Daily SGSN Simul PDP </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="S_SGSN_Chart" class="donutDiv"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Daily GGSN Throughput </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="T_GGSN_Chart" class="donutDiv"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Daily GGSN PDP  </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="PDP_GGSN_Chart" class="donutDiv"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Daily UPCC Registered  </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="R_UPCC_Chart" class="donutDiv"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Daily UPCC Online   </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="O_UPCC_Chart" class="donutDiv"></div>
                </div>
              </div>
        </div>
		
		<div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Daily IP POOL HUAWEI </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="IPPOOL_Chart" class="donutDiv"></div>
                </div>
              </div>
        </div>
      <!-- END -->

          </div>


        </div>
        <!-- /page content -->

<!-- -----------------------------------------------SGSN CHART ------------------------------------------------------------- -->
<?php
$week = $_POST['Week'];

$SqlSGSN_S = "SELECT [Week]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]
  		WHERE [Week] = '$week'
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
  		WHERE [Week] = '$week'
  		GROUP BY [Week]";
$ResultSGSN = sqlsrv_query($conn, $SqlSGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN = sqlsrv_fetch_array($ResultSGSN);
$getCapacity_SAU = $GetSGSN['Capacity_SAU'];
$getSAU_Total_Number = $GetSGSN['SAU_Total_Number'];
$Avaliable = $getCapacity_SAU - $getSAU_Total_Number ;


$SqlGGSN = "SELECT [Week]
      ,sum([Capacity_throughput]) as Capacity_throughput
      ,sum([Throughput_Gbps]) as Throughput_Gbps
      ,sum([Capacity_PDP]) as Capacity_PDP
      ,sum([PDP_Total]) as PDP_Total
  FROM [WebDashboard].[dbo].[PS_CORE_GGSN_Week]
  WHERE [Week] = '$week'
  GROUP BY [Week]";
$ResultGGSN = sqlsrv_query($conn, $SqlGGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetGGSN = sqlsrv_fetch_array($ResultGGSN);
$getCapacity_throughput = $GetGGSN['Capacity_throughput'];
$getThroughput_Gbps = $GetGGSN['Throughput_Gbps'];
$getCapacity_PDP = $GetGGSN['Capacity_PDP'];
$getPDP_Total = $GetGGSN['PDP_Total'];
$Avaliable_T = $getCapacity_throughput - $getThroughput_Gbps ;
$Avaliable_PDP = $getCapacity_PDP - $getPDP_Total ;


$SqlUPCC = "SELECT [Week]
      ,sum([Registered Subs]) as RegisteredSubs
      ,sum([Capacity Registered Subs]) as CapacityRegisteredSubs
      ,sum([Online Subs]) as OnlineSubs
      ,sum([Capacity Online Subs]) as CapacityOnlineSubs
  FROM [WebDashboard].[dbo].[PS_CORE_UPCC_Week]
  WHERE [Week] = '$week'
  GROUP BY [Week]";
$ResultUPCC = sqlsrv_query($conn, $SqlUPCC, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetUPCC = sqlsrv_fetch_array($ResultUPCC);
$getRegisteredSubs = $GetUPCC['RegisteredSubs'];
$getCapacityRegisteredSubs = $GetUPCC['CapacityRegisteredSubs'];
$getCOnlineSubs = $GetUPCC['OnlineSubs'];
$getCapacityOnlineSubs = $GetUPCC['CapacityOnlineSubs'];
$Avaliable_R = $getCapacityRegisteredSubs - $getRegisteredSubs ;
$Avaliable_O = $getCapacityOnlineSubs - $getCOnlineSubs ;

$SqlIPPOOL_HUAWEI = "SELECT [Week]
      ,sum([Capacity]) as Capacity
      ,sum([IP_Pool_Usage]) as IP_Pool_Usage
  FROM [WebDashboard].[dbo].[PS_CORE_IP_POOL_HUAWEI_Week]
   WHERE [Week] = '$week'
  GROUP BY [Week]";
$ResultIPPOOL_HUAWEI = sqlsrv_query($conn, $SqlIPPOOL_HUAWEI, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetIPPOOL_HUAWEI = sqlsrv_fetch_array($ResultIPPOOL_HUAWEI);
$getCapacity = $GetIPPOOL_HUAWEI['Capacity'];
$getIP_Pool_Usage = $GetIPPOOL_HUAWEI['IP_Pool_Usage'];
$Avaliable_IPPOOL_HUAWEI = $getCapacity - $getIP_Pool_Usage ;


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
		  chartArea:{left:0,top:0,width:"50%",height:"50%"},
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('S_SGSN_Chart'));
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
		  chartArea:{left:0,top:0,width:"50%",height:"50%"},
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('SGSN_Chart'));
        chart.draw(data, options);
      }
</script>
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
		  chartArea:{left:0,top:0,width:"50%",height:"50%"},
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
		  chartArea:{left:0,top:0,width:"50%",height:"50%"},
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('PDP_GGSN_Chart'));
        chart.draw(data, options);
      }
</script>
<!-- -----------------------------------------------Register UPCC Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'UPCC'],
          ['Registered Subs  <?php echo $getRegisteredSubs ; ?>', <?php echo $getRegisteredSubs ; ?>],
          ['Avaliable  <?php echo $Avaliable_R ; ?>', <?php echo $Avaliable_R ; ?>],
        ]);

        var options = {
          title: 'UPCC Registered - Capacity Registered Subs : <?php echo $getCapacityRegisteredSubs;?>',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
		  chartArea:{left:0,top:0,width:"50%",height:"50%"},
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('R_UPCC_Chart'));
        chart.draw(data, options);
      }
</script>

<!-- -----------------------------------------------Online UPCC Chart--------------------------------------------------------------- -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'UPCC'],
          ['Online Subs = <?php echo $getCapacityOnlineSubs ; ?>', <?php echo $getCapacityOnlineSubs ; ?>],
          ['Avaliable = <?php echo $Avaliable_O ; ?>', <?php echo $Avaliable_O ; ?>],
        ]);

        var options = {
          title: 'UPCC Online - Capacity Online Subs : <?php echo $getCapacityOnlineSubs;?> ',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
		  chartArea:{left:0,top:0,width:"50%",height:"50%"},
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('O_UPCC_Chart'));
        chart.draw(data, options);
      }
</script>
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
		  chartArea:{left:0,top:0,width:"50%",height:"50%"},
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('IPPOOL_Chart'));
        chart.draw(data, options);
      }
</script>

<?php
include 'footer.php';
?>