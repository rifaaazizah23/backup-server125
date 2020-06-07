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
<script>
function tampilkan(){
  var nama_kota=document.getElementById("form1").kategori.value;
  if (nama_kota=="Weekly")
    {
        document.getElementById("tampil").innerHTML="<option value=6>Week 6</option><option value=6>Week 6</option><option value=7>Week 7</option><option value=8>Week 8</option><option value=9>Week 9</option><option value=10>Week 10</option><option value=11>Week 11</option><option value=12>Week 12</option><option value=13>Week 13</option><option value=14>Week 14</option><option value=15>Week 15</option><option value=16>Week 16</option><option value=17>Week 17</option><option value=18>Week 18</option><option value=19>Week 19</option><option value=20>Week 20</option><option value=21>Week 21</option><option value=22>Week 22</option><option value=23>Week 23</option><option value=24>Week 24</option><option value=25>Week 25</option><option value=26>Week 26</option><option value=27>Week 27</option><option value=28>Week 28</option><option value=29>Week 29</option><option value=30>Week 30</option><option value=31>Week 31</option><option value=32>Week 32</option><option value=33>Week 33</option><option value=34>Week 34</option><option value=35>Week 35</option><option value=36>Week 36</option><option value=37>Week 37</option>";
    }
  else if (nama_kota=="Monthly")
    {
        document.getElementById("tampil").innerHTML="<option value=102>February</option><option value=103>March</option><option value=104>April</option><option value=105>Mei</option><option value=106>Juni</option><option value=107>Juli</option>";
    }
}
</script>
<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h3>Capman Report <small>4G Weekly Report</small></h3>
		</div>
	</div>
<!-- MULAI DARI SINI -->
<div class="x_panel">
	<div class="x_content">
		<div class="row">
		<form method="post" action="4GWeeklyReport.php" id="form1" name="form1">
			<div class="col-md-3">
				<fieldset>
                    <div class="form-group">
					<form id="form1" name="form1" onsubmit="return false">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control" id="kategori" name="kategori" onchange="tampilkan()">
                            <option value=0>Pilih Opsi</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Monthly">Monthly</option>
                          </select>
                        </div>
                    </div>
                </fieldset>
            </div>
			<div class="col-md-3">
				<fieldset>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class='form-control' id="tampil" name="tampil"></select>
                        </div>
                    </div>
                </fieldset>
            </div>
			<div class="form-group"></div>
			<div class="col-md-3 col-sm-12 col-xs-12 form-group">
				<button type="submit" class="btn btn-primary" name="submit">Tampil</button>
			</div>
			</form>
		</form>
		</div>
	</div>
</div>
<div class="row">
	<div class="clearfix"></div>
		<div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> 4G REPORT REGION CENTRAL <?php $min1 = $_POST['tampil'];
							if($min1 < 100){
								echo "Week $min1" ;
							}else {
								echo "Monthly $monthly";
							} ?>
					</h2>
                    <ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
							<li role="presentation" class="active"><a href="#chart_4Gcentral" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#table_4Gcentral" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="chart_4Gcentral" aria-labelledby="home-tab">
								<p><div id="stacked1"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="table_4Gcentral" aria-labelledby="profile-tab">
								<p><div id="tableCentral"></div></p>
							</div>
						</div>
                    </div>
				</div>
            </div>
        </div>
		<div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> 4G REPORT REGION EAST <?php $min1 = $_POST['tampil'];
							if($min1 < 100){
								echo "Week $min1" ;
							}else {
								echo "Monthly $monthly";
							} ?>
					</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab1" class="nav nav-tabs bar_tabs right" role="tablist">
							<li role="presentation" class="active"><a href="#chart_4Geast" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#table_4Geast" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent2" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="chart_4Geast" aria-labelledby="home-tab">
								<p><div id="stacked2"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="table_4Geast" aria-labelledby="profile-tab">
								<p><div id="tableEAST"></div></p>
							</div>
						</div>
                    </div>
				</div>
            </div>
        </div>
</div>
<div class="row">
	<div class="clearfix"></div>
		<div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> 4G REPORT REGION JABODETABEK <?php $min1 = $_POST['tampil'];
							if($min1 < 100){
								echo "Week $min1" ;
							}else {
								echo "Monthly $monthly";
							} ?>
					</h2>
                    <ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
							<li role="presentation" class="active"><a href="#chart_4Gjabo" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#table_4Gjabo" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="chart_4Gjabo" aria-labelledby="home-tab">
								<p><div id="stacked3"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="table_4Gjabo" aria-labelledby="profile-tab">
								<p><div id="tableJABODETABEK"></div></p>
							</div>
						</div>
                    </div>
				</div>
            </div>
        </div>
		<div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> 4G REPORT REGION NORTH <?php $min1 = $_POST['tampil'];
							if($min1 < 100){
								echo "Week $min1" ;
							}else {
								echo "Monthly $monthly";
							} ?>
					</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab1" class="nav nav-tabs bar_tabs right" role="tablist">
							<li role="presentation" class="active"><a href="#chart_4Gnorth" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#table_4Gnorth" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent2" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="chart_4Gnorth" aria-labelledby="home-tab">
								<p><div id="stacked4"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="table_4Gnorth" aria-labelledby="profile-tab">
								<p><div id="tableNORTH"></div></p>
							</div>
						</div>
                    </div>
				</div>
            </div>
        </div>
</div>
<div class="row">
	<div class="clearfix"></div>
		<div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> 4G REPORT REGION WEST <?php $min1 = $_POST['tampil'];
							if($min1 < 100){
								echo "Week $min1" ;
							}else {
								echo "Monthly $monthly";
							} ?>
					</h2>
                    <ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
							<li role="presentation" class="active"><a href="#chart_4Gwest" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#table_4Gwest" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="chart_4Gwest" aria-labelledby="home-tab">
								<p><div id="stacked5"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="table_4Gwest" aria-labelledby="profile-tab">
								<p><div id="tableWEST"></div></p>
							</div>
						</div>
                    </div>
				</div>
            </div>
        </div>
</div>

</div>
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
</script>
<script type = "text/javascript">

<?php
// Get Value For Chart Region Central
	// get h-1 day
	$Week = $_POST['tampil'];
	$Wsql = "SELECT Monthly FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Week = '$Week'";
	$resultWsql = sqlsrv_query($conn, $Wsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataWsql 	= sqlsrv_fetch_array($resultWsql);
	$monthly 	= $dataWsql['Monthly'];
	
	//ambil data value dari database Untuk Graph 
	// Region Central
	//ambil data value untuk Remark RemarkCellOperation
	$SqlCellOperation = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Central' AND Remark='RemarkCellOperation' AND Week = '$Week'";
	$ResultCellOperation = sqlsrv_query($conn, $SqlCellOperation, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$DataCellOperation = sqlsrv_fetch_array($ResultCellOperation);
	$CellOperationNMEET		= $DataCellOperation ['NY_MEET'];
	$CellOperationMEET 		= $DataCellOperation ['MEET'];
	$CellOperationNCONGEST 	= $DataCellOperation ['NOT_CONGEST'];
	$CellOperationCONGEST 	= $DataCellOperation ['CONGEST'];
	$CellOperationNISSUE 	= $DataCellOperation ['NO_ISSUE'];
	$CellOperationISSUE 	= $DataCellOperation ['ISSUE'];
	$CellOperationHIGH 		= $DataCellOperation ['HIGH'];
	$CellOperationMEDIUM 	= $DataCellOperation ['MEDIUM'];
	$CellOperationLOW  		= $DataCellOperation ['LOW'];
	
	//ambil data value untuk Remark RemarkCellPRB
	$SqlCellPRB = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Central' AND Remark='RemarkCellPRB' AND Week = '$Week' ";
	$ResultCellPRB = sqlsrv_query($conn, $SqlCellPRB, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$DataCellPRB = sqlsrv_fetch_array($ResultCellPRB);
	$CellPRBNMEET		= $DataCellPRB ['NY_MEET'];
	$CellPRBMEET 		= $DataCellPRB ['MEET'];
	$CellPRBNCONGEST 	= $DataCellPRB ['NOT_CONGEST'];
	$CellPRBCONGEST 	= $DataCellPRB ['CONGEST'];
	$CellPRBNISSUE 		= $DataCellPRB ['NO_ISSUE'];
	$CellPRBISSUE 		= $DataCellPRB ['ISSUE'];
	$CellPRBHIGH 		= $DataCellPRB ['HIGH'];
	$CellPRBMEDIUM 		= $DataCellPRB ['MEDIUM'];
	$CellPRBLOW  		= $DataCellPRB ['LOW'];

	//ambil data value untuk Remark RemarkCellSpectral
	$SqlCellSpectral = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Central' AND Remark='RemarkCellSpectral' AND Week = '$Week'";
	$ResultCellSpectral = sqlsrv_query($conn, $SqlCellSpectral, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$DataCellSpectral = sqlsrv_fetch_array($ResultCellSpectral);
	$CellSpectralNMEET		= $DataCellSpectral ['NY_MEET'];
	$CellSpectralMEET 		= $DataCellSpectral ['MEET'];
	$CellSpectralNCONGEST 	= $DataCellSpectral ['NOT_CONGEST'];
	$CellSpectralCONGEST 	= $DataCellSpectral ['CONGEST'];
	$CellSpectralNISSUE 	= $DataCellSpectral ['NO_ISSUE'];
	$CellSpectralISSUE 		= $DataCellSpectral ['ISSUE'];
	$CellSpectralHIGH 		= $DataCellSpectral ['HIGH'];
	$CellSpectralMEDIUM 	= $DataCellSpectral ['MEDIUM'];
	$CellSpectralLOW  		= $DataCellSpectral ['LOW'];

	//ambil data value untuk Remark RemarkCellCu1Mbps
	$SqlCellCu1Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Central' AND Remark='RemarkCellCu1Mbps' AND Week = '$Week'";
	$ResultCellCu1Mbps = sqlsrv_query($conn, $SqlCellCu1Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$DataCellCu1Mbps = sqlsrv_fetch_array($ResultCellCu1Mbps);
	$CellCu1MbpsNMEET		= $DataCellCu1Mbps ['NY_MEET'];
	$CellCu1MbpsMEET 		= $DataCellCu1Mbps ['MEET'];
	$CellCu1MbpsNCONGEST 	= $DataCellCu1Mbps ['NOT_CONGEST'];
	$CellCu1MbpsCONGEST 	= $DataCellCu1Mbps ['CONGEST'];
	$CellCu1MbpsNISSUE 		= $DataCellCu1Mbps ['NO_ISSUE'];
	$CellCu1MbpsISSUE 		= $DataCellCu1Mbps ['ISSUE'];
	$CellCu1MbpsHIGH 		= $DataCellCu1Mbps ['HIGH'];
	$CellCu1MbpsMEDIUM 		= $DataCellCu1Mbps ['MEDIUM'];
	$CellCu1MbpsLOW  		= $DataCellCu1Mbps ['LOW'];

	//ambil data value untuk Remark RemarkCellCu3Mbps
	$SqlCellCu1Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Central' AND Remark='RemarkCellCu3Mbps' AND Week = '$Week'";
	$ResultCellCu3Mbps = sqlsrv_query($conn, $SqlCellCu1Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$DataCellCu3Mbps = sqlsrv_fetch_array($ResultCellCu3Mbps);
	$CellCu3MbpsNMEET		= $DataCellCu3Mbps ['NY_MEET'];
	$CellCu3MbpsMEET 		= $DataCellCu3Mbps ['MEET'];
	$CellCu3MbpsNCONGEST 	= $DataCellCu3Mbps ['NOT_CONGEST'];
	$CellCu3MbpsCONGEST 	= $DataCellCu3Mbps ['CONGEST'];
	$CellCu3MbpsNISSUE 		= $DataCellCu3Mbps ['NO_ISSUE'];
	$CellCu3MbpsISSUE 		= $DataCellCu3Mbps ['ISSUE'];
	$CellCu3MbpsHIGH 		= $DataCellCu3Mbps ['HIGH'];
	$CellCu3MbpsMEDIUM 		= $DataCellCu3Mbps ['MEDIUM'];
	$CellCu3MbpsLOW  		= $DataCellCu3Mbps ['LOW'];

	//ambil data value untuk Remark CellUserThp1Mbps
	$SqlCellUserThp1Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Central' AND Remark='CellUserThp1Mbps' AND Week = '$Week'";
	$ResultCellUserThp1Mbps = sqlsrv_query($conn, $SqlCellUserThp1Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$DataCellUserThp1Mbps = sqlsrv_fetch_array($ResultCellUserThp1Mbps);
	$CellUserThp1MbpsNMEET		= $DataCellUserThp1Mbps ['NY_MEET'];
	$CellUserThp1MbpsMEET 		= $DataCellUserThp1Mbps ['MEET'];
	$CellUserThp1MbpsNCONGEST 	= $DataCellUserThp1Mbps ['NOT_CONGEST'];
	$CellUserThp1MbpsCONGEST 	= $DataCellUserThp1Mbps ['CONGEST'];
	$CellUserThp1MbpsNISSUE 	= $DataCellUserThp1Mbps ['NO_ISSUE'];
	$CellUserThp1MbpsISSUE 		= $DataCellUserThp1Mbps ['ISSUE'];
	$CellUserThp1MbpsHIGH 		= $DataCellUserThp1Mbps ['HIGH'];
	$CellUserThp1MbpsMEDIUM 	= $DataCellUserThp1Mbps ['MEDIUM'];
	$CellUserThp1MbpsLOW  		= $DataCellUserThp1Mbps ['LOW'];
	

	//ambil data value untuk Remark CellUserThp3Mbps
	$SqlCellUserThp3Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Central' AND Remark='CellUserThp3Mbps' AND Week = '$Week'";
	$ResultCellUserThp3Mbps = sqlsrv_query($conn, $SqlCellUserThp3Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$DataCellUserThp3Mbps = sqlsrv_fetch_array($ResultCellUserThp3Mbps);
	$CellUserThp3MbpsNMEET		= $DataCellUserThp3Mbps ['NY_MEET'];
	$CellUserThp3MbpsMEET 		= $DataCellUserThp3Mbps ['MEET'];
	$CellUserThp3MbpsNCONGEST 	= $DataCellUserThp3Mbps ['NOT_CONGEST'];
	$CellUserThp3MbpsCONGEST 	= $DataCellUserThp3Mbps ['CONGEST'];
	$CellUserThp3MbpsNISSUE 	= $DataCellUserThp3Mbps ['NO_ISSUE'];
	$CellUserThp3MbpsISSUE 		= $DataCellUserThp3Mbps ['ISSUE'];
	$CellUserThp3MbpsHIGH 		= $DataCellUserThp3Mbps ['HIGH'];
	$CellUserThp3MbpsMEDIUM 	= $DataCellUserThp3Mbps ['MEDIUM'];
	$CellUserThp3MbpsLOW  		= $DataCellUserThp3Mbps ['LOW'];

	//ambil data value untuk Remark CellUserThp3Mbps
	$SqlCellUserThp3Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Central' AND Remark='CellUserThp3Mbps' AND Week = '$Week' ";
	$ResultCellUserThp3Mbps = sqlsrv_query($conn, $SqlCellUserThp3Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$DataCellUserThp3Mbps = sqlsrv_fetch_array($ResultCellUserThp3Mbps);
	$CellUserThp3MbpsNMEET		= $DataCellUserThp3Mbps ['NY_MEET'];
	$CellUserThp3MbpsMEET 		= $DataCellUserThp3Mbps ['MEET'];
	$CellUserThp3MbpsNCONGEST 	= $DataCellUserThp3Mbps ['NOT_CONGEST'];
	$CellUserThp3MbpsCONGEST 	= $DataCellUserThp3Mbps ['CONGEST'];
	$CellUserThp3MbpsNISSUE 	= $DataCellUserThp3Mbps ['NO_ISSUE'];
	$CellUserThp3MbpsISSUE 		= $DataCellUserThp3Mbps ['ISSUE'];
	$CellUserThp3MbpsHIGH 		= $DataCellUserThp3Mbps ['HIGH'];
	$CellUserThp3MbpsMEDIUM 	= $DataCellUserThp3Mbps ['MEDIUM'];
	$CellUserThp3MbpsLOW  		= $DataCellUserThp3Mbps ['LOW'];
	

	
	
// Get Value From Chart Region EAST

	//ambil data value untuk Remark RemarkCellOperation
	$EastSqlCellOperation = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'East' AND Remark='RemarkCellOperation' AND Week = '$Week'";
	$EastResultCellOperation = sqlsrv_query($conn, $EastSqlCellOperation, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$EastDataCellOperation = sqlsrv_fetch_array($EastResultCellOperation);
	$EastCellOperationNMEET		= $EastDataCellOperation ['NY_MEET'];
	$EastCellOperationMEET 		= $EastDataCellOperation ['MEET'];
	$EastCellOperationNCONGEST 	= $EastDataCellOperation ['NOT_CONGEST'];
	$EastCellOperationCONGEST 	= $EastDataCellOperation ['CONGEST'];
	$EastCellOperationNISSUE 	= $EastDataCellOperation ['NO_ISSUE'];
	$EastCellOperationISSUE 	= $EastDataCellOperation ['ISSUE'];
	$EastCellOperationHIGH 		= $EastDataCellOperation ['HIGH'];
	$EastCellOperationMEDIUM 	= $EastDataCellOperation ['MEDIUM'];
	$EastCellOperationLOW  		= $EastDataCellOperation ['LOW'];
	
	//ambil data value untuk Remark RemarkCellPRB
	$EastSqlCellPRB = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'East' AND Remark='RemarkCellPRB' AND Week = '$Week' ";
	$EastResultCellPRB = sqlsrv_query($conn, $EastSqlCellPRB, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$EastDataCellPRB = sqlsrv_fetch_array($EastResultCellPRB);
	$EastCellPRBNMEET		= $EastDataCellPRB ['NY_MEET'];
	$EastCellPRBMEET 		= $EastDataCellPRB ['MEET'];
	$EastCellPRBNCONGEST 	= $EastDataCellPRB ['NOT_CONGEST'];
	$EastCellPRBCONGEST 	= $EastDataCellPRB ['CONGEST'];
	$EastCellPRBNISSUE 		= $EastDataCellPRB ['NO_ISSUE'];
	$EastCellPRBISSUE 		= $EastDataCellPRB ['ISSUE'];
	$EastCellPRBHIGH 		= $EastDataCellPRB ['HIGH'];
	$EastCellPRBMEDIUM 		= $EastDataCellPRB ['MEDIUM'];
	$EastCellPRBLOW  		= $EastDataCellPRB ['LOW'];

	//ambil data value untuk Remark RemarkCellSpectral
	$EastSqlCellSpectral = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'East' AND Remark='RemarkCellSpectral' AND Week = '$Week'";
	$EastResultCellSpectral = sqlsrv_query($conn, $EastSqlCellSpectral, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$EastDataCellSpectral = sqlsrv_fetch_array($EastResultCellSpectral);
	$EastCellSpectralNMEET		= $EastDataCellSpectral ['NY_MEET'];
	$EastCellSpectralMEET 		= $EastDataCellSpectral ['MEET'];
	$EastCellSpectralNCONGEST 	= $EastDataCellSpectral ['NOT_CONGEST'];
	$EastCellSpectralCONGEST 	= $EastDataCellSpectral ['CONGEST'];
	$EastCellSpectralNISSUE 	= $EastDataCellSpectral ['NO_ISSUE'];
	$EastCellSpectralISSUE 		= $EastDataCellSpectral ['ISSUE'];
	$EastCellSpectralHIGH 		= $EastDataCellSpectral ['HIGH'];
	$EastCellSpectralMEDIUM 	= $EastDataCellSpectral ['MEDIUM'];
	$EastCellSpectralLOW  		= $EastDataCellSpectral ['LOW'];

	//ambil data value untuk Remark RemarkCellCu1Mbps
	$EastSqlCellCu1Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'East' AND Remark='RemarkCellCu1Mbps' AND Week = '$Week'";
	$EastResultCellCu1Mbps = sqlsrv_query($conn, $EastSqlCellCu1Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$EastDataCellCu1Mbps = sqlsrv_fetch_array($EastResultCellCu1Mbps);
	$EastCellCu1MbpsNMEET		= $EastDataCellCu1Mbps ['NY_MEET'];
	$EastCellCu1MbpsMEET 		= $EastDataCellCu1Mbps ['MEET'];
	$EastCellCu1MbpsNCONGEST 	= $EastDataCellCu1Mbps ['NOT_CONGEST'];
	$EastCellCu1MbpsCONGEST 	= $EastDataCellCu1Mbps ['CONGEST'];
	$EastCellCu1MbpsNISSUE 		= $EastDataCellCu1Mbps ['NO_ISSUE'];
	$EastCellCu1MbpsISSUE 		= $EastDataCellCu1Mbps ['ISSUE'];
	$EastCellCu1MbpsHIGH 		= $EastDataCellCu1Mbps ['HIGH'];
	$EastCellCu1MbpsMEDIUM 		= $EastDataCellCu1Mbps ['MEDIUM'];
	$EastCellCu1MbpsLOW  		= $EastDataCellCu1Mbps ['LOW'];

	//ambil data value untuk Remark RemarkCellCu3Mbps
	$EastSqlCellCu1Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'East' AND Remark='RemarkCellCu3Mbps' AND Week = '$Week'";
	$EastResultCellCu3Mbps = sqlsrv_query($conn, $EastSqlCellCu1Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$EastDataCellCu3Mbps = sqlsrv_fetch_array($EastResultCellCu3Mbps);
	$EastCellCu3MbpsNMEET		= $EastDataCellCu3Mbps ['NY_MEET'];
	$EastCellCu3MbpsMEET 		= $EastDataCellCu3Mbps ['MEET'];
	$EastCellCu3MbpsNCONGEST 	= $EastDataCellCu3Mbps ['NOT_CONGEST'];
	$EastCellCu3MbpsCONGEST 	= $EastDataCellCu3Mbps ['CONGEST'];
	$EastCellCu3MbpsNISSUE 		= $EastDataCellCu3Mbps ['NO_ISSUE'];
	$EastCellCu3MbpsISSUE 		= $EastDataCellCu3Mbps ['ISSUE'];
	$EastCellCu3MbpsHIGH 		= $EastDataCellCu3Mbps ['HIGH'];
	$EastCellCu3MbpsMEDIUM 		= $EastDataCellCu3Mbps ['MEDIUM'];
	$EastCellCu3MbpsLOW  		= $EastDataCellCu3Mbps ['LOW'];

	//ambil data value untuk Remark CellUserThp1Mbps
	$EastSqlCellUserThp1Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'East' AND Remark='CellUserThp1Mbps' AND Week = '$Week'";
	$EastResultCellUserThp1Mbps = sqlsrv_query($conn, $EastSqlCellUserThp1Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$EastDataCellUserThp1Mbps = sqlsrv_fetch_array($EastResultCellUserThp1Mbps);
	$EastCellUserThp1MbpsNMEET		= $EastDataCellUserThp1Mbps ['NY_MEET'];
	$EastCellUserThp1MbpsMEET 		= $EastDataCellUserThp1Mbps ['MEET'];
	$EastCellUserThp1MbpsNCONGEST 	= $EastDataCellUserThp1Mbps ['NOT_CONGEST'];
	$EastCellUserThp1MbpsCONGEST 	= $EastDataCellUserThp1Mbps ['CONGEST'];
	$EastCellUserThp1MbpsNISSUE 	= $EastDataCellUserThp1Mbps ['NO_ISSUE'];
	$EastCellUserThp1MbpsISSUE 		= $EastDataCellUserThp1Mbps ['ISSUE'];
	$EastCellUserThp1MbpsHIGH 		= $EastDataCellUserThp1Mbps ['HIGH'];
	$EastCellUserThp1MbpsMEDIUM 	= $EastDataCellUserThp1Mbps ['MEDIUM'];
	$EastCellUserThp1MbpsLOW  		= $EastDataCellUserThp1Mbps ['LOW'];
	

	//ambil data value untuk Remark CellUserThp3Mbps
	$EastSqlCellUserThp3Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'East' AND Remark='CellUserThp3Mbps' AND Week = '$Week'";
	$EastResultCellUserThp3Mbps = sqlsrv_query($conn, $EastSqlCellUserThp3Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$EastDataCellUserThp3Mbps = sqlsrv_fetch_array($EastResultCellUserThp3Mbps);
	$EastCellUserThp3MbpsNMEET		= $EastDataCellUserThp3Mbps ['NY_MEET'];
	$EastCellUserThp3MbpsMEET 		= $EastDataCellUserThp3Mbps ['MEET'];
	$EastCellUserThp3MbpsNCONGEST 	= $EastDataCellUserThp3Mbps ['NOT_CONGEST'];
	$EastCellUserThp3MbpsCONGEST 	= $EastDataCellUserThp3Mbps ['CONGEST'];
	$EastCellUserThp3MbpsNISSUE 	= $EastDataCellUserThp3Mbps ['NO_ISSUE'];
	$EastCellUserThp3MbpsISSUE 		= $EastDataCellUserThp3Mbps ['ISSUE'];
	$EastCellUserThp3MbpsHIGH 		= $EastDataCellUserThp3Mbps ['HIGH'];
	$EastCellUserThp3MbpsMEDIUM 	= $EastDataCellUserThp3Mbps ['MEDIUM'];
	$EastCellUserThp3MbpsLOW  		= $EastDataCellUserThp3Mbps ['LOW'];

	//ambil data value untuk Remark CellUserThp3Mbps
	$EastSqlCellUserThp3Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'East' AND Remark='CellUserThp3Mbps' AND Week = '$Week' ";
	$EastResultCellUserThp3Mbps = sqlsrv_query($conn, $EastSqlCellUserThp3Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$EastDataCellUserThp3Mbps = sqlsrv_fetch_array($EastResultCellUserThp3Mbps);
	$EastCellUserThp3MbpsNMEET		= $EastDataCellUserThp3Mbps ['NY_MEET'];
	$EastCellUserThp3MbpsMEET 		= $EastDataCellUserThp3Mbps ['MEET'];
	$EastCellUserThp3MbpsNCONGEST 	= $EastDataCellUserThp3Mbps ['NOT_CONGEST'];
	$EastCellUserThp3MbpsCONGEST 	= $EastDataCellUserThp3Mbps ['CONGEST'];
	$EastCellUserThp3MbpsNISSUE 	= $EastDataCellUserThp3Mbps ['NO_ISSUE'];
	$EastCellUserThp3MbpsISSUE 		= $EastDataCellUserThp3Mbps ['ISSUE'];
	$EastCellUserThp3MbpsHIGH 		= $EastDataCellUserThp3Mbps ['HIGH'];
	$EastCellUserThp3MbpsMEDIUM 	= $EastDataCellUserThp3Mbps ['MEDIUM'];
	$EastCellUserThp3MbpsLOW  		= $EastDataCellUserThp3Mbps ['LOW'];



//Get Value For Chart Region Jabodetabek  
	//ambil data value untuk Remark RemarkCellOperation
	$JabodetabekSqlCellOperation = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Jabodetabek' AND Remark='RemarkCellOperation' AND Week = '$Week'";
	$JabodetabekResultCellOperation = sqlsrv_query($conn, $JabodetabekSqlCellOperation, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$JabodetabekDataCellOperation = sqlsrv_fetch_array($JabodetabekResultCellOperation);
	$JabodetabekCellOperationNMEET		= $JabodetabekDataCellOperation ['NY_MEET'];
	$JabodetabekCellOperationMEET 		= $JabodetabekDataCellOperation ['MEET'];
	$JabodetabekCellOperationNCONGEST 	= $JabodetabekDataCellOperation ['NOT_CONGEST'];
	$JabodetabekCellOperationCONGEST 	= $JabodetabekDataCellOperation ['CONGEST'];
	$JabodetabekCellOperationNISSUE 	= $JabodetabekDataCellOperation ['NO_ISSUE'];
	$JabodetabekCellOperationISSUE 		= $JabodetabekDataCellOperation ['ISSUE'];
	$JabodetabekCellOperationHIGH 		= $JabodetabekDataCellOperation ['HIGH'];
	$JabodetabekCellOperationMEDIUM 	= $JabodetabekDataCellOperation ['MEDIUM'];
	$JabodetabekCellOperationLOW  		= $JabodetabekDataCellOperation ['LOW'];
	
	//ambil data value untuk Remark RemarkCellPRB
	$JabodetabekSqlCellPRB = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Jabodetabek' AND Remark='RemarkCellPRB' AND Week = '$Week' ";
	$JabodetabekResultCellPRB = sqlsrv_query($conn, $JabodetabekSqlCellPRB, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$JabodetabekDataCellPRB = sqlsrv_fetch_array($JabodetabekResultCellPRB);
	$JabodetabekCellPRBNMEET		= $JabodetabekDataCellPRB ['NY_MEET'];
	$JabodetabekCellPRBMEET 		= $JabodetabekDataCellPRB ['MEET'];
	$JabodetabekCellPRBNCONGEST 	= $JabodetabekDataCellPRB ['NOT_CONGEST'];
	$JabodetabekCellPRBCONGEST 		= $JabodetabekDataCellPRB ['CONGEST'];
	$JabodetabekCellPRBNISSUE 		= $JabodetabekDataCellPRB ['NO_ISSUE'];
	$JabodetabekCellPRBISSUE 		= $JabodetabekDataCellPRB ['ISSUE'];
	$JabodetabekCellPRBHIGH 		= $JabodetabekDataCellPRB ['HIGH'];
	$JabodetabekCellPRBMEDIUM 		= $JabodetabekDataCellPRB ['MEDIUM'];
	$JabodetabekCellPRBLOW  		= $JabodetabekDataCellPRB ['LOW'];

	//ambil data value untuk Remark RemarkCellSpectral
	$JabodetabekSqlCellSpectral = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Jabodetabek' AND Remark='RemarkCellSpectral' AND Week = '$Week'";
	$JabodetabekResultCellSpectral = sqlsrv_query($conn, $JabodetabekSqlCellSpectral, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$JabodetabekDataCellSpectral = sqlsrv_fetch_array($JabodetabekResultCellSpectral);
	$JabodetabekCellSpectralNMEET		= $JabodetabekDataCellSpectral ['NY_MEET'];
	$JabodetabekCellSpectralMEET 		= $JabodetabekDataCellSpectral ['MEET'];
	$JabodetabekCellSpectralNCONGEST 	= $JabodetabekDataCellSpectral ['NOT_CONGEST'];
	$JabodetabekCellSpectralCONGEST 	= $JabodetabekDataCellSpectral ['CONGEST'];
	$JabodetabekCellSpectralNISSUE 		= $JabodetabekDataCellSpectral ['NO_ISSUE'];
	$JabodetabekCellSpectralISSUE 		= $JabodetabekDataCellSpectral ['ISSUE'];
	$JabodetabekCellSpectralHIGH 		= $JabodetabekDataCellSpectral ['HIGH'];
	$JabodetabekCellSpectralMEDIUM 		= $JabodetabekDataCellSpectral ['MEDIUM'];
	$JabodetabekCellSpectralLOW  		= $JabodetabekDataCellSpectral ['LOW'];

	//ambil data value untuk Remark RemarkCellCu1Mbps
	$JabodetabekSqlCellCu1Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Jabodetabek' AND Remark='RemarkCellCu1Mbps' AND Week = '$Week'";
	$JabodetabekResultCellCu1Mbps = sqlsrv_query($conn, $JabodetabekSqlCellCu1Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$JabodetabekDataCellCu1Mbps = sqlsrv_fetch_array($JabodetabekResultCellCu1Mbps);
	$JabodetabekCellCu1MbpsNMEET		= $JabodetabekDataCellCu1Mbps ['NY_MEET'];
	$JabodetabekCellCu1MbpsMEET 		= $JabodetabekDataCellCu1Mbps ['MEET'];
	$JabodetabekCellCu1MbpsNCONGEST 	= $JabodetabekDataCellCu1Mbps ['NOT_CONGEST'];
	$JabodetabekCellCu1MbpsCONGEST 		= $JabodetabekDataCellCu1Mbps ['CONGEST'];
	$JabodetabekCellCu1MbpsNISSUE 		= $JabodetabekDataCellCu1Mbps ['NO_ISSUE'];
	$JabodetabekCellCu1MbpsISSUE 		= $JabodetabekDataCellCu1Mbps ['ISSUE'];
	$JabodetabekCellCu1MbpsHIGH 		= $JabodetabekDataCellCu1Mbps ['HIGH'];
	$JabodetabekCellCu1MbpsMEDIUM 		= $JabodetabekDataCellCu1Mbps ['MEDIUM'];
	$JabodetabekCellCu1MbpsLOW  		= $JabodetabekDataCellCu1Mbps ['LOW'];

	//ambil data value untuk Remark RemarkCellCu3Mbps
	$JabodetabekSqlCellCu1Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Jabodetabek' AND Remark='RemarkCellCu3Mbps' AND Week = '$Week'";
	$JabodetabekResultCellCu3Mbps = sqlsrv_query($conn, $JabodetabekSqlCellCu1Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$JabodetabekDataCellCu3Mbps = sqlsrv_fetch_array($JabodetabekResultCellCu3Mbps);
	$JabodetabekCellCu3MbpsNMEET		= $JabodetabekDataCellCu3Mbps ['NY_MEET'];
	$JabodetabekCellCu3MbpsMEET 		= $JabodetabekDataCellCu3Mbps ['MEET'];
	$JabodetabekCellCu3MbpsNCONGEST 	= $JabodetabekDataCellCu3Mbps ['NOT_CONGEST'];
	$JabodetabekCellCu3MbpsCONGEST 		= $JabodetabekDataCellCu3Mbps ['CONGEST'];
	$JabodetabekCellCu3MbpsNISSUE 		= $JabodetabekDataCellCu3Mbps ['NO_ISSUE'];
	$JabodetabekCellCu3MbpsISSUE 		= $JabodetabekDataCellCu3Mbps ['ISSUE'];
	$JabodetabekCellCu3MbpsHIGH 		= $JabodetabekDataCellCu3Mbps ['HIGH'];
	$JabodetabekCellCu3MbpsMEDIUM 		= $JabodetabekDataCellCu3Mbps ['MEDIUM'];
	$JabodetabekCellCu3MbpsLOW  		= $JabodetabekDataCellCu3Mbps ['LOW'];

	//ambil data value untuk Remark CellUserThp1Mbps
	$JabodetabekSqlCellUserThp1Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Jabodetabek' AND Remark='CellUserThp1Mbps' AND Week = '$Week'";
	$JabodetabekResultCellUserThp1Mbps = sqlsrv_query($conn, $JabodetabekSqlCellUserThp1Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$JabodetabekDataCellUserThp1Mbps = sqlsrv_fetch_array($JabodetabekResultCellUserThp1Mbps);
	$JabodetabekCellUserThp1MbpsNMEET		= $JabodetabekDataCellUserThp1Mbps ['NY_MEET'];
	$JabodetabekCellUserThp1MbpsMEET 		= $JabodetabekDataCellUserThp1Mbps ['MEET'];
	$JabodetabekCellUserThp1MbpsNCONGEST 	= $JabodetabekDataCellUserThp1Mbps ['NOT_CONGEST'];
	$JabodetabekCellUserThp1MbpsCONGEST 	= $JabodetabekDataCellUserThp1Mbps ['CONGEST'];
	$JabodetabekCellUserThp1MbpsNISSUE 		= $JabodetabekDataCellUserThp1Mbps ['NO_ISSUE'];
	$JabodetabekCellUserThp1MbpsISSUE 		= $JabodetabekDataCellUserThp1Mbps ['ISSUE'];
	$JabodetabekCellUserThp1MbpsHIGH 		= $JabodetabekDataCellUserThp1Mbps ['HIGH'];
	$JabodetabekCellUserThp1MbpsMEDIUM 		= $JabodetabekDataCellUserThp1Mbps ['MEDIUM'];
	$JabodetabekCellUserThp1MbpsLOW  		= $JabodetabekDataCellUserThp1Mbps ['LOW'];
	

	//ambil data value untuk Remark CellUserThp3Mbps
	$JabodetabekSqlCellUserThp3Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Jabodetabek' AND Remark='CellUserThp3Mbps' AND Week = '$Week'";
	$JabodetabekResultCellUserThp3Mbps = sqlsrv_query($conn, $JabodetabekSqlCellUserThp3Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$JabodetabekDataCellUserThp3Mbps = sqlsrv_fetch_array($JabodetabekResultCellUserThp3Mbps);
	$JabodetabekCellUserThp3MbpsNMEET		= $JabodetabekDataCellUserThp3Mbps ['NY_MEET'];
	$JabodetabekCellUserThp3MbpsMEET 		= $JabodetabekDataCellUserThp3Mbps ['MEET'];
	$JabodetabekCellUserThp3MbpsNCONGEST 	= $JabodetabekDataCellUserThp3Mbps ['NOT_CONGEST'];
	$JabodetabekCellUserThp3MbpsCONGEST 	= $JabodetabekDataCellUserThp3Mbps ['CONGEST'];
	$JabodetabekCellUserThp3MbpsNISSUE 		= $JabodetabekDataCellUserThp3Mbps ['NO_ISSUE'];
	$JabodetabekCellUserThp3MbpsISSUE 		= $JabodetabekDataCellUserThp3Mbps ['ISSUE'];
	$JabodetabekCellUserThp3MbpsHIGH 		= $JabodetabekDataCellUserThp3Mbps ['HIGH'];
	$JabodetabekCellUserThp3MbpsMEDIUM 		= $JabodetabekDataCellUserThp3Mbps ['MEDIUM'];
	$JabodetabekCellUserThp3MbpsLOW  		= $JabodetabekDataCellUserThp3Mbps ['LOW'];

	//ambil data value untuk Remark CellUserThp3Mbps
	$JabodetabekSqlCellUserThp3Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'Jabodetabek' AND Remark='CellUserThp3Mbps' AND Week = '$Week' ";
	$JabodetabekResultCellUserThp3Mbps = sqlsrv_query($conn, $JabodetabekSqlCellUserThp3Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$JabodetabekDataCellUserThp3Mbps = sqlsrv_fetch_array($JabodetabekResultCellUserThp3Mbps);
	$JabodetabekCellUserThp3MbpsNMEET		= $JabodetabekDataCellUserThp3Mbps ['NY_MEET'];
	$JabodetabekCellUserThp3MbpsMEET 		= $JabodetabekDataCellUserThp3Mbps ['MEET'];
	$JabodetabekCellUserThp3MbpsNCONGEST 	= $JabodetabekDataCellUserThp3Mbps ['NOT_CONGEST'];
	$JabodetabekCellUserThp3MbpsCONGEST 	= $JabodetabekDataCellUserThp3Mbps ['CONGEST'];
	$JabodetabekCellUserThp3MbpsNISSUE 		= $JabodetabekDataCellUserThp3Mbps ['NO_ISSUE'];
	$JabodetabekCellUserThp3MbpsISSUE 		= $JabodetabekDataCellUserThp3Mbps ['ISSUE'];
	$JabodetabekCellUserThp3MbpsHIGH 		= $JabodetabekDataCellUserThp3Mbps ['HIGH'];
	$JabodetabekCellUserThp3MbpsMEDIUM 		= $JabodetabekDataCellUserThp3Mbps ['MEDIUM'];
	$JabodetabekCellUserThp3MbpsLOW  		= $JabodetabekDataCellUserThp3Mbps ['LOW'];
	
//Get Value For Chart North
	//ambil data value untuk Remark RemarkCellOperation
	$NorthSqlCellOperation = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'North' AND Remark='RemarkCellOperation' AND Week = '$Week'";
	$NorthResultCellOperation = sqlsrv_query($conn, $NorthSqlCellOperation, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$NorthDataCellOperation = sqlsrv_fetch_array($NorthResultCellOperation);
	$NorthCellOperationNMEET		= $NorthDataCellOperation ['NY_MEET'];
	$NorthCellOperationMEET 		= $NorthDataCellOperation ['MEET'];
	$NorthCellOperationNCONGEST 	= $NorthDataCellOperation ['NOT_CONGEST'];
	$NorthCellOperationCONGEST 	= $NorthDataCellOperation ['CONGEST'];
	$NorthCellOperationNISSUE 	= $NorthDataCellOperation ['NO_ISSUE'];
	$NorthCellOperationISSUE 		= $NorthDataCellOperation ['ISSUE'];
	$NorthCellOperationHIGH 		= $NorthDataCellOperation ['HIGH'];
	$NorthCellOperationMEDIUM 	= $NorthDataCellOperation ['MEDIUM'];
	$NorthCellOperationLOW  		= $NorthDataCellOperation ['LOW'];
	
	//ambil data value untuk Remark RemarkCellPRB
	$NorthSqlCellPRB = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'North' AND Remark='RemarkCellPRB' AND Week = '$Week' ";
	$NorthResultCellPRB = sqlsrv_query($conn, $NorthSqlCellPRB, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$NorthDataCellPRB = sqlsrv_fetch_array($NorthResultCellPRB);
	$NorthCellPRBNMEET		= $NorthDataCellPRB ['NY_MEET'];
	$NorthCellPRBMEET 		= $NorthDataCellPRB ['MEET'];
	$NorthCellPRBNCONGEST 	= $NorthDataCellPRB ['NOT_CONGEST'];
	$NorthCellPRBCONGEST 		= $NorthDataCellPRB ['CONGEST'];
	$NorthCellPRBNISSUE 		= $NorthDataCellPRB ['NO_ISSUE'];
	$NorthCellPRBISSUE 		= $NorthDataCellPRB ['ISSUE'];
	$NorthCellPRBHIGH 		= $NorthDataCellPRB ['HIGH'];
	$NorthCellPRBMEDIUM 		= $NorthDataCellPRB ['MEDIUM'];
	$NorthCellPRBLOW  		= $NorthDataCellPRB ['LOW'];

	//ambil data value untuk Remark RemarkCellSpectral
	$NorthSqlCellSpectral = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'North' AND Remark='RemarkCellSpectral' AND Week = '$Week'";
	$NorthResultCellSpectral = sqlsrv_query($conn, $NorthSqlCellSpectral, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$NorthDataCellSpectral = sqlsrv_fetch_array($NorthResultCellSpectral);
	$NorthCellSpectralNMEET		= $NorthDataCellSpectral ['NY_MEET'];
	$NorthCellSpectralMEET 		= $NorthDataCellSpectral ['MEET'];
	$NorthCellSpectralNCONGEST 	= $NorthDataCellSpectral ['NOT_CONGEST'];
	$NorthCellSpectralCONGEST 	= $NorthDataCellSpectral ['CONGEST'];
	$NorthCellSpectralNISSUE 		= $NorthDataCellSpectral ['NO_ISSUE'];
	$NorthCellSpectralISSUE 		= $NorthDataCellSpectral ['ISSUE'];
	$NorthCellSpectralHIGH 		= $NorthDataCellSpectral ['HIGH'];
	$NorthCellSpectralMEDIUM 		= $NorthDataCellSpectral ['MEDIUM'];
	$NorthCellSpectralLOW  		= $NorthDataCellSpectral ['LOW'];

	//ambil data value untuk Remark RemarkCellCu1Mbps
	$NorthSqlCellCu1Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'North' AND Remark='RemarkCellCu1Mbps' AND Week = '$Week'";
	$NorthResultCellCu1Mbps = sqlsrv_query($conn, $NorthSqlCellCu1Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$NorthDataCellCu1Mbps = sqlsrv_fetch_array($NorthResultCellCu1Mbps);
	$NorthCellCu1MbpsNMEET		= $NorthDataCellCu1Mbps ['NY_MEET'];
	$NorthCellCu1MbpsMEET 		= $NorthDataCellCu1Mbps ['MEET'];
	$NorthCellCu1MbpsNCONGEST 	= $NorthDataCellCu1Mbps ['NOT_CONGEST'];
	$NorthCellCu1MbpsCONGEST 		= $NorthDataCellCu1Mbps ['CONGEST'];
	$NorthCellCu1MbpsNISSUE 		= $NorthDataCellCu1Mbps ['NO_ISSUE'];
	$NorthCellCu1MbpsISSUE 		= $NorthDataCellCu1Mbps ['ISSUE'];
	$NorthCellCu1MbpsHIGH 		= $NorthDataCellCu1Mbps ['HIGH'];
	$NorthCellCu1MbpsMEDIUM 		= $NorthDataCellCu1Mbps ['MEDIUM'];
	$NorthCellCu1MbpsLOW  		= $NorthDataCellCu1Mbps ['LOW'];

	//ambil data value untuk Remark RemarkCellCu3Mbps
	$NorthSqlCellCu1Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'North' AND Remark='RemarkCellCu3Mbps' AND Week = '$Week'";
	$NorthResultCellCu3Mbps = sqlsrv_query($conn, $NorthSqlCellCu1Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$NorthDataCellCu3Mbps = sqlsrv_fetch_array($NorthResultCellCu3Mbps);
	$NorthCellCu3MbpsNMEET		= $NorthDataCellCu3Mbps ['NY_MEET'];
	$NorthCellCu3MbpsMEET 		= $NorthDataCellCu3Mbps ['MEET'];
	$NorthCellCu3MbpsNCONGEST 	= $NorthDataCellCu3Mbps ['NOT_CONGEST'];
	$NorthCellCu3MbpsCONGEST 		= $NorthDataCellCu3Mbps ['CONGEST'];
	$NorthCellCu3MbpsNISSUE 		= $NorthDataCellCu3Mbps ['NO_ISSUE'];
	$NorthCellCu3MbpsISSUE 		= $NorthDataCellCu3Mbps ['ISSUE'];
	$NorthCellCu3MbpsHIGH 		= $NorthDataCellCu3Mbps ['HIGH'];
	$NorthCellCu3MbpsMEDIUM 		= $NorthDataCellCu3Mbps ['MEDIUM'];
	$NorthCellCu3MbpsLOW  		= $NorthDataCellCu3Mbps ['LOW'];

	//ambil data value untuk Remark CellUserThp1Mbps
	$NorthSqlCellUserThp1Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'North' AND Remark='CellUserThp1Mbps' AND Week = '$Week'";
	$NorthResultCellUserThp1Mbps = sqlsrv_query($conn, $NorthSqlCellUserThp1Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$NorthDataCellUserThp1Mbps = sqlsrv_fetch_array($NorthResultCellUserThp1Mbps);
	$NorthCellUserThp1MbpsNMEET		= $NorthDataCellUserThp1Mbps ['NY_MEET'];
	$NorthCellUserThp1MbpsMEET 		= $NorthDataCellUserThp1Mbps ['MEET'];
	$NorthCellUserThp1MbpsNCONGEST 	= $NorthDataCellUserThp1Mbps ['NOT_CONGEST'];
	$NorthCellUserThp1MbpsCONGEST 	= $NorthDataCellUserThp1Mbps ['CONGEST'];
	$NorthCellUserThp1MbpsNISSUE 		= $NorthDataCellUserThp1Mbps ['NO_ISSUE'];
	$NorthCellUserThp1MbpsISSUE 		= $NorthDataCellUserThp1Mbps ['ISSUE'];
	$NorthCellUserThp1MbpsHIGH 		= $NorthDataCellUserThp1Mbps ['HIGH'];
	$NorthCellUserThp1MbpsMEDIUM 		= $NorthDataCellUserThp1Mbps ['MEDIUM'];
	$NorthCellUserThp1MbpsLOW  		= $NorthDataCellUserThp1Mbps ['LOW'];
	

	//ambil data value untuk Remark CellUserThp3Mbps
	$NorthSqlCellUserThp3Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'North' AND Remark='CellUserThp3Mbps' AND Week = '$Week'";
	$NorthResultCellUserThp3Mbps = sqlsrv_query($conn, $NorthSqlCellUserThp3Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$NorthDataCellUserThp3Mbps = sqlsrv_fetch_array($NorthResultCellUserThp3Mbps);
	$NorthCellUserThp3MbpsNMEET		= $NorthDataCellUserThp3Mbps ['NY_MEET'];
	$NorthCellUserThp3MbpsMEET 		= $NorthDataCellUserThp3Mbps ['MEET'];
	$NorthCellUserThp3MbpsNCONGEST 	= $NorthDataCellUserThp3Mbps ['NOT_CONGEST'];
	$NorthCellUserThp3MbpsCONGEST 	= $NorthDataCellUserThp3Mbps ['CONGEST'];
	$NorthCellUserThp3MbpsNISSUE 		= $NorthDataCellUserThp3Mbps ['NO_ISSUE'];
	$NorthCellUserThp3MbpsISSUE 		= $NorthDataCellUserThp3Mbps ['ISSUE'];
	$NorthCellUserThp3MbpsHIGH 		= $NorthDataCellUserThp3Mbps ['HIGH'];
	$NorthCellUserThp3MbpsMEDIUM 		= $NorthDataCellUserThp3Mbps ['MEDIUM'];
	$NorthCellUserThp3MbpsLOW  		= $NorthDataCellUserThp3Mbps ['LOW'];

	//ambil data value untuk Remark CellUserThp3Mbps
	$NorthSqlCellUserThp3Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'North' AND Remark='CellUserThp3Mbps' AND Week = '$Week' ";
	$NorthResultCellUserThp3Mbps = sqlsrv_query($conn, $NorthSqlCellUserThp3Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$NorthDataCellUserThp3Mbps = sqlsrv_fetch_array($NorthResultCellUserThp3Mbps);
	$NorthCellUserThp3MbpsNMEET		= $NorthDataCellUserThp3Mbps ['NY_MEET'];
	$NorthCellUserThp3MbpsMEET 		= $NorthDataCellUserThp3Mbps ['MEET'];
	$NorthCellUserThp3MbpsNCONGEST 	= $NorthDataCellUserThp3Mbps ['NOT_CONGEST'];
	$NorthCellUserThp3MbpsCONGEST 	= $NorthDataCellUserThp3Mbps ['CONGEST'];
	$NorthCellUserThp3MbpsNISSUE 		= $NorthDataCellUserThp3Mbps ['NO_ISSUE'];
	$NorthCellUserThp3MbpsISSUE 		= $NorthDataCellUserThp3Mbps ['ISSUE'];
	$NorthCellUserThp3MbpsHIGH 		= $NorthDataCellUserThp3Mbps ['HIGH'];
	$NorthCellUserThp3MbpsMEDIUM 		= $NorthDataCellUserThp3Mbps ['MEDIUM'];
	$NorthCellUserThp3MbpsLOW  		= $NorthDataCellUserThp3Mbps ['LOW'];



//Get Value For Chart Region West

	//ambil data value untuk Remark RemarkCellOperation
	$WestSqlCellOperation = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'West' AND Remark='RemarkCellOperation' AND Week = '$Week'";
	$WestResultCellOperation = sqlsrv_query($conn, $WestSqlCellOperation, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$WestDataCellOperation = sqlsrv_fetch_array($WestResultCellOperation);
	$WestCellOperationNMEET		= $WestDataCellOperation ['NY_MEET'];
	$WestCellOperationMEET 		= $WestDataCellOperation ['MEET'];
	$WestCellOperationNCONGEST 	= $WestDataCellOperation ['NOT_CONGEST'];
	$WestCellOperationCONGEST 	= $WestDataCellOperation ['CONGEST'];
	$WestCellOperationNISSUE 	= $WestDataCellOperation ['NO_ISSUE'];
	$WestCellOperationISSUE 	= $WestDataCellOperation ['ISSUE'];
	$WestCellOperationHIGH 		= $WestDataCellOperation ['HIGH'];
	$WestCellOperationMEDIUM 	= $WestDataCellOperation ['MEDIUM'];
	$WestCellOperationLOW  		= $WestDataCellOperation ['LOW'];
	
	//ambil data value untuk Remark RemarkCellPRB
	$WestSqlCellPRB = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'West' AND Remark='RemarkCellPRB' AND Week = '$Week' ";
	$WestResultCellPRB = sqlsrv_query($conn, $WestSqlCellPRB, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$WestDataCellPRB = sqlsrv_fetch_array($WestResultCellPRB);
	$WestCellPRBNMEET		= $WestDataCellPRB ['NY_MEET'];
	$WestCellPRBMEET 		= $WestDataCellPRB ['MEET'];
	$WestCellPRBNCONGEST 	= $WestDataCellPRB ['NOT_CONGEST'];
	$WestCellPRBCONGEST 	= $WestDataCellPRB ['CONGEST'];
	$WestCellPRBNISSUE 		= $WestDataCellPRB ['NO_ISSUE'];
	$WestCellPRBISSUE 		= $WestDataCellPRB ['ISSUE'];
	$WestCellPRBHIGH 		= $WestDataCellPRB ['HIGH'];
	$WestCellPRBMEDIUM 		= $WestDataCellPRB ['MEDIUM'];
	$WestCellPRBLOW  		= $WestDataCellPRB ['LOW'];

	//ambil data value untuk Remark RemarkCellSpectral
	$WestSqlCellSpectral = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'West' AND Remark='RemarkCellSpectral' AND Week = '$Week'";
	$WestResultCellSpectral = sqlsrv_query($conn, $WestSqlCellSpectral, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$WestDataCellSpectral = sqlsrv_fetch_array($WestResultCellSpectral);
	$WestCellSpectralNMEET		= $WestDataCellSpectral ['NY_MEET'];
	$WestCellSpectralMEET 		= $WestDataCellSpectral ['MEET'];
	$WestCellSpectralNCONGEST 	= $WestDataCellSpectral ['NOT_CONGEST'];
	$WestCellSpectralCONGEST 	= $WestDataCellSpectral ['CONGEST'];
	$WestCellSpectralNISSUE		= $WestDataCellSpectral ['NO_ISSUE'];
	$WestCellSpectralISSUE 		= $WestDataCellSpectral ['ISSUE'];
	$WestCellSpectralHIGH 		= $WestDataCellSpectral ['HIGH'];
	$WestCellSpectralMEDIUM 		= $WestDataCellSpectral ['MEDIUM'];
	$WestCellSpectralLOW  		= $WestDataCellSpectral ['LOW'];

	//ambil data value untuk Remark RemarkCellCu1Mbps
	$WestSqlCellCu1Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'West' AND Remark='RemarkCellCu1Mbps' AND Week = '$Week'";
	$WestResultCellCu1Mbps = sqlsrv_query($conn, $WestSqlCellCu1Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$WestDataCellCu1Mbps = sqlsrv_fetch_array($WestResultCellCu1Mbps);
	$WestCellCu1MbpsNMEET		= $WestDataCellCu1Mbps ['NY_MEET'];
	$WestCellCu1MbpsMEET 		= $WestDataCellCu1Mbps ['MEET'];
	$WestCellCu1MbpsNCONGEST 	= $WestDataCellCu1Mbps ['NOT_CONGEST'];
	$WestCellCu1MbpsCONGES 		= $WestDataCellCu1Mbps ['CONGEST'];
	$WestCellCu1MbpsNISSUE 		= $WestDataCellCu1Mbps ['NO_ISSUE'];
	$WestCellCu1MbpsISSUE 		= $WestDataCellCu1Mbps ['ISSUE'];
	$WestCellCu1MbpsHIGH 		= $WestDataCellCu1Mbps ['HIGH'];
	$WestCellCu1MbpsMEDIUM 		= $WestDataCellCu1Mbps ['MEDIUM'];
	$WestCellCu1MbpsLOW  		= $WestDataCellCu1Mbps ['LOW'];

	//ambil data value untuk Remark RemarkCellCu3Mbps
	$WestSqlCellCu1Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'West' AND Remark='RemarkCellCu3Mbps' AND Week = '$Week'";
	$WestResultCellCu3Mbps = sqlsrv_query($conn, $WestSqlCellCu1Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$WestDataCellCu3Mbps = sqlsrv_fetch_array($WestResultCellCu3Mbps);
	$WestCellCu3MbpsNMEET		= $WestDataCellCu3Mbps ['NY_MEET'];
	$WestCellCu3MbpsMEET 		= $WestDataCellCu3Mbps ['MEET'];
	$WestCellCu3MbpsNCONGEST 	= $WestDataCellCu3Mbps ['NOT_CONGEST'];
	$WestCellCu3MbpsCONGES 		= $WestDataCellCu3Mbps ['CONGEST'];
	$WestCellCu3MbpsNISSUE 		= $WestDataCellCu3Mbps ['NO_ISSUE'];
	$WestCellCu3MbpsISSUE 		= $WestDataCellCu3Mbps ['ISSUE'];
	$WestCellCu3MbpsHIGH 		= $WestDataCellCu3Mbps ['HIGH'];
	$WestCellCu3MbpsMEDIUM 		= $WestDataCellCu3Mbps ['MEDIUM'];
	$WestCellCu3MbpsLOW  		= $WestDataCellCu3Mbps ['LOW'];

	//ambil data value untuk Remark CellUserThp1Mbps
	$WestSqlCellUserThp1Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'West' AND Remark='CellUserThp1Mbps' AND Week = '$Week'";
	$WestResultCellUserThp1Mbps = sqlsrv_query($conn, $WestSqlCellUserThp1Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$WestDataCellUserThp1Mbps = sqlsrv_fetch_array($WestResultCellUserThp1Mbps);
	$WestCellUserThp1MbpsNMEET		= $WestDataCellUserThp1Mbps ['NY_MEET'];
	$WestCellUserThp1MbpsMEET 		= $WestDataCellUserThp1Mbps ['MEET'];
	$WestCellUserThp1MbpsNCONGEST 	= $WestDataCellUserThp1Mbps ['NOT_CONGEST'];
	$WestCellUserThp1MbpsCONGEST 	= $WestDataCellUserThp1Mbps ['CONGEST'];
	$WestCellUserThp1MbpsNISSUE 	= $WestDataCellUserThp1Mbps ['NO_ISSUE'];
	$WestCellUserThp1MbpsISSUE 		= $WestDataCellUserThp1Mbps ['ISSUE'];
	$WestCellUserThp1MbpsHIGH 		= $WestDataCellUserThp1Mbps ['HIGH'];
	$WestCellUserThp1MbpsMEDIUM		= $WestDataCellUserThp1Mbps ['MEDIUM'];
	$WestCellUserThp1MbpsLOW  		= $WestDataCellUserThp1Mbps ['LOW'];
	

	//ambil data value untuk Remark CellUserThp3Mbps
	$WestSqlCellUserThp3Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'West' AND Remark='CellUserThp3Mbps' AND Week = '$Week'";
	$WestResultCellUserThp3Mbps = sqlsrv_query($conn, $WestSqlCellUserThp3Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$WestDataCellUserThp3Mbps = sqlsrv_fetch_array($WestResultCellUserThp3Mbps);
	$WestCellUserThp3MbpsNMEET		= $WestDataCellUserThp3Mbps ['NY_MEET'];
	$WestCellUserThp3MbpsMEET 		= $WestDataCellUserThp3Mbps ['MEET'];
	$WestCellUserThp3MbpsNCONGEST 	= $WestDataCellUserThp3Mbps ['NOT_CONGEST'];
	$WestCellUserThp3MbpsCONGEST 	= $WestDataCellUserThp3Mbps ['CONGEST'];
	$WestCellUserThp3MbpsNISSUE 	= $WestDataCellUserThp3Mbps ['NO_ISSUE'];
	$WestCellUserThp3MbpsISSUE 		= $WestDataCellUserThp3Mbps ['ISSUE'];
	$WestCellUserThp3MbpsHIGH 		= $WestDataCellUserThp3Mbps ['HIGH'];
	$WestCellUserThp3MbpsMEDIUM		= $WestDataCellUserThp3Mbps ['MEDIUM'];
	$WestCellUserThp3MbpsLOW  		= $WestDataCellUserThp3Mbps ['LOW'];

	//ambil data value untuk Remark CellUserThp3Mbps
	$WestSqlCellUserThp3Mbps = "SELECT Week, Region,Remark,NY_MEET,MEET,NOT_CONGEST,CONGEST,NO_ISSUE,ISSUE,HIGH,MEDIUM,LOW FROM [WebDashboard].[dbo].[RemarksNQILranCell] WHERE Region = 'West' AND Remark='CellUserThp3Mbps' AND Week = '$Week' ";
	$WestResultCellUserThp3Mbps = sqlsrv_query($conn, $WestSqlCellUserThp3Mbps, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$WestDataCellUserThp3Mbps = sqlsrv_fetch_array($WestResultCellUserThp3Mbps);
	$WestCellUserThp3MbpsNMEET		= $WestDataCellUserThp3Mbps ['NY_MEET'];
	$WestCellUserThp3MbpsMEET 		= $WestDataCellUserThp3Mbps ['MEET'];
	$WestCellUserThp3MbpsNCONGEST 	= $WestDataCellUserThp3Mbps ['NOT_CONGEST'];
	$WestCellUserThp3MbpsCONGEST 	= $WestDataCellUserThp3Mbps ['CONGEST'];
	$WestCellUserThp3MbpsNISSUE 	= $WestDataCellUserThp3Mbps ['NO_ISSUE'];
	$WestCellUserThp3MbpsISSUE 		= $WestDataCellUserThp3Mbps ['ISSUE'];
	$WestCellUserThp3MbpsHIGH 		= $WestDataCellUserThp3Mbps ['HIGH'];
	$WestCellUserThp3MbpsMEDIUM 	= $WestDataCellUserThp3Mbps ['MEDIUM'];
	$WestCellUserThp3MbpsLOW  		= $WestDataCellUserThp3Mbps ['LOW'];

?>

</script>
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
</script>
<script type = "text/javascript">
google.charts.load('current', {packages: ['corechart']});     
</script>
<!-- Chart Region Central -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Resource', 'Not Yet MEET', 'MEET','NO ISSUE','ISSUE','LOW','MEDIUM','HIGH'],
               ['CellOperation', <?php echo $CellOperationNMEET ; ?> , <?php echo $CellOperationMEET ; ?>,<?php echo $CellOperationNISSUE ; ?>,<?php echo $CellOperationISSUE ; ?>,<?php echo $CellOperationLOW ; ?>,<?php echo $CellOperationMEDIUM ; ?>,<?php echo $CellOperationHIGH ; ?> ],
               ['CellPRB' , <?php echo $CellPRBNMEET ; ?> , <?php echo $CellPRBMEET ; ?>, <?php echo $CellPRBNISSUE ; ?>,<?php echo $CellPRBISSUE ; ?>,<?php echo $CellPRBLOW ; ?>,<?php echo $CellPRBMEDIUM ; ?>,<?php echo $CellPRBHIGH ; ?>],
               ['CellSpectral' , <?php echo $CellSpectralNMEET ; ?> , <?php echo $CellSpectralMEET ; ?>, <?php echo $CellSpectralNISSUE ; ?>,<?php echo $CellSpectralISSUE ; ?>,<?php echo $CellSpectralLOW ; ?>,<?php echo $CellSpectralMEDIUM ; ?>,<?php echo $CellSpectralHIGH ; ?>],
               ['CellCu1Mbps' , <?php echo $CellCu1MbpsNMEET ; ?> , <?php echo $CellCu1MbpsMEET ; ?>, <?php echo $CellCu1MbpsNISSUE ; ?>,<?php echo $CellCu1MbpsISSUE ; ?>,<?php echo $CellCu1MbpsLOW ; ?>,<?php echo $CellCu1MbpsMEDIUM ; ?>,<?php echo $CellCu1MbpsHIGH ; ?>],
               ['CellCu3Mbps' , <?php echo $CellCu3MbpsNMEET ; ?> , <?php echo $CellCu3MbpsMEET ; ?>, <?php echo $CellCu3MbpsNISSUE ; ?>,<?php echo $CellCu3MbpsISSUE ; ?>,<?php echo $CellCu3MbpsLOW ; ?>,<?php echo $CellCu3MbpsMEDIUM ; ?>,<?php echo $CellCu3MbpsHIGH ; ?>],
               ['CellUserThp1Mbps' , <?php echo $CellUserThp1MbpsNMEET ; ?> , <?php echo $CellUserThp1MbpsMEET ; ?>,<?php echo $CellUserThp1MbpsNISSUE ; ?>,<?php echo $CellUserThp1MbpsISSUE ; ?>,<?php echo $CellUserThp1MbpsLOW ; ?>,<?php echo $CellUserThp1MbpsMEDIUM ; ?>,<?php echo $CellUserThp1MbpsHIGH ; ?>],
               ['CellUserThp3Mbps' , <?php echo $CellUserThp3MbpsNMEET ; ?> , <?php echo $CellUserThp3MbpsMEET ; ?>,<?php echo $CellUserThp3MbpsNISSUE ; ?>,<?php echo $CellUserThp3MbpsISSUE ; ?>,<?php echo $CellUserThp3MbpsLOW ; ?>,<?php echo $CellUserThp3MbpsMEDIUM ; ?>,<?php echo $CellUserThp3MbpsHIGH ; ?>]
            ]);

            var options = {
               chartArea:{left:"10%",right:"20%"},
               isStacked:'percent',	
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'#FF5722'},
                   1:{color:'#009688'},
                   2:{color:'#FFC107'},
                   3:{color:'#E91E63'},
                   4:{color:'Green'},
                   5:{color:'Yellow'},
                   6:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked1'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart 2 Region EAST -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
         	['Resource', 'Not Yet MEET', 'MEET','NO ISSUE','ISSUE','LOW','MEDIUM','HIGH'],
			['CellOperation', <?php echo $EastCellOperationNMEET ; ?> , <?php echo $EastCellOperationMEET ; ?>,<?php echo $EastCellOperationNISSUE ; ?>,<?php echo $EastCellOperationISSUE ; ?>,<?php echo $EastCellOperationLOW ; ?>,<?php echo $EastCellOperationMEDIUM ; ?>,<?php echo $EastCellOperationHIGH ; ?> ],
			['CellPRB' , <?php echo $EastCellPRBNMEET ; ?> , <?php echo $EastCellPRBMEET ; ?>, <?php echo $EastCellPRBNISSUE ; ?>,<?php echo $EastCellPRBISSUE ; ?>,<?php echo $EastCellPRBLOW ; ?>,<?php echo $EastCellPRBMEDIUM ; ?>,<?php echo $EastCellPRBHIGH ; ?>],
			['CellSpectral' , <?php echo $EastCellSpectralNMEET ; ?> , <?php echo $EastCellSpectralMEET ; ?>, <?php echo $EastCellSpectralNISSUE ; ?>,<?php echo $EastCellSpectralISSUE ; ?>,<?php echo $EastCellSpectralLOW ; ?>,<?php echo $EastCellSpectralMEDIUM ; ?>,<?php echo $EastCellSpectralHIGH ; ?>],
			['CellCu1Mbps' , <?php echo $EastCellCu1MbpsNMEET ; ?> , <?php echo $EastCellCu1MbpsMEET ; ?>, <?php echo $EastCellCu1MbpsNISSUE ; ?>,<?php echo $EastCellCu1MbpsISSUE ; ?>,<?php echo $EastCellCu1MbpsLOW ; ?>,<?php echo $EastCellCu1MbpsMEDIUM ; ?>,<?php echo $EastCellCu1MbpsHIGH ; ?>],
			['CellCu3Mbps' , <?php echo $EastCellCu3MbpsNMEET ; ?> , <?php echo $EastCellCu3MbpsMEET ; ?>, <?php echo $EastCellCu3MbpsNISSUE ; ?>,<?php echo $EastCellCu3MbpsISSUE ; ?>,<?php echo $EastCellCu3MbpsLOW ; ?>,<?php echo $EastCellCu3MbpsMEDIUM ; ?>,<?php echo $EastCellCu3MbpsHIGH ; ?>],
			['CellUserThp1Mbps' , <?php echo $EastCellUserThp1MbpsNMEET ; ?> , <?php echo $EastCellUserThp1MbpsMEET ; ?>,<?php echo $EastCellUserThp1MbpsNISSUE ; ?>,<?php echo $EastCellUserThp1MbpsISSUE ; ?>,<?php echo $EastCellUserThp1MbpsLOW ; ?>,<?php echo $EastCellUserThp1MbpsMEDIUM ; ?>,<?php echo $EastCellUserThp1MbpsHIGH ; ?>],
			['CellUserThp3Mbps' , <?php echo $EastCellUserThp3MbpsNMEET ; ?> , <?php echo $EastCellUserThp3MbpsMEET ; ?>,<?php echo $EastCellUserThp3MbpsNISSUE ; ?>,<?php echo $EastCellUserThp3MbpsISSUE ; ?>,<?php echo $EastCellUserThp3MbpsLOW ; ?>,<?php echo $EastCellUserThp3MbpsMEDIUM ; ?>,<?php echo $EastCellUserThp3MbpsHIGH ; ?>]
            ]);

            var options = {
               chartArea:{left:"10%",right:"20%"},
               isStacked:'percent', 
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'#FF5722'},
                   1:{color:'#009688'},
                   2:{color:'#FFC107'},
                   3:{color:'#E91E63'},
                   4:{color:'Green'},
                   5:{color:'Yellow'},
                   6:{color:'Red'}
                 } 
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked2'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Region JABODETABEKK 1 -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
            ['Resource', 'Not Yet MEET', 'MEET','NO ISSUE','ISSUE','LOW','MEDIUM','HIGH'],
			['CellOperation', <?php echo $JabodetabekCellOperationNMEET ; ?> , <?php echo $JabodetabekCellOperationMEET ; ?>,<?php echo $JabodetabekCellOperationNISSUE ; ?>,<?php echo $JabodetabekCellOperationISSUE ; ?>,<?php echo $JabodetabekCellOperationLOW ; ?>,<?php echo $JabodetabekCellOperationMEDIUM ; ?>,<?php echo $JabodetabekCellOperationHIGH ; ?> ],
			['CellPRB' , <?php echo $JabodetabekCellPRBNMEET ; ?> , <?php echo $JabodetabekCellPRBMEET ; ?>, <?php echo $JabodetabekCellPRBNISSUE ; ?>,<?php echo $JabodetabekCellPRBISSUE ; ?>,<?php echo $JabodetabekCellPRBLOW ; ?>,<?php echo $JabodetabekCellPRBMEDIUM ; ?>,<?php echo $JabodetabekCellPRBHIGH ; ?>],
			['CellSpectral' , <?php echo $JabodetabekCellSpectralNMEET ; ?> , <?php echo $JabodetabekCellSpectralMEET ; ?>, <?php echo $JabodetabekCellSpectralNISSUE ; ?>,<?php echo $JabodetabekCellSpectralISSUE ; ?>,<?php echo $JabodetabekCellSpectralLOW ; ?>,<?php echo $JabodetabekCellSpectralMEDIUM ; ?>,<?php echo $JabodetabekCellSpectralHIGH ; ?>],
			['CellCu1Mbps' , <?php echo $JabodetabekCellCu1MbpsNMEET ; ?> , <?php echo $JabodetabekCellCu1MbpsMEET ; ?>, <?php echo $JabodetabekCellCu1MbpsNISSUE ; ?>,<?php echo $JabodetabekCellCu1MbpsISSUE ; ?>,<?php echo $JabodetabekCellCu1MbpsLOW ; ?>,<?php echo $JabodetabekCellCu1MbpsMEDIUM ; ?>,<?php echo $JabodetabekCellCu1MbpsHIGH ; ?>],
			['CellCu3Mbps' , <?php echo $JabodetabekCellCu3MbpsNMEET ; ?> , <?php echo $JabodetabekCellCu3MbpsMEET ; ?>, <?php echo $JabodetabekCellCu3MbpsNISSUE ; ?>,<?php echo $JabodetabekCellCu3MbpsISSUE ; ?>,<?php echo $JabodetabekCellCu3MbpsLOW ; ?>,<?php echo $JabodetabekCellCu3MbpsMEDIUM ; ?>,<?php echo $JabodetabekCellCu3MbpsHIGH ; ?>],
			['CellUserThp1Mbps' , <?php echo $JabodetabekCellUserThp1MbpsNMEET ; ?> , <?php echo $JabodetabekCellUserThp1MbpsMEET ; ?>,<?php echo $JabodetabekCellUserThp1MbpsNISSUE ; ?>,<?php echo $JabodetabekCellUserThp1MbpsISSUE ; ?>,<?php echo $JabodetabekCellUserThp1MbpsLOW ; ?>,<?php echo $JabodetabekCellUserThp1MbpsMEDIUM ; ?>,<?php echo $JabodetabekCellUserThp1MbpsHIGH ; ?>],
			['CellUserThp3Mbps' , <?php echo $JabodetabekCellUserThp3MbpsNMEET ; ?> , <?php echo $JabodetabekCellUserThp3MbpsMEET ; ?>,<?php echo $JabodetabekCellUserThp3MbpsNISSUE ; ?>,<?php echo $JabodetabekCellUserThp3MbpsISSUE ; ?>,<?php echo $JabodetabekCellUserThp3MbpsLOW ; ?>,<?php echo $JabodetabekCellUserThp3MbpsMEDIUM ; ?>,<?php echo $JabodetabekCellUserThp3MbpsHIGH ; ?>]
            ]);

            var options = {
               chartArea:{left:"10%",right:"20%"},
               isStacked:'percent', 
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'#FF5722'},
                   1:{color:'#009688'},
                   2:{color:'#FFC107'},
                   3:{color:'#E91E63'},
                   4:{color:'Green'},
                   5:{color:'Yellow'},
                   6:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked3'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
		 var my_div = document.getElementById('stacked3');
		var my_chart = new google.visualization.ChartType(stacked3);

		google.visualization.events.addListener(my_chart, 'ready', function () {
		  my_div.innerHTML = '<img src="' + my_chart.getImageURI() + '">';
		});

		my_chart.draw(data);
</script>
<!-- Chart Region NORTH -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
            ['Resource', 'Not Yet MEET', 'MEET','NO ISSUE','ISSUE','LOW','MEDIUM','HIGH'],
			['CellOperation', <?php echo $NorthCellOperationNMEET ; ?> , <?php echo $NorthCellOperationMEET ; ?>,<?php echo $NorthCellOperationNISSUE ; ?>,<?php echo $NorthCellOperationISSUE ; ?>,<?php echo $NorthCellOperationLOW ; ?>,<?php echo $NorthCellOperationMEDIUM ; ?>,<?php echo $NorthCellOperationHIGH ; ?> ],
			['CellPRB' , <?php echo $NorthCellPRBNMEET ; ?> , <?php echo $NorthCellPRBMEET ; ?>, <?php echo $NorthCellPRBNISSUE ; ?>,<?php echo $NorthCellPRBISSUE ; ?>,<?php echo $NorthCellPRBLOW ; ?>,<?php echo $NorthCellPRBMEDIUM ; ?>,<?php echo $NorthCellPRBHIGH ; ?>],
			['CellSpectral' , <?php echo $NorthCellSpectralNMEET ; ?> , <?php echo $NorthCellSpectralMEET ; ?>, <?php echo $NorthCellSpectralNISSUE ; ?>,<?php echo $NorthCellSpectralISSUE ; ?>,<?php echo $NorthCellSpectralLOW ; ?>,<?php echo $NorthCellSpectralMEDIUM ; ?>,<?php echo $NorthCellSpectralHIGH ; ?>],
			['CellCu1Mbps' , <?php echo $NorthCellCu1MbpsNMEET ; ?> , <?php echo $NorthCellCu1MbpsMEET ; ?>, <?php echo $NorthCellCu1MbpsNISSUE ; ?>,<?php echo $NorthCellCu1MbpsISSUE ; ?>,<?php echo $NorthCellCu1MbpsLOW ; ?>,<?php echo $NorthCellCu1MbpsMEDIUM ; ?>,<?php echo $NorthCellCu1MbpsHIGH ; ?>],
			['CellCu3Mbps' , <?php echo $NorthCellCu3MbpsNMEET ; ?> , <?php echo $NorthCellCu3MbpsMEET ; ?>, <?php echo $NorthCellCu3MbpsNISSUE ; ?>,<?php echo $NorthCellCu3MbpsISSUE ; ?>,<?php echo $NorthCellCu3MbpsLOW ; ?>,<?php echo $NorthCellCu3MbpsMEDIUM ; ?>,<?php echo $NorthCellCu3MbpsHIGH ; ?>],
			['CellUserThp1Mbps' , <?php echo $NorthCellUserThp1MbpsNMEET ; ?> , <?php echo $NorthCellUserThp1MbpsMEET ; ?>,<?php echo $NorthCellUserThp1MbpsNISSUE ; ?>,<?php echo $NorthCellUserThp1MbpsISSUE ; ?>,<?php echo $NorthCellUserThp1MbpsLOW ; ?>,<?php echo $NorthCellUserThp1MbpsMEDIUM ; ?>,<?php echo $NorthCellUserThp1MbpsHIGH ; ?>],
			['CellUserThp3Mbps' , <?php echo $NorthCellUserThp3MbpsNMEET ; ?> , <?php echo $NorthCellUserThp3MbpsMEET ; ?>,<?php echo $NorthCellUserThp3MbpsNISSUE ; ?>,<?php echo $NorthCellUserThp3MbpsISSUE ; ?>,<?php echo $NorthCellUserThp3MbpsLOW ; ?>,<?php echo $NorthCellUserThp3MbpsMEDIUM ; ?>,<?php echo $NorthCellUserThp3MbpsHIGH ; ?>]
            ]);

            var options = {
               chartArea:{left:"10%",right:"20%"},
               isStacked:'percent', 
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'#FF5722'},
                   1:{color:'#009688'},
                   2:{color:'#FFC107'},
                   3:{color:'#E91E63'},
                   4:{color:'Green'},
                   5:{color:'Yellow'},
                   6:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked4'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Region West -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
            ['Resource', 'Not Yet MEET', 'MEET','NO ISSUE','ISSUE','LOW','MEDIUM','HIGH'],
			['CellOperation', <?php echo $WestCellOperationNMEET ; ?> , <?php echo $WestCellOperationMEET ; ?>,<?php echo $WestCellOperationNISSUE ; ?>,<?php echo $WestCellOperationISSUE ; ?>,<?php echo $WestCellOperationLOW ; ?>,<?php echo $WestCellOperationMEDIUM ; ?>,<?php echo $WestCellOperationHIGH ; ?> ],
			['CellPRB' , <?php echo $WestCellPRBNMEET ; ?> , <?php echo $WestCellPRBMEET ; ?>, <?php echo $WestCellPRBNISSUE ; ?>,<?php echo $WestCellPRBISSUE ; ?>,<?php echo $WestCellPRBLOW ; ?>,<?php echo $WestCellPRBMEDIUM ; ?>,<?php echo $WestCellPRBHIGH ; ?>],
			['CellSpectral' , <?php echo $WestCellSpectralNMEET ; ?> , <?php echo $WestCellSpectralMEET ; ?>, <?php echo $WestCellSpectralNISSUE ; ?>,<?php echo $WestCellSpectralISSUE ; ?>,<?php echo $WestCellSpectralLOW ; ?>,<?php echo $WestCellSpectralMEDIUM ; ?>,<?php echo $WestCellSpectralHIGH ; ?>],
			['CellCu1Mbps' , <?php echo $WestCellCu1MbpsNMEET ; ?> , <?php echo $WestCellCu1MbpsMEET ; ?>, <?php echo $WestCellCu1MbpsNISSUE ; ?>,<?php echo $WestCellCu1MbpsISSUE ; ?>,<?php echo $WestCellCu1MbpsLOW ; ?>,<?php echo $WestCellCu1MbpsMEDIUM ; ?>,<?php echo $WestCellCu1MbpsHIGH ; ?>],
			['CellCu3Mbps' , <?php echo $WestCellCu3MbpsNMEET ; ?> , <?php echo $WestCellCu3MbpsMEET ; ?>, <?php echo $WestCellCu3MbpsNISSUE ; ?>,<?php echo $WestCellCu3MbpsISSUE ; ?>,<?php echo $WestCellCu3MbpsLOW ; ?>,<?php echo $WestCellCu3MbpsMEDIUM ; ?>,<?php echo $WestCellCu3MbpsHIGH ; ?>],
			['CellUserThp1Mbps' , <?php echo $WestCellUserThp1MbpsNMEET ; ?> , <?php echo $WestCellUserThp1MbpsMEET ; ?>,<?php echo $WestCellUserThp1MbpsNISSUE ; ?>,<?php echo $WestCellUserThp1MbpsISSUE ; ?>,<?php echo $WestCellUserThp1MbpsLOW ; ?>,<?php echo $WestCellUserThp1MbpsMEDIUM ; ?>,<?php echo $WestCellUserThp1MbpsHIGH ; ?>],
			['CellUserThp3Mbps' , <?php echo $WestCellUserThp3MbpsNMEET ; ?> , <?php echo $WestCellUserThp3MbpsMEET ; ?>,<?php echo $WestCellUserThp3MbpsNISSUE ; ?>,<?php echo $WestCellUserThp3MbpsISSUE ; ?>,<?php echo $WestCellUserThp3MbpsLOW ; ?>,<?php echo $WestCellUserThp3MbpsMEDIUM ; ?>,<?php echo $WestCellUserThp3MbpsHIGH ; ?>]
            ]);

            var options = {
               chartArea:{left:"10%",right:"20%"},
               isStacked:'percent', 
               hAxis: {
                   minValue: 0
                 },
                 series: {
                   0:{color:'#FF5722'},
                   1:{color:'#009688'},
                   2:{color:'#FFC107'},
                   3:{color:'#E91E63'},
                   4:{color:'Green'},
                   5:{color:'Yellow'},
                   6:{color:'Red'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked5'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>

<!-- detail chart table Central -->
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Resource');
        data.addColumn('number', 'NY MEET');
        data.addColumn('number', 'MEET');
        data.addColumn('number', 'NO ISSUE');
        data.addColumn('number', 'ISSUE');
        data.addColumn('number', 'HIGH');
        data.addColumn('number', 'MEDIUM');
        data.addColumn('number', 'LOW');
        data.addRows([
        ['CellOperation',   {v:<?php echo $CellOperationNMEET ;?>},  {v: <?php echo $CellOperationMEET ; ?>},  {v:  <?php echo $CellOperationNISSUE ; ?>},  {v: <?php echo $CellOperationISSUE ; ?>},  {v: <?php echo $CellOperationHIGH ; ?>},  {v: <?php echo $CellOperationMEDIUM ; ?>},  {v: <?php echo $CellOperationLOW ; ?>}],
		['CellPRB',  {v:<?php echo $CellPRBNMEET ;?>},  {v: <?php echo $CellPRBMEET ; ?>},  {v:  <?php echo $CellPRBNISSUE ; ?>},  {v: <?php echo $CellPRBISSUE ; ?>},  {v: <?php echo $CellPRBHIGH ; ?>},  {v: <?php echo $CellPRBMEDIUM ; ?>},  {v: <?php echo $CellPRBLOW ; ?>}],
		['CellSpectral',  {v:<?php echo $CellSpectralNMEET ;?>},  {v: <?php echo $CellSpectralMEET ; ?>},  {v:  <?php echo $CellSpectralNISSUE ; ?>},  {v: <?php echo $CellSpectralISSUE ; ?>},  {v: <?php echo $CellSpectralHIGH ; ?>},  {v: <?php echo $CellSpectralMEDIUM ; ?>},  {v: <?php echo $CellSpectralLOW ; ?>}],
		['CellCu1Mbps',  {v:<?php echo $CellCu1MbpsNMEET ;?>},  {v: <?php echo $CellCu1MbpsMEET ; ?>},  {v:  <?php echo $CellCu1MbpsNISSUE ; ?>},  {v: <?php echo $CellCu1MbpsISSUE ; ?>},  {v: <?php echo $CellCu1MbpsHIGH ; ?>},  {v: <?php echo $CellCu1MbpsMEDIUM ; ?>},  {v: <?php echo $CellCu1MbpsLOW ; ?>}],
		['CellCu3Mbps',  {v:<?php echo $CellCu3MbpsNMEET ;?>},  {v: <?php echo $CellCu3MbpsMEET ; ?>},  {v:  <?php echo $CellCu3MbpsNISSUE ; ?>},  {v: <?php echo $CellCu3MbpsISSUE ; ?>},  {v: <?php echo $CellCu3MbpsHIGH ; ?>},  {v: <?php echo $CellCu3MbpsMEDIUM ; ?>},  {v: <?php echo $CellCu3MbpsLOW ; ?>}],
		['CellUserThp1Mbps',  {v:<?php echo $CellUserThp1MbpsNMEET ;?>},  {v: <?php echo $CellUserThp1MbpsMEET ; ?>},  {v:  <?php echo $CellUserThp1MbpsNISSUE ; ?>},  {v: <?php echo $CellUserThp1MbpsISSUE ; ?>},  {v: <?php echo $CellUserThp1MbpsHIGH ; ?>},  {v: <?php echo $CellUserThp1MbpsMEDIUM ; ?>},  {v: <?php echo $CellUserThp1MbpsLOW ; ?>}],
		['CellUserThp3Mbps', {v:<?php echo $CellUserThp3MbpsNMEET ;?>},  {v: <?php echo $CellUserThp3MbpsMEET ; ?>},  {v:  <?php echo $CellUserThp3MbpsNISSUE ; ?>},  {v: <?php echo $CellUserThp3MbpsISSUE ; ?>},  {v: <?php echo $CellUserThp3MbpsHIGH ; ?>},  {v: <?php echo $CellUserThp3MbpsMEDIUM ; ?>},  {v: <?php echo $CellUserThp3MbpsLOW ; ?>}]

        ]);

		
        var table = new google.visualization.Table(document.getElementById('tableCentral'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>
<!-- detail chart table EAST -->
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Resource');
        data.addColumn('number', 'NY MEET');
        data.addColumn('number', 'MEET');
        data.addColumn('number', 'NO ISSUE');
        data.addColumn('number', 'ISSUE');
        data.addColumn('number', 'HIGH');
        data.addColumn('number', 'MEDIUM');
        data.addColumn('number', 'LOW');
        data.addRows([
        ['CellOperation',   {v:<?php echo $EastCellOperationNMEET ;?>},  {v: <?php echo $EastCellOperationMEET ; ?>},  {v:  <?php echo $EastCellOperationNISSUE ; ?>},  {v: <?php echo $EastCellOperationISSUE ; ?>},  {v: <?php echo $EastCellOperationHIGH ; ?>},  {v: <?php echo $EastCellOperationMEDIUM ; ?>},  {v: <?php echo $EastCellOperationLOW ; ?>}],
		['CellPRB',  {v:<?php echo $EastCellPRBNMEET ;?>},  {v: <?php echo $EastCellPRBMEET ; ?>},  {v:  <?php echo $EastCellPRBNISSUE ; ?>},  {v: <?php echo $EastCellPRBISSUE ; ?>},  {v: <?php echo $EastCellPRBHIGH ; ?>},  {v: <?php echo $EastCellPRBMEDIUM ; ?>},  {v: <?php echo $EastCellPRBLOW ; ?>}],
		['CellSpectral',  {v:<?php echo $EastCellSpectralNMEET ;?>},  {v: <?php echo $EastCellSpectralMEET ; ?>},  {v:  <?php echo $EastCellSpectralNISSUE ; ?>},  {v: <?php echo $EastCellSpectralISSUE ; ?>},  {v: <?php echo $EastCellSpectralHIGH ; ?>},  {v: <?php echo $EastCellSpectralMEDIUM ; ?>},  {v: <?php echo $EastCellSpectralLOW ; ?>}],
		['CellCu1Mbps',  {v:<?php echo $EastCellCu1MbpsNMEET ;?>},  {v: <?php echo $EastCellCu1MbpsMEET ; ?>},  {v:  <?php echo $EastCellCu1MbpsNISSUE ; ?>},  {v: <?php echo $EastCellCu1MbpsISSUE ; ?>},  {v: <?php echo $EastCellCu1MbpsHIGH ; ?>},  {v: <?php echo $EastCellCu1MbpsMEDIUM ; ?>},  {v: <?php echo $EastCellCu1MbpsLOW ; ?>}],
		['CellCu3Mbps',  {v:<?php echo $EastCellCu3MbpsNMEET ;?>},  {v: <?php echo $EastCellCu3MbpsMEET ; ?>},  {v:  <?php echo $EastCellCu3MbpsNISSUE ; ?>},  {v: <?php echo $EastCellCu3MbpsISSUE ; ?>},  {v: <?php echo $EastCellCu3MbpsHIGH ; ?>},  {v: <?php echo $EastCellCu3MbpsMEDIUM ; ?>},  {v: <?php echo $EastCellCu3MbpsLOW ; ?>}],
		['CellUserThp1Mbps',  {v:<?php echo $EastCellUserThp1MbpsNMEET ;?>},  {v: <?php echo $EastCellUserThp1MbpsMEET ; ?>},  {v:  <?php echo $EastCellUserThp1MbpsNISSUE ; ?>},  {v: <?php echo $EastCellUserThp1MbpsISSUE ; ?>},  {v: <?php echo $EastCellUserThp1MbpsHIGH ; ?>},  {v: <?php echo $EastCellUserThp1MbpsMEDIUM ; ?>},  {v: <?php echo $EastCellUserThp1MbpsLOW ; ?>}],
		['CellUserThp3Mbps', {v:<?php echo $EastCellUserThp3MbpsNMEET ;?>},  {v: <?php echo $EastCellUserThp3MbpsMEET ; ?>},  {v:  <?php echo $EastCellUserThp3MbpsNISSUE ; ?>},  {v: <?php echo $EastCellUserThp3MbpsISSUE ; ?>},  {v: <?php echo $EastCellUserThp3MbpsHIGH ; ?>},  {v: <?php echo $EastCellUserThp3MbpsMEDIUM ; ?>},  {v: <?php echo $EastCellUserThp3MbpsLOW ; ?>}]

        ]);

		
        var table = new google.visualization.Table(document.getElementById('tableEAST'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>
<!-- detail chart table jabodetabek  -->
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Resource');
        data.addColumn('number', 'NY MEET');
        data.addColumn('number', 'MEET');
        data.addColumn('number', 'NO ISSUE');
        data.addColumn('number', 'ISSUE');
        data.addColumn('number', 'HIGH');
        data.addColumn('number', 'MEDIUM');
        data.addColumn('number', 'LOW');
        data.addRows([
        ['CellOperation',   {v:<?php echo $JabodetabekCellOperationNMEET ;?>},  {v: <?php echo $JabodetabekCellOperationMEET ; ?>},  {v:  <?php echo $JabodetabekCellOperationNISSUE ; ?>},  {v: <?php echo $JabodetabekCellOperationISSUE ; ?>},  {v: <?php echo $JabodetabekCellOperationHIGH ; ?>},  {v: <?php echo $JabodetabekCellOperationMEDIUM ; ?>},  {v: <?php echo $JabodetabekCellOperationLOW ; ?>}],
		['CellPRB',  {v:<?php echo $JabodetabekCellPRBNMEET ;?>},  {v: <?php echo $JabodetabekCellPRBMEET ; ?>},  {v:  <?php echo $JabodetabekCellPRBNISSUE ; ?>},  {v: <?php echo $JabodetabekCellPRBISSUE ; ?>},  {v: <?php echo $JabodetabekCellPRBHIGH ; ?>},  {v: <?php echo $JabodetabekCellPRBMEDIUM ; ?>},  {v: <?php echo $JabodetabekCellPRBLOW ; ?>}],
		['CellSpectral',  {v:<?php echo $JabodetabekCellSpectralNMEET ;?>},  {v: <?php echo $JabodetabekCellSpectralMEET ; ?>},  {v:  <?php echo $JabodetabekCellSpectralNISSUE ; ?>},  {v: <?php echo $JabodetabekCellSpectralISSUE ; ?>},  {v: <?php echo $JabodetabekCellSpectralHIGH ; ?>},  {v: <?php echo $JabodetabekCellSpectralMEDIUM ; ?>},  {v: <?php echo $JabodetabekCellSpectralLOW ; ?>}],
		['CellCu1Mbps',  {v:<?php echo $JabodetabekCellCu1MbpsNMEET ;?>},  {v: <?php echo $JabodetabekCellCu1MbpsMEET ; ?>},  {v:  <?php echo $JabodetabekCellCu1MbpsNISSUE ; ?>},  {v: <?php echo $JabodetabekCellCu1MbpsISSUE ; ?>},  {v: <?php echo $JabodetabekCellCu1MbpsHIGH ; ?>},  {v: <?php echo $JabodetabekCellCu1MbpsMEDIUM ; ?>},  {v: <?php echo $JabodetabekCellCu1MbpsLOW ; ?>}],
		['CellCu3Mbps',  {v:<?php echo $JabodetabekCellCu3MbpsNMEET ;?>},  {v: <?php echo $JabodetabekCellCu3MbpsMEET ; ?>},  {v:  <?php echo $JabodetabekCellCu3MbpsNISSUE ; ?>},  {v: <?php echo $JabodetabekCellCu3MbpsISSUE ; ?>},  {v: <?php echo $JabodetabekCellCu3MbpsHIGH ; ?>},  {v: <?php echo $JabodetabekCellCu3MbpsMEDIUM ; ?>},  {v: <?php echo $JabodetabekCellCu3MbpsLOW ; ?>}],
		['CellUserThp1Mbps',  {v:<?php echo $JabodetabekCellUserThp1MbpsNMEET ;?>},  {v: <?php echo $JabodetabekCellUserThp1MbpsMEET ; ?>},  {v:  <?php echo $JabodetabekCellUserThp1MbpsNISSUE ; ?>},  {v: <?php echo $JabodetabekCellUserThp1MbpsISSUE ; ?>},  {v: <?php echo $JabodetabekCellUserThp1MbpsHIGH ; ?>},  {v: <?php echo $JabodetabekCellUserThp1MbpsMEDIUM ; ?>},  {v: <?php echo $JabodetabekCellUserThp1MbpsLOW ; ?>}],
		['CellUserThp3Mbps', {v:<?php echo $JabodetabekCellUserThp3MbpsNMEET ;?>},  {v: <?php echo $JabodetabekCellUserThp3MbpsMEET ; ?>},  {v:  <?php echo $JabodetabekCellUserThp3MbpsNISSUE ; ?>},  {v: <?php echo $JabodetabekCellUserThp3MbpsISSUE ; ?>},  {v: <?php echo $JabodetabekCellUserThp3MbpsHIGH ; ?>},  {v: <?php echo $JabodetabekCellUserThp3MbpsMEDIUM ; ?>},  {v: <?php echo $JabodetabekCellUserThp3MbpsLOW ; ?>}]

        ]);

		
        var table = new google.visualization.Table(document.getElementById('tableJABODETABEK'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>
<!-- detail chart table North -->
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Resource');
        data.addColumn('number', 'NY MEET');
        data.addColumn('number', 'MEET');
        data.addColumn('number', 'NO ISSUE');
        data.addColumn('number', 'ISSUE');
        data.addColumn('number', 'HIGH');
        data.addColumn('number', 'MEDIUM');
        data.addColumn('number', 'LOW');
        data.addRows([
		['CellOperation',   {v:<?php echo $NorthCellOperationNMEET ;?>},  {v: <?php echo $NorthCellOperationMEET ; ?>},  {v:  <?php echo $NorthCellOperationNISSUE ; ?>},  {v: <?php echo $NorthCellOperationISSUE ; ?>},  {v: <?php echo $NorthCellOperationHIGH ; ?>},  {v: <?php echo $NorthCellOperationMEDIUM ; ?>},  {v: <?php echo $NorthCellOperationLOW ; ?>}],
		['CellPRB',  {v:<?php echo $NorthCellPRBNMEET ;?>},  {v: <?php echo $NorthCellPRBMEET ; ?>},  {v:  <?php echo $NorthCellPRBNISSUE ; ?>},  {v: <?php echo $NorthCellPRBISSUE ; ?>},  {v: <?php echo $NorthCellPRBHIGH ; ?>},  {v: <?php echo $NorthCellPRBMEDIUM ; ?>},  {v: <?php echo $NorthCellPRBLOW ; ?>}],
		['CellSpectral',  {v:<?php echo $NorthCellSpectralNMEET ;?>},  {v: <?php echo $NorthCellSpectralMEET ; ?>},  {v:  <?php echo $NorthCellSpectralNISSUE ; ?>},  {v: <?php echo $NorthCellSpectralISSUE ; ?>},  {v: <?php echo $NorthCellSpectralHIGH ; ?>},  {v: <?php echo $NorthCellSpectralMEDIUM ; ?>},  {v: <?php echo $NorthCellSpectralLOW ; ?>}],
		['CellCu1Mbps',  {v:<?php echo $NorthCellCu1MbpsNMEET ;?>},  {v: <?php echo $NorthCellCu1MbpsMEET ; ?>},  {v:  <?php echo $NorthCellCu1MbpsNISSUE ; ?>},  {v: <?php echo $NorthCellCu1MbpsISSUE ; ?>},  {v: <?php echo $NorthCellCu1MbpsHIGH ; ?>},  {v: <?php echo $NorthCellCu1MbpsMEDIUM ; ?>},  {v: <?php echo $NorthCellCu1MbpsLOW ; ?>}],
		['CellCu3Mbps',  {v:<?php echo $NorthCellCu3MbpsNMEET ;?>},  {v: <?php echo $NorthCellCu3MbpsMEET ; ?>},  {v:  <?php echo $NorthCellCu3MbpsNISSUE ; ?>},  {v: <?php echo $NorthCellCu3MbpsISSUE ; ?>},  {v: <?php echo $NorthCellCu3MbpsHIGH ; ?>},  {v: <?php echo $NorthCellCu3MbpsMEDIUM ; ?>},  {v: <?php echo $NorthCellCu3MbpsLOW ; ?>}],
		['CellUserThp1Mbps',  {v:<?php echo $NorthCellUserThp1MbpsNMEET ;?>},  {v: <?php echo $NorthCellUserThp1MbpsMEET ; ?>},  {v:  <?php echo $NorthCellUserThp1MbpsNISSUE ; ?>},  {v: <?php echo $NorthCellUserThp1MbpsISSUE ; ?>},  {v: <?php echo $NorthCellUserThp1MbpsHIGH ; ?>},  {v: <?php echo $NorthCellUserThp1MbpsMEDIUM ; ?>},  {v: <?php echo $NorthCellUserThp1MbpsLOW ; ?>}],
		['CellUserThp3Mbps', {v:<?php echo $NorthCellUserThp3MbpsNMEET ;?>},  {v: <?php echo $NorthCellUserThp3MbpsMEET ; ?>},  {v:  <?php echo $NorthCellUserThp3MbpsNISSUE ; ?>},  {v: <?php echo $NorthCellUserThp3MbpsISSUE ; ?>},  {v: <?php echo $NorthCellUserThp3MbpsHIGH ; ?>},  {v: <?php echo $NorthCellUserThp3MbpsMEDIUM ; ?>},  {v: <?php echo $NorthCellUserThp3MbpsLOW ; ?>}]

        ]);

		
        var table = new google.visualization.Table(document.getElementById('tableNORTH'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>
<!-- detail chart table West -->
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Resource');
        data.addColumn('number', 'NY MEET');
        data.addColumn('number', 'MEET');
        data.addColumn('number', 'NO ISSUE');
        data.addColumn('number', 'ISSUE');
        data.addColumn('number', 'HIGH');
        data.addColumn('number', 'MEDIUM');
        data.addColumn('number', 'LOW');
        data.addRows([
        ['CellOperation',   {v:<?php echo $WestCellOperationNMEET ;?>},  {v: <?php echo $WestCellOperationMEET ; ?>},  {v:  <?php echo $WestCellOperationNISSUE ; ?>},  {v: <?php echo $WestCellOperationISSUE ; ?>},  {v: <?php echo $WestCellOperationHIGH ; ?>},  {v: <?php echo $WestCellOperationMEDIUM ; ?>},  {v: <?php echo $WestCellOperationLOW ; ?>}],
		['CellPRB',  {v:<?php echo $WestCellPRBNMEET ;?>},  {v: <?php echo $WestCellPRBMEET ; ?>},  {v:  <?php echo $WestCellPRBNISSUE ; ?>},  {v: <?php echo $WestCellPRBISSUE ; ?>},  {v: <?php echo $WestCellPRBHIGH ; ?>},  {v: <?php echo $WestCellPRBMEDIUM ; ?>},  {v: <?php echo $WestCellPRBLOW ; ?>}],
		['CellSpectral',  {v:<?php echo $WestCellSpectralNMEET ;?>},  {v: <?php echo $WestCellSpectralMEET ; ?>},  {v:  <?php echo $WestCellSpectralNISSUE ; ?>},  {v: <?php echo $WestCellSpectralISSUE ; ?>},  {v: <?php echo $WestCellSpectralHIGH ; ?>},  {v: <?php echo $WestCellSpectralMEDIUM ; ?>},  {v: <?php echo $WestCellSpectralLOW ; ?>}],
		['CellCu1Mbps',  {v:<?php echo $WestCellCu1MbpsNMEET ;?>},  {v: <?php echo $WestCellCu1MbpsMEET ; ?>},  {v:  <?php echo $WestCellCu1MbpsNISSUE ; ?>},  {v: <?php echo $WestCellCu1MbpsISSUE ; ?>},  {v: <?php echo $WestCellCu1MbpsHIGH ; ?>},  {v: <?php echo $WestCellCu1MbpsMEDIUM ; ?>},  {v: <?php echo $WestCellCu1MbpsLOW ; ?>}],
		['CellCu3Mbps',  {v:<?php echo $WestCellCu3MbpsNMEET ;?>},  {v: <?php echo $WestCellCu3MbpsMEET ; ?>},  {v:  <?php echo $WestCellCu3MbpsNISSUE ; ?>},  {v: <?php echo $WestCellCu3MbpsISSUE ; ?>},  {v: <?php echo $WestCellCu3MbpsHIGH ; ?>},  {v: <?php echo $WestCellCu3MbpsMEDIUM ; ?>},  {v: <?php echo $WestCellCu3MbpsLOW ; ?>}],
		['CellUserThp1Mbps',  {v:<?php echo $WestCellUserThp1MbpsNMEET ;?>},  {v: <?php echo $WestCellUserThp1MbpsMEET ; ?>},  {v:  <?php echo $WestCellUserThp1MbpsNISSUE ; ?>},  {v: <?php echo $WestCellUserThp1MbpsISSUE ; ?>},  {v: <?php echo $WestCellUserThp1MbpsHIGH ; ?>},  {v: <?php echo $WestCellUserThp1MbpsMEDIUM ; ?>},  {v: <?php echo $WestCellUserThp1MbpsLOW ; ?>}],
		['CellUserThp3Mbps', {v:<?php echo $WestCellUserThp3MbpsNMEET ;?>},  {v: <?php echo $WestCellUserThp3MbpsMEET ; ?>},  {v:  <?php echo $WestCellUserThp3MbpsNISSUE ; ?>},  {v: <?php echo $WestCellUserThp3MbpsISSUE ; ?>},  {v: <?php echo $WestCellUserThp3MbpsHIGH ; ?>},  {v: <?php echo $WestCellUserThp3MbpsMEDIUM ; ?>},  {v: <?php echo $WestCellUserThp3MbpsLOW ; ?>}]

        ]);

		
        var table = new google.visualization.Table(document.getElementById('tableWEST'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>
<?
<?php
include 'footer.php';
?>