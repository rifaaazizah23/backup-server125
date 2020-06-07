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
			<h3>Transport IPPM  <small>3G Weekly</small></h3>
		</div>
	</div>
<!-- Menu Bar -->
	<div class="clearfix"></div>
		<div class="x_content">
			<div class="row">
				<form method="POST" action="">
					<div class="col-md-3">
						<fieldset>
							<select class="form-control" name="week">
								<option>-Select Week-</option>
									<?php
										$tsql = "SELECT Week FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] GROUP BY Week";
												
										$result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
																			
										while($data = sqlsrv_fetch_array($result))
											{
											echo "<option value=".$data[Week]."> Week ".$data[Week]."</option>";
											} 
									?>
							</select>
						</fieldset>
					</div>
					<div class="col-md-3">
						<button type="submit" class="btn btn-primary" name="submit">Tampil</button>
					</div>
				</form>	
			</div>
		</div>
		<div class="row">
            <div class="x_content">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
						<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Chart</a></li>
						<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Table</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
							<p>
									<div class="row">
										<div class="clearfix"></div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="x_panel">
													<div class="x_title">
														<h2><i class="fa fa-bars"></i> CENTRAL <?php $week = $_POST['week']; echo $week ; ?></h2>
															<ul class="nav navbar-right panel_toolbox">
																<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
															</ul>
														<div class="clearfix"></div>
													</div>
													<div class="x_content">
														<div id="1Central"></div>
													</div>
												</div>
											</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="x_panel">
												<div class="x_title">
													<h2><i class="fa fa-bars"></i> JABODETABEK <?php echo $week ; ?></h2>
														<ul class="nav navbar-right panel_toolbox">
															<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
														</ul>
														<div class="clearfix"></div>
												</div>
												<div class="x_content">
													<div id="2JABODETABEK"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="clearfix"></div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="x_panel">
													<div class="x_title">
														<h2><i class="fa fa-bars"></i> EAST <?php echo $week ; ?></h2>
														<ul class="nav navbar-right panel_toolbox">
															<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
														</ul>
														<div class="clearfix"></div>
													</div>
													<div class="x_content">
														<div id="3EAST"></div>
													</div>
												</div>
											</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="x_panel">
												<div class="x_title">
													<h2><i class="fa fa-bars"></i> WEST <?php echo $week ; ?></h2>
														<ul class="nav navbar-right panel_toolbox">
															<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
														</ul>
														<div class="clearfix"></div>
												</div>
												<div class="x_content">
													<div id="4WEST"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="clearfix"></div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="x_panel">
													<div class="x_title">
														<h2><i class="fa fa-bars"></i> NORTH <?php echo $week ; ?></h2>
														<ul class="nav navbar-right panel_toolbox">
															<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
														</ul>
														<div class="clearfix"></div>
													</div>
													<div class="x_content">
														<div id="5NORTH"></div>
													</div>
												</div>
											</div>
									</div>
							</p>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
							<p>
								<div class="x_panel">
									<div class="x_content">
										<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
											<thead>
												<tr>
													<th class="text-center">System</th>
													<th class="text-center">Week</th>
													<th class="text-center">SiteId</th>
													<th class="text-center">NodebName</th>
													<th class="text-center">NeName</th>
													<th class="text-center">Cluster</th>
													<th class="text-center">Cluster56</th>
													<th class="text-center">Cluster56Id</th>
													<th class="text-center">Rnc</th>
													<th class="text-center">Region</th>
													<th class="text-center">Ani</th>
													<th class="text-center">Loss</th>
													<th class="text-center">Delay</th>
													<th class="text-center">Rejection</th>
													<th class="text-center">Jitter</th>
													<th class="text-center">SctpRetransmission</th>
													<th class="text-center">Loss_Remark</th>
													<th class="text-center">Delay_Remark</th>
													<th class="text-center">Rejection_Remark</th>
													<th class="text-center">Jitter_Remark</th>
													<th class="text-center">SctpRetrans_Remark</th>
												</tr>
											</thead>
												<tbody>
													<?php
														$week	= $_POST['week'];
														$SQL	= "SELECT * FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week]='$week'";
														$result = sqlsrv_query($conn, $SQL, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
																	while($data = sqlsrv_fetch_array($result))
																		{
																			echo	'<tr>
																						<th class="text-center">'.$data['System'].'</th>
																						<th class="text-center">'.$data['Week'].'</th>
																						<th class="text-center">'.$data['SiteId'].'</th>
																						<th class="text-center">'.$data['NodebName'].'</th>
																						<th class="text-center">'.$data['NeName'].'</th>
																						<th class="text-center">'.$data['Cluster'].'</th>
																						<th class="text-center">'.$data['Cluster56'].'</th>
																						<th class="text-center">'.$data['Cluster56Id'].'</th>
																						<th class="text-center">'.$data['Rnc'].'</th>
																						<th class="text-center">'.$data['Region'].'</th>
																						<th class="text-center">'.$data['Ani'].'</th>
																						<th class="text-center">'.$data['Loss'].'</th>
																						<th class="text-center">'.$data['Delay'].'</th>
																						<th class="text-center">'.$data['Rejection'].'</th>
																						<th class="text-center">'.$data['Jitter'].'</th>
																						<th class="text-center">'.$data['SctpRetransmission'].'</th>
																						<th class="text-center">'.$data['Loss_Remark'].'</th>
																						<th class="text-center">'.$data['Delay_Remark'].'</th>
																						<th class="text-center">'.$data['Rejection_Remark'].'</th>
																						<th class="text-center">'.$data['Jitter_Remark'].'</th>
																						<th class="text-center">'.$data['SctpRetrans_Remark'].'</th>
																					</tr>'
																		;}
													?>
												</tbody>
										</table>
									</div>
								</div>
							</p>
						</div>
					</div>
                </div>
			</div>
       

</div>
<?php 
	
	// -------------------------Get Value For Chart Region CENTRAL-----------------------------
	// GET Loss_Remark OK
	$week = $_POST['week'];
	$Central_SQL_Loss_OK 	= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Loss_Remark] = 'OK' AND [Region] ='CENTRAL' ";
	$Central_result_Loss_OK = sqlsrv_query($conn, $Central_SQL_Loss_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Central_data_Loss_OK 	= sqlsrv_fetch_array($Central_result_Loss_OK);
	$Central_Loss_OK 		= $Central_data_Loss_OK['jumlah'];
	
	// GET Loss_Remark NOK
	
	$Central_SQL_Loss_NOT 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Loss_Remark] = 'NOK' AND [Region] ='CENTRAL' ";
	$Central_result_Loss_NOT 	= sqlsrv_query($conn, $Central_SQL_Loss_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Central_data_Loss_NOT 		= sqlsrv_fetch_array($Central_result_Loss_NOT);
	$Central_Loss_NOT 			= $Central_data_Loss_NOT['jumlah'];
	
	// GET [Delay_Remark] OK
	
	$Central_SQL_Delay_OK 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Delay_Remark] = 'OK' AND [Region] ='CENTRAL' ";
	$Central_result_Delay_OK 	= sqlsrv_query($conn, $Central_SQL_Delay_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Central_data_Delay_OK 		= sqlsrv_fetch_array($Central_result_Delay_OK);
	$Central_Delay_OK 			= $Central_data_Delay_OK['jumlah'];
	
	// GET Delay_Remark NOK
	
	$Central_SQL_Delay_NOT 		= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Delay_Remark] = 'NOK' AND [Region] ='CENTRAL' ";
	$Central_result_Delay_NOT 	= sqlsrv_query($conn, $Central_SQL_Delay_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Central_data_Delay_NOT 	= sqlsrv_fetch_array($Central_result_Delay_NOT);
	$Central_Delay_NOT 			= $Central_data_Delay_NOT['jumlah'];
			
	// GET [[Rejection_Remark]] OK
	
	$Central_SQL_Rejection_OK 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Rejection_Remark] = 'OK' AND [Region] ='CENTRAL' ";
	$Central_result_Rejection_OK 	= sqlsrv_query($conn, $Central_SQL_Rejection_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Central_data_Rejection_OK 		= sqlsrv_fetch_array($Central_result_Rejection_OK);
	$Central_Rejection_OK 			= $Central_data_Rejection_OK['jumlah'];
	
	// GET Rejection_Remark NOK
	
	$Central_SQL_Rejection_NOT 		= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Rejection_Remark] = 'NOK' AND [Region] ='CENTRAL' ";
	$Central_result_Rejection_NOT 	= sqlsrv_query($conn, $Central_SQL_Rejection_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Central_data_Rejection_NOT 	= sqlsrv_fetch_array($Central_result_Rejection_NOT);
	$Central_Rejection_NOT 			= $Central_data_Rejection_NOT['jumlah'];
	
	// GET [Jitter_Remark] OK
	
	$Central_SQL_Jitter_OK 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Jitter_Remark] = 'OK' AND [Region] ='CENTRAL' ";
	$Central_result_Jitter_OK 	= sqlsrv_query($conn, $Central_SQL_Jitter_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Central_data_Jitter_OK 	= sqlsrv_fetch_array($Central_result_Jitter_OK);
	$Central_Jitter_OK 			= $Central_data_Jitter_OK['jumlah'];
	
	// GET Jitter_Remark NOK
	
	$Central_SQL_Jitter_NOT 	= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Jitter_Remark] = 'NOK' AND [Region] ='CENTRAL' ";
	$Central_result_Jitter_NOT 	= sqlsrv_query($conn, $Central_SQL_Jitter_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Central_data_Jitter_NOT 	= sqlsrv_fetch_array($Central_result_Jitter_NOT);
	$Central_Jitter_NOT 		= $Central_data_Jitter_NOT['jumlah'];
	
	// GET [SctpRetrans_Remark] OK
	
	$Central_SQL_SctpRetrans_OK 	= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [SctpRetrans_Remark] = 'OK' AND [Region] ='CENTRAL' ";
	$Central_result_SctpRetrans_OK 	= sqlsrv_query($conn, $Central_SQL_SctpRetrans_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Central_data_SctpRetrans_OK 	= sqlsrv_fetch_array($Central_result_SctpRetrans_OK);
	$Central_SctpRetrans_OK 		= $Central_data_SctpRetrans_OK['jumlah'];
	
	// GET SctpRetrans_Remark NOK
	
	$Central_SQL_SctpRetrans_NOT 	= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [SctpRetrans_Remark] = 'NOK' AND [Region] ='CENTRAL' ";
	$Central_result_SctpRetrans_NOT = sqlsrv_query($conn, $Central_SQL_SctpRetrans_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Central_data_SctpRetrans_NOT 	= sqlsrv_fetch_array($Central_result_SctpRetrans_NOT);
	$Central_SctpRetrans_NOT 		= $Central_data_SctpRetrans_NOT['jumlah'];

	// -----------------------------Get Value For Chart Region JABO---------------------
	// GET Loss_Remark OK
	$Jabo_SQL_Loss_OK 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Loss_Remark] = 'OK' AND [Region] ='JABODETABEK' ";
	$Jabo_result_Loss_OK 	= sqlsrv_query($conn, $Jabo_SQL_Loss_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Jabo_data_Loss_OK 		= sqlsrv_fetch_array($Jabo_result_Loss_OK);
	$Jabo_Loss_OK 			= $Jabo_data_Loss_OK['jumlah'];
	
	// GET Loss_Remark NOK
	
	$Jabo_SQL_Loss_NOT 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Loss_Remark] = 'NOK' AND [Region] ='JABODETABEK' ";
	$Jabo_result_Loss_NOT 	= sqlsrv_query($conn, $Jabo_SQL_Loss_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Jabo_data_Loss_NOT 	= sqlsrv_fetch_array($Jabo_result_Loss_NOT);
	$Jabo_Loss_NOT 			= $Jabo_data_Loss_NOT['jumlah'];
	
	// GET [Delay_Remark] OK
	
	$Jabo_SQL_Delay_OK 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Delay_Remark] = 'OK' AND [Region] ='JABODETABEK' ";
	$Jabo_result_Delay_OK 	= sqlsrv_query($conn, $Jabo_SQL_Delay_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Jabo_data_Delay_OK 	= sqlsrv_fetch_array($Jabo_result_Delay_OK);
	$Jabo_Delay_OK 			= $Jabo_data_Delay_OK['jumlah'];
	
	// GET Delay_Remark NOK
	
	$Jabo_SQL_Delay_NOT 	= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Delay_Remark] = 'NOK' AND [Region] ='JABODETABEK' ";
	$Jabo_result_Delay_NOT 	= sqlsrv_query($conn, $Jabo_SQL_Delay_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Jabo_data_Delay_NOT 	= sqlsrv_fetch_array($Jabo_result_Delay_NOT);
	$Jabo_Delay_NOT 		= $Jabo_data_Delay_NOT['jumlah'];
			
	// GET [[Rejection_Remark]] OK
	
	$Jabo_SQL_Rejection_OK 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Rejection_Remark] = 'OK' AND [Region] ='JABODETABEK' ";
	$Jabo_result_Rejection_OK 	= sqlsrv_query($conn, $Jabo_SQL_Rejection_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Jabo_data_Rejection_OK 	= sqlsrv_fetch_array($Jabo_result_Rejection_OK);
	$Jabo_Rejection_OK 			= $Jabo_data_Rejection_OK['jumlah'];
	
	// GET Rejection_Remark NOK

	$Jabo_SQL_Rejection_NOT 	= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Rejection_Remark] = 'NOK' AND [Region] ='JABODETABEK' ";
	$Jabo_result_Rejection_NOT 	= sqlsrv_query($conn, $Jabo_SQL_Rejection_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Jabo_data_Rejection_NOT 	= sqlsrv_fetch_array($Jabo_result_Rejection_NOT);
	$Jabo_Rejection_NOT 		= $Jabo_data_Rejection_NOT['jumlah'];
	
	// GET [Jitter_Remark] OK
	
	$Jabo_SQL_Jitter_OK 	= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Jitter_Remark] = 'OK' AND [Region] ='JABODETABEK' ";
	$Jabo_result_Jitter_OK 	= sqlsrv_query($conn, $Jabo_SQL_Jitter_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Jabo_data_Jitter_OK 	= sqlsrv_fetch_array($Jabo_result_Jitter_OK);
	$Jabo_Jitter_OK 		= $Jabo_data_Jitter_OK['jumlah'];
	
	// GET Jitter_Remark NOK
	
	$Jabo_SQL_Jitter_NOT 	= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Jitter_Remark] = 'NOK' AND [Region] ='JABODETABEK' ";
	$Jabo_result_Jitter_NOT = sqlsrv_query($conn, $Jabo_SQL_Jitter_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Jabo_data_Jitter_NOT 	= sqlsrv_fetch_array($Jabo_result_Jitter_NOT);
	$Jabo_Jitter_NOT 		= $Jabo_data_Jitter_NOT['jumlah'];
	
	// GET [SctpRetrans_Remark] OK
	
	$Jabo_SQL_SctpRetrans_OK 	= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [SctpRetrans_Remark] = 'OK' AND [Region] ='JABODETABEK' ";
	$Jabo_result_SctpRetrans_OK = sqlsrv_query($conn, $Jabo_SQL_SctpRetrans_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Jabo_data_SctpRetrans_OK 	= sqlsrv_fetch_array($Jabo_result_SctpRetrans_OK);
	$Jabo_SctpRetrans_OK 		= $Jabo_data_SctpRetrans_OK['jumlah'];
	
	// GET SctpRetrans_Remark NOK
	
	$Jabo_SQL_SctpRetrans_NOT 		= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [SctpRetrans_Remark] = 'NOK' AND [Region] ='JABODETABEK' ";
	$Jabo_result_SctpRetrans_NOT 	= sqlsrv_query($conn, $Jabo_SQL_SctpRetrans_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Jabo_data_SctpRetrans_NOT 		= sqlsrv_fetch_array($Jabo_result_SctpRetrans_NOT);
	$Jabo_SctpRetrans_NOT 			= $Jabo_data_SctpRetrans_NOT['jumlah'];
	
	// -----------------------------Get Value For Chart Region EAST---------------------
	// GET Loss_Remark OK
	$East_SQL_Loss_OK 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Loss_Remark] = 'OK' AND [Region] ='EAST' ";
	$East_result_Loss_OK 	= sqlsrv_query($conn, $East_SQL_Loss_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$East_data_Loss_OK 		= sqlsrv_fetch_array($East_result_Loss_OK);
	$East_Loss_OK 			= $East_data_Loss_OK['jumlah'];
	
	// GET Loss_Remark NOK
	
	$East_SQL_Loss_NOT 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Loss_Remark] = 'NOK' AND [Region] ='EAST' ";
	$East_result_Loss_NOT 	= sqlsrv_query($conn, $East_SQL_Loss_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$East_data_Loss_NOT 	= sqlsrv_fetch_array($East_result_Loss_NOT);
	$East_Loss_NOT 			= $East_data_Loss_NOT['jumlah'];
	
	// GET [Delay_Remark] OK
	
	$East_SQL_Delay_OK 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Delay_Remark] = 'OK' AND [Region] ='EAST' ";
	$East_result_Delay_OK 	= sqlsrv_query($conn, $East_SQL_Delay_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$East_data_Delay_OK 	= sqlsrv_fetch_array($East_result_Delay_OK);
	$East_Delay_OK 			= $East_data_Delay_OK['jumlah'];
	
	// GET Delay_Remark NOK
	
	$East_SQL_Delay_NOT 	= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Delay_Remark] = 'NOK' AND [Region] ='EAST' ";
	$East_result_Delay_NOT 	= sqlsrv_query($conn, $East_SQL_Delay_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$East_data_Delay_NOT 	= sqlsrv_fetch_array($East_result_Delay_NOT);
	$East_Delay_NOT 		= $East_data_Delay_NOT['jumlah'];
			
	// GET [[Rejection_Remark]] OK
	
	$East_SQL_Rejection_OK 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Rejection_Remark] = 'OK' AND [Region] ='EAST' ";
	$East_result_Rejection_OK 	= sqlsrv_query($conn, $East_SQL_Rejection_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$East_data_Rejection_OK 	= sqlsrv_fetch_array($East_result_Rejection_OK);
	$East_Rejection_OK 			= $East_data_Rejection_OK['jumlah'];
	
	// GET Rejection_Remark NOK

	$East_SQL_Rejection_NOT 	= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Rejection_Remark] = 'NOK' AND [Region] ='EAST' ";
	$East_result_Rejection_NOT 	= sqlsrv_query($conn, $East_SQL_Rejection_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$East_data_Rejection_NOT 	= sqlsrv_fetch_array($East_result_Rejection_NOT);
	$East_Rejection_NOT 		= $East_data_Rejection_NOT['jumlah'];
	
	// GET [Jitter_Remark] OK
	
	$East_SQL_Jitter_OK 	= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Jitter_Remark] = 'OK' AND [Region] ='EAST' ";
	$East_result_Jitter_OK 	= sqlsrv_query($conn, $East_SQL_Jitter_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$East_data_Jitter_OK 	= sqlsrv_fetch_array($East_result_Jitter_OK);
	$East_Jitter_OK 		= $East_data_Jitter_OK['jumlah'];
	
	// GET Jitter_Remark NOK
	
	$East_SQL_Jitter_NOT 	= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Jitter_Remark] = 'NOK' AND [Region] ='EAST' ";
	$East_result_Jitter_NOT = sqlsrv_query($conn, $East_SQL_Jitter_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$East_data_Jitter_NOT 	= sqlsrv_fetch_array($East_result_Jitter_NOT);
	$East_Jitter_NOT 		= $East_data_Jitter_NOT['jumlah'];
	
	// GET [SctpRetrans_Remark] OK
	
	$East_SQL_SctpRetrans_OK 	= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [SctpRetrans_Remark] = 'OK' AND [Region] ='EAST' ";
	$East_result_SctpRetrans_OK = sqlsrv_query($conn, $East_SQL_SctpRetrans_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$East_data_SctpRetrans_OK 	= sqlsrv_fetch_array($East_result_SctpRetrans_OK);
	$East_SctpRetrans_OK 		= $East_data_SctpRetrans_OK['jumlah'];
	
	// GET SctpRetrans_Remark NOK
	
	$East_SQL_SctpRetrans_NOT 		= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [SctpRetrans_Remark] = 'NOK' AND [Region] ='EAST' ";
	$East_result_SctpRetrans_NOT 	= sqlsrv_query($conn, $East_SQL_SctpRetrans_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$East_data_SctpRetrans_NOT 		= sqlsrv_fetch_array($East_result_SctpRetrans_NOT);
	$East_SctpRetrans_NOT 			= $East_data_SctpRetrans_NOT['jumlah'];
	
	// -----------------------------Get Value For Chart Region WEST---------------------
	// GET Loss_Remark OK
	$West_SQL_Loss_OK 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Loss_Remark] = 'OK' AND [Region] ='WEST' ";
	$West_result_Loss_OK 	= sqlsrv_query($conn, $West_SQL_Loss_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$West_data_Loss_OK 		= sqlsrv_fetch_array($West_result_Loss_OK);
	$West_Loss_OK 			= $West_data_Loss_OK['jumlah'];
	
	// GET Loss_Remark NOK
	
	$West_SQL_Loss_NOT 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Loss_Remark] = 'NOK' AND [Region] ='WEST' ";
	$West_result_Loss_NOT 	= sqlsrv_query($conn, $West_SQL_Loss_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$West_data_Loss_NOT 	= sqlsrv_fetch_array($West_result_Loss_NOT);
	$West_Loss_NOT 			= $West_data_Loss_NOT['jumlah'];
	
	// GET [Delay_Remark] OK
	
	$West_SQL_Delay_OK 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Delay_Remark] = 'OK' AND [Region] ='WEST' ";
	$West_result_Delay_OK 	= sqlsrv_query($conn, $West_SQL_Delay_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$West_data_Delay_OK 	= sqlsrv_fetch_array($West_result_Delay_OK);
	$West_Delay_OK 			= $West_data_Delay_OK['jumlah'];
	
	// GET Delay_Remark NOK
	
	$West_SQL_Delay_NOT 	= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Delay_Remark] = 'NOK' AND [Region] ='WEST' ";
	$West_result_Delay_NOT 	= sqlsrv_query($conn, $West_SQL_Delay_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$West_data_Delay_NOT 	= sqlsrv_fetch_array($West_result_Delay_NOT);
	$West_Delay_NOT 		= $West_data_Delay_NOT['jumlah'];
			
	// GET [[Rejection_Remark]] OK
	
	$West_SQL_Rejection_OK 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Rejection_Remark] = 'OK' AND [Region] ='WEST' ";
	$West_result_Rejection_OK 	= sqlsrv_query($conn, $West_SQL_Rejection_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$West_data_Rejection_OK 	= sqlsrv_fetch_array($West_result_Rejection_OK);
	$West_Rejection_OK 			= $West_data_Rejection_OK['jumlah'];
	
	// GET Rejection_Remark NOK

	$West_SQL_Rejection_NOT 	= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Rejection_Remark] = 'NOK' AND [Region] ='WEST' ";
	$West_result_Rejection_NOT 	= sqlsrv_query($conn, $West_SQL_Rejection_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$West_data_Rejection_NOT 	= sqlsrv_fetch_array($West_result_Rejection_NOT);
	$West_Rejection_NOT 		= $West_data_Rejection_NOT['jumlah'];
	
	// GET [Jitter_Remark] OK
	
	$West_SQL_Jitter_OK 	= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Jitter_Remark] = 'OK' AND [Region] ='WEST' ";
	$West_result_Jitter_OK 	= sqlsrv_query($conn, $West_SQL_Jitter_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$West_data_Jitter_OK 	= sqlsrv_fetch_array($West_result_Jitter_OK);
	$West_Jitter_OK 		= $West_data_Jitter_OK['jumlah'];
	
	// GET Jitter_Remark NOK
	
	$West_SQL_Jitter_NOT 	= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Jitter_Remark] = 'NOK' AND [Region] ='WEST' ";
	$West_result_Jitter_NOT = sqlsrv_query($conn, $West_SQL_Jitter_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$West_data_Jitter_NOT 	= sqlsrv_fetch_array($West_result_Jitter_NOT);
	$West_Jitter_NOT 		= $West_data_Jitter_NOT['jumlah'];
	
	// GET [SctpRetrans_Remark] OK
	
	$West_SQL_SctpRetrans_OK 	= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [SctpRetrans_Remark] = 'OK' AND [Region] ='WEST' ";
	$West_result_SctpRetrans_OK = sqlsrv_query($conn, $West_SQL_SctpRetrans_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$West_data_SctpRetrans_OK 	= sqlsrv_fetch_array($West_result_SctpRetrans_OK);
	$West_SctpRetrans_OK 		= $West_data_SctpRetrans_OK['jumlah'];
	
	// GET SctpRetrans_Remark NOK
	
	$West_SQL_SctpRetrans_NOT 		= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [SctpRetrans_Remark] = 'NOK' AND [Region] ='WEST' ";
	$West_result_SctpRetrans_NOT 	= sqlsrv_query($conn, $West_SQL_SctpRetrans_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$West_data_SctpRetrans_NOT 		= sqlsrv_fetch_array($West_result_SctpRetrans_NOT);
	$West_SctpRetrans_NOT 			= $West_data_SctpRetrans_NOT['jumlah'];
	
	// -----------------------------Get Value For Chart Region NORTH---------------------
	// GET Loss_Remark OK
	$North_SQL_Loss_OK 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Loss_Remark] = 'OK' AND [Region] ='NORTH' ";
	$North_result_Loss_OK 	= sqlsrv_query($conn, $North_SQL_Loss_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$North_data_Loss_OK 	= sqlsrv_fetch_array($North_result_Loss_OK);
	$North_Loss_OK 			= $North_data_Loss_OK['jumlah'];
	
	// GET Loss_Remark NOK
	
	$North_SQL_Loss_NOT 	= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Loss_Remark] = 'NOK' AND [Region] ='NORTH' ";
	$North_result_Loss_NOT 	= sqlsrv_query($conn, $North_SQL_Loss_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$North_data_Loss_NOT 	= sqlsrv_fetch_array($North_result_Loss_NOT);
	$North_Loss_NOT 		= $North_data_Loss_NOT['jumlah'];
	
	// GET [Delay_Remark] OK
	
	$North_SQL_Delay_OK 	= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Delay_Remark] = 'OK' AND [Region] ='NORTH' ";
	$North_result_Delay_OK 	= sqlsrv_query($conn, $North_SQL_Delay_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$North_data_Delay_OK 	= sqlsrv_fetch_array($North_result_Delay_OK);
	$North_Delay_OK 		= $North_data_Delay_OK['jumlah'];
	
	// GET Delay_Remark NOK
	
	$North_SQL_Delay_NOT 	= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Delay_Remark] = 'NOK' AND [Region] ='NORTH' ";
	$North_result_Delay_NOT = sqlsrv_query($conn, $North_SQL_Delay_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$North_data_Delay_NOT 	= sqlsrv_fetch_array($North_result_Delay_NOT);
	$North_Delay_NOT 		= $North_data_Delay_NOT['jumlah'];
			
	// GET [[Rejection_Remark]] OK
	
	$North_SQL_Rejection_OK 	= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Rejection_Remark] = 'OK' AND [Region] ='NORTH' ";
	$North_result_Rejection_OK 	= sqlsrv_query($conn, $North_SQL_Rejection_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$North_data_Rejection_OK 	= sqlsrv_fetch_array($North_result_Rejection_OK);
	$North_Rejection_OK 		= $North_data_Rejection_OK['jumlah'];
	
	// GET Rejection_Remark NOK

	$North_SQL_Rejection_NOT 	= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Rejection_Remark] = 'NOK' AND [Region] ='NORTH' ";
	$North_result_Rejection_NOT = sqlsrv_query($conn, $North_SQL_Rejection_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$North_data_Rejection_NOT 	= sqlsrv_fetch_array($North_result_Rejection_NOT);
	$North_Rejection_NOT 		= $North_data_Rejection_NOT['jumlah'];
	
	// GET [Jitter_Remark] OK
	
	$North_SQL_Jitter_OK 	= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Jitter_Remark] = 'OK' AND [Region] ='NORTH' ";
	$North_result_Jitter_OK = sqlsrv_query($conn, $North_SQL_Jitter_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$North_data_Jitter_OK 	= sqlsrv_fetch_array($North_result_Jitter_OK);
	$North_Jitter_OK 		= $North_data_Jitter_OK['jumlah'];
	
	// GET Jitter_Remark NOK
	
	$North_SQL_Jitter_NOT 		= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [Jitter_Remark] = 'NOK' AND [Region] ='NORTH' ";
	$North_result_Jitter_NOT 	= sqlsrv_query($conn, $North_SQL_Jitter_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$North_data_Jitter_NOT 		= sqlsrv_fetch_array($North_result_Jitter_NOT);
	$North_Jitter_NOT 			= $North_data_Jitter_NOT['jumlah'];
	
	// GET [SctpRetrans_Remark] OK
	
	$North_SQL_SctpRetrans_OK 		= "SELECT count([System]) as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [SctpRetrans_Remark] = 'OK' AND [Region] ='NORTH' ";
	$North_result_SctpRetrans_OK 	= sqlsrv_query($conn, $North_SQL_SctpRetrans_OK, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$North_data_SctpRetrans_OK 		= sqlsrv_fetch_array($North_result_SctpRetrans_OK);
	$North_SctpRetrans_OK 			= $North_data_SctpRetrans_OK['jumlah'];
	
	// GET SctpRetrans_Remark NOK
	
	$North_SQL_SctpRetrans_NOT 		= "SELECT count([System])as jumlah FROM [10.17.6.69].[MTransmisi].[dbo].[VMIubPerfWeekRemark] WHERE [Week] = '$week' AND [SctpRetrans_Remark] = 'NOK' AND [Region] ='NORTH' ";
	$North_result_SctpRetrans_NOT 	= sqlsrv_query($conn, $North_SQL_SctpRetrans_NOT, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$North_data_SctpRetrans_NOT 	= sqlsrv_fetch_array($North_result_SctpRetrans_NOT);
	$North_SctpRetrans_NOT 			= $North_data_SctpRetrans_NOT['jumlah'];
	

?>
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
</script>
<script type = "text/javascript"></script>
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>
<script type = "text/javascript">
google.charts.load('current', {packages: ['corechart']});     
</script>
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Resource', 'OK', 'NOT OK'],
               ['Loss', <?php echo $Central_Loss_OK ; ?> , <?php echo $Central_Loss_NOT ; ?>],
               ['Delay' , <?php echo $Central_Delay_OK ;?>, <?php echo $Central_Delay_NOT ; ?>],
               ['Rejection' , <?php echo $Central_Rejection_OK ; ?> , <?php echo $Central_Rejection_NOT ; ?>],
               ['Jitter' , <?php echo $Central_Jitter_OK ?> ,<?php echo $Central_Jitter_NOT ?>],
			   ['SctpRetrans' , <?php echo $Central_SctpRetrans_OK ?> ,<?php echo $Central_SctpRetrans_NOT ?>]
            ]);

            var options = {
			chartArea:{width:"87%"},
			legend: {position: 'top'},
               isStacked:'percent',	
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('1Central'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Resource', 'OK', 'NOT OK'],
               ['Loss', <?php echo $Jabo_Loss_OK ; ?> , <?php echo $Jabo_Loss_NOT ; ?>],
               ['Delay' , <?php echo $Jabo_Delay_OK ;?>, <?php echo $Jabo_Delay_NOT ; ?>],
               ['Rejection' , <?php echo $Jabo_Rejection_OK ; ?> , <?php echo $Jabo_Rejection_NOT ; ?>],
               ['Jitter' , <?php echo $Jabo_Jitter_OK ?> ,<?php echo $Jabo_Jitter_NOT ?>],
			   ['SctpRetrans' , <?php echo $Jabo_SctpRetrans_OK ?> ,<?php echo $Jabo_SctpRetrans_NOT ?>]
            ]);

            var options = {
			chartArea:{width:"87%"},
			legend: {position: 'top'},
               isStacked:'percent',	
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('2JABODETABEK'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Resource', 'OK', 'NOT OK'],
               ['Loss', <?php echo $East_Loss_OK ; ?> , <?php echo $East_Loss_NOT ; ?>],
               ['Delay' , <?php echo $East_Delay_OK ;?>, <?php echo $East_Delay_NOT ; ?>],
               ['Rejection' , <?php echo $East_Rejection_OK ; ?> , <?php echo $East_Rejection_NOT ; ?>],
               ['Jitter' , <?php echo $East_Jitter_OK ?> ,<?php echo $East_Jitter_NOT ?>],
			   ['SctpRetrans' , <?php echo $East_SctpRetrans_OK ?> ,<?php echo $East_SctpRetrans_NOT ?>]
            ]);

            var options = {
			chartArea:{width:"87%"},
			legend: {position: 'top'},
               isStacked:'percent',	
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('3EAST'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Resource', 'OK', 'NOT OK'],
               ['Loss', <?php echo $West_Loss_OK ; ?> , <?php echo $West_Loss_NOT ; ?>],
               ['Delay' , <?php echo $West_Delay_OK ;?>, <?php echo $West_Delay_NOT ; ?>],
               ['Rejection' , <?php echo $West_Rejection_OK ; ?> , <?php echo $West_Rejection_NOT ; ?>],
               ['Jitter' , <?php echo $West_Jitter_OK ?> ,<?php echo $West_Jitter_NOT ?>],
			   ['SctpRetrans' , <?php echo $West_SctpRetrans_OK ?> ,<?php echo $West_SctpRetrans_NOT ?>]
            ]);

            var options = {
			chartArea:{width:"87%"},
			legend: {position: 'top'},
               isStacked:'percent',	
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('4WEST'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Resource', 'OK', 'NOT OK'],
               ['Loss', <?php echo $North_Loss_OK ; ?> , <?php echo $North_Loss_NOT ; ?>],
               ['Delay' , <?php echo $North_Delay_OK ;?>, <?php echo $North_Delay_NOT ; ?>],
               ['Rejection' , <?php echo $North_Rejection_OK ; ?> , <?php echo $North_Rejection_NOT ; ?>],
               ['Jitter' , <?php echo $North_Jitter_OK ?> ,<?php echo $North_Jitter_NOT ?>],
			   ['SctpRetrans' , <?php echo $North_SctpRetrans_OK ?> ,<?php echo $North_SctpRetrans_NOT ?>]
            ]);

            var options = {
			chartArea:{width:"87%"},
			legend: {position: 'top'},
               isStacked:'percent',	
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'Green'},
                   1:{color:'Yellow'},
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('5NORTH'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-- End Menu Bar -->
<!-- MULAI DARI SINI -->
</div>
<?php
include 'footer.php';
?>