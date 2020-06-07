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
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
					<h2>TOWER PRODUCTIVITY 3G Region (Payload)</h2> 
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
							<li><a class="close-link"><i class="fa fa-close"></i></a></li>
						</ul>
					<div class="clearfix"></div>
                </div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class=""><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Java Island</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Sumatera Island</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Unknow Island</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
							<div id="3GregionCentralPayload" class="demo-placeholder"></div>
							<div id="3GregionJabodetabekPayload" class="demo-placeholder"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="profile-tab">
							<div id="3GregionEastPayload" class="demo-placeholder"></div>
							<div id="3GregionNorthPayload" class="demo-placeholder"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade active" id="tab_content3" aria-labelledby="profile-tab">
							<div id="3GregionWestPayload" class="demo-placeholder"></div>
                        </div>
                      </div>
                    </div>
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
<!-- --------------------------------------------------------------------REGION 3G PAYLOAD ------------------- -->
<!-- Chart 3G Region Central Weekly PAYLOAD-->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'Low', 'Medium','High'],
			<?php 
			$sqlhigh 			= "SELECT TOP 2[Week],[Region],[Low],[Medium],[High]
								  FROM [WebDashboard].[dbo].[3GNQITowerProductivityPayloadReg]
								  where [Week] < 100 and [Region] = 'Central'
								  order by [Week] desc";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[Low],$data[Medium],$data[High]]," ;
            }
			?>
               
            ]);
		
			
			var options = {
               title: '3G Region CENTRAL (Payload)' ,
               isStacked:'percent',	
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   2:{color:'Red'},
                   1:{color:'Yellow'},
                   0:{color:'Green'}
                 }  
            };

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('3GregionCentralPayload'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>

<!-- Chart 3G Region East Weekly PAYLOAD-->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'Low', 'Medium','High'],
			<?php 
			$sqlhigh 			= "SELECT TOP 2 [Week],[Region],[Low],[Medium],[High] 
								  FROM [WebDashboard].[dbo].[3GNQITowerProductivityPayloadReg]
								  where [Week] < 100 and [Region] = 'East'
								  order by [Week] desc";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[Low],$data[Medium],$data[High]]," ;
            }
			?>
               
            ]);
		

            var options = {
               title: '3G Region EAST (Payload)' ,
               isStacked:'percent',	
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   2:{color:'Red'},
                   1:{color:'Yellow'},
                   0:{color:'Green'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('3GregionEastPayload'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart 3G Region Jabodetabek Weekly PAYLOAD-->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'Low', 'Medium','High'],
			<?php 
			$sqlhigh 			= "SELECT TOP 2 [Week],[Region],[Low],[Medium],[High] 
								  FROM [WebDashboard].[dbo].[3GNQITowerProductivityPayloadReg]
								  where [Week] < 100 and [Region] = 'Jabodetabek'
								  order by [Week] desc";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[Low],$data[Medium],$data[High]]," ;
            }
			?>
               
            ]);
		

            var options = {
               title: '3G Region JABODETABEK (Payload)' ,
               isStacked:'percent',	
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   2:{color:'Red'},
                   1:{color:'Yellow'},
                   0:{color:'Green'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('3GregionJabodetabekPayload'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart 3G Region North Weekly PAYLOAD -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'Low', 'Medium','High'],
			<?php 
			$sqlhigh 			= "SELECT TOP 2 [Week],[Region],[Low],[Medium],[High] 
								  FROM [WebDashboard].[dbo].[3GNQITowerProductivityPayloadReg]
								  where [Week] < 100 and [Region] = 'North'
								  order by [Week] desc";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[Low],$data[Medium],$data[High]]," ;
            }
			?>
               
            ]);
		

            var options = {
               title: '3G Region NORTH (Payload)' ,
               isStacked:'percent',	
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   2:{color:'Red'},
                   1:{color:'Yellow'},
                   0:{color:'Green'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('3GregionNorthPayload'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart 3G Region West Weekly PAYLOAD-->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'Low', 'Medium','High'],
			<?php 
			$sqlhigh 			= "SELECT TOP 2 [Week],[Region],[Low],[Medium],[High] 
								  FROM [WebDashboard].[dbo].[3GNQITowerProductivityPayloadReg]
								  where [Week] < 100 and [Region] = 'West'
								  order by [Week] desc";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[Low],$data[Medium],$data[High]]," ;
            }
			?>
               
            ]);
		

            var options = {
               title: '3G Region WEST (Payload)' ,
               isStacked:'percent',	
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   2:{color:'Red'},
                   1:{color:'Yellow'},
                   0:{color:'Green'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('3GregionWestPayload'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>