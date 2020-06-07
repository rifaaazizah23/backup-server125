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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="right_col" role="main">
	<div class="col-md-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>3G Total Payload </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
				<div id="chart_payload" class="demo-placeholder"></div>
            </div>
        </div>
    </div>
	<div class="page-title">
		<div class="title_left">
			<h3>3G Ampuh Radio Capacity</h3>
		</div>
	</div>
	<div class="x_panel">
		<div class="x_content">
			<div class="row">
				<form method="POST" action="3GCapacity.php">
					<div class="form-group">
						<div class="col-md-3 col-sm-3 col-xs-12">
							<select class="form-control" name="week">
								<option>-Select Week-</option>
									<?php
										$tsql = "SELECT Week FROM [WebDashboard].[dbo].[3GAmpuhWeekly] GROUP BY Week";
												
										$result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
																			
										while($data = sqlsrv_fetch_array($result))
											{
											echo "<option value=".$data[Week]."> Week ".$data[Week]."</option>";
											} 
									?>
						</select>
                    </div>
				</div>
				<div class="col-md-3 col-sm-12 col-xs-12 form-group">
					<button type="submit" class="btn btn-primary" name="submit">Tampil</button>
				</div>
					</form>
			</div>
		</div>
		</form>
	</div>
<div class="row">
		<div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Nationwide</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stackedNationwide" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4 ">
              <div class="x_panel ">
                <div class="x_title">
                  <h2>Central </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stackedCentral" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>East </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stackedEast" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Jabodetabek 1</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stackedJabodetabek1" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Jabodetabek 2</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stackedJabodetabek2" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>North</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stackedNorth" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Northern Sumatera </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stackedNorthernSumatera" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Southern Sumatera </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stackedSouthernSumatera" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>3G Ampuh Weekly </h2>
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
						  <th class="text-center" style="background-color:black;"><font color="White">RegionSev</font></th>
						  <th class="text-center" style="background-color:black;"><font color="White">ITEM</font></th>
						  <th class="text-center" style="background-color:black;"><font color="White">DETAIL MONITORING</font></th>
						  <th class="text-center" style="background-color:black;"><font color="White">Measurement Type</font></th>
						  <th class="text-center" style="background-color:black;"><font color="White">Total (#)</font></th>
                          <th class="text-center" style="background-color:black;"><font color="White">Week</font></font></th>
						  <th class="text-center" style="background-color:green;"><font color="white">Low</font></th>
						  <th class="text-center" style="background-color:yellow;"><font color="white">Medium</font></th>
						  <th class="text-center" style="background-color:red;"><font color="white">High</font></th>
						  <th class="text-center" style="background-color:black;"><font color="White">Congest</font></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
							  //membaca nilai value post dari form 
								$tsql = "SELECT [Week]
											  ,[RegionSev]
											  ,[KPI]
											  ,[DETAIL MONITORING]
											  ,[Measurement Type]
											  ,[Total (#)] as Total
											  ,[Low]
											  ,[Medium]
											  ,[High]
											  ,[Congest]
											  ,100 * ([Congest] / NULLIF ( [Total (#)], 0) )as HasilCongest
											  ,100 * ([High] / NULLIF ( [Total (#)], 0) )as HasilHigh
											  ,100 * ([Medium] / NULLIF ( [Total (#)], 0) )as HasilMedium
											  ,100 * ([Low] / NULLIF ( [Total (#)], 0) )as HasilLow
										  FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
										   ";
								 
								$result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
															
								while($data = sqlsrv_fetch_array($result))
								  { // Ambil semua data dari hasil eksekusi $sql
								  echo '
									<tr>
									  <td align="center">'.$data['Week'].'</td>
									  <td align="center">'.$data['RegionSev'].'</td>
									  <td align="center">'.$data['KPI'].'</td>
									  <td align="center">'.$data['DETAIL MONITORING'].'</td>
									  <td align="center">'.$data['Measurement Type'].'</td>
									  <td align="center">'.$data['Total'].'</td>
									  <td align="center">'.$data['Low'].' ( '.number_format($data['HasilLow'],2).' %)</td>
									  <td align="center">'.$data['Medium'].' ( '.number_format($data['HasilMedium'],2).' %)</td>
									  <td align="center">'.$data['High'].' ( '.number_format($data['HasilHigh'],2).' %)</td>
									  <td align="center">'.$data['Congest'].' ( '.number_format($data['HasilCongest'],2).' %)</td>  
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
$week = $_POST['week'];
if ($week > 1) {
?>
<script type = "text/javascript">
google.charts.load('current', {packages: ['corechart']});     
</script>
<?php
//ambil data value dari database Untuk Graph 
	$min1 = $_POST['week'];
	//ambil data value untuk KPI CE Central
	$SqlCeCentral = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'CENTRAL' AND KPI='CE Capacity' AND [Week] ='$min1'";
	$ResultCeCentral = sqlsrv_query($conn, $SqlCeCentral, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeCentral	 = sqlsrv_fetch_array($ResultCeCentral);
	$CeCentralCongest= $GetCeCentral ['Congest'];
	$CeCentralHigh	 = $GetCeCentral ['High'];
	$CeCentralMedium = $GetCeCentral ['Medium'];
	$CeCentralLow 	 = $GetCeCentral ['Low'];
	
	//Ambil data value untuk KPI Power Central
	$SqlPowerCentral = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'CENTRAL' AND KPI='DL Power' AND [Week] ='$min1' ";
	$ResultPowerCentral  = sqlsrv_query($conn, $SqlPowerCentral, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerCentral	 = sqlsrv_fetch_array($ResultPowerCentral);
	$PowerCentralCongest = $GetPowerCentral ['Congest'];
	$PowerCentralHigh	 = $GetPowerCentral ['High'];
	$PowerCentralMedium  = $GetPowerCentral ['Medium'];
	$PowerCentralLow 	 = $GetPowerCentral ['Low'];
	
	//Ambil data value untuk KPI CODE Central
	$SqlCodeCentral = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'CENTRAL' AND KPI='CODE Utilization' AND [Week] ='$min1'";
	$ResultCodeCentral  = sqlsrv_query($conn, $SqlCodeCentral, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeCentral	 	= sqlsrv_fetch_array($ResultCodeCentral);
	$CodeCentralCongest = $GetCodeCentral ['Congest'];
	$CodeCentralHigh	= $GetCodeCentral ['High'];
	$CodeCentralMedium  = $GetCodeCentral ['Medium'];
	$CodeCentralLow 	= $GetCodeCentral ['Low'];	
	
	//Ambil data value untuk KPI CODE Central
	$SqlHSDPACentral = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'CENTRAL' AND KPI='HSDPA Users'  AND [Week] ='$min1'";
	$ResultHSDPACentral  	= sqlsrv_query($conn, $SqlHSDPACentral, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPACentral	 	= sqlsrv_fetch_array($ResultHSDPACentral);
	$HSDPACentralCongest 	= $GetHSDPACentral ['Congest'];
	$HSDPACentralHigh		= $GetHSDPACentral ['High'];
	$HSDPACentralMedium 	= $GetHSDPACentral ['Medium'];
	$HSDPACentralLow 		= $GetHSDPACentral ['Low'];
	
// Region East
//ambil data value untuk KPI CE East
	$SqlCeEast = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'EAST' AND KPI='CE Capacity' AND [Week] ='$min1'";
	$ResultCeEast 	= sqlsrv_query($conn, $SqlCeEast, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeEast	 	= sqlsrv_fetch_array($ResultCeEast);
	$CeEastCongest 	= $GetCeEast ['Congest'];
	$CeEastHigh	 	= $GetCeEast ['High'];
	$CeEastMedium 	= $GetCeEast ['Medium'];
	$CeEastLow 	 	= $GetCeEast ['Low'];
	
	//Ambil data value untuk KPI Power East
	$SqlPowerEast = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'EAST' AND KPI='DL Power' AND [Week] ='$min1' ";
	$ResultPowerEast  	= sqlsrv_query($conn, $SqlPowerEast, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerEast	 	= sqlsrv_fetch_array($ResultPowerEast);
	$PowerEastCongest 	= $GetPowerEast ['Congest'];
	$PowerEastHigh	 	= $GetPowerEast ['High'];
	$PowerEastMedium  	= $GetPowerEast ['Medium'];
	$PowerEastLow 	 	= $GetPowerEast ['Low'];
	
	//Ambil data value untuk KPI CODE East
	$SqlCodeEast = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'EAST' AND KPI='CODE Utilization' AND [Week] ='$min1'";
	$ResultCodeEast  	= sqlsrv_query($conn, $SqlCodeEast, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeEast	 	= sqlsrv_fetch_array($ResultCodeEast);
	$CodeEastCongest 	= $GetCodeEast ['Congest'];
	$CodeEastHigh		= $GetCodeEast ['High'];
	$CodeEastMedium  	= $GetCodeEast ['Medium'];
	$CodeEastLow 		= $GetCodeEast ['Low'];	
	
	//Ambil data value untuk KPI CODE East
	$SqlHSDPAEast = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'EAST' AND KPI='HSDPA Users'  AND Week ='$min1'";
	$ResultHSDPAEast  	= sqlsrv_query($conn, $SqlHSDPAEast, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPAEast	 	= sqlsrv_fetch_array($ResultHSDPAEast);
	$HSDPAEastCongest 	= $GetHSDPAEast ['Congest'];
	$HSDPAEastHigh		= $GetHSDPAEast ['High'];
	$HSDPAEastMedium 	= $GetHSDPAEast ['Medium'];
	$HSDPAEastLow 		= $GetHSDPAEast ['Low'];
	
//Region Jabodetabek 1
//ambil data value untuk KPI CE Jabodetabek1
	$SqlCeJabodetabek1 = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 1' AND KPI='CE Capacity' AND Week ='$min1'";
	$ResultCeJabodetabek1 	= sqlsrv_query($conn, $SqlCeJabodetabek1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeJabodetabek1	 	= sqlsrv_fetch_array($ResultCeJabodetabek1);
	$CeJabodetabek1Congest 	= $GetCeJabodetabek1 ['Congest'];
	$CeJabodetabek1High	 	= $GetCeJabodetabek1 ['High'];
	$CeJabodetabek1Medium 	= $GetCeJabodetabek1 ['Medium'];
	$CeJabodetabek1Low 	 	= $GetCeJabodetabek1 ['Low'];
	
	//Ambil data value untuk KPI Power Jabodetabek1
	$SqlPowerJabodetabek1 = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 1' AND KPI='DL Power' AND Week ='$min1' ";
	$ResultPowerJabodetabek1  	= sqlsrv_query($conn, $SqlPowerJabodetabek1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerJabodetabek1	 	= sqlsrv_fetch_array($ResultPowerJabodetabek1);
	$PowerJabodetabek1Congest 	= $GetPowerJabodetabek1 ['Congest'];
	$PowerJabodetabek1High	 	= $GetPowerJabodetabek1 ['High'];
	$PowerJabodetabek1Medium  	= $GetPowerJabodetabek1 ['Medium'];
	$PowerJabodetabek1Low 	 	= $GetPowerJabodetabek1 ['Low'];
	
	//Ambil data value untuk KPI CODE Jabodetabek1
	$SqlCodeJabodetabek1 = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 1' AND KPI='CODE Utilization' AND Week ='$min1'";
	$ResultCodeJabodetabek1  	= sqlsrv_query($conn, $SqlCodeJabodetabek1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeJabodetabek1	 	= sqlsrv_fetch_array($ResultCodeJabodetabek1);
	$CodeJabodetabek1Congest 	= $GetCodeJabodetabek1 ['Congest'];
	$CodeJabodetabek1High		= $GetCodeJabodetabek1 ['High'];
	$CodeJabodetabek1Medium  	= $GetCodeJabodetabek1 ['Medium'];
	$CodeJabodetabek1Low 		= $GetCodeJabodetabek1 ['Low'];	
	
	//Ambil data value untuk KPI CODE Jabodetabek1
	$SqlHSDPAJabodetabek1 = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 1' AND KPI='HSDPA Users'  AND Week ='$min1'";
	$ResultHSDPAJabodetabek1  	= sqlsrv_query($conn, $SqlHSDPAJabodetabek1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPAJabodetabek1	 	= sqlsrv_fetch_array($ResultHSDPAJabodetabek1);
	$HSDPAJabodetabek1Congest 	= $GetHSDPAJabodetabek1 ['Congest'];
	$HSDPAJabodetabek1High		= $GetHSDPAJabodetabek1 ['High'];
	$HSDPAJabodetabek1Medium 	= $GetHSDPAJabodetabek1 ['Medium'];
	$HSDPAJabodetabek1Low 		= $GetHSDPAJabodetabek1 ['Low'];
	
//Region Jabodetabek 2
//ambil data value untuk KPI CE Jabodetabek2
	$SqlCeJabodetabek2 = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 2' AND KPI='CE Capacity' AND Week ='$min1'";
	$ResultCeJabodetabek2 	= sqlsrv_query($conn, $SqlCeJabodetabek2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeJabodetabek2	 	= sqlsrv_fetch_array($ResultCeJabodetabek2);
	$CeJabodetabek2Congest 	= $GetCeJabodetabek2 ['Congest'];
	$CeJabodetabek2High	 	= $GetCeJabodetabek2 ['High'];
	$CeJabodetabek2Medium 	= $GetCeJabodetabek2 ['Medium'];
	$CeJabodetabek2Low 	 	= $GetCeJabodetabek2 ['Low'];
	
	//Ambil data value untuk KPI Power Jabodetabek2
	$SqlPowerJabodetabek2 = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 2' AND KPI='DL Power' AND Week ='$min1' ";
	$ResultPowerJabodetabek2  	= sqlsrv_query($conn, $SqlPowerJabodetabek2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerJabodetabek2	 	= sqlsrv_fetch_array($ResultPowerJabodetabek2);
	$PowerJabodetabek2Congest 	= $GetPowerJabodetabek2 ['Congest'];
	$PowerJabodetabek2High	 	= $GetPowerJabodetabek2 ['High'];
	$PowerJabodetabek2Medium  	= $GetPowerJabodetabek2 ['Medium'];
	$PowerJabodetabek2Low 	 	= $GetPowerJabodetabek2 ['Low'];
	
	//Ambil data value untuk KPI CODE Jabodetabek2
	$SqlCodeJabodetabek2 = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 2' AND KPI='CODE Utilization' AND Week ='$min1'";
	$ResultCodeJabodetabek2  	= sqlsrv_query($conn, $SqlCodeJabodetabek2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeJabodetabek2	 	= sqlsrv_fetch_array($ResultCodeJabodetabek2);
	$CodeJabodetabek2Congest 	= $GetCodeJabodetabek2 ['Congest'];
	$CodeJabodetabek2High		= $GetCodeJabodetabek2 ['High'];
	$CodeJabodetabek2Medium  	= $GetCodeJabodetabek2 ['Medium'];
	$CodeJabodetabek2Low 		= $GetCodeJabodetabek2 ['Low'];	
	
	//Ambil data value untuk KPI CODE Jabodetabek2
	$SqlHSDPAJabodetabek2 = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 2' AND KPI='HSDPA Users'  AND Week ='$min1'";
	$ResultHSDPAJabodetabek2  	= sqlsrv_query($conn, $SqlHSDPAJabodetabek2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPAJabodetabek2	 	= sqlsrv_fetch_array($ResultHSDPAJabodetabek2);
	$HSDPAJabodetabek2Congest 	= $GetHSDPAJabodetabek2 ['Congest'];
	$HSDPAJabodetabek2High		= $GetHSDPAJabodetabek2 ['High'];
	$HSDPAJabodetabek2Medium 	= $GetHSDPAJabodetabek2 ['Medium'];
	$HSDPAJabodetabek2Low 		= $GetHSDPAJabodetabek2 ['Low'];

//Region North
//ambil data value untuk KPI CE North
	$SqlCeNorth = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTH' AND KPI='CE Capacity' AND Week ='$min1'";
	$ResultCeNorth 	= sqlsrv_query($conn, $SqlCeNorth, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeNorth	 	= sqlsrv_fetch_array($ResultCeNorth);
	$CeNorthCongest = $GetCeNorth ['Congest'];
	$CeNorthHigh	= $GetCeNorth ['High'];
	$CeNorthMedium 	= $GetCeNorth ['Medium'];
	$CeNorthLow 	= $GetCeNorth ['Low'];
	
	//Ambil data value untuk KPI Power North
	$SqlPowerNorth = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTH' AND KPI='DL Power' AND Week ='$min1' ";
	$ResultPowerNorth  	= sqlsrv_query($conn, $SqlPowerNorth, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerNorth	 	= sqlsrv_fetch_array($ResultPowerNorth);
	$PowerNorthCongest 	= $GetPowerNorth ['Congest'];
	$PowerNorthHigh	 	= $GetPowerNorth ['High'];
	$PowerNorthMedium  	= $GetPowerNorth ['Medium'];
	$PowerNorthLow 	 	= $GetPowerNorth ['Low'];
	
	//Ambil data value untuk KPI CODE North
	$SqlCodeNorth = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTH' AND KPI='CODE Utilization' AND Week ='$min1'";
	$ResultCodeNorth  	= sqlsrv_query($conn, $SqlCodeNorth, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeNorth	 	= sqlsrv_fetch_array($ResultCodeNorth);
	$CodeNorthCongest 	= $GetCodeNorth ['Congest'];
	$CodeNorthHigh		= $GetCodeNorth ['High'];
	$CodeNorthMedium  	= $GetCodeNorth ['Medium'];
	$CodeNorthLow 		= $GetCodeNorth ['Low'];	
	
	//Ambil data value untuk KPI CODE North
	$SqlHSDPANorth = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTH' AND KPI='HSDPA Users'  AND Week ='$min1'";
	$ResultHSDPANorth  	= sqlsrv_query($conn, $SqlHSDPANorth, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPANorth	 	= sqlsrv_fetch_array($ResultHSDPANorth);
	$HSDPANorthCongest 	= $GetHSDPANorth ['Congest'];
	$HSDPANorthHigh		= $GetHSDPANorth ['High'];
	$HSDPANorthMedium 	= $GetHSDPANorth ['Medium'];
	$HSDPANorthLow 		= $GetHSDPANorth ['Low'];	

//Northern Sumatera
//ambil data value untuk KPI CE NorthernSumatera
	$SqlCeNorthernSumatera = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTHERN SUMATERA' AND KPI='CE Capacity' AND Week ='$min1'";
	$ResultCeNorthernSumatera 	= sqlsrv_query($conn, $SqlCeNorthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeNorthernSumatera	 	= sqlsrv_fetch_array($ResultCeNorthernSumatera);
	$CeNorthernSumateraCongest	= $GetCeNorthernSumatera ['Congest'];
	$CeNorthernSumateraHigh		= $GetCeNorthernSumatera ['High'];
	$CeNorthernSumateraMedium 	= $GetCeNorthernSumatera ['Medium'];
	$CeNorthernSumateraLow 		= $GetCeNorthernSumatera ['Low'];
	
	//Ambil data value untuk KPI Power NorthernSumatera
	$SqlPowerNorthernSumatera = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTHERN SUMATERA' AND KPI='DL Power' AND Week ='$min1' ";
	$ResultPowerNorthernSumatera  	= sqlsrv_query($conn, $SqlPowerNorthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerNorthernSumatera	 	= sqlsrv_fetch_array($ResultPowerNorthernSumatera);
	$PowerNorthernSumateraCongest 	= $GetPowerNorthernSumatera ['Congest'];
	$PowerNorthernSumateraHigh	 	= $GetPowerNorthernSumatera ['High'];
	$PowerNorthernSumateraMedium  	= $GetPowerNorthernSumatera ['Medium'];
	$PowerNorthernSumateraLow 	 	= $GetPowerNorthernSumatera ['Low'];
	
	//Ambil data value untuk KPI CODE NorthernSumatera
	$SqlCodeNorthernSumatera = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTHERN SUMATERA' AND KPI='CODE Utilization' AND Week ='$min1'";
	$ResultCodeNorthernSumatera  	= sqlsrv_query($conn, $SqlCodeNorthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeNorthernSumatera	 	= sqlsrv_fetch_array($ResultCodeNorthernSumatera);
	$CodeNorthernSumateraCongest 	= $GetCodeNorthernSumatera ['Congest'];
	$CodeNorthernSumateraHigh		= $GetCodeNorthernSumatera ['High'];
	$CodeNorthernSumateraMedium  	= $GetCodeNorthernSumatera ['Medium'];
	$CodeNorthernSumateraLow 		= $GetCodeNorthernSumatera ['Low'];	
	
	//Ambil data value untuk KPI CODE NorthernSumatera
	$SqlHSDPANorthernSumatera = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTHERN SUMATERA' AND KPI='HSDPA Users'  AND Week ='$min1'";
	$ResultHSDPANorthernSumatera  	= sqlsrv_query($conn, $SqlHSDPANorthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPANorthernSumatera	 	= sqlsrv_fetch_array($ResultHSDPANorthernSumatera);
	$HSDPANorthernSumateraCongest 	= $GetHSDPANorthernSumatera ['Congest'];
	$HSDPANorthernSumateraHigh		= $GetHSDPANorthernSumatera ['High'];
	$HSDPANorthernSumateraMedium 	= $GetHSDPANorthernSumatera ['Medium'];
	$HSDPANorthernSumateraLow 		= $GetHSDPANorthernSumatera ['Low'];
	
//Region SouthernSumatera
//ambil data value untuk KPI CE SouthernSumatera
	$SqlCeSouthernSumatera = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'SOUTHERN SUMATERA' AND KPI='CE Capacity' AND Week ='$min1'";
	$ResultCeSouthernSumatera 	= sqlsrv_query($conn, $SqlCeSouthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeSouthernSumatera	 	= sqlsrv_fetch_array($ResultCeSouthernSumatera);
	$CeSouthernSumateraCongest 	= $GetCeSouthernSumatera ['Congest'];
	$CeSouthernSumateraHigh		= $GetCeSouthernSumatera ['High'];
	$CeSouthernSumateraMedium 	= $GetCeSouthernSumatera ['Medium'];
	$CeSouthernSumateraLow 		= $GetCeSouthernSumatera ['Low'];
	
	//Ambil data value untuk KPI Power SouthernSumatera
	$SqlPowerSouthernSumatera = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'SOUTHERN SUMATERA' AND KPI='DL Power' AND Week ='$min1' ";
	$ResultPowerSouthernSumatera  	= sqlsrv_query($conn, $SqlPowerSouthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerSouthernSumatera	 	= sqlsrv_fetch_array($ResultPowerSouthernSumatera);
	$PowerSouthernSumateraCongest 	= $GetPowerSouthernSumatera ['Congest'];
	$PowerSouthernSumateraHigh	 	= $GetPowerSouthernSumatera ['High'];
	$PowerSouthernSumateraMedium  	= $GetPowerSouthernSumatera ['Medium'];
	$PowerSouthernSumateraLow 	 	= $GetPowerSouthernSumatera ['Low'];
	
	//Ambil data value untuk KPI CODE SouthernSumatera
	$SqlCodeSouthernSumatera = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'SOUTHERN SUMATERA' AND KPI='CODE Utilization' AND Week ='$min1'";
	$ResultCodeSouthernSumatera  	= sqlsrv_query($conn, $SqlCodeSouthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeSouthernSumatera	 	= sqlsrv_fetch_array($ResultCodeSouthernSumatera);
	$CodeSouthernSumateraCongest 	= $GetCodeSouthernSumatera ['Congest'];
	$CodeSouthernSumateraHigh		= $GetCodeSouthernSumatera ['High'];
	$CodeSouthernSumateraMedium  	= $GetCodeSouthernSumatera ['Medium'];
	$CodeSouthernSumateraLow 		= $GetCodeSouthernSumatera ['Low'];	
	
	//Ambil data value untuk KPI CODE SouthernSumatera
	$SqlHSDPASouthernSumatera = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'SOUTHERN SUMATERA' AND KPI='HSDPA Users'  AND Week ='$min1'";
	$ResultHSDPASouthernSumatera  	= sqlsrv_query($conn, $SqlHSDPASouthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPASouthernSumatera	 	= sqlsrv_fetch_array($ResultHSDPASouthernSumatera);
	$HSDPASouthernSumateraCongest 	= $GetHSDPASouthernSumatera ['Congest'];
	$HSDPASouthernSumateraHigh		= $GetHSDPASouthernSumatera ['High'];
	$HSDPASouthernSumateraMedium 	= $GetHSDPASouthernSumatera ['Medium'];
	$HSDPASouthernSumateraLow 		= $GetHSDPASouthernSumatera ['Low'];
	
//Region Nationwide
//ambil data value untuk KPI CE Nationwide
	$SqlCeNationwide = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'Nationwide' AND KPI='CE Capacity' AND Week ='$min1'";
	$ResultCeNationwide 	= sqlsrv_query($conn, $SqlCeNationwide, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeNationwide	 	= sqlsrv_fetch_array($ResultCeNationwide);
	$CeNationwideCongest 	= $GetCeNationwide ['Congest'];
	$CeNationwideHigh		= $GetCeNationwide ['High'];
	$CeNationwideMedium 	= $GetCeNationwide ['Medium'];
	$CeNationwideLow 		= $GetCeNationwide ['Low'];
	
	//Ambil data value untuk KPI Power Nationwide
	$SqlPowerNationwide = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'Nationwide' AND KPI='DL Power' AND Week ='$min1' ";
	$ResultPowerNationwide  	= sqlsrv_query($conn, $SqlPowerNationwide, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerNationwide	 		= sqlsrv_fetch_array($ResultPowerNationwide);
	$PowerNationwideCongest 	= $GetPowerNationwide ['Congest'];
	$PowerNationwideHigh	 	= $GetPowerNationwide ['High'];
	$PowerNationwideMedium  	= $GetPowerNationwide ['Medium'];
	$PowerNationwideLow 	 	= $GetPowerNationwide ['Low'];
	
	//Ambil data value untuk KPI CODE Nationwide
	$SqlCodeNationwide = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'Nationwide' AND KPI='CODE Utilization' AND Week ='$min1'";
	$ResultCodeNationwide  	= sqlsrv_query($conn, $SqlCodeNationwide, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeNationwide	 	= sqlsrv_fetch_array($ResultCodeNationwide);
	$CodeNationwideCongest 	= $GetCodeNationwide ['Congest'];
	$CodeNationwideHigh		= $GetCodeNationwide ['High'];
	$CodeNationwideMedium  	= $GetCodeNationwide ['Medium'];
	$CodeNationwideLow 		= $GetCodeNationwide ['Low'];	
	
	//Ambil data value untuk KPI CODE Nationwide
	$SqlHSDPANationwide = "SELECT [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'Nationwide' AND KPI='HSDPA Users'  AND Week ='$min1'";
	$ResultHSDPANationwide  	= sqlsrv_query($conn, $SqlHSDPANationwide, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPANationwide	 		= sqlsrv_fetch_array($ResultHSDPANationwide);
	$HSDPANationwideCongest 	= $GetHSDPANationwide ['Congest'];
	$HSDPANationwideHigh		= $GetHSDPANationwide ['High'];
	$HSDPANationwideMedium 		= $GetHSDPANationwide ['Medium'];
	$HSDPANationwideLow 		= $GetHSDPANationwide ['Low'];

?>
<!-- Chart Central -->
<script language = "JavaScript">
         function drawChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeCentralLow ;?> ,<?php echo $CeCentralMedium ;?> ,<?php echo $CeCentralHigh ;?>, <?php echo $CeCentralCongest ;?>],
               ['CODE' , <?php echo $CodeCentralLow ;?>, <?php echo $CodeCentralMedium ;?>, <?php echo $CodeCentralHigh ;?>, <?php echo $CodeCentralCongest ;?> ],
               ['POWER' , <?php echo $PowerCentralLow ;?> ,<?php echo $PowerCentralMedium ;?>, <?php echo $PowerCentralHigh ;?>, <?php echo $PowerCentralCongest ;?>],
               ['HDSPA' , <?php echo $HSDPACentralLow ;?> ,<?php echo $HSDPACentralMedium ;?>, <?php echo $HSDPACentralHigh ;?>,<?php echo $HSDPACentralCongest ;?>]
            ]);
            var options = {
               title: 'Central Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };
            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedCentral'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>

<!-- Chart East -->
<script language = "JavaScript">
         function drawChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeEastLow ;?> ,<?php echo $CeEastMedium ;?> ,<?php echo $CeEastHigh ;?>, <?php echo $CeEastCongest ;?>],
               ['CODE' , <?php echo $CodeEastLow ;?>, <?php echo $CodeEastMedium ;?>, <?php echo $CodeEastHigh ;?>, <?php echo $CodeEastCongest ;?> ],
               ['POWER' , <?php echo $PowerEastLow ;?> ,<?php echo $PowerEastMedium ;?>, <?php echo $PowerEastHigh ;?>, <?php echo $PowerEastCongest ;?>],
               ['HDSPA' , <?php echo $HSDPAEastLow ;?> ,<?php echo $HSDPAEastMedium ;?>, <?php echo $HSDPAEastHigh ;?>,<?php echo $HSDPAEastCongest ;?>]
            ]);
            var options = {
               title: 'East Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };
            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedEast'));
            chart.draw(data, options);
         }
google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Jabodetabek1 -->
<script language = "JavaScript">
         function drawChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeJabodetabek1Low ;?> ,<?php echo $CeJabodetabek1Medium ;?> ,<?php echo $CeJabodetabek1High ;?>, <?php echo $CeJabodetabek1Congest ;?>],
               ['CODE' , <?php echo $CodeJabodetabek1Low ;?>, <?php echo $CodeJabodetabek1Medium ;?>, <?php echo $CodeJabodetabek1High ;?>, <?php echo $CodeJabodetabek1Congest ;?> ],
               ['POWER' , <?php echo $PowerJabodetabek1Low ;?> ,<?php echo $PowerJabodetabek1Medium ;?>, <?php echo $PowerJabodetabek1High ;?>, <?php echo $PowerJabodetabek1Congest ;?>],
               ['HDSPA' , <?php echo $HSDPAJabodetabek1Low ;?> ,<?php echo $HSDPAJabodetabek1Medium ;?>, <?php echo $HSDPAJabodetabek1High ;?>,<?php echo $HSDPAJabodetabek1Congest ;?>]
            ]);

            var options = {
               title: 'Jabodetabek1 Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedJabodetabek1'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Jabodetabek2 -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeJabodetabek2Low ;?> ,<?php echo $CeJabodetabek2Medium ;?> ,<?php echo $CeJabodetabek2High ;?>, <?php echo $CeJabodetabek2Congest ;?>],
               ['CODE' , <?php echo $CodeJabodetabek2Low ;?>, <?php echo $CodeJabodetabek2Medium ;?>, <?php echo $CodeJabodetabek2High ;?>, <?php echo $CodeJabodetabek2Congest ;?> ],
               ['POWER' , <?php echo $PowerJabodetabek2Low ;?> ,<?php echo $PowerJabodetabek2Medium ;?>, <?php echo $PowerJabodetabek2High ;?>, <?php echo $PowerJabodetabek2Congest ;?>],
               ['HDSPA' , <?php echo $HSDPAJabodetabek2Low ;?> ,<?php echo $HSDPAJabodetabek2Medium ;?>, <?php echo $HSDPAJabodetabek2High ;?>,<?php echo $HSDPAJabodetabek2Congest ;?>]
            ]);

            var options = {
               title: 'Jabodetabek2 Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedJabodetabek2'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart North -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeNorthLow ;?> ,<?php echo $CeNorthMedium ;?> ,<?php echo $CeNorthHigh ;?>, <?php echo $CeNorthCongest ;?>],
               ['CODE' , <?php echo $CodeNorthLow ;?>, <?php echo $CodeNorthMedium ;?>, <?php echo $CodeNorthHigh ;?>, <?php echo $CodeNorthCongest ;?> ],
               ['POWER' , <?php echo $PowerNorthLow ;?> ,<?php echo $PowerNorthMedium ;?>, <?php echo $PowerNorthHigh ;?>, <?php echo $PowerNorthCongest ;?>],
               ['HDSPA' , <?php echo $HSDPANorthLow ;?> ,<?php echo $HSDPANorthMedium ;?>, <?php echo $HSDPANorthHigh ;?>,<?php echo $HSDPANorthCongest ;?>]
            ]);

            var options = {
               title: 'North Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedNorth'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart NorthernSumatera -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeNorthernSumateraLow ;?> ,<?php echo $CeNorthernSumateraMedium ;?> ,<?php echo $CeNorthernSumateraHigh ;?>, <?php echo $CeNorthernSumateraCongest ;?>],
               ['CODE' , <?php echo $CodeNorthernSumateraLow ;?>, <?php echo $CodeNorthernSumateraMedium ;?>, <?php echo $CodeNorthernSumateraHigh ;?>, <?php echo $CodeNorthernSumateraCongest ;?> ],
               ['POWER' , <?php echo $PowerNorthernSumateraLow ;?> ,<?php echo $PowerNorthernSumateraMedium ;?>, <?php echo $PowerNorthernSumateraHigh ;?>, <?php echo $PowerNorthernSumateraCongest ;?>],
               ['HDSPA' , <?php echo $HSDPANorthernSumateraLow ;?> ,<?php echo $HSDPANorthernSumateraMedium ;?>, <?php echo $HSDPANorthernSumateraHigh ;?>,<?php echo $HSDPANorthernSumateraCongest ;?>]
            ]);

            var options = {
               title: 'NorthernSumatera Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedNorthernSumatera'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart SouthernSumatera -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeSouthernSumateraLow ;?> ,<?php echo $CeSouthernSumateraMedium ;?> ,<?php echo $CeSouthernSumateraHigh ;?>, <?php echo $CeSouthernSumateraCongest ;?>],
               ['CODE' , <?php echo $CodeSouthernSumateraLow ;?>, <?php echo $CodeSouthernSumateraMedium ;?>, <?php echo $CodeSouthernSumateraHigh ;?>, <?php echo $CodeSouthernSumateraCongest ;?> ],
               ['POWER' , <?php echo $PowerSouthernSumateraLow ;?> ,<?php echo $PowerSouthernSumateraMedium ;?>, <?php echo $PowerSouthernSumateraHigh ;?>, <?php echo $PowerSouthernSumateraCongest ;?>],
               ['HDSPA' , <?php echo $HSDPASouthernSumateraLow ;?> ,<?php echo $HSDPASouthernSumateraMedium ;?>, <?php echo $HSDPASouthernSumateraHigh ;?>,<?php echo $HSDPASouthernSumateraCongest ;?>]
            ]);

            var options = {
               title: 'SouthernSumatera Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedSouthernSumatera'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Nationwide -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeNationwideLow ;?> ,<?php echo $CeNationwideMedium ;?> ,<?php echo $CeNationwideHigh ;?>, <?php echo $CeNationwideCongest ;?>],
               ['CODE' , <?php echo $CodeNationwideLow ;?>, <?php echo $CodeNationwideMedium ;?>, <?php echo $CodeNationwideHigh ;?>, <?php echo $CodeNationwideCongest ;?> ],
               ['POWER' , <?php echo $PowerNationwideLow ;?> ,<?php echo $PowerNationwideMedium ;?>, <?php echo $PowerNationwideHigh ;?>, <?php echo $PowerNationwideCongest ;?>],
               ['HDSPA' , <?php echo $HSDPANationwideLow ;?> ,<?php echo $HSDPANationwideMedium ;?>, <?php echo $HSDPANationwideHigh ;?>,<?php echo $HSDPANationwideCongest ;?>]
            ]);

            var options = {
               title: 'Nationwide Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedNationwide'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<?php
}else {
?>
<!-- ----------------------------------------------- CHART ------------------------------------------------------------- -->
<script type = "text/javascript">
google.charts.load('current', {packages: ['corechart']});     
</script>
<?php
//ambil data value dari database Untuk Graph 
	$getWeek = "SELECT TOP 1 [Week] FROM  [WebDashboard].[dbo].[3GAmpuhWeekly] order by [Week] desc";
	$ResultWeek = sqlsrv_query($conn, $getWeek, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$DataWeek	= sqlsrv_fetch_array($ResultWeek);
	$min1 = $DataWeek['Week'];
	//ambil data value untuk KPI CE Central
	$SqlCeCentral = "SELECT TOP 1 [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'CENTRAL' AND KPI='CE Capacity' order by [Week] desc";
	$ResultCeCentral = sqlsrv_query($conn, $SqlCeCentral, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeCentral	 = sqlsrv_fetch_array($ResultCeCentral);
	$CeCentralCongest= $GetCeCentral ['Congest'];
	$CeCentralHigh	 = $GetCeCentral ['High'];
	$CeCentralMedium = $GetCeCentral ['Medium'];
	$CeCentralLow 	 = $GetCeCentral ['Low'];
	
	//Ambil data value untuk KPI Power Central
	$SqlPowerCentral = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'CENTRAL' AND KPI='DL Power' order by [Week] desc ";
	$ResultPowerCentral  = sqlsrv_query($conn, $SqlPowerCentral, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerCentral	 = sqlsrv_fetch_array($ResultPowerCentral);
	$PowerCentralCongest = $GetPowerCentral ['Congest'];
	$PowerCentralHigh	 = $GetPowerCentral ['High'];
	$PowerCentralMedium  = $GetPowerCentral ['Medium'];
	$PowerCentralLow 	 = $GetPowerCentral ['Low'];
	
	//Ambil data value untuk KPI CODE Central
	$SqlCodeCentral = "SELECT TOP 1 [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'CENTRAL' AND KPI='CODE Utilization' order by [Week] desc";
	$ResultCodeCentral  = sqlsrv_query($conn, $SqlCodeCentral, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeCentral	 	= sqlsrv_fetch_array($ResultCodeCentral);
	$CodeCentralCongest = $GetCodeCentral ['Congest'];
	$CodeCentralHigh	= $GetCodeCentral ['High'];
	$CodeCentralMedium  = $GetCodeCentral ['Medium'];
	$CodeCentralLow 	= $GetCodeCentral ['Low'];	
	
	//Ambil data value untuk KPI CODE Central
	$SqlHSDPACentral = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'CENTRAL' AND KPI='HSDPA Users' order by [Week] desc";
	$ResultHSDPACentral  	= sqlsrv_query($conn, $SqlHSDPACentral, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPACentral	 	= sqlsrv_fetch_array($ResultHSDPACentral);
	$HSDPACentralCongest 	= $GetHSDPACentral ['Congest'];
	$HSDPACentralHigh		= $GetHSDPACentral ['High'];
	$HSDPACentralMedium 	= $GetHSDPACentral ['Medium'];
	$HSDPACentralLow 		= $GetHSDPACentral ['Low'];
	
// Region East
//ambil data value untuk KPI CE East
	$SqlCeEast = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'EAST' AND KPI='CE Capacity' order by [Week] desc";
	$ResultCeEast 	= sqlsrv_query($conn, $SqlCeEast, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeEast	 	= sqlsrv_fetch_array($ResultCeEast);
	$CeEastCongest 	= $GetCeEast ['Congest'];
	$CeEastHigh	 	= $GetCeEast ['High'];
	$CeEastMedium 	= $GetCeEast ['Medium'];
	$CeEastLow 	 	= $GetCeEast ['Low'];
	
	//Ambil data value untuk KPI Power East
	$SqlPowerEast = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'EAST' AND KPI='DL Power' order by [Week] desc";
	$ResultPowerEast  	= sqlsrv_query($conn, $SqlPowerEast, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerEast	 	= sqlsrv_fetch_array($ResultPowerEast);
	$PowerEastCongest 	= $GetPowerEast ['Congest'];
	$PowerEastHigh	 	= $GetPowerEast ['High'];
	$PowerEastMedium  	= $GetPowerEast ['Medium'];
	$PowerEastLow 	 	= $GetPowerEast ['Low'];
	
	//Ambil data value untuk KPI CODE East
	$SqlCodeEast = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'EAST' AND KPI='CODE Utilization' order by [Week] desc";
	$ResultCodeEast  	= sqlsrv_query($conn, $SqlCodeEast, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeEast	 	= sqlsrv_fetch_array($ResultCodeEast);
	$CodeEastCongest 	= $GetCodeEast ['Congest'];
	$CodeEastHigh		= $GetCodeEast ['High'];
	$CodeEastMedium  	= $GetCodeEast ['Medium'];
	$CodeEastLow 		= $GetCodeEast ['Low'];	
	
	//Ambil data value untuk KPI CODE East
	$SqlHSDPAEast = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'EAST' AND KPI='HSDPA Users'  order by [Week] desc";
	$ResultHSDPAEast  	= sqlsrv_query($conn, $SqlHSDPAEast, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPAEast	 	= sqlsrv_fetch_array($ResultHSDPAEast);
	$HSDPAEastCongest 	= $GetHSDPAEast ['Congest'];
	$HSDPAEastHigh		= $GetHSDPAEast ['High'];
	$HSDPAEastMedium 	= $GetHSDPAEast ['Medium'];
	$HSDPAEastLow 		= $GetHSDPAEast ['Low'];
	
//Region Jabodetabek 1
//ambil data value untuk KPI CE Jabodetabek1
	$SqlCeJabodetabek1 = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 1' AND KPI='CE Capacity' order by [Week] desc";
	$ResultCeJabodetabek1 	= sqlsrv_query($conn, $SqlCeJabodetabek1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeJabodetabek1	 	= sqlsrv_fetch_array($ResultCeJabodetabek1);
	$CeJabodetabek1Congest 	= $GetCeJabodetabek1 ['Congest'];
	$CeJabodetabek1High	 	= $GetCeJabodetabek1 ['High'];
	$CeJabodetabek1Medium 	= $GetCeJabodetabek1 ['Medium'];
	$CeJabodetabek1Low 	 	= $GetCeJabodetabek1 ['Low'];
	
	//Ambil data value untuk KPI Power Jabodetabek1
	$SqlPowerJabodetabek1 = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 1' AND KPI='DL Power' order by [Week] desc ";
	$ResultPowerJabodetabek1  	= sqlsrv_query($conn, $SqlPowerJabodetabek1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerJabodetabek1	 	= sqlsrv_fetch_array($ResultPowerJabodetabek1);
	$PowerJabodetabek1Congest 	= $GetPowerJabodetabek1 ['Congest'];
	$PowerJabodetabek1High	 	= $GetPowerJabodetabek1 ['High'];
	$PowerJabodetabek1Medium  	= $GetPowerJabodetabek1 ['Medium'];
	$PowerJabodetabek1Low 	 	= $GetPowerJabodetabek1 ['Low'];
	
	//Ambil data value untuk KPI CODE Jabodetabek1
	$SqlCodeJabodetabek1 = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 1' AND KPI='CODE Utilization' order by [Week] desc";
	$ResultCodeJabodetabek1  	= sqlsrv_query($conn, $SqlCodeJabodetabek1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeJabodetabek1	 	= sqlsrv_fetch_array($ResultCodeJabodetabek1);
	$CodeJabodetabek1Congest 	= $GetCodeJabodetabek1 ['Congest'];
	$CodeJabodetabek1High		= $GetCodeJabodetabek1 ['High'];
	$CodeJabodetabek1Medium  	= $GetCodeJabodetabek1 ['Medium'];
	$CodeJabodetabek1Low 		= $GetCodeJabodetabek1 ['Low'];	
	
	//Ambil data value untuk KPI CODE Jabodetabek1
	$SqlHSDPAJabodetabek1 = "SELECT TOP 1 [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 1' AND KPI='HSDPA Users'  order by [Week] desc";
	$ResultHSDPAJabodetabek1  	= sqlsrv_query($conn, $SqlHSDPAJabodetabek1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPAJabodetabek1	 	= sqlsrv_fetch_array($ResultHSDPAJabodetabek1);
	$HSDPAJabodetabek1Congest 	= $GetHSDPAJabodetabek1 ['Congest'];
	$HSDPAJabodetabek1High		= $GetHSDPAJabodetabek1 ['High'];
	$HSDPAJabodetabek1Medium 	= $GetHSDPAJabodetabek1 ['Medium'];
	$HSDPAJabodetabek1Low 		= $GetHSDPAJabodetabek1 ['Low'];
	
//Region Jabodetabek 2
//ambil data value untuk KPI CE Jabodetabek2
	$SqlCeJabodetabek2 = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 2' AND KPI='CE Capacity' order by [Week] desc";
	$ResultCeJabodetabek2 	= sqlsrv_query($conn, $SqlCeJabodetabek2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeJabodetabek2	 	= sqlsrv_fetch_array($ResultCeJabodetabek2);
	$CeJabodetabek2Congest 	= $GetCeJabodetabek2 ['Congest'];
	$CeJabodetabek2High	 	= $GetCeJabodetabek2 ['High'];
	$CeJabodetabek2Medium 	= $GetCeJabodetabek2 ['Medium'];
	$CeJabodetabek2Low 	 	= $GetCeJabodetabek2 ['Low'];
	
	//Ambil data value untuk KPI Power Jabodetabek2
	$SqlPowerJabodetabek2 = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 2' AND KPI='DL Power' order by [Week] desc ";
	$ResultPowerJabodetabek2  	= sqlsrv_query($conn, $SqlPowerJabodetabek2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerJabodetabek2	 	= sqlsrv_fetch_array($ResultPowerJabodetabek2);
	$PowerJabodetabek2Congest 	= $GetPowerJabodetabek2 ['Congest'];
	$PowerJabodetabek2High	 	= $GetPowerJabodetabek2 ['High'];
	$PowerJabodetabek2Medium  	= $GetPowerJabodetabek2 ['Medium'];
	$PowerJabodetabek2Low 	 	= $GetPowerJabodetabek2 ['Low'];
	
	//Ambil data value untuk KPI CODE Jabodetabek2
	$SqlCodeJabodetabek2 = "SELECT TOP 1 [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 2' AND KPI='CODE Utilization' order by [Week] desc";
	$ResultCodeJabodetabek2  	= sqlsrv_query($conn, $SqlCodeJabodetabek2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeJabodetabek2	 	= sqlsrv_fetch_array($ResultCodeJabodetabek2);
	$CodeJabodetabek2Congest 	= $GetCodeJabodetabek2 ['Congest'];
	$CodeJabodetabek2High		= $GetCodeJabodetabek2 ['High'];
	$CodeJabodetabek2Medium  	= $GetCodeJabodetabek2 ['Medium'];
	$CodeJabodetabek2Low 		= $GetCodeJabodetabek2 ['Low'];	
	
	//Ambil data value untuk KPI CODE Jabodetabek2
	$SqlHSDPAJabodetabek2 = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'JABODETABEK 2' AND KPI='HSDPA Users'  order by [Week] desc";
	$ResultHSDPAJabodetabek2  	= sqlsrv_query($conn, $SqlHSDPAJabodetabek2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPAJabodetabek2	 	= sqlsrv_fetch_array($ResultHSDPAJabodetabek2);
	$HSDPAJabodetabek2Congest 	= $GetHSDPAJabodetabek2 ['Congest'];
	$HSDPAJabodetabek2High		= $GetHSDPAJabodetabek2 ['High'];
	$HSDPAJabodetabek2Medium 	= $GetHSDPAJabodetabek2 ['Medium'];
	$HSDPAJabodetabek2Low 		= $GetHSDPAJabodetabek2 ['Low'];

//Region North
//ambil data value untuk KPI CE North
	$SqlCeNorth = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTH' AND KPI='CE Capacity' order by [Week] desc";
	$ResultCeNorth 	= sqlsrv_query($conn, $SqlCeNorth, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeNorth	 	= sqlsrv_fetch_array($ResultCeNorth);
	$CeNorthCongest = $GetCeNorth ['Congest'];
	$CeNorthHigh	= $GetCeNorth ['High'];
	$CeNorthMedium 	= $GetCeNorth ['Medium'];
	$CeNorthLow 	= $GetCeNorth ['Low'];
	
	//Ambil data value untuk KPI Power North
	$SqlPowerNorth = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTH' AND KPI='DL Power' order by [Week] desc ";
	$ResultPowerNorth  	= sqlsrv_query($conn, $SqlPowerNorth, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerNorth	 	= sqlsrv_fetch_array($ResultPowerNorth);
	$PowerNorthCongest 	= $GetPowerNorth ['Congest'];
	$PowerNorthHigh	 	= $GetPowerNorth ['High'];
	$PowerNorthMedium  	= $GetPowerNorth ['Medium'];
	$PowerNorthLow 	 	= $GetPowerNorth ['Low'];
	
	//Ambil data value untuk KPI CODE North
	$SqlCodeNorth = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTH' AND KPI='CODE Utilization' order by [Week] desc";
	$ResultCodeNorth  	= sqlsrv_query($conn, $SqlCodeNorth, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeNorth	 	= sqlsrv_fetch_array($ResultCodeNorth);
	$CodeNorthCongest 	= $GetCodeNorth ['Congest'];
	$CodeNorthHigh		= $GetCodeNorth ['High'];
	$CodeNorthMedium  	= $GetCodeNorth ['Medium'];
	$CodeNorthLow 		= $GetCodeNorth ['Low'];	
	
	//Ambil data value untuk KPI CODE North
	$SqlHSDPANorth = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTH' AND KPI='HSDPA Users' order by [Week] desc";
	$ResultHSDPANorth  	= sqlsrv_query($conn, $SqlHSDPANorth, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPANorth	 	= sqlsrv_fetch_array($ResultHSDPANorth);
	$HSDPANorthCongest 	= $GetHSDPANorth ['Congest'];
	$HSDPANorthHigh		= $GetHSDPANorth ['High'];
	$HSDPANorthMedium 	= $GetHSDPANorth ['Medium'];
	$HSDPANorthLow 		= $GetHSDPANorth ['Low'];	

//Northern Sumatera
//ambil data value untuk KPI CE NorthernSumatera
	$SqlCeNorthernSumatera = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTHERN SUMATERA' AND KPI='CE Capacity' order by [Week] desc";
	$ResultCeNorthernSumatera 	= sqlsrv_query($conn, $SqlCeNorthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeNorthernSumatera	 	= sqlsrv_fetch_array($ResultCeNorthernSumatera);
	$CeNorthernSumateraCongest = $GetCeNorthernSumatera ['Congest'];
	$CeNorthernSumateraHigh	= $GetCeNorthernSumatera ['High'];
	$CeNorthernSumateraMedium 	= $GetCeNorthernSumatera ['Medium'];
	$CeNorthernSumateraLow 	= $GetCeNorthernSumatera ['Low'];
	
	//Ambil data value untuk KPI Power NorthernSumatera
	$SqlPowerNorthernSumatera = "SELECT TOP 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTHERN SUMATERA' AND KPI='DL Power' order by [Week] desc ";
	$ResultPowerNorthernSumatera  	= sqlsrv_query($conn, $SqlPowerNorthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerNorthernSumatera	 	= sqlsrv_fetch_array($ResultPowerNorthernSumatera);
	$PowerNorthernSumateraCongest 	= $GetPowerNorthernSumatera ['Congest'];
	$PowerNorthernSumateraHigh	 	= $GetPowerNorthernSumatera ['High'];
	$PowerNorthernSumateraMedium  	= $GetPowerNorthernSumatera ['Medium'];
	$PowerNorthernSumateraLow 	 	= $GetPowerNorthernSumatera ['Low'];
	
	//Ambil data value untuk KPI CODE NorthernSumatera
	$SqlCodeNorthernSumatera = "SELECT TOP 1 [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTHERN SUMATERA' AND KPI='CODE Utilization' order by [Week] desc";
	$ResultCodeNorthernSumatera  	= sqlsrv_query($conn, $SqlCodeNorthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeNorthernSumatera	 	= sqlsrv_fetch_array($ResultCodeNorthernSumatera);
	$CodeNorthernSumateraCongest 	= $GetCodeNorthernSumatera ['Congest'];
	$CodeNorthernSumateraHigh		= $GetCodeNorthernSumatera ['High'];
	$CodeNorthernSumateraMedium  	= $GetCodeNorthernSumatera ['Medium'];
	$CodeNorthernSumateraLow 		= $GetCodeNorthernSumatera ['Low'];	
	
	//Ambil data value untuk KPI CODE NorthernSumatera
	$SqlHSDPANorthernSumatera = "SELECT TOP 1 [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'NORTHERN SUMATERA' AND KPI='HSDPA Users'  order by [Week] desc";
	$ResultHSDPANorthernSumatera  	= sqlsrv_query($conn, $SqlHSDPANorthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPANorthernSumatera	 	= sqlsrv_fetch_array($ResultHSDPANorthernSumatera);
	$HSDPANorthernSumateraCongest 	= $GetHSDPANorthernSumatera ['Congest'];
	$HSDPANorthernSumateraHigh		= $GetHSDPANorthernSumatera ['High'];
	$HSDPANorthernSumateraMedium 	= $GetHSDPANorthernSumatera ['Medium'];
	$HSDPANorthernSumateraLow 		= $GetHSDPANorthernSumatera ['Low'];
	
//Region SouthernSumatera
//ambil data value untuk KPI CE SouthernSumatera
	$SqlCeSouthernSumatera = "SELECT TOP 1 [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'SOUTHERN SUMATERA' AND KPI='CE Capacity' order by [Week] desc";
	$ResultCeSouthernSumatera 	= sqlsrv_query($conn, $SqlCeSouthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeSouthernSumatera	 	= sqlsrv_fetch_array($ResultCeSouthernSumatera);
	$CeSouthernSumateraCongest = $GetCeSouthernSumatera ['Congest'];
	$CeSouthernSumateraHigh	= $GetCeSouthernSumatera ['High'];
	$CeSouthernSumateraMedium 	= $GetCeSouthernSumatera ['Medium'];
	$CeSouthernSumateraLow 	= $GetCeSouthernSumatera ['Low'];
	
	//Ambil data value untuk KPI Power SouthernSumatera
	$SqlPowerSouthernSumatera = "SELECT top 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'SOUTHERN SUMATERA' AND KPI='DL Power' order by [Week] desc ";
	$ResultPowerSouthernSumatera  	= sqlsrv_query($conn, $SqlPowerSouthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerSouthernSumatera	 	= sqlsrv_fetch_array($ResultPowerSouthernSumatera);
	$PowerSouthernSumateraCongest 	= $GetPowerSouthernSumatera ['Congest'];
	$PowerSouthernSumateraHigh	 	= $GetPowerSouthernSumatera ['High'];
	$PowerSouthernSumateraMedium  	= $GetPowerSouthernSumatera ['Medium'];
	$PowerSouthernSumateraLow 	 	= $GetPowerSouthernSumatera ['Low'];
	
	//Ambil data value untuk KPI CODE SouthernSumatera
	$SqlCodeSouthernSumatera = "SELECT top 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'SOUTHERN SUMATERA' AND KPI='CODE Utilization' order by [Week] desc";
	$ResultCodeSouthernSumatera  	= sqlsrv_query($conn, $SqlCodeSouthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeSouthernSumatera	 	= sqlsrv_fetch_array($ResultCodeSouthernSumatera);
	$CodeSouthernSumateraCongest 	= $GetCodeSouthernSumatera ['Congest'];
	$CodeSouthernSumateraHigh		= $GetCodeSouthernSumatera ['High'];
	$CodeSouthernSumateraMedium  	= $GetCodeSouthernSumatera ['Medium'];
	$CodeSouthernSumateraLow 		= $GetCodeSouthernSumatera ['Low'];	
	
	//Ambil data value untuk KPI CODE SouthernSumatera
	$SqlHSDPASouthernSumatera = "SELECT top 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'SOUTHERN SUMATERA' AND KPI='HSDPA Users'  order by [Week] desc";
	$ResultHSDPASouthernSumatera  	= sqlsrv_query($conn, $SqlHSDPASouthernSumatera, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPASouthernSumatera	 	= sqlsrv_fetch_array($ResultHSDPASouthernSumatera);
	$HSDPASouthernSumateraCongest 	= $GetHSDPASouthernSumatera ['Congest'];
	$HSDPASouthernSumateraHigh		= $GetHSDPASouthernSumatera ['High'];
	$HSDPASouthernSumateraMedium 	= $GetHSDPASouthernSumatera ['Medium'];
	$HSDPASouthernSumateraLow 		= $GetHSDPASouthernSumatera ['Low'];
	
//Region Nationwide
//ambil data value untuk KPI CE Nationwide
	$SqlCeNationwide = "SELECT top 1 [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'Nationwide' AND KPI='CE Capacity' order by [Week] desc";
	$ResultCeNationwide 	= sqlsrv_query($conn, $SqlCeNationwide, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCeNationwide	 	= sqlsrv_fetch_array($ResultCeNationwide);
	$CeNationwideCongest 	= $GetCeNationwide ['Congest'];
	$CeNationwideHigh		= $GetCeNationwide ['High'];
	$CeNationwideMedium 	= $GetCeNationwide ['Medium'];
	$CeNationwideLow 		= $GetCeNationwide ['Low'];
	
	//Ambil data value untuk KPI Power Nationwide
	$SqlPowerNationwide = "SELECT top 1[Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'Nationwide' AND KPI='DL Power' order by [Week] desc ";
	$ResultPowerNationwide  	= sqlsrv_query($conn, $SqlPowerNationwide, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetPowerNationwide	 		= sqlsrv_fetch_array($ResultPowerNationwide);
	$PowerNationwideCongest 	= $GetPowerNationwide ['Congest'];
	$PowerNationwideHigh	 	= $GetPowerNationwide ['High'];
	$PowerNationwideMedium  	= $GetPowerNationwide ['Medium'];
	$PowerNationwideLow 	 	= $GetPowerNationwide ['Low'];
	
	//Ambil data value untuk KPI CODE Nationwide
	$SqlCodeNationwide = "SELECT top 1 [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'Nationwide' AND KPI='CODE Utilization' order by [Week] desc";
	$ResultCodeNationwide  	= sqlsrv_query($conn, $SqlCodeNationwide, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCodeNationwide	 	= sqlsrv_fetch_array($ResultCodeNationwide);
	$CodeNationwideCongest 	= $GetCodeNationwide ['Congest'];
	$CodeNationwideHigh		= $GetCodeNationwide ['High'];
	$CodeNationwideMedium  	= $GetCodeNationwide ['Medium'];
	$CodeNationwideLow 		= $GetCodeNationwide ['Low'];	
	
	//Ambil data value untuk KPI CODE Nationwide
	$SqlHSDPANationwide = "SELECT top 1 [Week]
						  ,[RegionSev]
						  ,[KPI]
						  ,[Total (#)] as Total 
						  ,[Low]
						  ,[Medium]
						  ,[High]
						  ,[Congest]
					 FROM [WebDashboard].[dbo].[3GAmpuhWeekly]
					 WHERE RegionSev = 'Nationwide' AND KPI='HSDPA Users'  order by [Week] desc";
	$ResultHSDPANationwide  	= sqlsrv_query($conn, $SqlHSDPANationwide, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetHSDPANationwide	 		= sqlsrv_fetch_array($ResultHSDPANationwide);
	$HSDPANationwideCongest 	= $GetHSDPANationwide ['Congest'];
	$HSDPANationwideHigh		= $GetHSDPANationwide ['High'];
	$HSDPANationwideMedium 		= $GetHSDPANationwide ['Medium'];
	$HSDPANationwideLow 		= $GetHSDPANationwide ['Low'];

?>
<!-- Chart Central -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeCentralLow ;?> ,<?php echo $CeCentralMedium ;?> ,<?php echo $CeCentralHigh ;?>, <?php echo $CeCentralCongest ;?>],
               ['CODE' , <?php echo $CodeCentralLow ;?>, <?php echo $CodeCentralMedium ;?>, <?php echo $CodeCentralHigh ;?>, <?php echo $CodeCentralCongest ;?> ],
               ['POWER' , <?php echo $PowerCentralLow ;?> ,<?php echo $PowerCentralMedium ;?>, <?php echo $PowerCentralHigh ;?>, <?php echo $PowerCentralCongest ;?>],
               ['HDSPA' , <?php echo $HSDPACentralLow ;?> ,<?php echo $HSDPACentralMedium ;?>, <?php echo $HSDPACentralHigh ;?>,<?php echo $HSDPACentralCongest ;?>]
            ]);

            var options = {
               title: 'Central Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedCentral'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>

<!-- Chart East -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeEastLow ;?> ,<?php echo $CeEastMedium ;?> ,<?php echo $CeEastHigh ;?>, <?php echo $CeEastCongest ;?>],
               ['CODE' , <?php echo $CodeEastLow ;?>, <?php echo $CodeEastMedium ;?>, <?php echo $CodeEastHigh ;?>, <?php echo $CodeEastCongest ;?> ],
               ['POWER' , <?php echo $PowerEastLow ;?> ,<?php echo $PowerEastMedium ;?>, <?php echo $PowerEastHigh ;?>, <?php echo $PowerEastCongest ;?>],
               ['HDSPA' , <?php echo $HSDPAEastLow ;?> ,<?php echo $HSDPAEastMedium ;?>, <?php echo $HSDPAEastHigh ;?>,<?php echo $HSDPAEastCongest ;?>]
            ]);

            var options = {
               title: 'East Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedEast'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Jabodetabek1 -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeJabodetabek1Low ;?> ,<?php echo $CeJabodetabek1Medium ;?> ,<?php echo $CeJabodetabek1High ;?>, <?php echo $CeJabodetabek1Congest ;?>],
               ['CODE' , <?php echo $CodeJabodetabek1Low ;?>, <?php echo $CodeJabodetabek1Medium ;?>, <?php echo $CodeJabodetabek1High ;?>, <?php echo $CodeJabodetabek1Congest ;?> ],
               ['POWER' , <?php echo $PowerJabodetabek1Low ;?> ,<?php echo $PowerJabodetabek1Medium ;?>, <?php echo $PowerJabodetabek1High ;?>, <?php echo $PowerJabodetabek1Congest ;?>],
               ['HDSPA' , <?php echo $HSDPAJabodetabek1Low ;?> ,<?php echo $HSDPAJabodetabek1Medium ;?>, <?php echo $HSDPAJabodetabek1High ;?>,<?php echo $HSDPAJabodetabek1Congest ;?>]
            ]);

            var options = {
               title: 'Jabodetabek1 Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedJabodetabek1'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Jabodetabek2 -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeJabodetabek2Low ;?> ,<?php echo $CeJabodetabek2Medium ;?> ,<?php echo $CeJabodetabek2High ;?>, <?php echo $CeJabodetabek2Congest ;?>],
               ['CODE' , <?php echo $CodeJabodetabek2Low ;?>, <?php echo $CodeJabodetabek2Medium ;?>, <?php echo $CodeJabodetabek2High ;?>, <?php echo $CodeJabodetabek2Congest ;?> ],
               ['POWER' , <?php echo $PowerJabodetabek2Low ;?> ,<?php echo $PowerJabodetabek2Medium ;?>, <?php echo $PowerJabodetabek2High ;?>, <?php echo $PowerJabodetabek2Congest ;?>],
               ['HDSPA' , <?php echo $HSDPAJabodetabek2Low ;?> ,<?php echo $HSDPAJabodetabek2Medium ;?>, <?php echo $HSDPAJabodetabek2High ;?>,<?php echo $HSDPAJabodetabek2Congest ;?>]
            ]);

            var options = {
               title: 'Jabodetabek2 Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedJabodetabek2'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart North -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeNorthLow ;?> ,<?php echo $CeNorthMedium ;?> ,<?php echo $CeNorthHigh ;?>, <?php echo $CeNorthCongest ;?>],
               ['CODE' , <?php echo $CodeNorthLow ;?>, <?php echo $CodeNorthMedium ;?>, <?php echo $CodeNorthHigh ;?>, <?php echo $CodeNorthCongest ;?> ],
               ['POWER' , <?php echo $PowerNorthLow ;?> ,<?php echo $PowerNorthMedium ;?>, <?php echo $PowerNorthHigh ;?>, <?php echo $PowerNorthCongest ;?>],
               ['HDSPA' , <?php echo $HSDPANorthLow ;?> ,<?php echo $HSDPANorthMedium ;?>, <?php echo $HSDPANorthHigh ;?>,<?php echo $HSDPANorthCongest ;?>]
            ]);

            var options = {
               title: 'North Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedNorth'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart NorthernSumatera -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeNorthernSumateraLow ;?> ,<?php echo $CeNorthernSumateraMedium ;?> ,<?php echo $CeNorthernSumateraHigh ;?>, <?php echo $CeNorthernSumateraCongest ;?>],
               ['CODE' , <?php echo $CodeNorthernSumateraLow ;?>, <?php echo $CodeNorthernSumateraMedium ;?>, <?php echo $CodeNorthernSumateraHigh ;?>, <?php echo $CodeNorthernSumateraCongest ;?> ],
               ['POWER' , <?php echo $PowerNorthernSumateraLow ;?> ,<?php echo $PowerNorthernSumateraMedium ;?>, <?php echo $PowerNorthernSumateraHigh ;?>, <?php echo $PowerNorthernSumateraCongest ;?>],
               ['HDSPA' , <?php echo $HSDPANorthernSumateraLow ;?> ,<?php echo $HSDPANorthernSumateraMedium ;?>, <?php echo $HSDPANorthernSumateraHigh ;?>,<?php echo $HSDPANorthernSumateraCongest ;?>]
            ]);

            var options = {
               title: 'NorthernSumatera Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedNorthernSumatera'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart SouthernSumatera -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeSouthernSumateraLow ;?> ,<?php echo $CeSouthernSumateraMedium ;?> ,<?php echo $CeSouthernSumateraHigh ;?>, <?php echo $CeSouthernSumateraCongest ;?>],
               ['CODE' , <?php echo $CodeSouthernSumateraLow ;?>, <?php echo $CodeSouthernSumateraMedium ;?>, <?php echo $CodeSouthernSumateraHigh ;?>, <?php echo $CodeSouthernSumateraCongest ;?> ],
               ['POWER' , <?php echo $PowerSouthernSumateraLow ;?> ,<?php echo $PowerSouthernSumateraMedium ;?>, <?php echo $PowerSouthernSumateraHigh ;?>, <?php echo $PowerSouthernSumateraCongest ;?>],
               ['HDSPA' , <?php echo $HSDPASouthernSumateraLow ;?> ,<?php echo $HSDPASouthernSumateraMedium ;?>, <?php echo $HSDPASouthernSumateraHigh ;?>,<?php echo $HSDPASouthernSumateraCongest ;?>]
            ]);

            var options = {
               title: 'SouthernSumatera Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedSouthernSumatera'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Nationwide -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeNationwideLow ;?> ,<?php echo $CeNationwideMedium ;?> ,<?php echo $CeNationwideHigh ;?>, <?php echo $CeNationwideCongest ;?>],
               ['CODE' , <?php echo $CodeNationwideLow ;?>, <?php echo $CodeNationwideMedium ;?>, <?php echo $CodeNationwideHigh ;?>, <?php echo $CodeNationwideCongest ;?> ],
               ['POWER' , <?php echo $PowerNationwideLow ;?> ,<?php echo $PowerNationwideMedium ;?>, <?php echo $PowerNationwideHigh ;?>, <?php echo $PowerNationwideCongest ;?>],
               ['HDSPA' , <?php echo $HSDPANationwideLow ;?> ,<?php echo $HSDPANationwideMedium ;?>, <?php echo $HSDPANationwideHigh ;?>,<?php echo $HSDPANationwideCongest ;?>]
            ]);

            var options = {
               title: 'Nationwide Weekly <?php echo $min1 ;?>',
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               isStacked:'percent', 
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                   2:{color:'Red'},
                   3:{color:'Black'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedNationwide'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<?php
}
?>
<!-- Grafik Line Chart Daily 3G -->
<?php
$AmbilTanggalTerakhir = date("Y-m-d") ;
$now = strtotime($AmbilTanggalTerakhir);
$Tanggal14haritrakhir = date('Y-m-j', strtotime('- 14 day',$now));
$HMIN1 = date('Y-m-j', strtotime('- 1 day',$now));

?>
<script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Central','East','Jabodetabek','North','West'],

                    	<?php
                        $query = "SELECT [DateId]
								  ,[Resource]
								  ,[Central]
								  ,[East]
								  ,[Jabodetabek]
								  ,[North]
								  ,[West]
							  FROM [WebDashboard].[dbo].[3GAmpuhDaily] where [Resource]='TotalPayloadGb' and [DateId] between '$Tanggal14haritrakhir' and '$HMIN1'
							  order by [DateId] asc
                              ";
                        $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());
                        
                        while($data = sqlsrv_fetch_array($result))
                        {//ambil semua hasil eksekusi $sql
                          echo "['".$data['DateId']->format('M j')."',".$data['Central'].",".$data['East'].",".$data['Jabodetabek'].",".$data['North'].",".$data['West']."],";
                        }
                      ?>
                     
      ]);

        var options = {
          title: 'Total Payload (GB)',
		  pointSize: 4,
		  chartArea: {
				backgroundColor: {
					stroke: '#4322c0',
					strokeWidth: 1
				},width:"85%"
			},
          curveType: 'function',
          legend: { position: 'bottom' },
		  crosshair: {
          color: '#4322c0',
		  colorWidth: 1,
          trigger: 'selection'
			}
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_payload'));

        chart.draw(data, options);
		chart.setSelection([{row: 6, column: 5}]);
      }

		</script>
<?php
include 'footer.php';
?>