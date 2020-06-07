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
	<div class="page-title">
		<div class="title_left">
			<h3>4G Transport</h3>
		</div>
	</div>
	
	<div class="col-md-12">
                  <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Untuk proses tampil data dibutuhkan waktu beberapa menit dikarenakan jumlah data yang tidak sedikit</strong>
                  </div>
                  
            </div>
	<div class="x_panel">
		<div class="x_content">
			<div class="row">
			<form method="POST" action="" >
				<div class="col-md-3">
					<fieldset>
                        <div class="control-group">
                            <div class="controls">
								<div class="col-md-12 xdisplay_inputx form-group has-feedback">
									<input type="text" class="form-control has-feedback-left" id="single_cal1" name="awal" placeholder="Select Date" aria-describedby="inputSuccess2Status">
									<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
									<span id="inputSuccess2Status" class="sr-only">(success)</span>
								</div>
                            </div>
                        </div>
                    </fieldset>
                </div>
				<div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12">
						<select class='form-control' id="value" name="value" >
			            <option value="1">SCTP Packet Loss</option>
			            <option value="2">IuBPacketLoss</option>
			            <option value="3">IuBPacketRejection</option>
			            <option value="4">IuBJitter</option>
			            <option value="5">IuBDelay</option>
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
		<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>4G Transport </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php				
							  if(isset($_POST['awal'])) {
							  $day = $_POST['awal'];
							  $now = strtotime($day);
							  $day1 = date('Ymd', strtotime('+ 0 day',$now));
							  $day2 = date('Ymd', strtotime('+ 1 day',$now));
							  $day3 = date('Ymd', strtotime('+ 2 day',$now));
							  $day4 = date('Ymd', strtotime('+ 3 day',$now));
							  $day5 = date('Ymd', strtotime('+ 4 day',$now));
							  $day6 = date('Ymd', strtotime('+ 5 day',$now));
							  $day7 = date('Ymd', strtotime('+ 6 day',$now));
							  $value = $_POST['value'];
							  //------------------------------------- START SCTP -------------------------------
							  if ($value == 1)
							  {
								$day = $_POST['awal'];
								$now = strtotime($day);
								$day1 = date('Ymd', strtotime('+ 0 day',$now));
								$day2 = date('Ymd', strtotime('+ 1 day',$now));
								$day3 = date('Ymd', strtotime('+ 2 day',$now));
								$day4 = date('Ymd', strtotime('+ 3 day',$now));
								$day5 = date('Ymd', strtotime('+ 4 day',$now));
								$day6 = date('Ymd', strtotime('+ 5 day',$now));
								$day7 = date('Ymd', strtotime('+ 6 day',$now));
								$sqlSctp =  "
											SELECT   [SiteId]
													,[System]
													,[Region]
													,[NodebName]
													,[Cluster56]
													,convert(varchar(20),  [$day1],112) AS LDAY1
													,convert(varchar(20),  [$day2],112) AS LDAY2
													,convert(varchar(20),  [$day3],112) AS LDAY3
													,convert(varchar(20),  [$day4],112) AS LDAY4
													,convert(varchar(20),  [$day5],112) AS LDAY5
													,convert(varchar(20),  [$day6],112) AS LDAY6
													,convert(varchar(20),  [$day7],112) AS LDAY7
												FROM (SELECT [SiteId],[System],[Region],[NodebName],[Cluster56],[DateId],[SctpRetransmission]
												FROM [10.17.6.69].[MTransmisi].[dbo].[VMSctpEriLTE]
												WHERE [SiteId] is not null AND [Region] is not null AND [NodebName] is not null AND [Cluster56] is not null

											) AS A
																					 
											PIVOT
																					 
											(SUM([SctpRetransmission]) FOR [DateId] IN ([$day1],[$day2],[$day3],[$day4],[$day5],[$day6],[$day7])) AS B
											ORDER BY [SiteId]";
								//$SHOWSctp = sqlsrv_query($conn,$sqlSctp, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								clearstatcache();

								$date1 = $_GET['date'];
								echo '
									<table id="datatable-buttons" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th rowspan="2"><center>SiteId</center></th>
											<th rowspan="2"><center>System</center></th>
											<th rowspan="2"><center>Region</center></th>
											<th rowspan="2"><center>NodebName</center></th>
											<th rowspan="2"><center>Cluster56</center></th>
											<th colspan="7"><center>SCTP Packet Loss (>4%) ( Ericsson )</center></th>
										</tr>
										';
								echo '<tr>
									<th><center>'.$day1.'</center></th>
									<th><center>'.$day2.'</center></th>
									<th><center>'.$day3.'</center></th>
									<th><center>'.$day4.'</center></th>
									<th><center>'.$day5.'</center></th>
									<th><center>'.$day6.'</center></th>
									<th><center>'.$day7.'</center></th>
								</tr>
								</thead> ';
								/* $tsqlSCTP = "SELECT DISTINCT  [SiteId]
													,[System]
													,[Region]
													,[NodebName]
													,[Cluster56]
										,ISNULL ([LDAY1],0)LDAY1
										,ISNULL ([LDAY2],0)LDAY2
										,ISNULL ([LDAY3],0)LDAY3
										,ISNULL ([LDAY4],0)LDAY4
										,ISNULL ([LDAY5],0)LDAY5
										,ISNULL ([LDAY6],0)LDAY6
										,ISNULL ([LDAY7],0)LDAY7
								FROM [WebDashboard].[dbo].[4GTRANSPORTSCTP]
								WHERE [Cluster56] is not null AND [System] is not null AND [Region] is not null AND [SiteId] is not null
								order by [SiteId]"; */
								$resultSCTP = sqlsrv_query($conn, $sqlSctp, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
															
									while($dataSCTP = sqlsrv_fetch_array($resultSCTP))
									  { // Ambil semua data dari hasil eksekusi $sql
									  echo '
										<tr>
										  <td align="center">'.$dataSCTP['SiteId'].'</td>
										  <td align="center">'.$dataSCTP['System'].'	</td>
										  <td align="center">'.$dataSCTP['Region'].'</td>
										  <td align="center">'.$dataSCTP['NodebName'].'</td>
										  <td align="center">'.$dataSCTP['Cluster56'].'</td>
										  <td align="center">'.$dataSCTP['LDAY1'].'</td>
										  <td align="center">'.$dataSCTP['LDAY2'].'</td>
										  <td align="center">'.$dataSCTP['LDAY3'].'</td>
										  <td align="center">'.$dataSCTP['LDAY4'].'</td>
										  <td align="center">'.$dataSCTP['LDAY5'].'</td>
										  <td align="center">'.$dataSCTP['LDAY6'].'</td>
										  <td align="center">'.$dataSCTP['LDAY7'].'</td>
									  </tr>'
									  ;
									}
								echo '</table>';		
								
							  }//--------------------------------------------END SCTP------------------------------
							  //----------------------------------START SETUP -------------------------------------
								else if ($value == 2 )
							  {
								$day = $_POST['awal'];
								$now = strtotime($day);
								$day1 = date('Ymd', strtotime('+ 0 day',$now));
								$day2 = date('Ymd', strtotime('+ 1 day',$now));
								$day3 = date('Ymd', strtotime('+ 2 day',$now));
								$day4 = date('Ymd', strtotime('+ 3 day',$now));
								$day5 = date('Ymd', strtotime('+ 4 day',$now));
								$day6 = date('Ymd', strtotime('+ 5 day',$now));
								$day7 = date('Ymd', strtotime('+ 6 day',$now));
								$sqlSetup = "
										SELECT   [SiteId]
												,[SiteName]
												,[System]
												,[RegionSev] as [Region]
												,[Cluster56]
												,convert(varchar(20),  [$day1],112) AS LDAY1
												,convert(varchar(20),  [$day2],112) AS LDAY2
												,convert(varchar(20),  [$day3],112) AS LDAY3
												,convert(varchar(20),  [$day4],112) AS LDAY4
												,convert(varchar(20),  [$day5],112) AS LDAY5
												,convert(varchar(20),  [$day6],112) AS LDAY6
												,convert(varchar(20),  [$day7],112) AS LDAY7
											FROM (SELECT [SiteId], [DateId],[SiteName],[System],[RegionSev],[Cluster56],[ErabFailEstTnl]
											FROM [10.17.6.69].[MTransmisi].[dbo].[VMTnlLtePerfDay]
											WHERE [SiteId] is not null AND [RegionSev] is not null AND [SiteName] is not null AND [Cluster56] is not null

										) AS A
																				 
										PIVOT
																				 
										(SUM([ErabFailEstTnl]) FOR [DateId] IN ([$day1],[$day2],[$day3],[$day4],[$day5],[$day6],[$day7])) AS B
										ORDER BY [SiteId]";
								//$SHOWSetup = sqlsrv_query($conn,$sqlSetup, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								clearstatcache();

								$date1 = $_GET['date'];
								echo '
									<table id="datatable-buttons" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th rowspan="2"><center>SiteId</center></th>
											<th rowspan="2"><center>System</center></th>
											<th rowspan="2"><center>Region</center></th>
											<th rowspan="2"><center>SiteName</center></th>
											<th rowspan="2"><center>Cluster56</center></th>
											<th colspan="7"><center>TNL-Setup (>1000)(H/E/N)</center></th>
										</tr>
										';
								echo '<tr>
									<th><center>'.$day1.'</center></th>
									<th><center>'.$day2.'</center></th>
									<th><center>'.$day3.'</center></th>
									<th><center>'.$day4.'</center></th>
									<th><center>'.$day5.'</center></th>
									<th><center>'.$day6.'</center></th>
									<th><center>'.$day7.'</center></th>
								</tr>
								</thead> ';	

										
								/* $tsqlSetup = "SELECT DISTINCT  [SiteId]
												,[SiteName]
												,[System]
												,[Region]
												,[Cluster56]
										,ISNULL ([LDAY1],0)LDAY1
										,ISNULL ([LDAY2],0)LDAY2
										,ISNULL ([LDAY3],0)LDAY3
										,ISNULL ([LDAY4],0)LDAY4
										,ISNULL ([LDAY5],0)LDAY5
										,ISNULL ([LDAY6],0)LDAY6
										,ISNULL ([LDAY7],0)LDAY7
								FROM [WebDashboard].[dbo].[4GTRANSPORTSETUP]
								WHERE [Cluster56] is not null AND [System] is not null AND [Region] is not null AND [SiteId] is not null
								order by [SiteId]"; */
								$resultSetup = sqlsrv_query($conn, $sqlSetup, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
															
									while($dataSetup = sqlsrv_fetch_array($resultSetup))
									  { // Ambil semua data dari hasil eksekusi $sql
									  echo '
										<tr>
										  <td align="center">'.$dataSetup['SiteId'].'</td>
										  <td align="center">'.$dataSetup['System'].'	</td>
										  <td align="center">'.$dataSetup['Region'].'</td>
										  <td align="center">'.$dataSetup['SiteName'].'</td>
										  <td align="center">'.$dataSetup['Cluster56'].'</td>
										  <td align="center">'.$dataSetup['LDAY1'].'</td>
										  <td align="center">'.$dataSetup['LDAY2'].'</td>
										  <td align="center">'.$dataSetup['LDAY3'].'</td>
										  <td align="center">'.$dataSetup['LDAY4'].'</td>
										  <td align="center">'.$dataSetup['LDAY5'].'</td>
										  <td align="center">'.$dataSetup['LDAY6'].'</td>
										  <td align="center">'.$dataSetup['LDAY7'].'</td>
									  </tr>'
									  ;
									}
								echo '</table>';		
								
							  }//--------------------------------------------END SCTP------------------------------
								//-----------------------------------------START DROP------------------------------
							  else if ($value == 3)
							  {
								$day = $_POST['awal'];
								$now = strtotime($day);
								$day1 = date('Ymd', strtotime('+ 0 day',$now));
								$day2 = date('Ymd', strtotime('+ 1 day',$now));
								$day3 = date('Ymd', strtotime('+ 2 day',$now));
								$day4 = date('Ymd', strtotime('+ 3 day',$now));
								$day5 = date('Ymd', strtotime('+ 4 day',$now));
								$day6 = date('Ymd', strtotime('+ 5 day',$now));
								$day7 = date('Ymd', strtotime('+ 6 day',$now));
								$sqlDrop =" 
										SELECT  [SiteId]
												,[SiteName]
												,[System]
												,[RegionSev] as [Region]
												,[Cluster56]
												,convert(varchar(20),  [$day1],112) AS LDAY1
												,convert(varchar(20),  [$day2],112) AS LDAY2
												,convert(varchar(20),  [$day3],112) AS LDAY3
												,convert(varchar(20),  [$day4],112) AS LDAY4
												,convert(varchar(20),  [$day5],112) AS LDAY5
												,convert(varchar(20),  [$day6],112) AS LDAY6
												,convert(varchar(20),  [$day7],112) AS LDAY7
											FROM (SELECT [SiteId],[SiteName],[System],[RegionSev],[Cluster56], [DateId],[PmErabRelAbnormalEnbActTnFail]
											FROM [10.17.6.69].[MTransmisi].[dbo].[VMTnlLtePerfDay]
											WHERE [SiteId] is not null AND [Region] is not null AND [SiteName] is not null AND [Cluster56] is not null

										) AS A
																				 
										PIVOT
																				 
										(SUM([PmErabRelAbnormalEnbActTnFail]) FOR [DateId] IN ([$day1],[$day2],[$day3],[$day4],[$day5],[$day6],[$day7])) AS B
										ORDER BY [SiteId]";
								//$SHOWDrop = sqlsrv_query($conn,$sqlDrop, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								clearstatcache();

								$date1 = $_GET['date'];
								echo '
									<table id="datatable-buttons" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th rowspan="2"><center>SiteId</center></th>
											<th rowspan="2"><center>System</center></th>
											<th rowspan="2"><center>Region</center></th>
											<th rowspan="2"><center>SiteName</center></th>
											<th rowspan="2"><center>Cluster56</center></th>
											<th colspan="7"><center>TNL-DROP (>1000)(H/E/N)</center></th>
										</tr>
										';
								echo '<tr>
									<th><center>'.$day1.'</center></th>
									<th><center>'.$day2.'</center></th>
									<th><center>'.$day3.'</center></th>
									<th><center>'.$day4.'</center></th>
									<th><center>'.$day5.'</center></th>
									<th><center>'.$day6.'</center></th>
									<th><center>'.$day7.'</center></th>
								</tr>
								</thead> ';	

								/* $tsqlDrop = "SELECT DISTINCT  [SiteId]
												,[SiteName]
												,[System]
												,[Region]
												,[Cluster56]
										,ISNULL ([LDAY1],0)LDAY1
										,ISNULL ([LDAY2],0)LDAY2
										,ISNULL ([LDAY3],0)LDAY3
										,ISNULL ([LDAY4],0)LDAY4
										,ISNULL ([LDAY5],0)LDAY5
										,ISNULL ([LDAY6],0)LDAY6
										,ISNULL ([LDAY7],0)LDAY7
								FROM [WebDashboard].[dbo].[4GTRANSPORTDROP]
								WHERE [Cluster56] is not null AND [System] is not null AND [Region] is not null AND [SiteId] is not null
								order by [SiteId]"; */
								$resultDrop = sqlsrv_query($conn, $sqlDrop, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
															
									while($dataDrop = sqlsrv_fetch_array($resultDrop))
									  { // Ambil semua data dari hasil eksekusi $sql
									  echo '
										<tr>
										  <td align="center">'.$dataDrop['SiteId'].'</td>
										  <td align="center">'.$dataDrop['System'].'	</td>
										  <td align="center">'.$dataDrop['Region'].'</td>
										  <td align="center">'.$dataDrop['SiteName'].'</td>
										  <td align="center">'.$dataDrop['Cluster56'].'</td>
										  <td align="center">'.$dataDrop['LDAY1'].'</td>
										  <td align="center">'.$dataDrop['LDAY2'].'</td>
										  <td align="center">'.$dataDrop['LDAY3'].'</td>
										  <td align="center">'.$dataDrop['LDAY4'].'</td>
										  <td align="center">'.$dataDrop['LDAY5'].'</td>
										  <td align="center">'.$dataDrop['LDAY6'].'</td>
										  <td align="center">'.$dataDrop['LDAY7'].'</td>
									  </tr>'
									  ;
									}
								echo '</table>';		
								
							  }//--------------------------------------------END DROP------------------------------
								 } else {
								  echo "";
							  }		
							  ?>
                  </div>
                </div>
         </div>

</div>
</div>
<?php
include 'footer.php';
?>