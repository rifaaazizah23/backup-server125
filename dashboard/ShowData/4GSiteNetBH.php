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

	<div class="col-md-12">
		<div class="alert alert-success alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
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
                    <label >Show Form: </label>
                    <input type="checkbox" id="showall" name="cek">
                 </div>
				<div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12">
						<select class='form-control' name='system' id="system" disabled required="" >
			            <option value="0" >--Select System--</option>
                        <?php
                        $tsql = "SELECT DISTINCT System FROM [DBCapman].[dbo].[LranSiteDayNetBH] ";
                                 
                        $result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
                                                            
                        while($data = sqlsrv_fetch_array($result))
                            {
                             echo "<option value=".$data[System].">".$data[System]."</option>";
                            } 
                        ?>
						</select>
                    </div>
				</div>
				<div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12">
						<select class='form-control' name='provinsi' id="provinsi" disabled required="" >
			            <option value="0" >--Select provinsi--</option>
                        <?php
                        $tsql = "SELECT DISTINCT Provinsi FROM [DBCapman].[dbo].[LranSiteDayNetBH] ";
                                 
                        $result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
                                                            
                        while($data = sqlsrv_fetch_array($result))
                            {
                             echo "<option value=".$data[Provinsi].">".$data[Provinsi]."</option>";
                            } 
                        ?>
						</select>
                    </div>
				</div>
				<div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12">
						<select class='form-control' name='region' id="region" disabled required="" >
			            <option value="0" >--Select RegionSev--</option>
                        <?php
                        $tsql = "SELECT DISTINCT RegionSev FROM [DBCapman].[dbo].[LranSiteDayNetBH] ";
                                 
                        $result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
                                                            
                        while($data = sqlsrv_fetch_array($result))
                            {
                             echo "<option value=".$data[RegionSev].">".$data[RegionSev]."</option>";
                            } 
                        ?>
						</select>
                    </div>
				</div>
				<div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12">
						<select class='form-control' name='kabupaten' id="kabupaten" disabled required="" >
			            <option value="0" >--Select Kabupaten--</option>
                        <?php
                        $tsql = "SELECT DISTINCT Kabupaten FROM [DBCapman].[dbo].[LranSiteDayNetBH] ";
                                 
                        $result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
                                                            
                        while($data = sqlsrv_fetch_array($result))
                            {
                             echo "<option value=".$data[Kabupaten].">".$data[Kabupaten]."</option>";
                            } 
                        ?>
						</select>
                    </div>
				</div>
			</div>
			<br>
			<div class="row">
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
                    <h2>4G Site Day CEM </h2>
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
                          <th class="text-center">System</th>
						  <th class="text-center">SiteId</th>
						  <th class="text-center">RegionSev</th>
						  <th class="text-center">Provinsi</th>
						  <th class="text-center">Kabupaten</th>
						  <th class="text-center">PocName</th>
						  <th class="text-center">NewCityTier</th>
						  <th class="text-center">DateId</th>
						  <th class="text-center">avg24H_CellAvailabilitySYS</th>
						  <th class="text-center">avgNetBH_RRCSucRate</th>
						  <th class="text-center">avgNetBH_AvgHsdpaThroughput</th>
						  <th class="text-center">avgNetBH_SpDropRate</th>
                        </tr>
                      </thead>
                      <tbody>
                      </thead>
                      
                      <?php
                      $tanggal =$_POST['awal'];
                      $tanggal1 =$_POST['akhir'];
                      $System = $_POST['system'];
                      $RegionSev = $_POST['region'];
                      $Provinsi= $_POST['provinsi'];
                      $Kabupaten = $_POST['kabupaten'];
                      $date = $tanggal;
                      $date1 = $tanggal1;
                      $changedate1 = new DateTime($tanggal);
                      $changedate2 = new DateTime($tanggal1);
                       
                      $limit = $changedate2->diff($changedate1)->format("%a");

                      if(isset($_POST['cek'])) {
                          if ($limit <= 7 ){

                          $tsql = "SELECT  * FROM [DBCapman].[dbo].[LranSiteDayNetBH] where DateId BETWEEN '$date' AND '$date1' AND RegionSev='$RegionSev' AND System='$System' AND Provinsi='$Provinsi' AND Kabupaten='$Kabupaten' ";
                           
                          $result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
                                                      
                          while($data = sqlsrv_fetch_array($result))
                            { // Ambil semua data dari hasil eksekusi $sql
                            echo '
                              <tr>
                                <td align="center">'.$data['System'].'</td>
                                <td align="center">'.$data['SiteId'].'</td>
                                <td align="center">'.$data['RegionSev'].'</td>
                                <td align="center">'.$data['Provinsi'].'</td>
                                <td align="center">'.$data['Kabupaten'].'</td>
                                <td align="center">'.$data['PocName'].'</td>
                                <td align="center">'.$data['NewCityTier'].'</td>
                                <td align="center">'.$data['DateId']->format('Y-m-d').'</td>
                                <td align="center">'.$data['avg24H_CellAvailabilitySYS'].'</td>
                                <td align="center">'.$data['avgNetBH_RRCSucRate'].'</td>
                                <td align="center">'.$data['avgNetBH_AvgHsdpaThroughput'].'</td>
                                <td align="center">'.$data['avgNetBH_SpDropRate'].'</td>
                                
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
								} else {

                          if ($limit <= 7 ){

                          $tsql = "SELECT  * FROM [DBCapman].[dbo].[LranSiteDayNetBH] where DateId BETWEEN '$date' AND '$date1'  ";
                           
                          $result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
                                                      
                          while($data = sqlsrv_fetch_array($result))
                            { // Ambil semua data dari hasil eksekusi $sql
                            echo '
                              <tr>
                                <td align="center">'.$data['System'].'</td>
                                <td align="center">'.$data['SiteId'].'</td>
                                <td align="center">'.$data['RegionSev'].'</td>
                                <td align="center">'.$data['Provinsi'].'</td>
                                <td align="center">'.$data['Kabupaten'].'</td>
                                <td align="center">'.$data['PocName'].'</td>
                                <td align="center">'.$data['NewCityTier'].'</td>
                                <td align="center">'.$data['DateId']->format('Y-m-d').'</td>
                                <td align="center">'.$data['avg24H_CellAvailabilitySYS'].'</td>
                                <td align="center">'.$data['avgNetBH_RRCSucRate'].'</td>
                                <td align="center">'.$data['avgNetBH_AvgHsdpaThroughput'].'</td>
                                <td align="center">'.$data['avgNetBH_SpDropRate'].'</td>
                                
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
</div>
<script type="text/javascript">
  document.getElementById('showall').onchange = function() {
    document.getElementById('system').disabled = !this.checked;
    document.getElementById('region').disabled = !this.checked;
    document.getElementById('provinsi').disabled = !this.checked;
    document.getElementById('kabupaten').disabled = !this.checked;
};
</script>
<?php
include 'footer.php';
?>