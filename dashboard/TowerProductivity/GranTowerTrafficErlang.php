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
			<h3>Tower Productivity<small> Gran Tower Traffic Erlang</small></h3>
		</div>
	</div>
	<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>2G Tower Traffic Erlang</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<div id="erlang" class="demo-placeholder"></div>
                  </div>
                </div>
         </div>
	</div>
	<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                   
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">Week</font></th>
						  <th class="text-center">Central</font></th>
						  <th class="text-center">Jabodetabek</font></th>
						  <th class="text-center">East</font></th>
						  <th class="text-center">West</font></th>
						  <th class="text-center">North</font></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
							  //membaca nilai value post dari form 

								$tsql = "SELECT [Week]
											  ,[Central]
											  ,[Jabodetabek]
											  ,[East]
											  ,[West]
											  ,[North]
										FROM [WebDashboard].[dbo].[2GTowerProductivity]
                              WHERE [Resource]='GranTowerTrafficErlang' order by [Week] asc";
								 
								$result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
															
								while($data = sqlsrv_fetch_array($result))
								  { // Ambil semua data dari hasil eksekusi $sql
								  echo '
									<tr>
									  <td align="center">'.$data['Week'].'</td>
									  <td align="center">'.$data['Central'].'</td>
									  <td align="center">'.$data['Jabodetabek'].'</td>
									  <td align="center">'.$data['East'].'</td>
									  <td align="center">'.$data['West'].'</td>
									  <td align="center">'.$data['North'].'</td>
								  </tr>'
								  ;
								}
							  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
         </div>
	</div>
</div>
<?php
include 'footer.php';
?>
<script type="text/javascript" src="loader.js"></script>
<script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Central','Jabodetabek','East','West','North'],

                    	<?php
                        $query = "SELECT [Week]
                                ,[Central]
                                ,[Jabodetabek]
                                ,[East]
                                ,[West]
                                ,[North]
                              FROM [WebDashboard].[dbo].[2GTowerProductivity]
                              WHERE [Resource]='GranTowerTrafficErlang' order by [Week] asc
                              ";
                        $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());
                        
                        while($data = sqlsrv_fetch_array($result))
                        {//ambil semua hasil eksekusi $sql
                          echo "['Week-".$data['Week']."',".$data['Central'].",".$data['Jabodetabek'].",".$data['East'].",".$data['West'].",".$data['North']."],";
                        }
                      ?>
                     
      ]);

        var options = {
		  chartArea:{width:"850",height:"55%",top:"10%"},
		  
		  pointSize: 4,
          curveType: 'function',
          legend: { position: 'bottom' },
		  crosshair: {
          color: '#4322c0',
          trigger: 'selection'
			}
        };
		
        var chart = new google.visualization.LineChart(document.getElementById('erlang'));

        chart.draw(data, options);
      }

</script>
