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
			<h3>Capman Report <small>3G Daily Report</small></h3>
		</div>
	</div>
<!-- MULAI DARI SINI -->
<div class="x_panel">
	<div class="x_content">
		<div class="row">
		<form method="post" action="3GDailyReport.php">
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
			<div class="form-group"></div>
			<div class="col-md-3 col-sm-12 col-xs-12 form-group">
				<button type="submit" class="btn btn-primary" name="submit">Tampil</button>
			</div>
		</form>
		</div>
	</div>
</div>
<!-- Bagian DUA -->
<div class="row">
	<div class="clearfix"></div>
		<div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> 3G Capacity CENTRAL <?php $min1 = $_POST['awal']; echo $min1 ; ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
							<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
								<p><div id="stacked1"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
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
                    <h2><i class="fa fa-bars"></i> 3G Capacity EAST <?php $min1 = $_POST['awal']; echo $min1 ; ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab1" class="nav nav-tabs bar_tabs right" role="tablist">
							<li role="presentation" class="active"><a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#tab_content22" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent2" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">
								<p><div id="stacked2"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">
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
                    <h2><i class="fa fa-bars"></i> 3G Capacity JABODETABEK 1 <?php $min1 = $_POST['awal']; echo $min1 ; ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
							<li role="presentation" class="active"><a href="#chart_jabo1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#tabel_jabo1" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="chart_jabo1" aria-labelledby="home-tab">
								<p><div id="stacked3"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tabel_jabo1" aria-labelledby="profile-tab">
								<p><div id="tableJABODETABEK1"></div></p>
							</div>
						</div>
                    </div>
				</div>
            </div>
        </div>
		<div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> 3G Capacity JABODETABEK 2 <?php $min1 = $_POST['awal']; echo $min1 ; ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab1" class="nav nav-tabs bar_tabs right" role="tablist">
							<li role="presentation" class="active"><a href="#chart_jabo2" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#tabel_jabo2" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent2" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="chart_jabo2" aria-labelledby="home-tab">
								<p><div id="stacked4"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tabel_jabo2" aria-labelledby="profile-tab">
								<p><div id="tableJABODETABEK2"></div></p>
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
                    <h2><i class="fa fa-bars"></i> 3G Capacity NORTH <?php $min1 = $_POST['awal']; echo $min1 ; ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
							<li role="presentation" class="active"><a href="#chart_NORTH" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#tabel_NORTH" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="chart_NORTH" aria-labelledby="home-tab">
								<p><div id="stacked5"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tabel_NORTH" aria-labelledby="profile-tab">
								<p><div id="tableNORTH"></div></p>
							</div>
						</div>
                    </div>
				</div>
            </div>
        </div>
		<div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> 3G NORTHERNSUMATERA <?php $min1 = $_POST['awal']; echo $min1 ; ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab1" class="nav nav-tabs bar_tabs right" role="tablist">
							<li role="presentation" class="active"><a href="#chart_Northern" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#tabel_Northern" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent2" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="chart_Northern" aria-labelledby="home-tab">
								<p><div id="stacked6"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tabel_Northern" aria-labelledby="profile-tab">
								<p><div id="tableNORTHERNSUMATERA"></div></p>
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
                    <h2><i class="fa fa-bars"></i> 3G SOUTHERNSUMATERA <?php $min1 = $_POST['awal']; echo $min1 ; ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
							<li role="presentation" class="active"><a href="#chart_south" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Chart</a></li>
							<li role="presentation" class=""><a href="#tabel_south" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Table</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="chart_south" aria-labelledby="home-tab">
								<p><div id="stacked7"></div></p>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tabel_south" aria-labelledby="profile-tab">
								<p><div id="tableSOUTHERNSUMATERA"></div></p>
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
<script type = "text/javascript"></script>
<?php
// Get Value For Chart Region Central
	// get h-1 day
	$min1 = $_POST['awal'];
	//ambil data value dari database Untuk Graph
	//ambil data value untuk Resource CE 
	$sqlcecongest = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'CENTRAL' AND Resource='CE' AND DateId ='$min1'";
	$resultcecongest = sqlsrv_query($conn, $sqlcecongest, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datacecongest = sqlsrv_fetch_array($resultcecongest);
	$CeCongest= $datacecongest ['Congest'];
	$CeHigh= $datacecongest ['High'];
	$CeMedium= $datacecongest ['Medium'];
	$CeLow= $datacecongest ['Low'];
	
	//ambil data value untuk Resource CODE 
	$sqlcodecongest = "SELECT Congest,High,Medium,Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'CENTRAL' AND Resource='CODE' AND DateId ='$min1'";
	$resultcodecongest = sqlsrv_query($conn, $sqlcodecongest, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datacodecongest = sqlsrv_fetch_array($resultcodecongest);
	$CodeCongest= $datacodecongest ['Congest'];
	$CodeHigh= $datacodecongest ['High'];
	$CodeMedium= $datacodecongest ['Medium'];
	$CodeLow= $datacodecongest ['Low'];
	
	//ambil data value untuk Resource POWER 
	$sqlpowercongest = "SELECT Congest,High,Medium,Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'CENTRAL' AND Resource='POWER' AND DateId ='$min1'";
	$resultpowercongest = sqlsrv_query($conn, $sqlpowercongest, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datapowercongest = sqlsrv_fetch_array($resultpowercongest);
	$PowerCongest= $datapowercongest ['Congest'];
	$PowerHigh= $datapowercongest ['High'];
	$PowerMedium= $datapowercongest ['Medium'];
	$PowerLow= $datapowercongest ['Low'];
	
	//ambil data value untuk Resource HDSPA 
	$sqlhdspahigh = "SELECT High,Medium,Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'CENTRAL' AND Resource='HDSPA' AND DateId ='$min1'";
	$resulthdspahigh = sqlsrv_query($conn, $sqlhdspahigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datahdspahigh = sqlsrv_fetch_array($resulthdspahigh);
	$HdspaHigh= $datahdspahigh ['High'];
	$HdspaMedium= $datahdspahigh ['Medium'];
	$HdspaLow= $datahdspahigh ['Low'];
	
	// Get Value From Chart Region EAST
	$sqlCeCongestEAST = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'EAST' AND Resource='CE' AND DateId ='$min1'";
	$resultCeCongestEAST = sqlsrv_query($conn, $sqlCeCongestEAST, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataCeCongestEAST = sqlsrv_fetch_array($resultCeCongestEAST);
	$CeHighEAST= $dataCeCongestEAST ['High'];
	$CeCongestEAST= $dataCeCongestEAST ['Congest'];
	$CeMediumEAST= $dataCeCongestEAST ['Medium'];
	$CeLowEAST= $dataCeCongestEAST ['Low'];
	
	//ambil data value untuk Resource CODE Congest
	$sqlcodecongestEAST = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'EAST' AND Resource='CODE' AND DateId ='$min1'";
	$resultcodecongestEAST = sqlsrv_query($conn, $sqlcodecongestEAST, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datacodecongestEAST = sqlsrv_fetch_array($resultcodecongestEAST);
	$CodeCongestEAST= $datacodecongestEAST ['Congest'];
	$CodeHighEAST= $datacodecongestEAST ['High'];
	$CodeMediumEAST= $datacodecongestEAST ['Medium'];
	$CodeLowEAST= $datacodecongestEAST ['Low'];
	
	//ambil data value untuk Resource POWER Congest
	$sqlpowercongestEAST = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'EAST' AND Resource='POWER' AND DateId ='$min1'";
	$resultpowercongestEAST = sqlsrv_query($conn, $sqlpowercongestEAST, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datapowercongestEAST = sqlsrv_fetch_array($resultpowercongestEAST);
	$PowerCongestEAST= $datapowercongestEAST ['Congest'];
	$PowerHighEAST= $datapowercongestEAST ['High'];
	$PowerMediumEAST= $datapowercongestEAST ['Medium'];
	$PowerLowEAST= $datapowercongestEAST ['Low'];
	
	//ambil data value untuk Resource HDSPA High
	$sqlhdspahighEAST = "SELECT High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'EAST' AND Resource='HDSPA' AND DateId ='$min1'";
	$resulthdspahighEAST = sqlsrv_query($conn, $sqlhdspahighEAST, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datahdspahighEAST = sqlsrv_fetch_array($resulthdspahighEAST);
	$HdspaHighEAST= $datahdspahighEAST ['High'];
	$HdspaMediumEAST= $datahdspahighEAST ['Medium'];
	$HdspaLowEAST= $datahdspahighEAST ['Low'];

//Get Value For Chart Region Jabodetabek 1 
	//ambil data value untuk Resource CE Congest
	$sqlCeCongestJABODETABEK1 = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'JABODETABEK 1' AND Resource='CE' AND DateId ='$min1'";
	$resultCeCongestJABODETABEK1 = sqlsrv_query($conn, $sqlCeCongestJABODETABEK1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataCeCongestJABODETABEK1 = sqlsrv_fetch_array($resultCeCongestJABODETABEK1);
	$CeCongestJABODETABEK1= $dataCeCongestJABODETABEK1 ['Congest'];
	$CeHighJABODETABEK1= $dataCeCongestJABODETABEK1 ['High'];
	$CeMediumJABODETABEK1= $dataCeCongestJABODETABEK1 ['Medium'];
	$CeLowJABODETABEK1= $dataCeCongestJABODETABEK1 ['Low'];
	
	//ambil data value untuk Resource CODE Congest
	$sqlcodecongestJABODETABEK1 = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'JABODETABEK 1' AND Resource='CODE' AND DateId ='$min1'";
	$resultcodecongestJABODETABEK1 = sqlsrv_query($conn, $sqlcodecongestJABODETABEK1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datacodecongestJABODETABEK1 = sqlsrv_fetch_array($resultcodecongestJABODETABEK1);
	$CodeCongestJABODETABEK1= $datacodecongestJABODETABEK1 ['Congest'];
	$CodeHighJABODETABEK1= $datacodecongestJABODETABEK1 ['High'];
	$CodeMediumJABODETABEK1= $datacodecongestJABODETABEK1 ['Medium'];
	$CodeLowJABODETABEK1= $datacodecongestJABODETABEK1 ['Low'];
	
	//ambil data value untuk Resource POWER Congest
	$sqlpowercongestJABODETABEK1 = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'JABODETABEK 1' AND Resource='POWER' AND DateId ='$min1'";
	$resultpowercongestJABODETABEK1 = sqlsrv_query($conn, $sqlpowercongestJABODETABEK1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datapowercongestJABODETABEK1 = sqlsrv_fetch_array($resultpowercongestJABODETABEK1);
	$PowerCongestJABODETABEK1= $datapowercongestJABODETABEK1 ['Congest'];
	$PowerHighJABODETABEK1= $datapowercongestJABODETABEK1 ['High'];
	$PowerMediumJABODETABEK1= $datapowercongestJABODETABEK1 ['Medium'];
	$PowerLowJABODETABEK1= $datapowercongestJABODETABEK1 ['Low'];
	
	//ambil data value untuk Resource HDSPA High
	$sqlhdspahighJABODETABEK1 = "SELECT High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'JABODETABEK 1' AND Resource='HDSPA' AND DateId ='$min1'";
	$resulthdspahighJABODETABEK1 = sqlsrv_query($conn, $sqlhdspahighJABODETABEK1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datahdspahighJABODETABEK1 = sqlsrv_fetch_array($resulthdspahighJABODETABEK1);
	$HdspaHighJABODETABEK1= $datahdspahighJABODETABEK1 ['High'];
	$HdspaMediumJABODETABEK1= $datahdspahighJABODETABEK1 ['Medium'];
	$HdspaLowJABODETABEK1= $datahdspahighJABODETABEK1 ['Low'];
	
//Get Value For Chart Jabodetabek 2
	$sqlCeCongestJABODETABEK2 = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'JABODETABEK 2' AND Resource='CE' AND DateId ='$min1'";
	$resultCeCongestJABODETABEK2 = sqlsrv_query($conn, $sqlCeCongestJABODETABEK2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataCeCongestJABODETABEK2 = sqlsrv_fetch_array($resultCeCongestJABODETABEK2);
	$CeCongestJABODETABEK2= $dataCeCongestJABODETABEK2 ['Congest'];
	$CeHighJABODETABEK2= $dataCeCongestJABODETABEK2 ['High'];
	$CeMediumJABODETABEK2= $dataCeCongestJABODETABEK2 ['Medium'];
	$CeLowJABODETABEK2= $dataCeCongestJABODETABEK2 ['Low'];
	
	//ambil data value untuk Resource CODE Congest
	$sqlcodecongestJABODETABEK2 = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'JABODETABEK 2' AND Resource='CODE' AND DateId ='$min1'";
	$resultcodecongestJABODETABEK2 = sqlsrv_query($conn, $sqlcodecongestJABODETABEK2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datacodecongestJABODETABEK2 = sqlsrv_fetch_array($resultcodecongestJABODETABEK2);
	$CodeCongestJABODETABEK2= $datacodecongestJABODETABEK2 ['Congest'];
	$CodeHighJABODETABEK2= $datacodecongestJABODETABEK2 ['High'];
	$CodeMediumJABODETABEK2= $datacodecongestJABODETABEK2 ['Medium'];
	$CodeLowJABODETABEK2= $datacodecongestJABODETABEK2 ['Low'];
	
	//ambil data value untuk Resource POWER Congest
	$sqlpowercongestJABODETABEK2 = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'JABODETABEK 2' AND Resource='POWER' AND DateId ='$min1'";
	$resultpowercongestJABODETABEK2 = sqlsrv_query($conn, $sqlpowercongestJABODETABEK2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datapowercongestJABODETABEK2 = sqlsrv_fetch_array($resultpowercongestJABODETABEK2);
	$PowerCongestJABODETABEK2= $datapowercongestJABODETABEK2 ['Congest'];
	$PowerHighJABODETABEK2= $datapowercongestJABODETABEK2 ['High'];
	$PowerMediumJABODETABEK2= $datapowercongestJABODETABEK2 ['Medium'];
	$PowerLowJABODETABEK2= $datapowercongestJABODETABEK2 ['Low'];
	
	//ambil data value untuk Resource HDSPA High
	$sqlhdspahighJABODETABEK2 = "SELECT High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'JABODETABEK 2' AND Resource='HDSPA' AND DateId ='$min1'";
	$resulthdspahighJABODETABEK2 = sqlsrv_query($conn, $sqlhdspahighJABODETABEK2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datahdspahighJABODETABEK2 = sqlsrv_fetch_array($resulthdspahighJABODETABEK2);
	$HdspaHighJABODETABEK2= $datahdspahighJABODETABEK2 ['High'];
	$HdspaMediumJABODETABEK2= $datahdspahighJABODETABEK2 ['Medium'];
	$HdspaLowJABODETABEK2= $datahdspahighJABODETABEK2 ['Low'];
//Get Value For Chart Region NORTH

	//ambil data value untuk Resource CE Congest
	$sqlCeCongestNORTH = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'NORTH' AND Resource='CE' AND DateId ='$min1'";
	$resultCeCongestNORTH = sqlsrv_query($conn, $sqlCeCongestNORTH, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataCeCongestNORTH = sqlsrv_fetch_array($resultCeCongestNORTH);
	$CeCongestNORTH= $dataCeCongestNORTH ['Congest'];
	$CeHighNORTH= $dataCeCongestNORTH ['High'];
	$CeMediumNORTH= $dataCeCongestNORTH ['Medium'];
	$CeLowNORTH= $dataCeCongestNORTH ['Low'];
	
	//ambil data value untuk Resource CODE Congest
	$sqlcodecongestNORTH = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'NORTH' AND Resource='CODE' AND DateId ='$min1'";
	$resultcodecongestNORTH = sqlsrv_query($conn, $sqlcodecongestNORTH, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datacodecongestNORTH = sqlsrv_fetch_array($resultcodecongestNORTH);
	$CodeCongestNORTH= $datacodecongestNORTH ['Congest'];
	$CodeHighNORTH= $datacodecongestNORTH ['High'];
	$CodeMediumNORTH= $datacodecongestNORTH ['Medium'];
	$CodeLowNORTH= $datacodecongestNORTH ['Low'];
	
	//ambil data value untuk Resource POWER Congest
	$sqlpowercongestNORTH = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'NORTH' AND Resource='POWER' AND DateId ='$min1'";
	$resultpowercongestNORTH = sqlsrv_query($conn, $sqlpowercongestNORTH, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datapowercongestNORTH = sqlsrv_fetch_array($resultpowercongestNORTH);
	$PowerCongestNORTH= $datapowercongestNORTH ['Congest'];
	$PowerHighNORTH= $datapowercongestNORTH ['High'];
	$PowerMediumNORTH= $datapowercongestNORTH ['Medium'];
	$PowerLowNORTH= $datapowercongestNORTH ['Low'];
	
	//ambil data value untuk Resource HDSPA High
	$sqlhdspahighNORTH = "SELECT High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'NORTH' AND Resource='HDSPA' AND DateId ='$min1'";
	$resulthdspahighNORTH = sqlsrv_query($conn, $sqlhdspahighNORTH, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datahdspahighNORTH = sqlsrv_fetch_array($resulthdspahighNORTH);
	$HdspaHighNORTH= $datahdspahighNORTH ['High'];
	$HdspaMediumNORTH= $datahdspahighNORTH ['Medium'];
	$HdspaLowNORTH= $datahdspahighNORTH ['Low'];
//Get Value For Chart Region Nouthern Sumatera

//Get Value For Chart Region Jabodetabek 1 
//ambil data value untuk Resource CE Congest
	$sqlCeCongestNORTHERNSUMATERA = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'NORTHERN SUMATERA' AND Resource='CE' AND DateId ='$min1'";
	$resultCeCongestNORTHERNSUMATERA = sqlsrv_query($conn, $sqlCeCongestNORTHERNSUMATERA, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataCeCongestNORTHERNSUMATERA = sqlsrv_fetch_array($resultCeCongestNORTHERNSUMATERA);
	$CeCongestNORTHERNSUMATERA= $dataCeCongestNORTHERNSUMATERA ['Congest'];
	$CeHighNORTHERNSUMATERA= $dataCeCongestNORTHERNSUMATERA ['High'];
	$CeMediumNORTHERNSUMATERA= $dataCeCongestNORTHERNSUMATERA ['Medium'];
	$CeLowNORTHERNSUMATERA= $dataCeCongestNORTHERNSUMATERA ['Low'];
	
	//ambil data value untuk Resource CODE Congest
	$sqlcodecongestNORTHERNSUMATERA = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'NORTHERN SUMATERA' AND Resource='CODE' AND DateId ='$min1'";
	$resultcodecongestNORTHERNSUMATERA = sqlsrv_query($conn, $sqlcodecongestNORTHERNSUMATERA, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datacodecongestNORTHERNSUMATERA = sqlsrv_fetch_array($resultcodecongestNORTHERNSUMATERA);
	$CodeCongestNORTHERNSUMATERA= $datacodecongestNORTHERNSUMATERA ['Congest'];
	$CodeHighNORTHERNSUMATERA= $datacodecongestNORTHERNSUMATERA ['High'];
	$CodeMediumNORTHERNSUMATERA= $datacodecongestNORTHERNSUMATERA ['Medium'];
	$CodeLowNORTHERNSUMATERA= $datacodecongestNORTHERNSUMATERA ['Low'];
	
	//ambil data value untuk Resource POWER Congest
	$sqlpowercongestNORTHERNSUMATERA = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'NORTHERN SUMATERA' AND Resource='POWER' AND DateId ='$min1'";
	$resultpowercongestNORTHERNSUMATERA = sqlsrv_query($conn, $sqlpowercongestNORTHERNSUMATERA, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datapowercongestNORTHERNSUMATERA = sqlsrv_fetch_array($resultpowercongestNORTHERNSUMATERA);
	$PowerCongestNORTHERNSUMATERA= $datapowercongestNORTHERNSUMATERA ['Congest'];
	$PowerHighNORTHERNSUMATERA= $datapowercongestNORTHERNSUMATERA ['High'];
	$PowerMediumNORTHERNSUMATERA= $datapowercongestNORTHERNSUMATERA ['Medium'];
	$PowerLowNORTHERNSUMATERA= $datapowercongestNORTHERNSUMATERA ['Low'];
	
	//ambil data value untuk Resource HDSPA High
	$sqlhdspahighNORTHERNSUMATERA = "SELECT High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'NORTHERN SUMATERA' AND Resource='HDSPA' AND DateId ='$min1'";
	$resulthdspahighNORTHERNSUMATERA = sqlsrv_query($conn, $sqlhdspahighNORTHERNSUMATERA, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datahdspahighNORTHERNSUMATERA = sqlsrv_fetch_array($resulthdspahighNORTHERNSUMATERA);
	$HdspaHighNORTHERNSUMATERA= $datahdspahighNORTHERNSUMATERA ['High'];
	$HdspaMediumNORTHERNSUMATERA= $datahdspahighNORTHERNSUMATERA ['Medium'];
	$HdspaLowNORTHERNSUMATERA= $datahdspahighNORTHERNSUMATERA ['Low'];

//Get Value For Chart Region Southern Sumatera

//Get Value For Chart Region Jabodetabek 1 
//ambil data value untuk Resource CE Congest
	$sqlCeCongestSOUTHERNSUMATERA = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'SOUTHERN SUMATERA' AND Resource='CE' AND DateId ='$min1'";
	$resultCeCongestSOUTHERNSUMATERA = sqlsrv_query($conn, $sqlCeCongestSOUTHERNSUMATERA, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataCeCongestSOUTHERNSUMATERA = sqlsrv_fetch_array($resultCeCongestSOUTHERNSUMATERA);
	$CeCongestSOUTHERNSUMATERA= $dataCeCongestSOUTHERNSUMATERA ['Congest'];
	$CeHighSOUTHERNSUMATERA= $dataCeCongestSOUTHERNSUMATERA ['High'];
	$CeMediumSOUTHERNSUMATERA= $dataCeCongestSOUTHERNSUMATERA ['Medium'];
	$CeLowSOUTHERNSUMATERA= $dataCeCongestSOUTHERNSUMATERA ['Low'];
	
	//ambil data value untuk Resource CODE Congest
	$sqlcodecongestSOUTHERNSUMATERA = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'SOUTHERN SUMATERA' AND Resource='CODE' AND DateId ='$min1'";
	$resultcodecongestSOUTHERNSUMATERA = sqlsrv_query($conn, $sqlcodecongestSOUTHERNSUMATERA, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datacodecongestSOUTHERNSUMATERA = sqlsrv_fetch_array($resultcodecongestSOUTHERNSUMATERA);
	$CodeCongestSOUTHERNSUMATERA= $datacodecongestSOUTHERNSUMATERA ['Congest'];
	$CodeHighSOUTHERNSUMATERA= $datacodecongestSOUTHERNSUMATERA ['High'];
	$CodeMediumSOUTHERNSUMATERA= $datacodecongestSOUTHERNSUMATERA ['Medium'];
	$CodeLowSOUTHERNSUMATERA= $datacodecongestSOUTHERNSUMATERA ['Low'];
	
	//ambil data value untuk Resource POWER Congest
	$sqlpowercongestSOUTHERNSUMATERA = "SELECT Congest, High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'SOUTHERN SUMATERA' AND Resource='POWER' AND DateId ='$min1'";
	$resultpowercongestSOUTHERNSUMATERA = sqlsrv_query($conn, $sqlpowercongestSOUTHERNSUMATERA, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datapowercongestSOUTHERNSUMATERA = sqlsrv_fetch_array($resultpowercongestSOUTHERNSUMATERA);
	$PowerCongestSOUTHERNSUMATERA= $datapowercongestSOUTHERNSUMATERA ['Congest'];
	$PowerHighSOUTHERNSUMATERA= $datapowercongestSOUTHERNSUMATERA ['High'];
	$PowerMediumSOUTHERNSUMATERA= $datapowercongestSOUTHERNSUMATERA ['Medium'];
	$PowerLowSOUTHERNSUMATERA= $datapowercongestSOUTHERNSUMATERA ['Low'];
	
	//ambil data value untuk Resource HDSPA High
	$sqlhdspahighSOUTHERNSUMATERA = "SELECT High, Medium, Low FROM [WebDashboard].[dbo].[RemarksDaily] WHERE RegionSev = 'SOUTHERN SUMATERA' AND Resource='HDSPA' AND DateId ='$min1'";
	$resulthdspahighSOUTHERNSUMATERA = sqlsrv_query($conn, $sqlhdspahighSOUTHERNSUMATERA, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datahdspahighSOUTHERNSUMATERA = sqlsrv_fetch_array($resulthdspahighSOUTHERNSUMATERA);
	$HdspaHighSOUTHERNSUMATERA= $datahdspahighSOUTHERNSUMATERA ['High'];
	$HdspaMediumSOUTHERNSUMATERA= $datahdspahighSOUTHERNSUMATERA ['Medium'];
	$HdspaLowSOUTHERNSUMATERA= $datahdspahighSOUTHERNSUMATERA ['Low'];
?>
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
</script>
<script type = "text/javascript">
google.charts.load('current', {packages: ['corechart']});     
</script>
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Resource', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeLow ; ?> , <?php echo $CeMedium ; ?>, <?php echo $CeHigh ; ?>, <?php echo $CeCongest ; ?> ],
               ['CODE' , <?php echo $CodeLow ;?>, <?php echo $CodeMedium ; ?>, <?php echo $CodeHigh ; ?>, <?php echo $CodeCongest ; ?> ],
               ['POWER' , <?php echo $PowerLow ; ?> , <?php echo $PowerMedium ; ?>, <?php echo $PowerHigh ; ?>, <?php echo $PowerCongest ; ?>],
               ['HDSPA' , <?php echo $HdspaLow ?> ,<?php echo $HdspaMedium ?> , <?php echo $HdspaHigh ?>, 0]
            ]);

            var options = {
			chartArea:{left:"10%",right:"20%"},
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
               ['Resource', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeLowEAST ; ?> , <?php echo $CeMediumEAST ; ?>, <?php echo $CeHighEAST ; ?>, <?php echo $CeCongestEAST ; ?> ],
               ['CODE', <?php echo $CodeLowEAST ;?>, <?php echo $CodeMediumEAST ; ?>, <?php echo $CodeHighEAST ; ?>, <?php echo $CodeCongestEAST ; ?> ],
               ['POWER', <?php echo $PowerLowEAST ; ?> , <?php echo $PowerMediumEAST ; ?>, <?php echo $PowerHighEAST ; ?>, <?php echo $PowerCongestEAST ; ?>],
               ['HDSPA', <?php echo $HdspaLowEAST ?> ,<?php echo $HdspaMediumEAST ?> , <?php echo $HdspaHighEAST ?>, 0]
            ]);

            var options = {
               chartArea:{left:"10%",right:"20%"},
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
               ['Resource', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeLowJABODETABEK1 ; ?> , <?php echo $CeMediumJABODETABEK1 ; ?>, <?php echo $CeHighJABODETABEK1 ; ?>, <?php echo $CeCongestJABODETABEK1 ; ?> ],
               ['CODE' , <?php echo $CodeLowJABODETABEK1 ;?>, <?php echo $CodeMediumJABODETABEK1 ; ?>, <?php echo $CodeHighJABODETABEK1 ; ?>, <?php echo $CodeCongestJABODETABEK1 ; ?> ],
               ['POWER' , <?php echo $PowerLowJABODETABEK1 ; ?> , <?php echo $PowerMediumJABODETABEK1 ; ?>, <?php echo $PowerHighJABODETABEK1 ; ?>, <?php echo $PowerCongestJABODETABEK1 ; ?>],
               ['HDSPA' , <?php echo $HdspaLowJABODETABEK1 ?> ,<?php echo $HdspaMediumJABODETABEK1 ?> , <?php echo $HdspaHighJABODETABEK1 ?>, 0]
            ]);

            var options = {
               chartArea:{left:"10%",right:"20%"},
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
<!-- Chart Region JABODETABEKK 2 -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Resource', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeLowJABODETABEK2 ; ?> , <?php echo $CeMediumJABODETABEK2 ; ?>, <?php echo $CeHighJABODETABEK2 ; ?>, <?php echo $CeCongestJABODETABEK2 ; ?> ],
               ['CODE' , <?php echo $CodeLowJABODETABEK2 ;?>, <?php echo $CodeMediumJABODETABEK2 ; ?>, <?php echo $CodeHighJABODETABEK2 ; ?>, <?php echo $CodeCongestJABODETABEK2 ; ?> ],
               ['POWER' , <?php echo $PowerLowJABODETABEK2 ; ?> , <?php echo $PowerMediumJABODETABEK2 ; ?>, <?php echo $PowerHighJABODETABEK2 ; ?>, <?php echo $PowerCongestJABODETABEK2 ; ?>],
               ['HDSPA' , <?php echo $HdspaLowJABODETABEK2 ?> ,<?php echo $HdspaMediumJABODETABEK2 ?> , <?php echo $HdspaHighJABODETABEK2 ?>, 0]
            ]);

            var options = {
               chartArea:{left:"10%",right:"20%"},
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
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked4'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Region NORTH -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Resource', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeLowNORTH ; ?> , <?php echo $CeMediumNORTH ; ?>, <?php echo $CeHighNORTH ; ?>, <?php echo $CeCongestNORTH ; ?> ],
               ['CODE' , <?php echo $CodeLowNORTH ;?>, <?php echo $CodeMediumNORTH ; ?>, <?php echo $CodeHighNORTH ; ?>, <?php echo $CodeCongestNORTH ; ?> ],
               ['POWER' , <?php echo $PowerLowNORTH ; ?> , <?php echo $PowerMediumNORTH ; ?>, <?php echo $PowerHighNORTH ; ?>, <?php echo $PowerCongestNORTH ; ?>],
               ['HDSPA' , <?php echo $HdspaLowNORTH ?> ,<?php echo $HdspaMediumNORTH ?> , <?php echo $HdspaHighNORTH ?>, 0]
            ]);

            var options = {
               chartArea:{left:"10%",right:"20%"},
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
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked5'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Region NORTHERN SUMATERA -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Resource', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeLowNORTHERNSUMATERA ; ?> , <?php echo $CeMediumNORTHERNSUMATERA ; ?>, <?php echo $CeHighNORTHERNSUMATERA ; ?>, <?php echo $CeCongestNORTHERNSUMATERA ; ?> ],
               ['CODE' , <?php echo $CodeLowNORTHERNSUMATERA ;?>, <?php echo $CodeMediumNORTHERNSUMATERA ; ?>, <?php echo $CodeHighNORTHERNSUMATERA ; ?>, <?php echo $CodeCongestNORTHERNSUMATERA ; ?> ],
               ['POWER' , <?php echo $PowerLowNORTHERNSUMATERA ; ?> , <?php echo $PowerMediumNORTHERNSUMATERA ; ?>, <?php echo $PowerHighNORTHERNSUMATERA ; ?>, <?php echo $PowerCongestNORTHERNSUMATERA ; ?>],
               ['HDSPA' , <?php echo $HdspaLowNORTHERNSUMATERA ?> ,<?php echo $HdspaMediumNORTHERNSUMATERA ?> , <?php echo $HdspaHighNORTHERNSUMATERA ?>, 0]
            ]);

            var options = {
               chartArea:{left:"10%",right:"20%"},
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
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked6'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<!-- Chart Region SOUTHERN SUMATERA -->
<script language = "JavaScript">
         function drawChart() {
           
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Resource', 'Low', 'Medium','High','Congest'],
               ['CE', <?php echo $CeLowSOUTHERNSUMATERA ; ?> , <?php echo $CeMediumSOUTHERNSUMATERA ; ?>, <?php echo $CeHighSOUTHERNSUMATERA ; ?>, <?php echo $CeCongestSOUTHERNSUMATERA ; ?> ],
               ['CODE' , <?php echo $CodeLowSOUTHERNSUMATERA ;?>, <?php echo $CodeMediumSOUTHERNSUMATERA ; ?>, <?php echo $CodeHighSOUTHERNSUMATERA ; ?>, <?php echo $CodeCongestSOUTHERNSUMATERA ; ?> ],
               ['POWER' , <?php echo $PowerLowSOUTHERNSUMATERA ; ?> , <?php echo $PowerMediumSOUTHERNSUMATERA ; ?>, <?php echo $PowerHighSOUTHERNSUMATERA ; ?>, <?php echo $PowerCongestSOUTHERNSUMATERA ; ?>],
               ['HDSPA' , <?php echo $HdspaLowSOUTHERNSUMATERA ?> ,<?php echo $HdspaMediumSOUTHERNSUMATERA ?> , <?php echo $HdspaHighSOUTHERNSUMATERA ?>, 0]
            ]);

            var options = {
               chartArea:{left:"10%",right:"20%"},
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
            var chart = new google.visualization.ColumnChart(document.getElementById('stacked7'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
</script>
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Resource');
        data.addColumn('number', 'Low');
        data.addColumn('number', 'Medium');
        data.addColumn('number', 'High');
        data.addColumn('number', 'Congest');
        data.addRows([
          ['CE',  {v: <?php echo $CeLow ; ?>},  {v: <?php echo $CeMedium ; ?>},  {v: <?php echo $CeHigh ; ?>},  {v:  <?php echo $CeCongest ; ?>}],
          ['CODE',   {v:<?php echo $CodeLow ;?>},  {v: <?php echo $CodeMedium ; ?>},  {v:  <?php echo $CodeHigh ; ?>},  {v: <?php echo $CodeCongest ; ?>}],
          ['POWER', {v: <?php echo $PowerLow ; ?>},  {v: <?php echo $PowerMedium ; ?>},  {v: <?php echo $PowerHigh ; ?>},  {v: <?php echo $PowerCongest ; ?>}],
          ['HDSPA',   {v: <?php echo $HdspaLow ?>},  {v: <?php echo $HdspaMedium ?>},  {v: <?php echo $HdspaHigh ?>},  {v: 0}]
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
        data.addColumn('number', 'Low');
        data.addColumn('number', 'Medium');
        data.addColumn('number', 'High');
        data.addColumn('number', 'Congest');
        data.addRows([
          ['CE',  {v: <?php echo $CeLowEAST ; ?>},  {v: <?php echo $CeMediumEAST ; ?>},  {v: <?php echo $CeHighEAST ; ?>},  {v:  <?php echo $CeCongestEAST ; ?>}],
          ['CODE',   {v:<?php echo $CodeLowEAST ;?>},  {v: <?php echo $CodeMediumEAST ; ?>},  {v:  <?php echo $CodeHighEAST ; ?>},  {v: <?php echo $CodeCongestEAST ; ?>}],
          ['POWER', {v: <?php echo $PowerLowEAST ; ?>},  {v: <?php echo $PowerMediumEAST ; ?>},  {v: <?php echo $PowerHighEAST ; ?>},  {v: <?php echo $PowerCongestEAST ; ?>}],
          ['HDSPA',   {v: <?php echo $HdspaLowEAST ;?>},  {v: <?php echo $HdspaMediumEAST ;?>},  {v: <?php echo $HdspaHighEAST ;?>},  {v: 0}]
        ]);

		
        var table = new google.visualization.Table(document.getElementById('tableEAST'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>
<!-- detail chart table jabodetabek 1 -->
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Resource');
        data.addColumn('number', 'Low');
        data.addColumn('number', 'Medium');
        data.addColumn('number', 'High');
        data.addColumn('number', 'Congest');
        data.addRows([
          ['CE',  {v: <?php echo $CeLowJABODETABEK1 ; ?>},  {v: <?php echo $CeMediumJABODETABEK1 ; ?>},  {v: <?php echo $CeHighJABODETABEK1 ; ?>},  {v:  <?php echo $CeCongestJABODETABEK1 ; ?>}],
          ['CODE',   {v:<?php echo $CodeLowJABODETABEK1 ;?>},  {v: <?php echo $CodeMediumJABODETABEK1 ; ?>},  {v:  <?php echo $CodeHighJABODETABEK1 ; ?>},  {v: <?php echo $CodeCongestJABODETABEK1 ; ?>}],
          ['POWER', {v: <?php echo $PowerLowJABODETABEK1 ; ?>},  {v: <?php echo $PowerMediumJABODETABEK1 ; ?>},  {v: <?php echo $PowerHighJABODETABEK1 ; ?>},  {v: <?php echo $PowerCongestJABODETABEK1 ; ?>}],
          ['HDSPA',   {v: <?php echo $HdspaLowJABODETABEK1 ?>},  {v: <?php echo $HdspaMediumJABODETABEK1 ?>},  {v: <?php echo $HdspaHighJABODETABEK1 ?>},  {v: 0}]
        ]);

		
        var table = new google.visualization.Table(document.getElementById('tableJABODETABEK1'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>
<!-- detail chart table jabodetabek 2 -->
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);
      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Resource');
        data.addColumn('number', 'Low');
        data.addColumn('number', 'Medium');
        data.addColumn('number', 'High');
        data.addColumn('number', 'Congest');
        data.addRows([
          ['CE',  {v: <?php echo $CeLowJABODETABEK2 ; ?>},  {v: <?php echo $CeMediumJABODETABEK2 ; ?>},  {v: <?php echo $CeHighJABODETABEK2 ; ?>},  {v:  <?php echo $CeCongestJABODETABEK2 ; ?>}],
          ['CODE',   {v:<?php echo $CodeLowJABODETABEK2 ;?>},  {v: <?php echo $CodeMediumJABODETABEK2 ; ?>},  {v:  <?php echo $CodeHighJABODETABEK2 ; ?>},  {v: <?php echo $CodeCongestJABODETABEK2 ; ?>}],
          ['POWER', {v: <?php echo $PowerLowJABODETABEK2 ; ?>},  {v: <?php echo $PowerMediumJABODETABEK2 ; ?>},  {v: <?php echo $PowerHighJABODETABEK2 ; ?>},  {v: <?php echo $PowerCongestJABODETABEK2 ; ?>}],
          ['HDSPA',   {v: <?php echo $HdspaLowJABODETABEK2 ?>},  {v: <?php echo $HdspaMediumJABODETABEK2 ?>},  {v: <?php echo $HdspaHighJABODETABEK2 ?>},  {v: 0}]
        ]);
        var table = new google.visualization.Table(document.getElementById('tableJABODETABEK2'));
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
        data.addColumn('number', 'Low');
        data.addColumn('number', 'Medium');
        data.addColumn('number', 'High');
        data.addColumn('number', 'Congest');
        data.addRows([
          ['CE',  {v: <?php echo $CeLowNORTH ; ?>},  {v: <?php echo $CeMediumNORTH ; ?>},  {v: <?php echo $CeHighNORTH ; ?>},  {v:  <?php echo $CeCongestNORTH ; ?>}],
          ['CODE',   {v:<?php echo $CodeLowNORTH ;?>},  {v: <?php echo $CodeMediumNORTH ; ?>},  {v:  <?php echo $CodeHighNORTH ; ?>},  {v: <?php echo $CodeCongestNORTH ; ?>}],
          ['POWER', {v: <?php echo $PowerLowNORTH ; ?>},  {v: <?php echo $PowerMediumNORTH ; ?>},  {v: <?php echo $PowerHighNORTH ; ?>},  {v: <?php echo $PowerCongestNORTH ; ?>}],
          ['HDSPA',   {v: <?php echo $HdspaLowNORTH ?>},  {v: <?php echo $HdspaMediumNORTH ?>},  {v: <?php echo $HdspaHighNORTH ?>},  {v: 0}]
        ]);
        var table = new google.visualization.Table(document.getElementById('tableNORTH'));
        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>
<!-- detail chart table Northern Sumatera -->
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Resource');
        data.addColumn('number', 'Low');
        data.addColumn('number', 'Medium');
        data.addColumn('number', 'High');
        data.addColumn('number', 'Congest');
        data.addRows([
          ['CE',  {v: <?php echo $CeLowNORTHERNSUMATERA ; ?>},  {v: <?php echo $CeMediumNORTHERNSUMATERA ; ?>},  {v: <?php echo $CeHighNORTHERNSUMATERA ; ?>},  {v:  <?php echo $CeCongestNORTHERNSUMATERA ; ?>}],
          ['CODE',   {v:<?php echo $CodeLowNORTHERNSUMATERA ;?>},  {v: <?php echo $CodeMediumNORTHERNSUMATERA ; ?>},  {v:  <?php echo $CodeHighNORTHERNSUMATERA ; ?>},  {v: <?php echo $CodeCongestNORTHERNSUMATERA ; ?>}],
          ['POWER', {v: <?php echo $PowerLowNORTHERNSUMATERA ; ?>},  {v: <?php echo $PowerMediumNORTHERNSUMATERA ; ?>},  {v: <?php echo $PowerHighNORTHERNSUMATERA ; ?>},  {v: <?php echo $PowerCongestNORTHERNSUMATERA ; ?>}],
          ['HDSPA',   {v: <?php echo $HdspaLowNORTHERNSUMATERA ?>},  {v: <?php echo $HdspaMediumNORTHERNSUMATERA ?>},  {v: <?php echo $HdspaHighNORTHERNSUMATERA ?>},  {v: 0}]
        ]);
        var table = new google.visualization.Table(document.getElementById('tableNORTHERNSUMATERA'));
        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>
<!-- detail chart table SOUTHERN Sumatera -->
<script>
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);
      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Resource');
        data.addColumn('number', 'Low');
        data.addColumn('number', 'Medium');
        data.addColumn('number', 'High');
        data.addColumn('number', 'Congest');
        data.addRows([
          ['CE', {v: <?php echo $CeLowSOUTHERNSUMATERA ; ?>},  {v: <?php echo $CeMediumSOUTHERNSUMATERA ; ?>},  {v: <?php echo $CeHighSOUTHERNSUMATERA ; ?>},  {v:  <?php echo $CeCongestSOUTHERNSUMATERA ; ?>}],
          ['CODE',   {v:<?php echo $CodeLowSOUTHERNSUMATERA ;?>},  {v: <?php echo $CodeMediumSOUTHERNSUMATERA ; ?>},  {v:  <?php echo $CodeHighSOUTHERNSUMATERA ; ?>},  {v: <?php echo $CodeCongestSOUTHERNSUMATERA ; ?>}],
          ['POWER', {v: <?php echo $PowerLowSOUTHERNSUMATERA ; ?>},  {v: <?php echo $PowerMediumSOUTHERNSUMATERA ; ?>},  {v: <?php echo $PowerHighSOUTHERNSUMATERA ; ?>},  {v: <?php echo $PowerCongestSOUTHERNSUMATERA ; ?>}],
          ['HDSPA',   {v: <?php echo $HdspaLowSOUTHERNSUMATERA ?>},  {v: <?php echo $HdspaMediumSOUTHERNSUMATERA ?>},  {v: <?php echo $HdspaHighSOUTHERNSUMATERA ?>},  {v: 0}]
		]);
        var table = new google.visualization.Table(document.getElementById('tableSOUTHERNSUMATERA'));
        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>
<?php
include 'footer.php';
?>