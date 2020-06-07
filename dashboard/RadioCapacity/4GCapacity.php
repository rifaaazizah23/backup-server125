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
                  <h2>4G Total Payload </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="chart_payload" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
	<div class="page-title">
		<div class="title_left">
			<h3>4G Ampuh Radio Capacity</h3>
		</div>
	</div>
	<div class="x_panel">
		<div class="x_content">
			<div class="row">
			<form method="POST" action="4GCapacity.php">
				<div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12">
						<select class="form-control" name="week">
							<option>-Select Week-</option>
							<?php
								$tsql = "SELECT WEEK FROM [WebDashboard].[dbo].[4GAmpuhWeekly] GROUP BY WEEK";
										 
								$result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
																	
								while($data = sqlsrv_fetch_array($result))
									{
									 echo "<option value=".$data[WEEK]."> Week ".$data[WEEK]."</option>";
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
					<div id="stackedNATIONWIDE" class="demo-placeholder"></div>
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
					<div id="stackedCENTRAL" class="demo-placeholder"></div>
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
					<div id="stackedEAST" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Jabodetabek</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stackedJABODETABEK" class="demo-placeholder"></div>
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
					<div id="stackedNORTH" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>West</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stackedWEST" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>4G Ampuh Weekly </h2>
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
                          <th class="text-center" style="background-color: black;"><font color="White">Week</font></th>
						  <th class="text-center" style="background-color: black;"><font color="White">Region 5</font></th>
						  <th class="text-center" style="background-color: black;"><font color="White">ITEM</font></th>
						  <th class="text-center" style="background-color: black;"><font color="White">DETAIL MONITORING</font></th>
						  <th class="text-center" style="background-color: black;"><font color="White">Measurement Type</font></th>
						  <th class="text-center" style="background-color: black;"><font color="White">Total (#)</font></th>
						  <th class="text-center" style="background-color: green;"><font color="black">LOW</font></th>
						  <th class="text-center" style="background-color: yellow;"><font color="black">FAIR</font></th>
						  <th class="text-center" style="background-color: red;"><font color="black">HIGH</font></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
							  //membaca nilai value post dari form 
								$tsql = "SELECT [WEEK]
											  ,[REGION_5]
											  ,[ITEM]
											  ,[DETAIL MONITORING] as DetMon
											  ,[Measurement Type] as MeaTyp
											  ,[Total (#)] as Total
											  ,[LOW]
											  ,[FAIR]
											  ,[HIGH]
												,100 * ([HIGH] / NULLIF ( [Total (#)], 0) )as HasilHigh
												,100 * ([LOW] / NULLIF ( [Total (#)], 0) )as HasilLow
												,100 * ([FAIR] / NULLIF ( [Total (#)], 0) )as HasilFair
												FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
												";
								 
								$result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
															
								while($data = sqlsrv_fetch_array($result))
								  { // Ambil semua data dari hasil eksekusi $sql
								  echo '
									<tr>
									  <td align="center">'.$data['WEEK'].'</td>
									  <td align="center">'.$data['REGION_5'].'</td>
									  <td align="center">'.$data['ITEM'].'</td>
									  <td align="center">'.$data['DetMon'].'</td>
									  <td align="center">'.$data['MeaTyp'].'</td>
									  <td align="center">'.$data['Total'].'</td>
									  <td align="center">'.$data['LOW'].' ( '.number_format($data['HasilLow'],2).' %)</td>
									  <td align="center">'.$data['FAIR'].' ( '.number_format($data['HasilFair'],2).' %)</td>
									  <td align="center">'.$data['HIGH'].' ( '.number_format($data['HasilHigh'],2).' %)</td>
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
//ambil data value untuk ITEM LICENSE NATIONWIDE
	$SqlNWL 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'Nationwide' AND ITEM='LICENSE' AND WEEK ='$min1'";
	$ResultNWL 	= sqlsrv_query($conn, $SqlNWL, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNWL	 	= sqlsrv_fetch_array($ResultNWL);
	$NWLLOW		= $GetNWL ['LOW'];
	$NWLFAIR	= $GetNWL ['FAIR'];
	$NWLHIGH 	= $GetNWL ['HIGH'];
	
	//Ambil data value untuk ITEM PRB NATIONWIDE
	$SqlNWP 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'Nationwide' AND ITEM='PRB' AND WEEK ='$min1'";
	$ResultNWP 	= sqlsrv_query($conn, $SqlNWP, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNWP	 	= sqlsrv_fetch_array($ResultNWP);
	$NWPLOW		= $GetNWP ['LOW'];
	$NWPFAIR	= $GetNWP ['FAIR'];
	$NWPHIGH 	= $GetNWP ['HIGH'];
	
	//Ambil data value untuk ITEM Usage NATIONWIDE
	$SqlNWUsage	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'Nationwide' AND ITEM='Usage' AND WEEK ='$min1'";
	$ResultNWUsage	= sqlsrv_query($conn, $SqlNWUsage, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNWUsage	 	= sqlsrv_fetch_array($ResultNWUsage);
	$NWUsageLOW		= $GetNWUsage ['LOW'];
	$NWUsageFAIR	= $GetNWUsage ['FAIR'];
	$NWUsageHIGH 	= $GetNWUsage ['HIGH'];	
	
	//Ambil data value untuk ITEM USER CENTRAL
	$SqlNWUSER 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'Nationwide' AND ITEM='USER' AND WEEK ='$min1'";
	$ResultNWUSER 	= sqlsrv_query($conn, $SqlNWUSER, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNWUSER	 	= sqlsrv_fetch_array($ResultNWUSER);
	$NWUSERLOW		= $GetNWUSER ['LOW'];
	$NWUSERFAIR	 	= $GetNWUSER ['FAIR'];
	$NWUSERHIGH 	= $GetNWUSER ['HIGH'];
	
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//ambil data value untuk ITEM LICENSE CENTRAL
	$SqlCL 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'CENTRAL' AND ITEM='LICENSE' AND WEEK ='$min1'";
	$ResultCL 	= sqlsrv_query($conn, $SqlCL, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCL	 	= sqlsrv_fetch_array($ResultCL);
	$CLLOW		= $GetCL ['LOW'];
	$CLFAIR	 	= $GetCL ['FAIR'];
	$CLHIGH 	= $GetCL ['HIGH'];
	
	//Ambil data value untuk ITEM PRB CENTRAL
	$SqlCP 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'CENTRAL' AND ITEM='PRB' AND WEEK ='$min1'";
	$ResultCP 	= sqlsrv_query($conn, $SqlCP, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCP	 	= sqlsrv_fetch_array($ResultCP);
	$CPLOW		= $GetCP ['LOW'];
	$CPFAIR	 	= $GetCP ['FAIR'];
	$CPHIGH 	= $GetCP ['HIGH'];
	
	//Ambil data value untuk ITEM Usage CENTRAL
	$SqlCUsage 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'CENTRAL' AND ITEM='Usage' AND WEEK ='$min1'";
	$ResultCUsage 	= sqlsrv_query($conn, $SqlCUsage, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCUsage	 	= sqlsrv_fetch_array($ResultCUsage);
	$CUsageLOW		= $GetCUsage ['LOW'];
	$CUsageFAIR	 	= $GetCUsage ['FAIR'];
	$CUsageHIGH 	= $GetCUsage ['HIGH'];	
	
	//Ambil data value untuk ITEM USER CENTRAL
	$SqlCUSER 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'CENTRAL' AND ITEM='USER' AND WEEK ='$min1'";
	$ResultCUSER 	= sqlsrv_query($conn, $SqlCUSER, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCUSER	 	= sqlsrv_fetch_array($ResultCUSER);
	$CUSERLOW		= $GetCUSER ['LOW'];
	$CUSERFAIR	 	= $GetCUSER ['FAIR'];
	$CUSERHIGH 		= $GetCUSER ['HIGH'];
	
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//ambil data value untuk ITEM LICENSE EAST
	$SqlEL 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'EAST' AND ITEM='LICENSE' AND WEEK ='$min1'";
	$ResultEL 	= sqlsrv_query($conn, $SqlEL, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetEL	 	= sqlsrv_fetch_array($ResultEL);
	$ELLOW		= $GetEL ['LOW'];
	$ELFAIR	 	= $GetEL ['FAIR'];
	$ELHIGH 	= $GetEL ['HIGH'];
	
	//Ambil data value untuk ITEM PRB EAST
	$SqlEP 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'EAST' AND ITEM='PRB' AND WEEK ='$min1'";
	$ResultEP 	= sqlsrv_query($conn, $SqlEP, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetEP	 	= sqlsrv_fetch_array($ResultEP);
	$EPLOW		= $GetEP ['LOW'];
	$EPFAIR	 	= $GetEP ['FAIR'];
	$EPHIGH 	= $GetEP ['HIGH'];
	
	//Ambil data value untuk ITEM Usage EAST
	$SqlEUsage 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'EAST' AND ITEM='Usage' AND WEEK ='$min1'";
	$ResultEUsage 	= sqlsrv_query($conn, $SqlEUsage, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetEUsage	 	= sqlsrv_fetch_array($ResultEUsage);
	$EUsageLOW		= $GetEUsage ['LOW'];
	$EUsageFAIR	 	= $GetEUsage ['FAIR'];
	$EUsageHIGH 	= $GetEUsage ['HIGH'];	
	
	//Ambil data value untuk ITEM USER EAST
	$SqlEUSER 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'EAST' AND ITEM='USER' AND WEEK ='$min1'";
	$ResultEUSER 	= sqlsrv_query($conn, $SqlEUSER, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetEUSER	 	= sqlsrv_fetch_array($ResultEUSER);
	$EUSERLOW		= $GetEUSER ['LOW'];
	$EUSERFAIR	 	= $GetEUSER ['FAIR'];
	$EUSERHIGH 		= $GetEUSER ['HIGH'];
	
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//ambil data value untuk ITEM LICENSE JABODETABEK
	$SqlJL 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'JABODETABEK' AND ITEM='LICENSE' AND WEEK ='$min1'";
	$ResultJL 	= sqlsrv_query($conn, $SqlJL, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetJL	 	= sqlsrv_fetch_array($ResultJL);
	$JLLOW		= $GetJL ['LOW'];
	$JLFAIR	 	= $GetJL ['FAIR'];
	$JLHIGH 	= $GetJL ['HIGH'];
	
	//Ambil data value untuk ITEM PRB JABODETABEK
	$SqlJP 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'JABODETABEK' AND ITEM='PRB' AND WEEK ='$min1'";
	$ResultJP 	= sqlsrv_query($conn, $SqlJP, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetJP	 	= sqlsrv_fetch_array($ResultJP);
	$JPLOW		= $GetJP ['LOW'];
	$JPFAIR	 	= $GetJP ['FAIR'];
	$JPHIGH 	= $GetJP ['HIGH'];
	
	//Ambil data value untuk ITEM Usage JABODETABEK
	$SqlJUsage 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'JABODETABEK' AND ITEM='Usage' AND WEEK ='$min1'";
	$ResultJUsage 	= sqlsrv_query($conn, $SqlJUsage, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetJUsage	 	= sqlsrv_fetch_array($ResultJUsage);
	$JUsageLOW		= $GetJUsage ['LOW'];
	$JUsageFAIR	 	= $GetJUsage ['FAIR'];
	$JUsageHIGH 	= $GetJUsage ['HIGH'];	
	
	//Ambil data value untuk ITEM USER JABODETABEK
	$SqlJUSER 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'JABODETABEK' AND ITEM='USER' AND WEEK ='$min1'";
	$ResultJUSER 	= sqlsrv_query($conn, $SqlJUSER, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetJUSER	 	= sqlsrv_fetch_array($ResultJUSER);
	$JUSERLOW		= $GetJUSER ['LOW'];
	$JUSERFAIR	 	= $GetJUSER ['FAIR'];
	$JUSERHIGH 		= $GetJUSER ['HIGH'];
	
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//ambil data value untuk ITEM LICENSE NORTH
	$SqlNL 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'NORTH' AND ITEM='LICENSE' AND WEEK ='$min1'";
	$ResultNL 	= sqlsrv_query($conn, $SqlNL, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNL	 	= sqlsrv_fetch_array($ResultNL);
	$NLLOW		= $GetNL ['LOW'];
	$NLFAIR	 	= $GetNL ['FAIR'];
	$NLHIGH 	= $GetNL ['HIGH'];
	
	//Ambil data value untuk ITEM PRB NORTH
	$SqlNP 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'NORTH' AND ITEM='PRB' AND WEEK ='$min1'";
	$ResultNP 	= sqlsrv_query($conn, $SqlNP, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNP	 	= sqlsrv_fetch_array($ResultNP);
	$NPLOW		= $GetNP ['LOW'];
	$NPFAIR	 	= $GetNP ['FAIR'];
	$NPHIGH 	= $GetNP ['HIGH'];
	
//Ambil data value untuk ITEM Usage NORTH
	$SqlNUsage 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'NORTH' AND ITEM='Usage' AND WEEK ='$min1'";
	$ResultNUsage 	= sqlsrv_query($conn, $SqlNUsage, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNUsage	 	= sqlsrv_fetch_array($ResultNUsage);
	$NUsageLOW		= $GetNUsage ['LOW'];
	$NUsageFAIR	 	= $GetNUsage ['FAIR'];
	$NUsageHIGH 	= $GetNUsage ['HIGH'];	
	
	//Ambil data value untuk ITEM USER NORTH
	$SqlNUSER 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'NORTH' AND ITEM='USER' AND WEEK ='$min1'";
	$ResultNUSER 	= sqlsrv_query($conn, $SqlNUSER, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNUSER	 	= sqlsrv_fetch_array($ResultNUSER);
	$NUSERLOW		= $GetNUSER ['LOW'];
	$NUSERFAIR	 	= $GetNUSER ['FAIR'];
	$NUSERHIGH 		= $GetNUSER ['HIGH'];
	
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//ambil data value untuk ITEM LICENSE WEST
	$SqlWL 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'WEST' AND ITEM='LICENSE' AND WEEK ='$min1'";
	$ResultWL 	= sqlsrv_query($conn, $SqlWL, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetWL	 	= sqlsrv_fetch_array($ResultWL);
	$WLLOW		= $GetWL ['LOW'];
	$WLFAIR	 	= $GetWL ['FAIR'];
	$WLHIGH 	= $GetWL ['HIGH'];
	
	//Ambil data value untuk ITEM PRB WEST
	$SqlWP 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'WEST' AND ITEM='PRB' AND WEEK ='$min1'";
	$ResultWP 	= sqlsrv_query($conn, $SqlWP, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetWP	 	= sqlsrv_fetch_array($ResultWP);
	$WPLOW		= $GetWP ['LOW'];
	$WPFAIR	 	= $GetWP ['FAIR'];
	$WPHIGH 	= $GetWP ['HIGH'];
	
//Ambil data value untuk ITEM Usage WEST
	$SqlWUsage 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'WEST' AND ITEM='Usage' AND WEEK ='$min1'";
	$ResultWUsage 	= sqlsrv_query($conn, $SqlWUsage, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetWUsage	 	= sqlsrv_fetch_array($ResultWUsage);
	$WUsageLOW		= $GetWUsage ['LOW'];
	$WUsageFAIR	 	= $GetWUsage ['FAIR'];
	$WUsageHIGH 	= $GetWUsage ['HIGH'];	
	
	//Ambil data value untuk ITEM USER WEST
	$SqlWUSER 	= "SELECT [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'WEST' AND ITEM='USER' AND WEEK ='$min1'";
	$ResultWUSER 	= sqlsrv_query($conn, $SqlWUSER, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetWUSER	 	= sqlsrv_fetch_array($ResultWUSER);
	$WUSERLOW		= $GetWUSER ['LOW'];
	$WUSERFAIR	 	= $GetWUSER ['FAIR'];
	$WUSERHIGH 		= $GetWUSER ['HIGH'];
?>
<!-- Chart Central -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'LOW', 'FAIR','HIGH'],
               ['LICENSE', <?php echo $NWLLOW ;?> ,<?php echo$NWLFAIR ;?> ,<?php echo $NWLHIGH ;?>],
               ['PRB' , <?php echo $NWPLOW ;?>, <?php echo $NWPFAIR ;?>, <?php echo $NWPHIGH ;?>],
               ['Usage' , <?php echo $NWUsageLOW ;?> ,<?php echo $NWUsageFAIR ;?>, <?php echo $NWUsageHIGH ;?>],
               ['USER' , <?php echo $NWUSERLOW ;?> ,<?php echo $NWUSERFAIR ;?>, <?php echo $NWUSERHIGH ;?>]
            ]);

            var options = {
               title: ' NATIONWIDE Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   1:{color:'Yellow'},
                   0:{color:'Green'},
                   2:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedNATIONWIDE'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart 4G CENTRAL AMPUH -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'LOW', 'FAIR','HIGH'],
               ['LICENSE', <?php echo $CLLOW ;?> ,<?php echo $CLFAIR ;?> ,<?php echo $CLHIGH ;?>],
               ['PRB' , <?php echo $CPLOW ;?>, <?php echo $CPFAIR ;?>, <?php echo $CPHIGH ;?>],
               ['Usage' , <?php echo $CUsageLOW ;?> ,<?php echo $CUsageFAIR ;?>, <?php echo $CUsageHIGH ;?>],
               ['USER' , <?php echo $CUSERLOW ;?> ,<?php echo $CUSERFAIR ;?>, <?php echo $CUSERHIGH ;?>]
            ]);

            var options = {
               title: ' CENTRAL Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   1:{color:'Yellow'},
                   0:{color:'Green'},
                   2:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedCENTRAL'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart 4G EAST AMPUH -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'LOW', 'FAIR','HIGH'],
               ['LICENSE', <?php echo $ELLOW ;?> ,<?php echo $ELFAIR ;?> ,<?php echo $ELHIGH;?>],
               ['PRB' , <?php echo $EPLOW ;?>, <?php echo $EPFAIR ;?>, <?php echo $EPHIGH ;?>],
               ['Usage' , <?php echo $EUsageLOW ;?> ,<?php echo $EUsageFAIR ;?>, <?php echo $EUsageHIGH ;?>],
               ['USER' , <?php echo $EUSERLOW ;?> ,<?php echo $EUSERFAIR ;?>, <?php echo $EUSERHIGH ;?>]
            ]);

            var options = {
               title: ' EAST Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   1:{color:'Yellow'},
                   0:{color:'Green'},
                   2:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedEAST'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart 4G JABODETABEK AMPUH -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'LOW', 'FAIR','HIGH'],
               ['LICENSE', <?php echo $JLLOW ;?> ,<?php echo $JLFAIR ;?> ,<?php echo $JLHIGH;?>],
               ['PRB' , <?php echo $JPLOW ;?>, <?php echo $JPFAIR ;?>, <?php echo $JPHIGH ;?>],
               ['Usage' , <?php echo $JUsageLOW ;?> ,<?php echo $JUsageFAIR ;?>, <?php echo $JUsageHIGH ;?>],
               ['USER' , <?php echo $JUSERLOW ;?> ,<?php echo $JUSERFAIR ;?>, <?php echo $JUSERHIGH ;?>]
            ]);

            var options = {
               title: ' JABODETABEK Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   1:{color:'Yellow'},
                   0:{color:'Green'},
                   2:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedJABODETABEK'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart 4G NORTH AMPUH -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'LOW', 'FAIR','HIGH'],
               ['LICENSE', <?php echo $NLLOW ;?> ,<?php echo $NLFAIR ;?> ,<?php echo $NLHIGH;?>],
               ['PRB' , <?php echo $NPLOW ;?>, <?php echo $NPFAIR ;?>, <?php echo $NPHIGH ;?>],
               ['Usage' , <?php echo $NUsageLOW ;?> ,<?php echo $NUsageFAIR ;?>, <?php echo $NUsageHIGH ;?>],
               ['USER' , <?php echo $NUSERLOW ;?> ,<?php echo $NUSERFAIR ;?>, <?php echo $NUSERHIGH ;?>]
            ]);

            var options = {
               title: ' NORTH Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   1:{color:'Yellow'},
                   0:{color:'Green'},
                   2:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedNORTH'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart 4G WEST AMPUH -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'LOW', 'FAIR','HIGH'],
               ['LICENSE', <?php echo $WLLOW ;?> ,<?php echo $WLFAIR ;?> ,<?php echo $WLHIGH;?>],
               ['PRB' , <?php echo $WPLOW ;?>, <?php echo $WPFAIR ;?>, <?php echo $WPHIGH ;?>],
               ['Usage' , <?php echo $WUsageLOW ;?> ,<?php echo $WUsageFAIR ;?>, <?php echo $WUsageHIGH ;?>],
               ['USER' , <?php echo $WUSERLOW ;?> ,<?php echo $WUSERFAIR ;?>, <?php echo $WUSERHIGH ;?>]
            ]);

            var options = {
               title: ' WEST Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   1:{color:'Yellow'},
                   0:{color:'Green'},
                   2:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedWEST'));
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
	$getWeek = "SELECT TOP 1 [WEEK] FROM  [WebDashboard].[dbo].[4GAmpuhWeekly] order by [WEEK] desc";
	$ResultWeek = sqlsrv_query($conn, $getWeek, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$DataWeek	= sqlsrv_fetch_array($ResultWeek);
	$min1 = $DataWeek['WEEK'];
	//ambil data value untuk KPI CE Central
		$SqlNWL 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'Nationwide' AND ITEM='LICENSE' order by [WEEK] desc";
	$ResultNWL 	= sqlsrv_query($conn, $SqlNWL, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNWL	 	= sqlsrv_fetch_array($ResultNWL);
	$NWLLOW		= $GetNWL ['LOW'];
	$NWLFAIR	= $GetNWL ['FAIR'];
	$NWLHIGH 	= $GetNWL ['HIGH'];
	
	//Ambil data value untuk ITEM PRB NATIONWIDE
	$SqlNWP 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'Nationwide' AND ITEM='PRB' order by [WEEK] desc";
	$ResultNWP 	= sqlsrv_query($conn, $SqlNWP, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNWP	 	= sqlsrv_fetch_array($ResultNWP);
	$NWPLOW		= $GetNWP ['LOW'];
	$NWPFAIR	= $GetNWP ['FAIR'];
	$NWPHIGH 	= $GetNWP ['HIGH'];
	
	//Ambil data value untuk ITEM Usage NATIONWIDE
	$SqlNWUsage	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'Nationwide' AND ITEM='Usage' order by [WEEK] desc";
	$ResultNWUsage	= sqlsrv_query($conn, $SqlNWUsage, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNWUsage	 	= sqlsrv_fetch_array($ResultNWUsage);
	$NWUsageLOW		= $GetNWUsage ['LOW'];
	$NWUsageFAIR	= $GetNWUsage ['FAIR'];
	$NWUsageHIGH 	= $GetNWUsage ['HIGH'];	
	
	//Ambil data value untuk ITEM USER CENTRAL
	$SqlNWUSER 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'Nationwide' AND ITEM='USER' order by [WEEK] desc";
	$ResultNWUSER 	= sqlsrv_query($conn, $SqlNWUSER, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNWUSER	 	= sqlsrv_fetch_array($ResultNWUSER);
	$NWUSERLOW		= $GetNWUSER ['LOW'];
	$NWUSERFAIR	 	= $GetNWUSER ['FAIR'];
	$NWUSERHIGH 	= $GetNWUSER ['HIGH'];
	
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//ambil data value untuk ITEM LICENSE CENTRAL
	$SqlCL 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'CENTRAL' AND ITEM='LICENSE' order by [WEEK] desc";
	$ResultCL 	= sqlsrv_query($conn, $SqlCL, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCL	 	= sqlsrv_fetch_array($ResultCL);
	$CLLOW		= $GetCL ['LOW'];
	$CLFAIR	 	= $GetCL ['FAIR'];
	$CLHIGH 	= $GetCL ['HIGH'];
	
	//Ambil data value untuk ITEM PRB CENTRAL
	$SqlCP 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'CENTRAL' AND ITEM='PRB' order by [WEEK] desc ";
	$ResultCP 	= sqlsrv_query($conn, $SqlCP, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCP	 	= sqlsrv_fetch_array($ResultCP);
	$CPLOW		= $GetCP ['LOW'];
	$CPFAIR	 	= $GetCP ['FAIR'];
	$CPHIGH 	= $GetCP ['HIGH'];
	
	//Ambil data value untuk ITEM Usage CENTRAL
	$SqlCUsage 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'CENTRAL' AND ITEM='Usage' order by [WEEK]desc ";
	$ResultCUsage 	= sqlsrv_query($conn, $SqlCUsage, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCUsage	 	= sqlsrv_fetch_array($ResultCUsage);
	$CUsageLOW		= $GetCUsage ['LOW'];
	$CUsageFAIR	 	= $GetCUsage ['FAIR'];
	$CUsageHIGH 	= $GetCUsage ['HIGH'];	
	
	//Ambil data value untuk ITEM USER CENTRAL
	$SqlCUSER 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'CENTRAL' AND ITEM='USER' order by [WEEK] desc";
	$ResultCUSER 	= sqlsrv_query($conn, $SqlCUSER, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetCUSER	 	= sqlsrv_fetch_array($ResultCUSER);
	$CUSERLOW		= $GetCUSER ['LOW'];
	$CUSERFAIR	 	= $GetCUSER ['FAIR'];
	$CUSERHIGH 		= $GetCUSER ['HIGH'];
	
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//ambil data value untuk ITEM LICENSE EAST
	$SqlEL 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'EAST' AND ITEM='LICENSE' order by [WEEK] desc ";
	$ResultEL 	= sqlsrv_query($conn, $SqlEL, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetEL	 	= sqlsrv_fetch_array($ResultEL);
	$ELLOW		= $GetEL ['LOW'];
	$ELFAIR	 	= $GetEL ['FAIR'];
	$ELHIGH 	= $GetEL ['HIGH'];
	
	//Ambil data value untuk ITEM PRB EAST
	$SqlEP 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'EAST' AND ITEM='PRB'  order by [WEEK] desc ";
	$ResultEP 	= sqlsrv_query($conn, $SqlEP, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetEP	 	= sqlsrv_fetch_array($ResultEP);
	$EPLOW		= $GetEP ['LOW'];
	$EPFAIR	 	= $GetEP ['FAIR'];
	$EPHIGH 	= $GetEP ['HIGH'];
	
	//Ambil data value untuk ITEM Usage EAST
	$SqlEUsage 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'EAST' AND ITEM='Usage' order by [WEEK] desc ";
	$ResultEUsage 	= sqlsrv_query($conn, $SqlEUsage, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetEUsage	 	= sqlsrv_fetch_array($ResultEUsage);
	$EUsageLOW		= $GetEUsage ['LOW'];
	$EUsageFAIR	 	= $GetEUsage ['FAIR'];
	$EUsageHIGH 	= $GetEUsage ['HIGH'];	
	
	//Ambil data value untuk ITEM USER EAST
	$SqlEUSER 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'EAST' AND ITEM='USER' order by [WEEK] desc ";
	$ResultEUSER 	= sqlsrv_query($conn, $SqlEUSER, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetEUSER	 	= sqlsrv_fetch_array($ResultEUSER);
	$EUSERLOW		= $GetEUSER ['LOW'];
	$EUSERFAIR	 	= $GetEUSER ['FAIR'];
	$EUSERHIGH 		= $GetEUSER ['HIGH'];
	
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//ambil data value untuk ITEM LICENSE JABODETABEK
	$SqlJL 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'JABODETABEK' AND ITEM='LICENSE' order by [WEEK] desc ";
	$ResultJL 	= sqlsrv_query($conn, $SqlJL, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetJL	 	= sqlsrv_fetch_array($ResultJL);
	$JLLOW		= $GetJL ['LOW'];
	$JLFAIR	 	= $GetJL ['FAIR'];
	$JLHIGH 	= $GetJL ['HIGH'];
	
	//Ambil data value untuk ITEM PRB JABODETABEK
	$SqlJP 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'JABODETABEK' AND ITEM='PRB' order by [WEEK] desc ";
	$ResultJP 	= sqlsrv_query($conn, $SqlJP, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetJP	 	= sqlsrv_fetch_array($ResultJP);
	$JPLOW		= $GetJP ['LOW'];
	$JPFAIR	 	= $GetJP ['FAIR'];
	$JPHIGH 	= $GetJP ['HIGH'];
	
	//Ambil data value untuk ITEM Usage JABODETABEK
	$SqlJUsage 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'JABODETABEK' AND ITEM='Usage' order by [WEEK] desc ";
	$ResultJUsage 	= sqlsrv_query($conn, $SqlJUsage, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetJUsage	 	= sqlsrv_fetch_array($ResultJUsage);
	$JUsageLOW		= $GetJUsage ['LOW'];
	$JUsageFAIR	 	= $GetJUsage ['FAIR'];
	$JUsageHIGH 	= $GetJUsage ['HIGH'];	
	
	//Ambil data value untuk ITEM USER JABODETABEK
	$SqlJUSER 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'JABODETABEK' AND ITEM='USER' order by [WEEK] desc";
	$ResultJUSER 	= sqlsrv_query($conn, $SqlJUSER, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetJUSER	 	= sqlsrv_fetch_array($ResultJUSER);
	$JUSERLOW		= $GetJUSER ['LOW'];
	$JUSERFAIR	 	= $GetJUSER ['FAIR'];
	$JUSERHIGH 		= $GetJUSER ['HIGH'];
	
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//ambil data value untuk ITEM LICENSE NORTH
	$SqlNL 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'NORTH' AND ITEM='LICENSE' order by [WEEK] desc ";
	$ResultNL 	= sqlsrv_query($conn, $SqlNL, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNL	 	= sqlsrv_fetch_array($ResultNL);
	$NLLOW		= $GetNL ['LOW'];
	$NLFAIR	 	= $GetNL ['FAIR'];
	$NLHIGH 	= $GetNL ['HIGH'];
	
	//Ambil data value untuk ITEM PRB NORTH
	$SqlNP 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'NORTH' AND ITEM='PRB' order by [WEEK] desc ";
	$ResultNP 	= sqlsrv_query($conn, $SqlNP, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNP	 	= sqlsrv_fetch_array($ResultNP);
	$NPLOW		= $GetNP ['LOW'];
	$NPFAIR	 	= $GetNP ['FAIR'];
	$NPHIGH 	= $GetNP ['HIGH'];
	
//Ambil data value untuk ITEM Usage NORTH
	$SqlNUsage 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'NORTH' AND ITEM='Usage' order by [WEEK] desc ";
	$ResultNUsage 	= sqlsrv_query($conn, $SqlNUsage, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNUsage	 	= sqlsrv_fetch_array($ResultNUsage);
	$NUsageLOW		= $GetNUsage ['LOW'];
	$NUsageFAIR	 	= $GetNUsage ['FAIR'];
	$NUsageHIGH 	= $GetNUsage ['HIGH'];	
	
	//Ambil data value untuk ITEM USER NORTH
	$SqlNUSER 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'NORTH' AND ITEM='USER' order by [WEEK] desc";
	$ResultNUSER 	= sqlsrv_query($conn, $SqlNUSER, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetNUSER	 	= sqlsrv_fetch_array($ResultNUSER);
	$NUSERLOW		= $GetNUSER ['LOW'];
	$NUSERFAIR	 	= $GetNUSER ['FAIR'];
	$NUSERHIGH 		= $GetNUSER ['HIGH'];
	
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
//ambil data value untuk ITEM LICENSE WEST
	$SqlWL 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'WEST' AND ITEM='LICENSE' order by [WEEK] desc ";
	$ResultWL 	= sqlsrv_query($conn, $SqlWL, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetWL	 	= sqlsrv_fetch_array($ResultWL);
	$WLLOW		= $GetWL ['LOW'];
	$WLFAIR	 	= $GetWL ['FAIR'];
	$WLHIGH 	= $GetWL ['HIGH'];
	
	//Ambil data value untuk ITEM PRB WEST
	$SqlWP 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'WEST' AND ITEM='PRB' order by [WEEK] desc ";
	$ResultWP 	= sqlsrv_query($conn, $SqlWP, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetWP	 	= sqlsrv_fetch_array($ResultWP);
	$WPLOW		= $GetWP ['LOW'];
	$WPFAIR	 	= $GetWP ['FAIR'];
	$WPHIGH 	= $GetWP ['HIGH'];
	
//Ambil data value untuk ITEM Usage WEST
	$SqlWUsage 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'WEST' AND ITEM='Usage' order by [WEEK] desc ";
	$ResultWUsage 	= sqlsrv_query($conn, $SqlWUsage, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetWUsage	 	= sqlsrv_fetch_array($ResultWUsage);
	$WUsageLOW		= $GetWUsage ['LOW'];
	$WUsageFAIR	 	= $GetWUsage ['FAIR'];
	$WUsageHIGH 	= $GetWUsage ['HIGH'];	
	
	//Ambil data value untuk ITEM USER WEST
	$SqlWUSER 	= "SELECT TOP 1 [WEEK]
					,[REGION_5]
					,[ITEM]
					,[DETAIL MONITORING] as DetMon
					,[Measurement Type] as MeaTyp
					,[Total (#)] as Total
					,[LOW]
					,[FAIR]
					,[HIGH]
					FROM [WebDashboard].[dbo].[4GAmpuhWeekly]
					WHERE REGION_5 = 'WEST' AND ITEM='USER' order by [WEEK] desc ";
	$ResultWUSER 	= sqlsrv_query($conn, $SqlWUSER, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$GetWUSER	 	= sqlsrv_fetch_array($ResultWUSER);
	$WUSERLOW		= $GetWUSER ['LOW'];
	$WUSERFAIR	 	= $GetWUSER ['FAIR'];
	$WUSERHIGH 		= $GetWUSER ['HIGH'];

?>
<!-- Chart Central -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'LOW', 'FAIR','HIGH'],
               ['LICENSE', <?php echo $NWLLOW ;?> ,<?php echo$NWLFAIR ;?> ,<?php echo $NWLHIGH ;?>],
               ['PRB' , <?php echo $NWPLOW ;?>, <?php echo $NWPFAIR ;?>, <?php echo $NWPHIGH ;?>],
               ['Usage' , <?php echo $NWUsageLOW ;?> ,<?php echo $NWUsageFAIR ;?>, <?php echo $NWUsageHIGH ;?>],
               ['USER' , <?php echo $NWUSERLOW ;?> ,<?php echo $NWUSERFAIR ;?>, <?php echo $NWUSERHIGH ;?>]
            ]);

            var options = {
               title: ' NATIONWIDE Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   1:{color:'Yellow'},
                   0:{color:'Green'},
                   2:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedNATIONWIDE'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart 4G CENTRAL AMPUH -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'LOW', 'FAIR','HIGH'],
               ['LICENSE', <?php echo $CLLOW ;?> ,<?php echo $CLFAIR ;?> ,<?php echo $CLHIGH ;?>],
               ['PRB' , <?php echo $CPLOW ;?>, <?php echo $CPFAIR ;?>, <?php echo $CPHIGH ;?>],
               ['Usage' , <?php echo $CUsageLOW ;?> ,<?php echo $CUsageFAIR ;?>, <?php echo $CUsageHIGH ;?>],
               ['USER' , <?php echo $CUSERLOW ;?> ,<?php echo $CUSERFAIR ;?>, <?php echo $CUSERHIGH ;?>]
            ]);

            var options = {
               title: ' CENTRAL Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   1:{color:'Yellow'},
                   0:{color:'Green'},
                   2:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedCENTRAL'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart 4G EAST AMPUH -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'LOW', 'FAIR','HIGH'],
               ['LICENSE', <?php echo $ELLOW ;?> ,<?php echo $ELFAIR ;?> ,<?php echo $ELHIGH;?>],
               ['PRB' , <?php echo $EPLOW ;?>, <?php echo $EPFAIR ;?>, <?php echo $EPHIGH ;?>],
               ['Usage' , <?php echo $EUsageLOW ;?> ,<?php echo $EUsageFAIR ;?>, <?php echo $EUsageHIGH ;?>],
               ['USER' , <?php echo $EUSERLOW ;?> ,<?php echo $EUSERFAIR ;?>, <?php echo $EUSERHIGH ;?>]
            ]);

            var options = {
               title: ' EAST Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   1:{color:'Yellow'},
                   0:{color:'Green'},
                   2:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedEAST'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart 4G JABODETABEK AMPUH -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'LOW', 'FAIR','HIGH'],
               ['LICENSE', <?php echo $JLLOW ;?> ,<?php echo $JLFAIR ;?> ,<?php echo $JLHIGH;?>],
               ['PRB' , <?php echo $JPLOW ;?>, <?php echo $JPFAIR ;?>, <?php echo $JPHIGH ;?>],
               ['Usage' , <?php echo $JUsageLOW ;?> ,<?php echo $JUsageFAIR ;?>, <?php echo $JUsageHIGH ;?>],
               ['USER' , <?php echo $JUSERLOW ;?> ,<?php echo $JUSERFAIR ;?>, <?php echo $JUSERHIGH ;?>]
            ]);

            var options = {
               title: ' JABODETABEK Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   1:{color:'Yellow'},
                   0:{color:'Green'},
                   2:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedJABODETABEK'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart 4G NORTH AMPUH -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'LOW', 'FAIR','HIGH'],
               ['LICENSE', <?php echo $NLLOW ;?> ,<?php echo $NLFAIR ;?> ,<?php echo $NLHIGH;?>],
               ['PRB' , <?php echo $NPLOW ;?>, <?php echo $NPFAIR ;?>, <?php echo $NPHIGH ;?>],
               ['Usage' , <?php echo $NUsageLOW ;?> ,<?php echo $NUsageFAIR ;?>, <?php echo $NUsageHIGH ;?>],
               ['USER' , <?php echo $NUSERLOW ;?> ,<?php echo $NUSERFAIR ;?>, <?php echo $NUSERHIGH ;?>]
            ]);

            var options = {
               title: ' NORTH Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   1:{color:'Yellow'},
                   0:{color:'Green'},
                   2:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedNORTH'));
            chart.draw(data, options);
         }
        google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart 4G WEST AMPUH -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['ITEM', 'LOW', 'FAIR','HIGH'],
               ['LICENSE', <?php echo $WLLOW ;?> ,<?php echo $WLFAIR ;?> ,<?php echo $WLHIGH;?>],
               ['PRB' , <?php echo $WPLOW ;?>, <?php echo $WPFAIR ;?>, <?php echo $WPHIGH ;?>],
               ['Usage' , <?php echo $WUsageLOW ;?> ,<?php echo $WUsageFAIR ;?>, <?php echo $WUsageHIGH ;?>],
               ['USER' , <?php echo $WUSERLOW ;?> ,<?php echo $WUSERFAIR ;?>, <?php echo $WUSERHIGH ;?>]
            ]);

            var options = {
               title: ' WEST Weekly <?php echo $min1 ;?>',
               isStacked:'percent', 
				chartArea:{width:"230",height:"50%"},
				legend: {position: 'top', maxline:2},
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   1:{color:'Yellow'},
                   0:{color:'Green'},
                   2:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stackedWEST'));
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
							  FROM [WebDashboard].[dbo].[4GAmpuhDaily] where [Resource]='TotalPayloadGb' and [DateId] between '$Tanggal14haritrakhir' and '$HMIN1'
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
          trigger: 'selection'
			}
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_payload'));

        chart.draw(data, options);
		chart.setSelection([{row: 6, column: 2}]);
      }

		</script>
<?php
include 'footer.php';
?>