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
			<h3>Capman Report <small>3G Weekly Report</small></h3>
		</div>
	</div>
<!-- MULAI DARI SINI -->
<div class="x_panel">
	<div class="x_content">
		<div class="row">
		<form method="post" action="3GWeeklyReport.php" id="form1" name="form1">
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
                    <h2><i class="fa fa-bars"></i> 3G REPORT REGION CENTRAL <?php $min1 = $_POST['tampil'];
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
							<li role="presentation" class="active"><a href="#chart_central" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#table_central" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="chart_central" aria-labelledby="home-tab">
								<p><div id="stacked1"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="table_central" aria-labelledby="profile-tab">
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
                    <h2><i class="fa fa-bars"></i> 3G REPORT REGION EAST <?php $min1 = $_POST['tampil'];
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
							<li role="presentation" class="active"><a href="#chart_east" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#table_east" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent2" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="chart_east" aria-labelledby="home-tab">
								<p><div id="stacked2"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="table_east" aria-labelledby="profile-tab">
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
                    <h2><i class="fa fa-bars"></i> 3G REPORT REGION JABODETABEK <?php $min1 = $_POST['tampil'];
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
							<li role="presentation" class="active"><a href="#chart_jabo" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#table_jabo" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="chart_jabo" aria-labelledby="home-tab">
								<p><div id="stacked3"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="table_jabo" aria-labelledby="profile-tab">
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
                    <h2><i class="fa fa-bars"></i> 3G REPORT REGION NORTH <?php $min1 = $_POST['tampil'];
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
							<li role="presentation" class="active"><a href="#chart_north" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#table_north" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent2" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="chart_north" aria-labelledby="home-tab">
								<p><div id="stacked4"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="table_north" aria-labelledby="profile-tab">
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
                    <h2><i class="fa fa-bars"></i> 3G REPORT REGION WEST <?php $min1 = $_POST['tampil'];
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
							<li role="presentation" class="active"><a href="#chart_west" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#table_west" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="chart_west" aria-labelledby="home-tab">
								<p><div id="stacked5"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="table_west" aria-labelledby="profile-tab">
								<p><div id="tableWEST"></div></p>
							</div>
						</div>
                    </div>
				</div>
            </div>
        </div>
</div>
</div>
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>
<?php
// Get Value For Chart Region Central
	// get h-1 day
	$min1 = $_POST['tampil'];
	$Wsql = "SELECT Monthly FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Week = '$min1'";
	$resultWsql = sqlsrv_query($conn, $Wsql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataWsql 	= sqlsrv_fetch_array($resultWsql);
	$monthly 	= $dataWsql['Monthly'];
			
	
	//ambil data value dari database Untuk Graph 
	
	//ambil data value untuk Resource CONGESTION CENTRAL
	$sqlcongestion = "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'Central' AND Resource='CONGESTION' AND Week ='$min1'";
	$resultcongestion 	= sqlsrv_query($conn, $sqlcongestion, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datacongestion		= sqlsrv_fetch_array($resultcongestion);
	$CongestionNyMeet			= $datacongestion ['NY_MEET'];
	$CongestionMeet				= $datacongestion ['MEET'];
	$CongestionNotCongestion	= $datacongestion ['NOT_CONGEST'];
	$CongestionCongest			= $datacongestion ['CONGEST'];
	$CongestionNoIssue			= $datacongestion ['NO_ISSUE'];
	$CongestionIssue			= $datacongestion ['ISSUE'];
	
	
	//ambil data value untuk Resource HsUser CENTRAL
	$sqluser 		= "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'Central' AND Resource='HsUser' AND Week ='$min1'";
	$resultuser 	= sqlsrv_query($conn, $sqluser, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datauser 		= sqlsrv_fetch_array($resultuser);
	$UserNyMeet			= $datauser ['NY_MEET'];
	$UserMeet			= $datauser ['MEET'];
	$UserNotCongestion	= $datauser ['NOT_CONGEST'];
	$UserCongest		= $datauser ['CONGEST'];
	$UserNoIssue		= $datauser ['NO_ISSUE'];
	$UserIssue			= $datauser ['ISSUE'];
	
	//ambil data value untuk Resource OPERATION CENTRAL
	$sqloperation = "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'Central' AND Resource='OPERATION' AND Week ='$min1'";
	$resultoperation 	= sqlsrv_query($conn, $sqloperation, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataoperation 		= sqlsrv_fetch_array($resultoperation);
	$OperationNyMeet 		= $dataoperation ['NY_MEET'];
	$OperationMeet 			= $dataoperation ['MEET'];
	$OperationNotCongestion = $dataoperation ['NOT_CONGEST'];
	$OperationCongest		= $dataoperation ['CONGEST'];
	$OperationNoIssue		= $dataoperation ['NO_ISSUE'];
	$OperationIssue			= $dataoperation ['ISSUE'];
	
	
	//ambil data value untuk Resource SE CENTRAL
	$sqlse = "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'Central' AND Resource='SE' AND Week ='$min1'";
	$resultse 	= sqlsrv_query($conn, $sqlse, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datase 	= sqlsrv_fetch_array($resultse);
	$SeNyMeet			= $datase ['NY_MEET'];
	$SeMeet				= $datase ['MEET'];
	$SeNotCongestion	= $datase ['NOT_CONGEST'];
	$SeCongest			= $datase ['CONGEST'];
	$SeNoIssue			= $datase ['NO_ISSUE'];
	$SeIssue			= $datase ['ISSUE'];
	
	
//Ambil data untuk grafik EAST
	//ambil data value untuk Resource CONGESTION EAST
	$sqlcongestionEAST = "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'East' AND Resource='CONGESTION' AND Week ='$min1'";
	$resultcongestionEAST 	= sqlsrv_query($conn, $sqlcongestionEAST, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datacongestionEAST		= sqlsrv_fetch_array($resultcongestionEAST);
	$CongestionNyMeetEAST			= $datacongestionEAST ['NY_MEET'];
	$CongestionMeetEAST				= $datacongestionEAST ['MEET'];
	$CongestionNotCongestionEAST	= $datacongestionEAST ['NOT_CONGEST'];
	$CongestionCongestEAST			= $datacongestionEAST ['CONGEST'];
	$CongestionNoIssueEAST			= $datacongestionEAST ['NO_ISSUE'];
	$CongestionIssueEAST			= $datacongestionEAST ['ISSUE'];
	
	
	//ambil data value untuk Resource HsUser EAST
	$sqluserEAST 		= "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'East' AND Resource='HsUser' AND Week ='$min1'";
	$resultuserEAST 	= sqlsrv_query($conn, $sqluserEAST, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datauserEAST 		= sqlsrv_fetch_array($resultuserEAST);
	$UserNyMeetEAST			= $datauserEAST ['NY_MEET'];
	$UserMeetEAST			= $datauserEAST ['MEET'];
	$UserNotCongestionEAST	= $datauserEAST ['NOT_CONGEST'];
	$UserCongestEAST		= $datauserEAST ['CONGEST'];
	$UserNoIssueEAST		= $datauserEAST ['NO_ISSUE'];
	$UserIssueEAST			= $datauserEAST ['ISSUE'];
	
	//ambil data value untuk Resource OPERATION EAST
	$sqloperationEAST = "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'East' AND Resource='OPERATION' AND Week ='$min1'";
	$resultoperationEAST 	= sqlsrv_query($conn, $sqloperationEAST, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataoperationEAST 		= sqlsrv_fetch_array($resultoperationEAST);
	$OperationNyMeetEAST 		= $dataoperationEAST ['NY_MEET'];
	$OperationMeetEAST 			= $dataoperationEAST ['MEET'];
	$OperationNotCongestionEAST = $dataoperationEAST ['NOT_CONGEST'];
	$OperationCongestEAST		= $dataoperationEAST ['CONGEST'];
	$OperationNoIssueEAST		= $dataoperationEAST ['NO_ISSUE'];
	$OperationIssueEAST			= $dataoperationEAST ['ISSUE'];
	
	
	//ambil data value untuk Resource SE EAST
	$sqlseEAST = "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'East' AND Resource='SE' AND Week ='$min1'";
	$resultseEAST 	= sqlsrv_query($conn, $sqlseEAST, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataseEAST 	= sqlsrv_fetch_array($resultseEAST);
	$SeNyMeetEAST			= $dataseEAST ['NY_MEET'];
	$SeMeetEAST				= $dataseEAST ['MEET'];
	$SeNotCongestionEAST	= $dataseEAST ['NOT_CONGEST'];
	$SeCongestEAST			= $dataseEAST ['CONGEST'];
	$SeNoIssueEAST			= $dataseEAST ['NO_ISSUE'];
	$SeIssueEAST			= $dataseEAST ['ISSUE'];
	
	
//Ambil data untuk grafik JABODETABEK	
	//ambil data value untuk Resource CONGESTION JABODETABEK
	$sqlcongestionJBDTB = "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'Jabodetabek' AND Resource='CONGESTION' AND Week ='$min1'";
	$resultcongestionJBDTB 	= sqlsrv_query($conn, $sqlcongestionJBDTB, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datacongestionJBDTB		= sqlsrv_fetch_array($resultcongestionJBDTB);
	$CongestionNyMeetJBDTB			= $datacongestionJBDTB ['NY_MEET'];
	$CongestionMeetJBDTB			= $datacongestionJBDTB ['MEET'];
	$CongestionNotCongestionJBDTB	= $datacongestionJBDTB ['NOT_CONGEST'];
	$CongestionCongestJBDTB			= $datacongestionJBDTB ['CONGEST'];
	$CongestionNoIssueJBDTB			= $datacongestionJBDTB ['NO_ISSUE'];
	$CongestionIssueJBDTB			= $datacongestionJBDTB ['ISSUE'];
	
	
	//ambil data value untuk Resource HsUser JABODETABEK
	$sqluserJBDTB 		= "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'Jabodetabek' AND Resource='HsUser' AND Week ='$min1'";
	$resultuserJBDTB 	= sqlsrv_query($conn, $sqluserJBDTB, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datauserJBDTB 		= sqlsrv_fetch_array($resultuserJBDTB);
	$UserNyMeetJBDTB		= $datauserJBDTB ['NY_MEET'];
	$UserMeetJBDTB			= $datauserJBDTB ['MEET'];
	$UserNotCongestionJBDTB	= $datauserJBDTB ['NOT_CONGEST'];
	$UserCongestJBDTB		= $datauserJBDTB ['CONGEST'];
	$UserNoIssueJBDTB		= $datauserJBDTB ['NO_ISSUE'];
	$UserIssueJBDTB			= $datauserJBDTB ['ISSUE'];
	
	//ambil data value untuk Resource OPERATION JABODETABEK
	$sqloperationJBDTB = "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'Jabodetabek' AND Resource='OPERATION' AND Week ='$min1'";
	$resultoperationJBDTB 	= sqlsrv_query($conn, $sqloperationJBDTB, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataoperationJBDTB 		= sqlsrv_fetch_array($resultoperationJBDTB);
	$OperationNyMeetJBDTB 			= $dataoperationJBDTB ['NY_MEET'];
	$OperationMeetJBDTB 			= $dataoperationJBDTB ['MEET'];
	$OperationNotCongestionJBDTB	= $dataoperationJBDTB ['NOT_CONGEST'];
	$OperationCongestJBDTB			= $dataoperationJBDTB ['CONGEST'];
	$OperationNoIssueJBDTB			= $dataoperationJBDTB ['NO_ISSUE'];
	$OperationIssueJBDTB			= $dataoperationJBDTB ['ISSUE'];
	
	
	//ambil data value untuk Resource SE JABODETABEK
	$sqlseJBDTB = "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'Jabodetabek' AND Resource='SE' AND Week ='$min1'";
	$resultseJBDTB 	= sqlsrv_query($conn, $sqlseJBDTB, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataseJBDTB 	= sqlsrv_fetch_array($resultseJBDTB);
	$SeNyMeetJBDTB			= $dataseJBDTB ['NY_MEET'];
	$SeMeetJBDTB			= $dataseJBDTB ['MEET'];
	$SeNotCongestionJBDTB	= $dataseJBDTB ['NOT_CONGEST'];
	$SeCongestJBDTB			= $dataseJBDTB ['CONGEST'];
	$SeNoIssueJBDTB			= $dataseJBDTB ['NO_ISSUE'];
	$SeIssueJBDTB			= $dataseJBDTB ['ISSUE'];
	
	
//Ambil data untuk grafik NORTH
//ambil data value untuk Resource CONGESTION NORTH
	$sqlcongestionNORTH = "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'North' AND Resource='CONGESTION' AND Week ='$min1'";
	$resultcongestionNORTH 	= sqlsrv_query($conn, $sqlcongestionNORTH, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datacongestionNORTH		= sqlsrv_fetch_array($resultcongestionNORTH);
	$CongestionNyMeetNORTH			= $datacongestionNORTH ['NY_MEET'];
	$CongestionMeetNORTH			= $datacongestionNORTH ['MEET'];
	$CongestionNotCongestionNORTH	= $datacongestionNORTH ['NOT_CONGEST'];
	$CongestionCongestNORTH			= $datacongestionNORTH ['CONGEST'];
	$CongestionNoIssueNORTH			= $datacongestionNORTH ['NO_ISSUE'];
	$CongestionIssueNORTH			= $datacongestionNORTH ['ISSUE'];
	
	
	//ambil data value untuk Resource HsUser NORTH
	$sqluserNORTH 		= "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'North' AND Resource='HsUser' AND Week ='$min1'";
	$resultuserNORTH 	= sqlsrv_query($conn, $sqluserNORTH, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datauserNORTH 		= sqlsrv_fetch_array($resultuserNORTH);
	$UserNyMeetNORTH		= $datauserNORTH ['NY_MEET'];
	$UserMeetNORTH			= $datauserNORTH ['MEET'];
	$UserNotCongestionNORTH	= $datauserNORTH ['NOT_CONGEST'];
	$UserCongestNORTH		= $datauserNORTH ['CONGEST'];
	$UserNoIssueNORTH		= $datauserNORTH ['NO_ISSUE'];
	$UserIssueNORTH			= $datauserNORTH ['ISSUE'];
	
	//ambil data value untuk Resource OPERATION NORTH
	$sqloperationNORTH = "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'North' AND Resource='OPERATION' AND Week ='$min1'";
	$resultoperationNORTH 	= sqlsrv_query($conn, $sqloperationNORTH, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataoperationNORTH 		= sqlsrv_fetch_array($resultoperationNORTH);
	$OperationNyMeetNORTH	 		= $dataoperationNORTH ['NY_MEET'];
	$OperationMeetNORTH 			= $dataoperationNORTH ['MEET'];
	$OperationNotCongestionNORTH	= $dataoperationNORTH ['NOT_CONGEST'];
	$OperationCongestNORTH			= $dataoperationNORTH ['CONGEST'];
	$OperationNoIssueNORTH			= $dataoperationNORTH ['NO_ISSUE'];
	$OperationIssueNORTH			= $dataoperationNORTH ['ISSUE'];
	
	
	//ambil data value untuk Resource SE NORTH
	$sqlseNORTH = "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'North' AND Resource='SE' AND Week ='$min1'";
	$resultseNORTH 	= sqlsrv_query($conn, $sqlseNORTH, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataseNORTH 	= sqlsrv_fetch_array($resultseNORTH);
	$SeNyMeetNORTH			= $dataseNORTH ['NY_MEET'];
	$SeMeetNORTH			= $dataseNORTH ['MEET'];
	$SeNotCongestionNORTH	= $dataseNORTH ['NOT_CONGEST'];
	$SeCongestNORTH			= $dataseNORTH ['CONGEST'];
	$SeNoIssueNORTH			= $dataseNORTH ['NO_ISSUE'];
	$SeIssueNORTH			= $dataseNORTH ['ISSUE'];
	
	
//Ambil data untuk garfik WEST
//ambil data value untuk Resource CONGESTION WEST
	$sqlcongestionWEST = "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'West' AND Resource='CONGESTION' AND Week ='$min1'";
	$resultcongestionWEST 	= sqlsrv_query($conn, $sqlcongestionWEST, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datacongestionWEST		= sqlsrv_fetch_array($resultcongestionWEST);
	$CongestionNyMeetWEST			= $datacongestionWEST ['NY_MEET'];
	$CongestionMeetWEST				= $datacongestionWEST ['MEET'];
	$CongestionNotCongestionWEST	= $datacongestionWEST ['NOT_CONGEST'];
	$CongestionCongestWEST			= $datacongestionWEST ['CONGEST'];
	$CongestionNoIssueWEST			= $datacongestionWEST ['NO_ISSUE'];
	$CongestionIssueWEST			= $datacongestionWEST ['ISSUE'];
	
	
	//ambil data value untuk Resource HsUser WEST
	$sqluserWEST 		= "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'West' AND Resource='HsUser' AND Week ='$min1'";
	$resultuserWEST 	= sqlsrv_query($conn, $sqluserWEST, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datauserWEST 		= sqlsrv_fetch_array($resultuserWEST);
	$UserNyMeetWEST			= $datauserWEST ['NY_MEET'];
	$UserMeetWEST			= $datauserWEST ['MEET'];
	$UserNotCongestionWEST	= $datauserWEST ['NOT_CONGEST'];
	$UserCongestWEST		= $datauserWEST ['CONGEST'];
	$UserNoIssueWEST		= $datauserWEST ['NO_ISSUE'];
	$UserIssueWEST			= $datauserWEST ['ISSUE'];
	
	//ambil data value untuk Resource OPERATION WEST
	$sqloperationWEST = "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'West' AND Resource='OPERATION' AND Week ='$min1'";
	$resultoperationWEST 	= sqlsrv_query($conn, $sqloperationWEST, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataoperationWEST 		= sqlsrv_fetch_array($resultoperationWEST);
	$OperationNyMeetWEST 		= $dataoperationWEST ['NY_MEET'];
	$OperationMeetWEST 			= $dataoperationWEST ['MEET'];
	$OperationNotCongestionWEST = $dataoperationWEST ['NOT_CONGEST'];
	$OperationCongestWEST		= $dataoperationWEST ['CONGEST'];
	$OperationNoIssueWEST		= $dataoperationWEST ['NO_ISSUE'];
	$OperationIssueWEST			= $dataoperationWEST ['ISSUE'];
	
	
	//ambil data value untuk Resource SE WEST
	$sqlseWEST = "SELECT NY_MEET, MEET, NOT_CONGEST, CONGEST, NO_ISSUE, ISSUE  FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] WHERE Region = 'West' AND Resource='SE' AND Week ='$min1'";
	$resultseWEST 	= sqlsrv_query($conn, $sqlseWEST, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataseWEST 	= sqlsrv_fetch_array($resultseWEST);
	$SeNyMeetWEST			= $dataseWEST ['NY_MEET'];
	$SeMeetWEST				= $dataseWEST ['MEET'];
	$SeNotCongestionWEST	= $dataseWEST ['NOT_CONGEST'];
	$SeCongestWEST			= $dataseWEST ['CONGEST'];
	$SeNoIssueWEST			= $dataseWEST ['NO_ISSUE'];
	$SeIssueWEST			= $dataseWEST ['ISSUE'];
?>
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
               ['Resource', 'NY_MEET', 'MEET','NOT_CONGEST','CONGEST','NO_ISSUE','ISSUE'],
               ['CONGESTION', <?php echo $CongestionNyMeet ; ?> , <?php echo $CongestionMeet ; ?>, <?php echo $CongestionNotCongestion ; ?>, <?php echo $CongestionCongest ; ?>, <?php echo $CongestionNoIssue ; ?>, <?php echo $CongestionIssue ; ?> ],
               ['HsUser' , <?php echo $UserNyMeet ;?>, <?php echo $UserMeet ; ?>, <?php echo $UserNotCongestion ; ?>, <?php echo $UserCongest ; ?>, <?php echo $UserNoIssue ; ?>, <?php echo $UserIssue ; ?> ],
               ['OPERATION' , <?php echo $OperationNyMeet ; ?> , <?php echo $OperationMeet ; ?>, <?php echo $OperationNotCongestion ; ?>, <?php echo $OperationCongest ; ?>, <?php echo $OperationNoIssue ; ?>, <?php echo $OperationIssue ; ?> ],
               ['SE' , <?php echo $SeNyMeet ?> ,<?php echo $SeMeet ?> , <?php echo $SeNotCongestion ?>, <?php echo $SeCongest ?>, <?php echo $SeNoIssue ?>,<?php echo $SeIssue ?>]
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
                   2:{color:'#03A9F4'},
                   3:{color:'#212121'},
				   4:{color:'#FFC107'},
				   5:{color:'#E91E63'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked1'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>

<!-- CHART REGION EAST -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Resource', 'NY_MEET', 'MEET','NOT_CONGEST','CONGEST','NO_ISSUE','ISSUE'],
               ['CONGESTION', <?php echo $CongestionNyMeetEAST ; ?> , <?php echo $CongestionMeetEAST ; ?>, <?php echo $CongestionNotCongestionEAST ; ?>, <?php echo $CongestionCongestEAST ; ?>, <?php echo $CongestionNoIssueEAST ; ?>, <?php echo $CongestionIssueEAST ; ?> ],
               ['HsUser' , <?php echo $UserNyMeetEAST ;?>, <?php echo $UserMeetEAST ; ?>, <?php echo $UserNotCongestionEAST ; ?>, <?php echo $UserCongestEAST ; ?>, <?php echo $UserNoIssueEAST ; ?>, <?php echo $UserIssueEAST ; ?> ],
               ['OPERATION' , <?php echo $OperationNyMeetEAST ; ?> , <?php echo $OperationMeetEAST ; ?>, <?php echo $OperationNotCongestionEAST ; ?>, <?php echo $OperationCongestEAST ; ?>, <?php echo $OperationNoIssueEAST ; ?>, <?php echo $OperationIssueEAST ; ?> ],
               ['SE' , <?php echo $SeNyMeetEAST ?> ,<?php echo $SeMeetEAST ?> , <?php echo $SeNotCongestionEAST ?>, <?php echo $SeCongestEAST ?>, <?php echo $SeNoIssueEAST ?>,<?php echo $SeIssueEAST ?>]
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
                   2:{color:'#03A9F4'},
                   3:{color:'#212121'},
				   4:{color:'#FFC107'},
				   5:{color:'#E91E63'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked2'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Region JABODETABEK -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Resource', 'NY_MEET', 'MEET','NOT_CONGEST','CONGEST','NO_ISSUE','ISSUE'],
               ['CONGESTION', <?php echo $CongestionNyMeetJBDTB ; ?> , <?php echo $CongestionMeetJBDTB ; ?>, <?php echo $CongestionNotCongestionJBDTB ; ?>, <?php echo $CongestionCongestJBDTB ; ?>, <?php echo $CongestionNoIssueJBDTB ; ?>, <?php echo $CongestionIssueJBDTB ; ?> ],
               ['HsUser' , <?php echo $UserNyMeetJBDTB ;?>, <?php echo $UserMeetJBDTB ; ?>, <?php echo $UserNotCongestionJBDTB ; ?>, <?php echo $UserCongestJBDTB ; ?>, <?php echo $UserNoIssueJBDTB ; ?>, <?php echo $UserIssueJBDTB ; ?> ],
               ['OPERATION' , <?php echo $OperationNyMeetJBDTB ; ?> , <?php echo $OperationMeetJBDTB ; ?>, <?php echo $OperationNotCongestionJBDTB ; ?>, <?php echo $OperationCongestJBDTB ; ?>, <?php echo $OperationNoIssueJBDTB ; ?>, <?php echo $OperationIssueJBDTB ; ?> ],
               ['SE' , <?php echo $SeNyMeetJBDTB ?> ,<?php echo $SeMeetJBDTB ?> , <?php echo $SeNotCongestionJBDTB ?>, <?php echo $SeCongestJBDTB ?>, <?php echo $SeNoIssueJBDTB ?>,<?php echo $SeIssueJBDTB ?>]
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
                   2:{color:'#03A9F4'},
                   3:{color:'#212121'},
				   4:{color:'#FFC107'},
				   5:{color:'#E91E63'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked3'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>

<!-- Chart Region NORTH -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Resource', 'NY_MEET', 'MEET','NOT_CONGEST','CONGEST','NO_ISSUE','ISSUE'],
               ['CONGESTION', <?php echo $CongestionNyMeetNORTH ; ?> , <?php echo $CongestionMeetNORTH ; ?>, <?php echo $CongestionNotCongestionNORTH ; ?>, <?php echo $CongestionCongestNORTH ; ?>, <?php echo $CongestionNoIssueNORTH ; ?>, <?php echo $CongestionIssueNORTH ; ?> ],
               ['HsUser' , <?php echo $UserNyMeetNORTH ;?>, <?php echo $UserMeetNORTH ; ?>, <?php echo $UserNotCongestionNORTH ; ?>, <?php echo $UserCongestNORTH ; ?>, <?php echo $UserNoIssueNORTH ; ?>, <?php echo $UserIssueNORTH ; ?> ],
               ['OPERATION' , <?php echo $OperationNyMeetNORTH ; ?> , <?php echo $OperationMeetNORTH ; ?>, <?php echo $OperationNotCongestionNORTH ; ?>, <?php echo $OperationCongestNORTH ; ?>, <?php echo $OperationNoIssueNORTH ; ?>, <?php echo $OperationIssueNORTH ; ?> ],
               ['SE' , <?php echo $SeNyMeetNORTH ?> ,<?php echo $SeMeetNORTH ?> , <?php echo $SeNotCongestionNORTH ?>, <?php echo $SeCongestNORTH ?>, <?php echo $SeNoIssueNORTH ?>,<?php echo $SeIssueNORTH ?>]
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
                   2:{color:'#03A9F4'},
                   3:{color:'#212121'},
				   4:{color:'#FFC107'},
				   5:{color:'#E91E63'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked4'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>

<!-- Chart Region WEST -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Resource', 'NY_MEET', 'MEET','NOT_CONGEST','CONGEST','NO_ISSUE','ISSUE'],
               ['CONGESTION', <?php echo $CongestionNyMeetWEST ; ?> , <?php echo $CongestionMeetWEST ; ?>, <?php echo $CongestionNotCongestionWEST ; ?>, <?php echo $CongestionCongestWEST ; ?>, <?php echo $CongestionNoIssueWEST ; ?>, <?php echo $CongestionIssueWEST ; ?> ],
               ['HsUser' , <?php echo $UserNyMeetWEST ;?>, <?php echo $UserMeetWEST ; ?>, <?php echo $UserNotCongestionWEST ; ?>, <?php echo $UserCongestWEST ; ?>, <?php echo $UserNoIssueWEST ; ?>, <?php echo $UserIssueWEST ; ?> ],
               ['OPERATION' , <?php echo $OperationNyMeetWEST ; ?> , <?php echo $OperationMeetWEST ; ?>, <?php echo $OperationNotCongestionWEST ; ?>, <?php echo $OperationCongestWEST ; ?>, <?php echo $OperationNoIssueWEST ; ?>, <?php echo $OperationIssueWEST ; ?> ],
               ['SE' , <?php echo $SeNyMeetWEST ?> ,<?php echo $SeMeetWEST ?> , <?php echo $SeNotCongestionWEST ?>, <?php echo $SeCongestWEST ?>, <?php echo $SeNoIssueWEST ?>,<?php echo $SeIssueWEST ?>]
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
                   2:{color:'#03A9F4'},
                   3:{color:'#212121'},
				   4:{color:'#FFC107'},
				   5:{color:'#E91E63'}
                 }  
            };  

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked5'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>

<!-- TABEL -->
<!-- TABEL CENTRAL -->
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string','REMARKS');
        data.addColumn('number','NY MEET');
        data.addColumn('number','MEET');
        data.addColumn('number','NOT CONGEST');
        data.addColumn('number','CONGEST');
		data.addColumn('number','NO ISSUE');
		data.addColumn('number','ISSUE');
        data.addRows([
          ['CONGEST', {v: <?php echo $CongestionNyMeet ; ?>},  {v: <?php echo $CongestionMeet ; ?>},  {v: <?php echo $CongestionNotCongestion ; ?>},  {v:  <?php echo $CongestionCongest ; ?>},  {v:  <?php echo $CongestionNoIssue ; ?>},  {v:  <?php echo $CongestionIssue ; ?>}],
          ['HsUser',   {v:<?php echo $UserNyMeet ;?>},  {v: <?php echo $UserMeet ; ?>},  {v:  <?php echo $UserNotCongestion ; ?>},  {v: <?php echo $UserCongest ; ?>},  {v: <?php echo $UserNoIssue ; ?>},  {v: <?php echo $UserIssue ; ?>}],
          ['OPERATION', {v: <?php echo $OperationNyMeet ; ?>},  {v: <?php echo $OperationMeet ; ?>},  {v: <?php echo $OperationNotCongestion ; ?>},  {v: <?php echo $OperationCongest ; ?>},  {v: <?php echo $OperationNoIssue ; ?>},  {v: <?php echo $OperationIssue ; ?>}],
          ['SE',   {v: <?php echo $SeNyMeet ?>},  {v: <?php echo $SeMeet ?>},  {v: <?php echo $SeNotCongestion ?>},  {v: <?php echo $SeCongest ?>},  {v: <?php echo $SeNoIssue ?>},  {v: <?php echo $SeIssue ?>}]
		  
		  
		]);

		
        var table = new google.visualization.Table(document.getElementById('tableCentral'));
		
        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>

<!-- TABEL EAST -->
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string','REMARKS');
        data.addColumn('number','NY MEET');
        data.addColumn('number','MEET');
        data.addColumn('number','NOT CONGEST');
        data.addColumn('number','CONGEST');
		data.addColumn('number','NO ISSUE');
		data.addColumn('number','ISSUE');
        data.addRows([
          ['CONGEST', {v: <?php echo $CongestionNyMeetEAST ; ?>},  {v: <?php echo $CongestionMeetEAST ; ?>},  {v: <?php echo $CongestionNotCongestionEAST ; ?>},  {v:  <?php echo $CongestionCongestEAST ; ?>},  {v:  <?php echo $CongestionNoIssueEAST ; ?>},  {v:  <?php echo $CongestionIssueEAST ; ?>}],
          ['HsUser',   {v:<?php echo $UserNyMeetEAST ;?>},  {v: <?php echo $UserMeetEAST ; ?>},  {v:  <?php echo $UserNotCongestionEAST ; ?>},  {v: <?php echo $UserCongestEAST ; ?>},  {v: <?php echo $UserNoIssueEAST ; ?>},  {v: <?php echo $UserIssueEAST ; ?>}],
          ['OPERATION', {v: <?php echo $OperationNyMeetEAST ; ?>},  {v: <?php echo $OperationMeetEAST ; ?>},  {v: <?php echo $OperationNotCongestionEAST ; ?>},  {v: <?php echo $OperationCongestEAST ; ?>},  {v: <?php echo $OperationNoIssueEAST ; ?>},  {v: <?php echo $OperationIssueEAST ; ?>}],
          ['SE',   {v: <?php echo $SeNyMeetEAST ?>},  {v: <?php echo $SeMeetEAST ?>},  {v: <?php echo $SeNotCongestionEAST ?>},  {v: <?php echo $SeCongestEAST ?>},  {v: <?php echo $SeNoIssueEAST ?>},  {v: <?php echo $SeIssueEAST ?>}]
		  
		  
		]);

		
        var table = new google.visualization.Table(document.getElementById('tableEAST'));
		
        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>
<!-- TABEL JABODETABEK -->
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string','REMARKS');
        data.addColumn('number','NY MEET');
        data.addColumn('number','MEET');
        data.addColumn('number','NOT CONGEST');
        data.addColumn('number','CONGEST');
		data.addColumn('number','NO ISSUE');
		data.addColumn('number','ISSUE');
        data.addRows([
          ['CONGEST', {v: <?php echo $CongestionNyMeetJBDTB ; ?>},  {v: <?php echo $CongestionMeetJBDTB ; ?>},  {v: <?php echo $CongestionNotCongestionJBDTB ; ?>},  {v:  <?php echo $CongestionCongestJBDTB ; ?>},  {v:  <?php echo $CongestionNoIssueJBDTB ; ?>},  {v:  <?php echo $CongestionIssueJBDTB ; ?>}],
          ['HsUser',   {v:<?php echo $UserNyMeetJBDTB ;?>},  {v: <?php echo $UserMeetJBDTB ; ?>},  {v:  <?php echo $UserNotCongestionJBDTB ; ?>},  {v: <?php echo $UserCongestJBDTB ; ?>},  {v: <?php echo $UserNoIssueJBDTB ; ?>},  {v: <?php echo $UserIssueJBDTB ; ?>}],
          ['OPERATION', {v: <?php echo $OperationNyMeetJBDTB ; ?>},  {v: <?php echo $OperationMeetJBDTB ; ?>},  {v: <?php echo $OperationNotCongestionJBDTB ; ?>},  {v: <?php echo $OperationCongestJBDTB ; ?>},  {v: <?php echo $OperationNoIssueJBDTB ; ?>},  {v: <?php echo $OperationIssueJBDTB ; ?>}],
          ['SE',   {v: <?php echo $SeNyMeetJBDTB ?>},  {v: <?php echo $SeMeetJBDTB ?>},  {v: <?php echo $SeNotCongestionJBDTB ?>},  {v: <?php echo $SeCongestJBDTB ?>},  {v: <?php echo $SeNoIssueJBDTB ?>},  {v: <?php echo $SeIssueJBDTB ?>}]
		  
		  
		]);

		
        var table = new google.visualization.Table(document.getElementById('tableJABODETABEK'));
		
        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>
<!-- TABEL NORTH -->
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string','REMARKS');
        data.addColumn('number','NY MEET');
        data.addColumn('number','MEET');
        data.addColumn('number','NOT CONGEST');
        data.addColumn('number','CONGEST');
		data.addColumn('number','NO ISSUE');
		data.addColumn('number','ISSUE');
        data.addRows([
          ['CONGEST', {v: <?php echo $CongestionNyMeetNORTH ; ?>},  {v: <?php echo $CongestionMeetNORTH ; ?>},  {v: <?php echo $CongestionNotCongestionNORTH ; ?>},  {v:  <?php echo $CongestionCongestNORTH ; ?>},  {v:  <?php echo $CongestionNoIssueNORTH ; ?>},  {v:  <?php echo $CongestionIssueNORTH ; ?>}],
          ['HsUser',   {v:<?php echo $UserNyMeetNORTH ;?>},  {v: <?php echo $UserMeetNORTH ; ?>},  {v:  <?php echo $UserNotCongestionNORTH ; ?>},  {v: <?php echo $UserCongestNORTH ; ?>},  {v: <?php echo $UserNoIssueNORTH ; ?>},  {v: <?php echo $UserIssueNORTH ; ?>}],
          ['OPERATION', {v: <?php echo $OperationNyMeetNORTH ; ?>},  {v: <?php echo $OperationMeet ; ?>},  {v: <?php echo $OperationNotCongestionNORTH ; ?>},  {v: <?php echo $OperationCongestNORTH ; ?>},  {v: <?php echo $OperationNoIssueNORTH ; ?>},  {v: <?php echo $OperationIssueNORTH ; ?>}],
          ['SE',   {v: <?php echo $SeNyMeetNORTH ?>},  {v: <?php echo $SeMeetNORTH ?>},  {v: <?php echo $SeNotCongestionNORTH ?>},  {v: <?php echo $SeCongestNORTH ?>},  {v: <?php echo $SeNoIssueNORTH ?>},  {v: <?php echo $SeIssueNORTH ?>}]
		  
		  
		]);

		
        var table = new google.visualization.Table(document.getElementById('tableNORTH'));
		
        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>

<!-- TABEL WEST -->
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string','REMARKS');
        data.addColumn('number','NY MEET');
        data.addColumn('number','MEET');
        data.addColumn('number','NOT CONGEST');
        data.addColumn('number','CONGEST');
		data.addColumn('number','NO ISSUE');
		data.addColumn('number','ISSUE');
        data.addRows([
          ['CONGEST', {v: <?php echo $CongestionNyMeetWEST ; ?>},  {v: <?php echo $CongestionMeetWEST ; ?>},  {v: <?php echo $CongestionNotCongestionWEST ; ?>},  {v:  <?php echo $CongestionCongestWEST ; ?>},  {v:  <?php echo $CongestionNoIssueWEST ; ?>},  {v:  <?php echo $CongestionIssueWEST ; ?>}],
          ['HsUser',   {v:<?php echo $UserNyMeetWEST ;?>},  {v: <?php echo $UserMeetWEST ; ?>},  {v:  <?php echo $UserNotCongestionWEST ; ?>},  {v: <?php echo $UserCongestWEST ; ?>},  {v: <?php echo $UserNoIssueWEST ; ?>},  {v: <?php echo $UserIssueWEST ; ?>}],
          ['OPERATION', {v: <?php echo $OperationNyMeetWEST ; ?>},  {v: <?php echo $OperationMeetWEST ; ?>},  {v: <?php echo $OperationNotCongestionWEST ; ?>},  {v: <?php echo $OperationCongestWEST ; ?>},  {v: <?php echo $OperationNoIssueWEST ; ?>},  {v: <?php echo $OperationIssueWEST ; ?>}],
          ['SE',   {v: <?php echo $SeNyMeetWEST ?>},  {v: <?php echo $SeMeetWEST ?>},  {v: <?php echo $SeNotCongestionWEST ?>},  {v: <?php echo $SeCongestWEST ?>},  {v: <?php echo $SeNoIssueWEST ?>},  {v: <?php echo $SeIssueWEST ?>}]
		  
		  
		]);

		
        var table = new google.visualization.Table(document.getElementById('tableWEST'));
		
        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>
<?php
include 'footer.php';
?>