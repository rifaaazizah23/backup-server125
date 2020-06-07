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
<div class="right_col" role="main">
	

<div class="row">

<div class="page-title">
		<div class="col-md-12">
			<div class="form-group">
				<h3>NQI Kabupaten</h3>
			</div>
		</div>
	</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Bandung -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>With Availability</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="WithAvailability" class="demo-placeholder"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>Without Availability</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="WithOutAvailability" class="demo-placeholder"></div>
			</div>
		</div>
	</div>
<!-- End Bandung -->
<!-- Cibitung -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>With Availability - TIER 1</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="WithAvailabilityTier1" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>Without Availability - TIER 1</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="WithOutAvailabilityTier1" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- End Cibitung -->
<!-- Denpasar -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>With Availability - TIER 2</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="WithAvailabilityTier2" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>Without Availability - TIER 2</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="WithOutAvailabilityTier2" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- End Denpasar -->
<!-- Medan -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>With Availability - TIER 3</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="WithAvailabilityTier3" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>Without Availability - TIER 3</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="WithOutAvailabilityTier3" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- End Medan -->
<!-- Pekanbaru -->
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>With Availability - TIER 4</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="WithAvailabilityTier4" class="donutDiv"></div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="x_panel tile fixed_height_320 overflow_hidden">
			<div class="x_title">
				<h2>Without Availability - TIER 4</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="WithOutAvailabilityTier4" class="donutDiv"></div>
			</div>
		</div>
	</div>
<!-- End Pekanbaru -->
<!----------------------------------------------------------SCRIPT CHART---------------------------------------------------------------------->
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
</script>
<!--------------------------------------------------------------------With Availability------------------------------------------------------------------->
<script type = "text/javascript">
google.charts.load('current', {packages: ['corechart']});     
</script>
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'NULL', 'N', 'BA', 'A', 'AA'],
			<?php 
			$sqlhigh 			= "SELECT * FROM [WebDashboard].[dbo].[NQIScoreWithAndWithoutA]";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[NQI_WA_NULL],$data[NQI_WA_N],$data[NQI_WA_BA],$data[NQI_WA_A],$data[NQI_WA_AA]]," ;
            }
			?>
            ]);
		

            var options = {
               
               isStacked:'percent',	
			   chartArea:{left:"10%",top:"10%",width:"70%"},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'#2c3e50'},
                   1:{color:'#bdc3c7'},
                   2:{color:'#7f8c8d'},
                   3:{color:'#f1c40f'},
				   4:{color:'#4cd137'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('WithAvailability'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>

<!--------------------------------------------------------------------WithOut Availability------------------------------------------------------------------->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'NULL', 'N', 'BA', 'A', 'AA'],
			<?php 
			$sqlhigh 			= "SELECT * FROM [WebDashboard].[dbo].[NQIScoreWithAndWithoutA]";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[NQI_WOA_NULL],$data[NQI_WOA_N],$data[NQI_WOA_BA],$data[NQI_WOA_A],$data[NQI_WOA_AA]]," ;
            }
			?>
            ]);
		

            var options = {
               
               isStacked:'percent',	
			   chartArea:{left:"10%",top:"10%",width:"70%"},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'#2c3e50'},
                   1:{color:'#bdc3c7'},
                   2:{color:'#7f8c8d'},
                   3:{color:'#f1c40f'},
				   4:{color:'#4cd137'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('WithOutAvailability'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>

<!--------------------------------------------------------------------WithOut Availability TIER 1------------------------------------------------------------------->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'N', 'BA', 'A'],
			<?php 
			$sqlhigh 			= "SELECT [Week], [N], [BA], [A] FROM [WebDashboard].[dbo].[NQIScoreWithAndWithoutATier] WHERE [New City Tier]='Tier 1' and [Availability]='Without'
									ORDER BY [Week] asc ";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[N],$data[BA],$data[A]]," ;
            }
			?>
            ]);
		

            var options = {
               
               isStacked:'percent',	
			   chartArea:{left:"10%",top:"10%",width:"70%"},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'#bdc3c7'},
                   1:{color:'#7f8c8d'},
                   2:{color:'#f1c40f'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('WithOutAvailabilityTier1'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!--------------------------------------------------------------------WithOut Availability TIER 2------------------------------------------------------------------->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'N', 'BA', 'A', 'AA'],
			<?php 
			$sqlhigh 			= "SELECT [Week], [N], [BA], [A], [AA] FROM [WebDashboard].[dbo].[NQIScoreWithAndWithoutATier] WHERE [New City Tier]='Tier 2' and [Availability]='Without' ORDER BY [Week] asc ";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[N],$data[BA],$data[A],$data[AA]]," ;
            }
			?>
            ]);
		

            var options = {
               
               isStacked:'percent',	
			   chartArea:{left:"10%",top:"10%",width:"70%"},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'#bdc3c7'},
                   1:{color:'#7f8c8d'},
                   2:{color:'#f1c40f'},
				   3:{color:'#4cd137'},
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('WithOutAvailabilityTier2'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!--------------------------------------------------------------------WithOut Availability TIER 3------------------------------------------------------------------->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'NULL', 'N', 'BA', 'A', 'AA'],
			<?php 
			$sqlhigh 			= "SELECT [Week],[N],[BA],[A],[AA],[NULL] FROM [WebDashboard].[dbo].[NQIScoreWithAndWithoutATier] WHERE [New City Tier]='Tier 3' and [Availability]='Without' ORDER BY [Week] asc ";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[NULL],$data[N],$data[BA],$data[A],$data[AA]]," ;
            }
			?>
            ]);
		

            var options = {
               
               isStacked:'percent',	
			   chartArea:{left:"10%",top:"10%",width:"70%"},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'#2c3e50'},
                   1:{color:'#bdc3c7'},
                   2:{color:'#7f8c8d'},
                   3:{color:'#f1c40f'},
				   4:{color:'#4cd137'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('WithOutAvailabilityTier3'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!--------------------------------------------------------------------WithOut Availability TIER 4------------------------------------------------------------------->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'NULL', 'N', 'BA', 'A', 'AA'],
			<?php 
			$sqlhigh 			= "SELECT [Week],[N],[BA],[A],[AA],[NULL] FROM [WebDashboard].[dbo].[NQIScoreWithAndWithoutATier] WHERE [New City Tier]='Tier 4' and [Availability]='Without' ORDER BY [Week] asc ";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[NULL],$data[N],$data[BA],$data[A],$data[AA]]," ;
            }
			?>
            ]);
		

            var options = {
               
               isStacked:'percent',	
			   chartArea:{left:"10%",top:"10%",width:"70%"},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'#2c3e50'},
                   1:{color:'#bdc3c7'},
                   2:{color:'#7f8c8d'},
                   3:{color:'#f1c40f'},
				   4:{color:'#4cd137'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('WithOutAvailabilityTier4'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!--------------------------------------------------------------------With Availability TIER 1------------------------------------------------------------------->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'N', 'BA', 'A'],
			<?php 
			$sqlhigh 			= "SELECT [Week], [N], [BA], [A] FROM [WebDashboard].[dbo].[NQIScoreWithAndWithoutATier] WHERE [New City Tier]='Tier 1' and [Availability]='With' ORDER BY [Week] asc ";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[N],$data[BA],$data[A]]," ;
            }
			?>
            ]);
		

            var options = {
               
               isStacked:'percent',	
			   chartArea:{left:"10%",top:"10%",width:"70%"},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'#bdc3c7'},
                   1:{color:'#7f8c8d'},
                   2:{color:'#f1c40f'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('WithAvailabilityTier1'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!--------------------------------------------------------------------With Availability TIER 2------------------------------------------------------------------->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'N', 'BA', 'A', 'AA'],
			<?php 
			$sqlhigh 			= "SELECT [Week], [N], [BA], [A], [AA] FROM [WebDashboard].[dbo].[NQIScoreWithAndWithoutATier] WHERE [New City Tier]='Tier 2' and [Availability]='With' ORDER BY [Week] asc ";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[N],$data[BA],$data[A],$data[AA]]," ;
            }
			?>
            ]);
		

            var options = {
               
               isStacked:'percent',	
			   chartArea:{left:"10%",top:"10%",width:"70%"},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'#bdc3c7'},
                   1:{color:'#7f8c8d'},
                   2:{color:'#f1c40f'},
				   3:{color:'#4cd137'},
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('WithAvailabilityTier2'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!--------------------------------------------------------------------With Availability TIER 3------------------------------------------------------------------->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'NULL', 'N', 'BA', 'A', 'AA'],
			<?php 
			$sqlhigh 			= "SELECT [Week],[N],[BA],[A],[AA],[NULL] FROM [WebDashboard].[dbo].[NQIScoreWithAndWithoutATier] WHERE [New City Tier]='Tier 3' and [Availability]='With' ORDER BY [Week] asc ";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[NULL],$data[N],$data[BA],$data[A],$data[AA]]," ;
            }
			?>
            ]);
		

            var options = {
               
               isStacked:'percent',	
			   chartArea:{left:"10%",top:"10%",width:"70%"},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'#2c3e50'},
                   1:{color:'#bdc3c7'},
                   2:{color:'#7f8c8d'},
                   3:{color:'#f1c40f'},
				   4:{color:'#4cd137'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('WithAvailabilityTier3'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!--------------------------------------------------------------------With Availability TIER 4------------------------------------------------------------------->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Week', 'NULL', 'N', 'BA', 'A', 'AA'],
			<?php 
			$sqlhigh 			= "SELECT [Week],[N],[BA],[A],[AA],[NULL] FROM [WebDashboard].[dbo].[NQIScoreWithAndWithoutATier] WHERE [New City Tier]='Tier 4' and [Availability]='With' ORDER BY [Week] asc ";
			$resulthigh			= sqlsrv_query($conn, $sqlhigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
			while ($data = sqlsrv_fetch_array($resulthigh) )
			{
				echo "['Week $data[Week]',$data[NULL],$data[N],$data[BA],$data[A],$data[AA]]," ;
            }
			?>
            ]);
		

            var options = {
               
               isStacked:'percent',	
			   chartArea:{left:"10%",top:"10%",width:"70%"},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'#2c3e50'},
                   1:{color:'#bdc3c7'},
                   2:{color:'#7f8c8d'},
                   3:{color:'#f1c40f'},
				   4:{color:'#4cd137'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('WithAvailabilityTier4'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-------------------------------------------------------------SCRIPT TABLE----------------------------------------------------------->
<!--------------------------------------------------------TABEL WITH AVAILABILITY----------------------------------------------------->
<?php

?>
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', '');
		<?php 
		$sqlWeek = "SELECT [Week] FROM [WebDashboard].[dbo].[NQIScoreWithAndWithoutA] group by [Week] order by [Week] asc";
		$resultWeek	= sqlsrv_query($conn, $sqlWeek, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
		while ($data = sqlsrv_fetch_array($resultWeek))
		{
			$HeaderWeek = $data['Week'] ;
			echo "data.addColumn('number', '$HeaderWeek');";
		}
		?>
        data.addRows([
        ]);

		
        var table = new google.visualization.Table(document.getElementById('tableWithAvailability'));

        table.draw(data, {showRowNumber: true, width: '70%', height: '100%'});
      }

</script>
</div>
</div>
<!-- -----------------------------------------------SGSN CHART ------------------------------------------------------------- -->

<?php
include 'footer.php';
?>

