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
	<div class="page-title">
		<div class="title_left">
			<h3>Core <small>Pool Weekly</small></h3>
		</div>
	</div>
	<div class="x_panel">
		<div class="x_content">
			<div class="row">
			<form method="POST" action="PoolWeekly.php" >
				<div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12">
						<select class='form-control' id="Week" name="Week" >
								<?php
								$tsql = "SELECT Week FROM [WebDashboard].[dbo].[PS_CORE_GGSN_Week] GROUP BY Week";
										 
								$result = sqlsrv_query($conn, $tsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
																	
								while($data = sqlsrv_fetch_array($result))
									{
									 echo "<option value=".$data[Week]."> Week ".$data[Week]."</option>";
									} 
								?>
							</select>
                    </div>
				</div>
				<div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12">
						<select class="form-control" name="opsi">
							<option>-Pilih Opsi-</option>
							<option value="ggsn">GGSN</option>
							<option value="huawei">IP POOL HUAWEI</option>
							<option value="sgsn">SGSN</option>
							<option value="upcc">UPCC</option>
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
<?php
$data 	= $_POST['opsi'];
$opsi2	= $data;
if ($opsi2 == 'ggsn')
{
	include "PoolWeeklyGGSN.php";
}
else if ($opsi2 == 'huawei')
{
	include "PoolWeeklyHuawei.php";
}
else if ($opsi2 == 'sgsn')
{
	include "PoolWeeklySGSN.php";
}
?>
</div>
</div>
<!-- -----------------------------------------------SGSN CHART ------------------------------------------------------------- -->

<?php
include 'footer.php';
?>