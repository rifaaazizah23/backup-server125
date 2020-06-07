<?php
include '../header2.php';
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
<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h3>Tower Productivity<small> 4G Nationwide (Summary)</small></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
					<h2>4G Nationwide Weekly (Summary)</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
							<li><a class="close-link"><i class="fa fa-close"></i></a></li>
						</ul>
						<div class="clearfix"></div>
                </div>
					<div class="x_content">
						<div id="stacked1" class="demo-placeholder"></div>
					</div>
            </div>
        </div>
		<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
					<h2>4G Nationwide Monthly (Summary)</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
							<li><a class="close-link"><i class="fa fa-close"></i></a></li>
						</ul>
						<div class="clearfix"></div>
                </div>
					<div class="x_content">
						<div id="stacked2" class="demo-placeholder"></div>
					</div>
            </div>
         </div>
	</div>
</div>
<?php
include 'footer.php';
?>
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
</script>

<script type = "text/javascript">
google.charts.load('current', {packages: ['corechart']});     
</script>
<!-- Chart Nationwide Weekly -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'Very Low','Low', 'Medium','Medium-High','High','Very High'],
			<?php 
			$sqlhigh 			= "SELECT [Week],
									[VERY LOW] as vlow,
									[Low],
									[Medium],
									[MediumHigh],
									[High],
									[VERY HIGH] as vhigh
									FROM [WebDashboard].[dbo].[TowerProductivity] WHERE [Week] < 100 order by [Week] asc";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[vlow],$data[Low],$data[Medium],$data[MediumHigh],$data[High],$data[vhigh]]," ;
            }
			?>
            ]);
		

            var options = {
               
               isStacked:'percent',	
               hAxis: {
                   minValue: 0
                 },
                 series: {
				   5:{color:'Red'},
                   4:{color:'Orange'},
                   3:{color:'Yellow'},
                   2:{color:'Green'},
                   1:{color:'Blue'},
                   0:{color:'#0fbcf9'}
				   
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked1'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Nationwide Monthly -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'Low', 'Medium','Medium-High','High'],
			<?php 
			$sqlhigh 			= "SELECT [Week],[Low],[Medium],[MediumHigh],[High] 
									,[Monthly] = case when [Week] = '101' then 'January'
													  when [Week] = '102' then 'February'
													  when [Week] = '103' then 'March'
													  when [Week] = '104' then 'April'
													  when [Week] = '105' then 'May'
													  when [Week] = '106' then 'June'
													  when [Week] = '107' then 'July'
													  when [Week] = '108' then 'August'
													  when [Week] = '109' then 'September'
													  when [Week] = '110' then 'October'
													  when [Week] = '111' then 'November'
													  when [Week] = '112' then 'December'
													  else 'null'  end
									FROM [WebDashboard].[dbo].[TowerProductivity]
									WHERE [Week] > 100 order by [Week] asc";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Monthly $data[Monthly]',$data[Low],$data[Medium],$data[MediumHigh],$data[High]]," ;
            }
			?>
			   
               
            ]);
		

            var options = {
               
               isStacked:'percent',	
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   3:{color:'Red'},
                   2:{color:'Blue'},
                   1:{color:'Yellow'},
                   0:{color:'Green'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked2'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>