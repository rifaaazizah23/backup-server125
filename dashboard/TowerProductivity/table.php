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
				<div class="col-md-3">
					<fieldset>
                        <div class="control-group">
                            <div class="controls">
								<div class="col-md-12 xdisplay_inputx form-group has-feedback">
									<input type="text" class="form-control has-feedback-left" id="single_cal2" name="akhir" placeholder="Select Date" aria-describedby="inputSuccess2Status">
									<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
									<span id="inputSuccess2Status" class="sr-only">(success)</span>
								</div>
                            </div>
                        </div>
                    </fieldset>
                </div>
			</div>
			<div class="row">
				<div class="form-group">
                    <label >Show System : </label>
                    <input type="checkbox" id="showall" name="cek">
                 </div>
				<div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12">
						<select class='form-control' name='system' id="system" disabled required="" >
			            <option value="0" >--Select System--</option>
                        <?php
                        $tsql = "SELECT DISTINCT System FROM [dbo].[UtranCellday] ";
                                 
                        $result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
                                                            
                        while($data = sqlsrv_fetch_array($result))
                            {
                             echo "<option value=".$data[System].">".$data[System]."</option>";
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
		<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>3G Cell Day </h2>
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
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">System</th>
						  <th class="text-center">CellName</th>
						  <th class="text-center">SiteId</th>
						  <th class="text-center">DateId</th>
						  <th class="text-center">Period</th>
						  <th class="text-center">avg24H_CellAvailabilitySYS</th>
						  <th class="text-center">avgBH_RRCSucRate</th>
						  <th class="text-center">avgBH_SpAccessRate</th>
						  <th class="text-center">avgBH_PsAccessRateAmd2014Nov</th>
						  <th class="text-center">avgBH_SpDropRate</th>
						  <th class="text-center">avgBH_PsDropRateAmd2014Nov</th>
						  <th class="text-center">avgBH_SpeechTraffic</th>
						  <th class="text-center">avgBH_PsTraffic</th>
						  <th class="text-center">avgBH_TotalPayloadGB</th>
						  <th class="text-center">sum24H_SpeechTraffic</th>
						  <th class="text-center">sum24H_PsTraffic</th>
						  <th class="text-center">sum24H_TotalPayloadGB</th>
						  <th class="text-center">avgBH_SoftHandOver</th>
						  <th class="text-center">avgBH_IFHO_SR</th>
						  <th class="text-center">avgBH_IRAT_SR</th>
						  <th class="text-center">avgBH_HsdpaThroughput</th>
						  <th class="text-center">avgBH_HsupaUser</th>
						  <th class="text-center">avgBH_HsdpaUser</th>
						  <th class="text-center">maxBH_HsdpaCapacity</th>
						  <th class="text-center">avgBH_CeUlUtilization</th>
						  <th class="text-center">avgBH_CeDlUtilization</th>
						  <th class="text-center">avgBH_CodeUtilization</th>
						  <th class="text-center">avgBH_PowerUtilization</th>
						  <th class="text-center">avgBH_HsUserUtilization</th>
						  <th class="text-center">sum24H_NumOfCeUlCong</th>
						  <th class="text-center">sum24H_NumOfCeDlCong</th>
						  <th class="text-center">sum24H_NumOfPowerCong</th>
						  <th class="text-center">sum24H_NumOfCodeCong</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                      $tanggal =$_POST['awal'];
                      $tanggal1 =$_POST['akhir'];
                      $date = $tanggal;
                      $date1 = $tanggal1;
                      $level = $_POST['system'];
                      $System = $level;
                      // menentukan limit 7 hari
                      $changedate1 = new DateTime($tanggal);
                      $changedate2 = new DateTime($tanggal1);
                       
                      $limit = $changedate2->diff($changedate1)->format("%a");
                      //jika user memilih ceklis show form
                      if(isset($_POST['cek'])) {

                          if ($limit <= 7 ){
                              $tsql = "SELECT * FROM [dbo].[UtranCellday] where DateId BETWEEN '$date' AND '$date1' AND System='$System' ";
                               
                              $result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
                                                          
                              while($data = sqlsrv_fetch_array($result))
                                { // Ambil semua data dari hasil eksekusi $sql
              
                
                                echo '
                                  <tr>
                                    <td align="center">'.$data['System'].'</td>
                                    <td align="center">'.$data['CellName'].'</td>
                                    <td align="center">'.$data['SiteId'].'</td>
                                    <td align="center">'.$data['DateId']->format('Y-m-d').'</td>
                                    <td align="center">'.$data['Period'].'</td>
                                    <td align="center">'.$data['avg24H_CellAvailabilitySYS'].'</td>
                                    <td align="center">'.$data['avgBH_RRCSucRate'].'</td>
                                    <td align="center">'.$data['avgBH_SpAccessRate'].'</td>
                                    <td align="center">'.$data['avgBH_PsAccessRateAmd2014Nov'].'</td>
                                    <td align="center">'.$data['avgBH_SpDropRate'].'</td>
                                    <td align="center">'.$data['avgBH_PsDropRateAmd2014Nov'].'</td>
                                    <td align="center">'.$data['avgBH_SpeechTraffic'].'</td>
                                    <td align="center">'.$data['avgBH_PsTraffic'].'</td>
                                    <td align="center">'.$data['avgBH_TotalPayloadGB'].'</td>
                                    <td align="center">'.$data['sum24H_SpeechTraffic'].'</td>
                                    <td align="center">'.$data['sum24H_PsTraffic'].'</td>
                                    <td align="center">'.$data['sum24H_TotalPayloadGB'].'</td>
                                    <td align="center">'.$data['avgBH_SoftHandOver'].'</td>
                                    <td align="center">'.$data['avgBH_IFHO_SR'].'</td>
                                    <td align="center">'.$data['avgBH_IRAT_SR'].'</td>
                                    <td align="center">'.$data['avgBH_HsdpaThroughput'].'</td>
                                    <td align="center">'.$data['avgBH_HsupaUser'].'</td>
                                    <td align="center">'.$data['avgBH_HsdpaUser'].'</td>
                                    <td align="center">'.$data['maxBH_HsdpaCapacity'].'</td>
                                    <td align="center">'.$data['avgBH_CeUlUtilization'].'</td>
                                    <td align="center">'.$data['avgBH_CeDlUtilization'].'</td>
                                    <td align="center">'.$data['avgBH_CodeUtilization'].'</td>
                                    <td align="center">'.$data['avgBH_PowerUtilization'].'</td>
                                    <td align="center">'.$data['avgBH_HsUserUtilization'].'</td>
                                    <td align="center">'.$data['sum24H_NumOfCeUlCong'].'</td>
                                    <td align="center">'.$data['sum24H_NumOfCeDlCong'].'</td>
                                    <td align="center">'.$data['sum24H_NumOfPowerCong'].'</td>
                                    <td align="center">'.$data['sum24H_NumOfCodeCong'].'</td>
                                    
                                </tr>'
                                ;}
                              }else {
                                echo '	<div class="col-md-12">
											<div class="alert alert-success alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
												<strong>Maksimal Range Tanggal 7 Hari</strong>
											</div>     
										</div>';
							}

                              
                        } else {

                          if ($limit <= 7 ){
                          $tsql1 = "SELECT * FROM [dbo].[UtranCellday] where DateId BETWEEN '$date' AND '$date1' ";
                           
                          $result1 = sqlsrv_query($conn, $tsql1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
                                                      
                          while($data1 = sqlsrv_fetch_array($result1))
                
                            { // Ambil semua data dari hasil eksekusi $sql
              
              
                            echo '
                              <tr>
                                <td align="center">'.$data1['System'].'</td>
                                <td align="center">'.$data1['CellName'].'</td>
                                <td align="center">'.$data1['SiteId'].'</td>
                                <td align="center">'.$data1['DateId']->format('Y-m-d').'</td>
                                <td align="center">'.$data1['Period'].'</td>
                                <td align="center">'.$data1['avg24H_CellAvailabilitySYS'].'</td>
                                <td align="center">'.$data1['avgBH_RRCSucRate'].'</td>
                                <td align="center">'.$data1['avgBH_SpAccessRate'].'</td>
                                <td align="center">'.$data1['avgBH_PsAccessRateAmd2014Nov'].'</td>
                                <td align="center">'.$data1['avgBH_SpDropRate'].'</td>
                                <td align="center">'.$data1['avgBH_PsDropRateAmd2014Nov'].'</td>
                                <td align="center">'.$data1['avgBH_SpeechTraffic'].'</td>
                                <td align="center">'.$data1['avgBH_PsTraffic'].'</td>
                                <td align="center">'.$data1['avgBH_TotalPayloadGB'].'</td>
                                <td align="center">'.$data1['sum24H_SpeechTraffic'].'</td>
                                <td align="center">'.$data1['sum24H_PsTraffic'].'</td>
                                <td align="center">'.$data1['sum24H_TotalPayloadGB'].'</td>
                                <td align="center">'.$data1['avgBH_SoftHandOver'].'</td>
                                <td align="center">'.$data1['avgBH_IFHO_SR'].'</td>
                                <td align="center">'.$data1['avgBH_IRAT_SR'].'</td>
                                <td align="center">'.$data1['avgBH_HsdpaThroughput'].'</td>
                                <td align="center">'.$data1['avgBH_HsupaUser'].'</td>
                                <td align="center">'.$data1['avgBH_HsdpaUser'].'</td>
                                <td align="center">'.$data1['maxBH_HsdpaCapacity'].'</td>
                                <td align="center">'.$data1['avgBH_CeUlUtilization'].'</td>
                                <td align="center">'.$data1['avgBH_CeDlUtilization'].'</td>
                                <td align="center">'.$data1['avgBH_CodeUtilization'].'</td>
                                <td align="center">'.$data1['avgBH_PowerUtilization'].'</td>
                                <td align="center">'.$data1['avgBH_HsUserUtilization'].'</td>
                                <td align="center">'.$data1['sum24H_NumOfCeUlCong'].'</td>
                                <td align="center">'.$data1['sum24H_NumOfCeDlCong'].'</td>
                                <td align="center">'.$data1['sum24H_NumOfPowerCong'].'</td>
                                <td align="center">'.$data1['sum24H_NumOfCodeCong'].'</td>
                                
                            </tr>'
                            ;
                            }
                          }else {
                            echo '	<div class="col-md-12">
											<div class="alert alert-success alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
												<strong>Maksimal Range Tanggal 7 Hari</strong>
											</div>     
										</div>';
                          }

                        }

                      

                    
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
         </div>

</div>