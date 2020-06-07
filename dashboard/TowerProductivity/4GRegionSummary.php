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
					<h2>TOWER PRODUCTIVITY 4G Region (Summary)</h2>
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
							<div id="4GregionCentral" class="demo-placeholder"></div>
							<div id="4GregionJabodetabek" class="demo-placeholder"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade active" id="tab_content2" aria-labelledby="profile-tab">
							<div id="4GregionEast" class="demo-placeholder"></div>
							<div id="4GregionNorth" class="demo-placeholder"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade active" id="tab_content3" aria-labelledby="profile-tab">
							<div id="4GregionWest" class="demo-placeholder"></div>
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
<!-- Chart Region Central Weekly -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week','Very Low', 'Low', 'Medium','Medium-High','High','Very High'],
			<?php 
			$sqlhigh 			= "SELECT TOP 2[Week],
									[Region],
									[VERY LOW] as vlow,
									[Low],
									[MEDIUM-HIGH] as [MediumHigh],
									[Medium],
									[High],
									[VERY HIGH] as vhigh
									FROM [WebDashboard].[dbo].[4GTowerProductivityReg]
									where [Week] >= ( SELECT MAX([Week]) FROM [WebDashboard].[dbo].[4GTowerProductivityReg] Where [Week] < 100)-1
									and [Region] = 'Central'
									order by [Week] asc";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[vlow],$data[Low],$data[Medium],$data[MediumHigh],$data[High],$data[vhigh]]," ;
            }
			?>
               
            ]);
		
			
			var options = {
               title: '4G Region CENTRAL (Summary)' ,
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
            var chart = new google.visualization.ColumnChart(document.getElementById('4GregionCentral'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>

<!-- Chart Region East Weekly -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week','Very Low', 'Low', 'Medium','Medium-High','High','Very High'],
			<?php 
			$sqlhigh 			= "SELECT TOP 2[Week],
									[Region],
									[VERY LOW] as vlow,
									[Low],
									[MEDIUM-HIGH] as [MediumHigh],
									[Medium],
									[High],
									[VERY HIGH] as vhigh 
									FROM [WebDashboard].[dbo].[4GTowerProductivityReg]
									where [Week] >= ( SELECT MAX([Week]) FROM [WebDashboard].[dbo].[4GTowerProductivityReg] WHERE [Week] < 100 )-1
									and [Region] = 'East'
									order by [Week] asc";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[vlow],$data[Low],$data[Medium],$data[MediumHigh],$data[High],$data[vhigh]]," ;
            }
			?>
               
            ]);
		

            var options = {
               title: '4G Region EAST (Summary)' ,
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
            var chart = new google.visualization.ColumnChart(document.getElementById('4GregionEast'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Region Jabodetabek Weekly -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week','Very Low', 'Low', 'Medium','Medium-High','High','Very High'],
			<?php 
			$sqlhigh 			= "SELECT TOP 2[Week],
									[Region],
									[VERY LOW] as vlow,
									[Low],
									[MEDIUM-HIGH] as [MediumHigh],
									[Medium],
									[High],
									[VERY HIGH] as vhigh 
									FROM [WebDashboard].[dbo].[4GTowerProductivityReg]
									where [Week] >= ( SELECT MAX([Week]) FROM [WebDashboard].[dbo].[4GTowerProductivityReg] WHERE [Week] < 100 )-1
									and [Region] = 'Jabodetabek'
									order by [Week] asc";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[vlow],$data[Low],$data[Medium],$data[MediumHigh],$data[High],$data[vhigh]]," ;
            }
			?>
               
            ]);
		

            var options = {
               title: '4G Region JABODETABEK (Summary)' ,
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
            var chart = new google.visualization.ColumnChart(document.getElementById('4GregionJabodetabek'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Region North Weekly -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week','Very Low', 'Low', 'Medium','Medium-High','High','Very High'],
			<?php 
			$sqlhigh 			= "SELECT TOP 2[Week],
									[Region],
									[VERY LOW] as vlow,
									[Low],
									[MEDIUM-HIGH] as [MediumHigh],
									[Medium],
									[High],
									[VERY HIGH] as vhigh 
									FROM [WebDashboard].[dbo].[4GTowerProductivityReg]
									where [Week] >= ( SELECT MAX([Week]) FROM [WebDashboard].[dbo].[4GTowerProductivityReg] WHERE [Week] < 100 )-1
									and [Region] = 'North'
									order by [Week] asc";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[vlow],$data[Low],$data[Medium],$data[MediumHigh],$data[High],$data[vhigh]]," ;
            }
			?>
               
            ]);
		

            var options = {
               title: '4G Region NORTH (Summary)' ,
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
            var chart = new google.visualization.ColumnChart(document.getElementById('4GregionNorth'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Region West Weekly -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week','Very Low', 'Low', 'Medium','Medium-High','High','Very High'],
			<?php 
			$sqlhigh 			= "SELECT TOP 2[Week],
									[Region],
									[VERY LOW] as vlow,
									[Low],
									[MEDIUM-HIGH] as [MediumHigh],
									[Medium],
									[High],
									[VERY HIGH] as vhigh 
									FROM [WebDashboard].[dbo].[4GTowerProductivityReg]
									where [Week] >= ( SELECT MAX([Week]) FROM [WebDashboard].[dbo].[4GTowerProductivityReg] WHERE [Week] < 100 )-1
									and [Region] = 'West'
									order by [Week] asc";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[vlow],$data[Low],$data[Medium],$data[MediumHigh],$data[High],$data[vhigh]]," ;
            }
			?>
               
            ]);
		

            var options = {
               title: '4G Region WEST (Summary)' ,
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
            var chart = new google.visualization.ColumnChart(document.getElementById('4GregionWest'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>