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
					<h2>TOWER PRODUCTIVITY 3G Region (Summary)</h2>
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
							<div id="3GRegionCentral" class="demo-placeholder"></div>
							<div id="3GRegionJabodetabek" class="demo-placeholder"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="profile-tab">
							<div id="3GRegionEast" class="demo-placeholder"></div>
							<div id="3GRegionNorth" class="demo-placeholder"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade active" id="tab_content3" aria-labelledby="profile-tab">
							<div id="3GRegionWest" class="demo-placeholder"></div>
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
<!-- 3G REGION -->
<!-- 3G JAVA ISLAND -->
<!-- 3G Central -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'Low', 'Medium','Medium-High','High'],
			<?php 
			$sqlCentral 		= "	SELECT [Week],[Region],[Low],[Medium],[MEDIUM-HIGH] as MediumHigh ,[High] FROM [WebDashboard].[dbo].[3GTowerProductivityRegWeek]
									WHERE [Week] >= ( SELECT MAX([Week]) FROM [WebDashboard].[dbo].[3GTowerProductivityRegWeek])-1
									AND [Region] = 'Central' ";
			$resultCentral		= sqlsrv_query($conn, $sqlCentral, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($dataCentral = sqlsrv_fetch_array($resultCentral) )
			{
				echo "['Week $dataCentral[Week]',$dataCentral[Low],$dataCentral[Medium],$dataCentral[MediumHigh],$dataCentral[High]]," ;
            }
			?>
               
            ]);
		

            var options = {
               title: '3G Region CENTRAL (Summary)' ,
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
            var chart = new google.visualization.ColumnChart(document.getElementById('3GRegionCentral'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>

<!-- 3G REGION -->
<!-- 3G JAVA ISLAND -->
<!-- 3G JABODETABEK -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'Low', 'Medium','Medium-High','High'],
			<?php 
			$sqlJabodetabek 	  = "SELECT [Week],[Region],[Low],[Medium],[MEDIUM-HIGH] as MediumHigh ,[High] FROM [WebDashboard].[dbo].[3GTowerProductivityRegWeek]
									WHERE [Week] >= ( SELECT MAX([Week]) FROM [WebDashboard].[dbo].[3GTowerProductivityRegWeek])-1
									AND [Region] = 'Jabodetabek'";
			$resultJabodetabek			= sqlsrv_query($conn, $sqlJabodetabek, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($dataJabodetabek = sqlsrv_fetch_array($resultJabodetabek) )
			{
				echo "['Week $dataJabodetabek[Week]',$dataJabodetabek[Low],$dataJabodetabek[Medium],$dataJabodetabek[MediumHigh],$dataJabodetabek[High]]," ;
            }
			?>
               
            ]);
		

            var options = {
               title: '3G Region JABODETABEK (Summary)' ,
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
            var chart = new google.visualization.ColumnChart(document.getElementById('3GRegionJabodetabek'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>

<!-- 3G REGION -->
<!-- 3G SUMATERA ISLAND -->
<!-- 3G EAST -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'Low', 'Medium','Medium-High','High'],
			<?php 
			$sqlEast 			= "SELECT [Week],[Region],[Low],[Medium],[MEDIUM-HIGH] as MediumHigh ,[High] FROM [WebDashboard].[dbo].[3GTowerProductivityRegWeek]
									WHERE [Week] >= ( SELECT MAX([Week]) FROM [WebDashboard].[dbo].[3GTowerProductivityRegWeek])-1
									AND [Region] = 'East'";
			$resultEast			= sqlsrv_query($conn, $sqlEast, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($dataEast = sqlsrv_fetch_array($resultEast) )
			{
				echo "['Week $dataEast[Week]',$dataEast[Low],$dataEast[Medium],$dataEast[MediumHigh],$dataEast[High]]," ;
            }
			?>
               
            ]);
		

            var options = {
               title: '3G Region EAST (Summary)' ,
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
            var chart = new google.visualization.ColumnChart(document.getElementById('3GRegionEast'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>

<!-- 3G REGION -->
<!-- 3G SUMATERA ISLAND -->
<!-- 3G NORTH -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'Low', 'Medium','Medium-High','High'],
			<?php 
			
			$sqlNorth			= "SELECT [Week],[Region],[Low],[Medium],[MEDIUM-HIGH] as MediumHigh ,[High] FROM [WebDashboard].[dbo].[3GTowerProductivityRegWeek]
									WHERE [Week] >= ( SELECT MAX([Week]) FROM [WebDashboard].[dbo].[3GTowerProductivityRegWeek])-1
									AND [Region] = 'North'";
			$resultNorth		= sqlsrv_query($conn, $sqlNorth, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($dataNorth 	= sqlsrv_fetch_array($resultNorth) )
			{
				echo "['Week $dataNorth[Week]',$dataNorth[Low],$dataNorth[Medium],$dataNorth[MediumHigh],$dataNorth[High]]," ;
            }
			?>
               
            ]);
		

            var options = {
               title: '3G Region NORTH (Summary)' ,
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
            var chart = new google.visualization.ColumnChart(document.getElementById('3GRegionNorth'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>

<!-- 3G REGION -->
<!-- 3G UNKNOW ISLAND -->
<!-- 3G WEST -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'Low', 'Medium','Medium-High','High'],
			<?php 
			$sqlWest 	  		= "SELECT [Week],[Region],[Low],[Medium],[MEDIUM-HIGH] as MediumHigh ,[High] FROM [WebDashboard].[dbo].[3GTowerProductivityRegWeek]
									WHERE [Week] >= ( SELECT MAX([Week]) FROM [WebDashboard].[dbo].[3GTowerProductivityRegWeek])-1
									AND [Region] = 'West'";
			$resultWest			= sqlsrv_query($conn, $sqlWest, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($dataWest 	= sqlsrv_fetch_array($resultWest) )
			{
				echo "['Week  - $dataWest[Week]',$dataWest[Low],$dataWest[Medium],$dataWest[MediumHigh],$dataWest[High]]," ;
            }
			?>
               
            ]);
		

            var options = {
               title: '3G Region (Summary)' ,
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
            var chart = new google.visualization.ColumnChart(document.getElementById('3GRegionWest'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>