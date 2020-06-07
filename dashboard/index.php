<?php 
include 'header.php';
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
<?php
$ambiltanggal = date("Y-m-d") ;
$now = strtotime($ambiltanggal);
$tglsatu = date('F jS', strtotime('- 1 day',$now));

$tgldua = date('F jS', strtotime('- 2 day',$now));

$minsatu = date('Y-m-d', strtotime('- 1 day',$now));
$mindua = date('Y-m-d', strtotime('- 2 day',$now));

$queryweek ="SELECT TOP 1 [Week] FROM [DBCapmanReport].[dbo].[NQILranCell] where [Week] < 99 order by [Week] desc";
$Resultweek = sqlsrv_query($conn, $queryweek, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetResult = sqlsrv_fetch_array($Resultweek);
$Getweek = $GetResult['Week'];
?>
<style>
.donutDiv
{	
    width: 300px;
    height: 400px;
}

.centerLabel
{
    position: absolute;
    left: 1px;
    top: 2px;
    width: 1150px;
    line-height: 256px;
    text-align: left;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 15px;
    color: blue;
}
</style>
<script type="text/javascript" src="Core/js/highcharts.js"></script>
<script type="text/javascript" src="Core/js/exporting.js"></script>
<script type="text/javascript" src="loader.js"></script>

       <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          
          <!-- /top tiles -->

          <br />
<?php 
$Akses = $_SESSION['Akses'];
if($Akses == 'DevAdmin')
{ 
	$query1 ="SELECT TOP 1 [DateId] FROM [DBCapman].[dbo].[GranTowerDay] order by [DateId] desc";
	$ResultQuery1 = sqlsrv_query($conn, $query1, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery1 = sqlsrv_fetch_array($ResultQuery1);
	$GetUpdateDay1 = $Getquery1 ['DateId']->format('Y-m-d');
	if($GetUpdateDay1==$mindua){
		$ResultUpdate1 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate1 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query2 ="SELECT TOP 1 [DateId] FROM [WebDashboard].[dbo].[3GAmpuhDaily] order by [DateId] desc";
	$ResultQuery2 = sqlsrv_query($conn, $query2, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery2 = sqlsrv_fetch_array($ResultQuery2);
	$GetUpdateDay2 = $Getquery2 ['DateId']->format('Y-m-d');
	if($GetUpdateDay2==$mindua){
		$ResultUpdate2 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate2 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query3 ="SELECT TOP 1 [DateId] FROM [WebDashboard].[dbo].[4GAmpuhDaily] order by [DateId] desc";
	$ResultQuery3 = sqlsrv_query($conn, $query3, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery3 = sqlsrv_fetch_array($ResultQuery3);
	$GetUpdateDay3 = $Getquery3 ['DateId']->format('Y-m-d');
	if($GetUpdateDay3==$mindua){
		$ResultUpdate3 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate3 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query4 ="SELECT TOP 1 [DateId] FROM [WebDashboard].[dbo].[RemarksDaily] order by [DateId] desc";
	$ResultQuery4 = sqlsrv_query($conn, $query4, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery4 = sqlsrv_fetch_array($ResultQuery4);
	$GetUpdateDay4 = $Getquery4 ['DateId']->format('Y-m-d');
	if($GetUpdateDay4==$mindua){
		$ResultUpdate4 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate4 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query5 ="SELECT TOP 1 [DateId] FROM [WebDashboard].[dbo].[BscRncDaily] order by [DateId] desc";
	$ResultQuery5 = sqlsrv_query($conn, $query5, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery5 = sqlsrv_fetch_array($ResultQuery5);
	$GetUpdateDay5 = $Getquery5 ['DateId']->format('Y-m-d');
	if($GetUpdateDay5==$minsatu){
		$ResultUpdate5 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate5 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query6 ="SELECT TOP 1 [date] FROM [WebDashboard].[dbo].[PS_CORE_GGSN] order by [date] desc";
	$ResultQuery6 = sqlsrv_query($conn, $query6, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery6 = sqlsrv_fetch_array($ResultQuery6);
	$GetUpdateDay6 = $Getquery6 ['date']->format('Y-m-d');
	if($GetUpdateDay6==$minsatu){
		$ResultUpdate6 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate6 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query7 ="SELECT TOP 1 [date] FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new] order by [date] desc";
	$ResultQuery7 = sqlsrv_query($conn, $query7, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery7 = sqlsrv_fetch_array($ResultQuery7);
	$GetUpdateDay7 = $Getquery7 ['date']->format('Y-m-d');
	if($GetUpdateDay7==$minsatu){
		$ResultUpdate7 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate7 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query8 ="SELECT TOP 1 [date] FROM [WebDashboard].[dbo].[PS_CORE_UPCC] order by [date] desc";
	$ResultQuery8 = sqlsrv_query($conn, $query8, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery8 = sqlsrv_fetch_array($ResultQuery8);
	$GetUpdateDay8 = $Getquery8 ['date']->format('Y-m-d');
	if($GetUpdateDay8==$minsatu){
		$ResultUpdate8 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate8 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query9 ="SELECT TOP 1 [date] FROM [WebDashboard].[dbo].[PS_CORE_IP_POOL_HUAWEI] order by [date] desc";
	$ResultQuery9 = sqlsrv_query($conn, $query9, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery9 = sqlsrv_fetch_array($ResultQuery9);
	$GetUpdateDay9 = $Getquery9 ['date']->format('Y-m-d');
	if($GetUpdateDay9==$minsatu){
		$ResultUpdate9 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate9 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query10 ="SELECT TOP 1 [Week] FROM [WebDashboard].[dbo].[PS_CORE_GGSN_Week] order by [Week] desc";
	$ResultQuery10 = sqlsrv_query($conn, $query10, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery10 = sqlsrv_fetch_array($ResultQuery10);
	$GetWeek10 = $Getquery10['Week'];
	if($GetWeek10==$Getweek){
		$ResultUpdate10 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate10 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query11 ="SELECT TOP 1 [Week] FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week] order by [Week] desc";
	$ResultQuery11 = sqlsrv_query($conn, $query11, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery11 = sqlsrv_fetch_array($ResultQuery11);
	$GetWeek11 = $Getquery11['Week'];
	if($GetWeek11==$Getweek){
		$ResultUpdate11 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate11 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query12 ="SELECT TOP 1 [Week] FROM [WebDashboard].[dbo].[PS_CORE_UPCC_Week] order by [Week] desc";
	$ResultQuery12 = sqlsrv_query($conn, $query12, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery12 = sqlsrv_fetch_array($ResultQuery12);
	$GetWeek12 = $Getquery12['Week'];
	if($GetWeek12==$Getweek){
		$ResultUpdate12 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate12 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query13 ="SELECT TOP 1 [Week] FROM [WebDashboard].[dbo].[PS_CORE_IP_POOL_HUAWEI_Week] order by [Week] desc";
	$ResultQuery13 = sqlsrv_query($conn, $query13, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery13 = sqlsrv_fetch_array($ResultQuery13);
	$GetWeek13 = $Getquery13['Week'];
	if($GetWeek13==$Getweek){
		$ResultUpdate13 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate13 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query14 ="SELECT TOP 1 [Week] FROM [WebDashboard].[dbo].[NQI_Kabupaten] order by [Week] desc";
	$ResultQuery14 = sqlsrv_query($conn, $query14, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery14 = sqlsrv_fetch_array($ResultQuery14);
	$GetWeek14 = $Getquery14['Week'];
	if($GetWeek14==$Getweek){
		$ResultUpdate14 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate14 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query15 ="SELECT TOP 1 [Week] FROM [WebDashboard].[dbo].[NQIScoreWithAndWithoutA] order by [Week] desc";
	$ResultQuery15 = sqlsrv_query($conn, $query15, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery15 = sqlsrv_fetch_array($ResultQuery15);
	$GetWeek15 = $Getquery15['Week'];
	if($GetWeek15==$Getweek){
		$ResultUpdate15 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate15 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query16 ="SELECT TOP 1 [Week] FROM [WebDashboard].[dbo].[3GAmpuhWeekly] order by [Week] desc";
	$ResultQuery16 = sqlsrv_query($conn, $query16, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery16 = sqlsrv_fetch_array($ResultQuery16);
	$GetWeek16 = $Getquery16['Week'];
	if($GetWeek16==$Getweek){
		$ResultUpdate16 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate16 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query17 ="SELECT TOP 1 [Week] FROM [WebDashboard].[dbo].[4GAmpuhWeekly] order by [Week] desc";
	$ResultQuery17 = sqlsrv_query($conn, $query17, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery17 = sqlsrv_fetch_array($ResultQuery17);
	$GetWeek17 = $Getquery17['Week'];
	if($GetWeek17==$Getweek){
		$ResultUpdate17 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate17 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query18 ="SELECT TOP 1 [Week] FROM [WebDashboard].[dbo].[3GTowerProductivity] where [Week] <99 order by [Week] desc";
	$ResultQuery18 = sqlsrv_query($conn, $query18, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery18 = sqlsrv_fetch_array($ResultQuery18);
	$GetWeek18 = $Getquery18['Week'];
	if($GetWeek18==$Getweek){
		$ResultUpdate18 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate18 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query19 ="SELECT TOP 1 [Week] FROM [WebDashboard].[dbo].[4GTowerProductivityReg] where [Week] <99 order by [Week] desc";
	$ResultQuery19 = sqlsrv_query($conn, $query19, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery19= sqlsrv_fetch_array($ResultQuery19);
	$GetWeek19 = $Getquery19['Week'];
	if($GetWeek19==$Getweek){
		$ResultUpdate19 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate19 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query20 ="SELECT TOP 1 [DateId] FROM [WebDashboard].[dbo].[LowPayload4G] order by [DateId] desc";
	$ResultQuery20 = sqlsrv_query($conn, $query20, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery20 = sqlsrv_fetch_array($ResultQuery20);
	$GetUpdateDay20 = $Getquery20 ['DateId']->format('Y-m-d');
	if($GetUpdateDay20==$mindua){
		$ResultUpdate20 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate20 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query21 ="SELECT TOP 1 [Week] FROM [WebDashboard].[dbo].[RemarksNQIUtranCell] where [Week] <99 order by [Week] desc";
	$ResultQuery21 = sqlsrv_query($conn, $query21, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery21= sqlsrv_fetch_array($ResultQuery21);
	$GetWeek21 = $Getquery21['Week'];
	if($GetWeek21==$Getweek){
		$ResultUpdate21 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate21 = '<span class="label label-danger">Not Update</span>';
	}
	
	$query22 ="SELECT TOP 1 [Week] FROM [WebDashboard].[dbo].[RemarksNQILranCell] where [Week] <99 order by [Week] desc";
	$ResultQuery22 = sqlsrv_query($conn, $query22, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$Getquery22= sqlsrv_fetch_array($ResultQuery22);
	$GetWeek22 = $Getquery22['Week'];
	if($GetWeek22==$Getweek){
		$ResultUpdate22 = '<span class="label label-success">Updated</span>';
	}else {
		$ResultUpdate22 = '<span class="label label-danger">Not Update</span>';
	}
  echo '
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Reload</h2>
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
                          <th class="text-center">No</th>
						  <th class="text-center">Script</th>
						  <th class="text-center">Information</th>
						  <th class="text-center">Last Update </th>
						  <th class="text-center">Stats </th>
                        </tr>
                      </thead>
                      <tbody>
                      </thead>
							<tr>
								<td align="center">1</td>
								<td align="center">2G Ampuh Daily</td>
								<td align="center">FROM [DBCapman].[dbo].[GranTowerDay]</td>
								<td align="center">';echo $Getquery1['DateId']->format('j F Y') ; echo '</td>
								<td align="center">';echo $ResultUpdate1;  echo '</td>
							</tr>
							<tr>
								<td align="center">2</td>
								<td align="center">3G Ampuh Daily</td>
								<td align="center">FROM [WebDashboard].[dbo].[3GAmpuhDaily] where [Resource]= TotalPayloadGb</td>
								<td align="center">';echo $Getquery2['DateId']->format('j F Y') ; echo '</td>
								<td align="center">';echo $ResultUpdate2;  echo '</td>
							</tr>
							<tr>
								<td align="center">3</td>
								<td align="center">4G Ampuh Daily</td>
								<td align="center">FROM [WebDashboard].[dbo].[4GAmpuhDaily] where [Resource]= TotalPayloadGb</td>
								<td align="center">';echo $Getquery3['DateId']->format('j F Y') ; echo '</td>
								<td align="center">';echo $ResultUpdate3;  echo '</td>
							</tr>
							<tr>
								<td align="center">4</td>
								<td align="center">3G Daily Report</td>
								<td align="center">FROM [WebDashboard].[dbo].[RemarksDaily]</td>
								<td align="center">';echo $Getquery4['DateId']->format('j F Y') ; echo '</td>
								<td align="center">';echo $ResultUpdate4;  echo '</td>
							</tr>
							<tr>
								<td align="center">5</td>
								<td align="center">Daily BSC RNC </td>
								<td align="center">FROM [WebDashboard].[dbo].[BscRncDaily]</td>
								<td align="center">';echo $Getquery5['DateId']->format('j F Y') ; echo '</td>
								<td align="center">';echo $ResultUpdate5;  echo '</td>
							</tr>
							<tr>
								<td align="center">6</td>
								<td align="center">PS CORE - GGSN (Daily) </td>
								<td align="center">FROM [WebDashboard].[dbo].[PS_CORE_GGSN]</td>
								<td align="center">';echo $Getquery6['date']->format('j F Y') ; echo '</td>
								<td align="center">';echo $ResultUpdate6;  echo '</td>
							</tr>
							<tr>
								<td align="center">7</td>
								<td align="center">PS CORE - SGSN (Daily) </td>
								<td align="center">FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]</td>
								<td align="center">';echo $Getquery7['date']->format('j F Y') ; echo '</td>
								<td align="center">';echo $ResultUpdate7;  echo '</td>
							</tr>
							<tr>
								<td align="center">8</td>
								<td align="center">PS CORE - UPCC (Daily) </td>
								<td align="center">FROM [WebDashboard].[dbo].[PS_CORE_UPCC]</td>
								<td align="center">';echo $Getquery8['date']->format('j F Y') ; echo '</td>
								<td align="center">';echo $ResultUpdate8;  echo '</td>
							</tr>
							<tr>
								<td align="center">9</td>
								<td align="center">PS CORE - IP POOL  (Daily) </td>
								<td align="center">FROM [WebDashboard].[dbo].[PS_CORE_IP_POOL_HUAWEI]</td>
								<td align="center">';echo $Getquery8['date']->format('j F Y') ; echo '</td>
								<td align="center">';echo $ResultUpdate9;  echo '</td>
							</tr>
							<tr>
								<td align="center">10</td>
								<td align="center">PS CORE - GGSN (Weekly) </td>
								<td align="center">FROM [WebDashboard].[dbo].[PS_CORE_GGSN_Week]</td>
								<td align="center">Week ';echo $Getquery10['Week'] ; echo '</td>
								<td align="center">';echo $ResultUpdate10;  echo '</td>
							</tr>
							<tr>
								<td align="center">11</td>
								<td align="center">PS CORE - SGSN (Weekly) </td>
								<td align="center">FROM [WebDashboard].[dbo].[PS_CORE_SGSN_Week]</td>
								<td align="center">Week ';echo $Getquery11['Week'] ; echo '</td>
								<td align="center">';echo $ResultUpdate11;  echo '</td>
							</tr>
							<tr>
								<td align="center">12</td>
								<td align="center">PS CORE - UPCC (Weekly) </td>
								<td align="center">FROM [WebDashboard].[dbo].[PS_CORE_UPCC_Week]</td>
								<td align="center">Week ';echo $Getquery12['Week'] ; echo '</td>
								<td align="center">';echo $ResultUpdate12;  echo '</td>
							</tr>
							<tr>
								<td align="center">13</td>
								<td align="center">PS CORE - IP POOL  (Weekly) </td>
								<td align="center">FROM [WebDashboard].[dbo].[PS_CORE_IP_POOL_HUAWEI_Week]</td>
								<td align="center">Week ';echo $Getquery13['Week'] ; echo '</td>
								<td align="center">';echo $ResultUpdate13;  echo '</td>
							</tr>
							<tr>
								<td align="center">14</td>
								<td align="center">NQI Kabupaten</td>
								<td align="center">FROM [WebDashboard].[dbo].[NQI_Kabupaten]</td>
								<td align="center">Week ';echo $Getquery14['Week'] ; echo '</td>
								<td align="center">';echo $ResultUpdate14;  echo '</td>
							</tr>
							
							<tr>
								<td align="center">15</td>
								<td align="center">NQI Kabupaten Score With And Without Avaliable</td>
								<td align="center">FROM [WebDashboard].[dbo].[NQIScoreWithAndWithoutA/Tier]</td>
								<td align="center">Week ';echo $Getquery15['Week'] ; echo '</td>
								<td align="center">';echo $ResultUpdate15;  echo '</td>
							</tr>
							<tr>
								<td align="center">16</td>
								<td align="center">3G Ampuh Weekly</td>
								<td align="center">FROM [WebDashboard].[dbo].[3GAmpuhWeekly]</td>
								<td align="center">Week ';echo $Getquery16['Week'] ; echo '</td>
								<td align="center">';echo $ResultUpdate16;  echo '</td>
							</tr>
							<tr>
								<td align="center">17</td>
								<td align="center">4G Ampuh Weekly</td>
								<td align="center">FROM [WebDashboard].[dbo].[4GAmpuhWeekly]</td>
								<td align="center">Week ';echo $Getquery17['Week'] ; echo '</td>
								<td align="center">';echo $ResultUpdate17;  echo '</td>
							</tr>
							<tr>
								<td align="center">18</td>
								<td align="center">3G Tower Productivity</td>
								<td align="center">FROM [WebDashboard].[dbo].[3GTowerProductivity]</td>
								<td align="center">Week ';echo $Getquery18['Week'] ; echo '</td>
								<td align="center">';echo $ResultUpdate18;  echo '</td>
							</tr>
							<tr>
								<td align="center">19</td>
								<td align="center">4G Tower Productivity</td>
								<td align="center">FROM [WebDashboard].[dbo].[4GTowerProductivityReg]</td>
								<td align="center">Week ';echo $Getquery19['Week'] ; echo '</td>
								<td align="center">';echo $ResultUpdate19;  echo '</td>
							</tr>
							<tr>
								<td align="center">20</td>
								<td align="center">Low Payload 4G</td>
								<td align="center">FROM [WebDashboard].[dbo].[LowPayload4G]</td>
								<td align="center">';echo $Getquery20['DateId']->format('j F Y') ; echo '</td>
								<td align="center">';echo $ResultUpdate20;  echo '</td>
							</tr>
							<tr>
								<td align="center">21</td>
								<td align="center">3G Capman Report Weekly </td>
								<td align="center">FROM [WebDashboard].[dbo].[RemarksNQIUtranCell]</td>
								<td align="center">Week ';echo $Getquery21['Week'] ; echo '</td>
								<td align="center">';echo $ResultUpdate21;  echo '</td>
							</tr>
							<tr>
								<td align="center">22</td>
								<td align="center">4G Capman Report Weekly </td>
								<td align="center">FROM [WebDashboard].[dbo].[RemarksNQILranCell]</td>
								<td align="center">Week ';echo $Getquery22['Week'] ; echo '</td>
								<td align="center">';echo $ResultUpdate22;  echo '</td>
							</tr>
                      </tbody>
                    </table>
                  </div>
                </div>
         </div>
	</div>';
          } else  {
             
          }
        ?>
    
	
	
	<div class="row">
	<!-- MULAI DARI SINI -->
        <div class="col-md-8 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Payload Trend (TB) Daily </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="chart_div" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Bsc & Rnc - <?php echo $tglsatu; ?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stackedBSC"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>GGSN - <?php echo $tglsatu; ?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stackedGGSN" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>SGSN - <?php echo $tglsatu; ?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stackedSGSN" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>UPCC - <?php echo $tglsatu; ?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stackedUPCC" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>IP POOL - <?php echo $tglsatu; ?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="IPPOOL_Chart" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>3G - <?php echo $tgldua; ?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stacked3G" class="demo-placeholder"></div>
                </div>
              </div>
        </div>
		<div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>4G - <?php echo $tglsatu; ?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div id="stacked4G" class="demo-placeholder"></div>
                </div>
              </div>
        </div>


      <!-- END -->

          </div>


        </div>
        <!-- /page content -->
<?php


$SqlSGSN_S = "SELECT [Date]
      	,sum([Capacity_SimulPDP_SGSN]) as [Capacity_SimulPDP_SGSN]
      	,sum([SimulPDP_Number]) as [SimulPDP_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] >= getdate()-2
  		GROUP BY [Date]";
$ResultSGSN_S = sqlsrv_query($conn, $SqlSGSN_S, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN_S = sqlsrv_fetch_array($ResultSGSN_S);
$getCapacity_SimulPDP_SGSN = $GetSGSN_S['Capacity_SimulPDP_SGSN'];
$getSimulPDP_Number = $GetSGSN_S['SimulPDP_Number'];
$Avaliable_S = $getCapacity_SimulPDP_SGSN - $getSimulPDP_Number ;

$SqlSGSN = "SELECT [Date]
      	,sum([Capacity_SAU]) as [Capacity_SAU]
      	,sum([SAU_Total_Number]) as [SAU_Total_Number]
  		FROM [WebDashboard].[dbo].[PS_CORE_SGSN_new]
  		WHERE [Date] >= getdate()-2
  		GROUP BY [Date]";
$ResultSGSN = sqlsrv_query($conn, $SqlSGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetSGSN = sqlsrv_fetch_array($ResultSGSN);
$getCapacity_SAU = $GetSGSN['Capacity_SAU'];
$getSAU_Total_Number = $GetSGSN['SAU_Total_Number'];
$Avaliable = $getCapacity_SAU - $getSAU_Total_Number ;

$SqlGGSN = "SELECT [date]
      ,sum([Capacity_throughput]) as Capacity_throughput
      ,sum([Throughput_Gbps]) as Throughput_Gbps
      ,sum([Capacity_PDP]) as Capacity_PDP
      ,sum([PDP_Total]) as PDP_Total
  FROM [WebDashboard].[dbo].[PS_CORE_GGSN]
  WHERE [Date] >= getdate()-2
  GROUP BY [Date]";
$ResultGGSN = sqlsrv_query($conn, $SqlGGSN, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetGGSN = sqlsrv_fetch_array($ResultGGSN);
$getCapacity_throughput = $GetGGSN['Capacity_throughput'];
$getThroughput_Gbps = $GetGGSN['Throughput_Gbps'];
$getCapacity_PDP = $GetGGSN['Capacity_PDP'];
$getPDP_Total = $GetGGSN['PDP_Total'];
$Avaliable_T = $getCapacity_throughput - $getThroughput_Gbps ;
$Avaliable_PDP = $getCapacity_PDP - $getPDP_Total ;

$SqlUPCC = "SELECT [Date]
      ,sum([Registered Subs]) as RegisteredSubs
      ,sum([Capacity Registered Subs]) as CapacityRegisteredSubs
      ,sum([Online Subs]) as OnlineSubs
      ,sum([Capacity Online Subs]) as CapacityOnlineSubs
  FROM [WebDashboard].[dbo].[PS_CORE_UPCC]
  WHERE [Date] >= getdate()-2
  GROUP BY [Date]";
$ResultUPCC = sqlsrv_query($conn, $SqlUPCC, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetUPCC = sqlsrv_fetch_array($ResultUPCC);
$getRegisteredSubs = $GetUPCC['RegisteredSubs'];
$getCapacityRegisteredSubs = $GetUPCC['CapacityRegisteredSubs'];
$getCOnlineSubs = $GetUPCC['OnlineSubs'];
$getCapacityOnlineSubs = $GetUPCC['CapacityOnlineSubs'];
$Avaliable_R = $getCapacityRegisteredSubs - $getRegisteredSubs ;
$Avaliable_O = $getCapacityOnlineSubs - $getCOnlineSubs ;

$SqlIPPOOL_HUAWEI = "SELECT [Date]
      ,sum([Capacity]) as Capacity
      ,sum([IP_Pool_Usage]) as IP_Pool_Usage
  FROM [WebDashboard].[dbo].[PS_CORE_IP_POOL_HUAWEI]
   WHERE [Date] >= getdate()-2
  GROUP BY [Date]";
$ResultIPPOOL_HUAWEI = sqlsrv_query($conn, $SqlIPPOOL_HUAWEI, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetIPPOOL_HUAWEI = sqlsrv_fetch_array($ResultIPPOOL_HUAWEI);
$getCapacity = $GetIPPOOL_HUAWEI['Capacity'];
$getIP_Pool_Usage = $GetIPPOOL_HUAWEI['IP_Pool_Usage'];
$Avaliable_IPPOOL_HUAWEI = $getCapacity - $getIP_Pool_Usage ;


?>
<!-- -----------------------------------------------SGSN CHART SIMUL PDP ------------------------------------------------------------- -->
 <script type="text/javascript" src="xloader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["SGSN", "Used","Avaliable"],
        ["SAU Total Number", <?php echo $getSAU_Total_Number ; ?>, <?php echo $Avaliable ; ?>],
        ["SimulPDP Number", <?php echo $getSimulPDP_Number ; ?>,<?php echo $Avaliable_S ; ?>]
      ]);

      var view = new google.visualization.DataView(data);
 
      var options = {
        title: '',
		chartArea:{width:"70%",height:"50%"},
		legend: {position: 'top'},
	   isStacked:'percent', 
	   hAxis: {
		   minValue: 0
		 },
		 series: {
		   0:{color:'#4cd137'},
		   1:{color:'#dcdde1'}
		 }  
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("stackedSGSN"));
      chart.draw(view, options);
  }
  </script>

  <!-- --------------------GGSN ------------------ -->
    <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["GGSN","Used","Avaliable"],
        ["Throughput", <?php echo $getThroughput_Gbps ; ?>, <?php echo $Avaliable_T ; ?>],
        ["PDP", <?php echo $getPDP_Total ; ?>,<?php echo $Avaliable_PDP ; ?>]
      ]);

      var view = new google.visualization.DataView(data);
 
      var options = {
        title: '',
		chartArea:{width:"70%",height:"50%"},
		legend: {position: 'top'},
	   isStacked:'percent', 
	   hAxis: {
		   minValue: 0
		 },
		 series: {
		   0:{color:'#4cd137'},
		   1:{color:'#dcdde1'}
		 }  
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("stackedGGSN"));
      chart.draw(view, options);
  }
  </script>
  <!-- END GGSN -->
  <!-- START UPCC -->
      <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["UPCC","Used","Avaliable"],
        ["Registered", <?php echo $getRegisteredSubs ; ?>, <?php echo $Avaliable_R ; ?>],
        ["Online", <?php echo $getCOnlineSubs ; ?>,<?php echo $Avaliable_O ; ?>]
      ]);

      var view = new google.visualization.DataView(data);
 
      var options = {
        title: '',
		chartArea:{width:"70%",height:"50%"},
		legend: {position: 'top'},
	   isStacked:'percent', 
	   hAxis: {
		   minValue: 0
		 },
		 series: {
		   0:{color:'#4cd137'},
		   1:{color:'#dcdde1'}
		 }  
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("stackedUPCC"));
      chart.draw(view, options);
  }
  </script>
  <!-- END UPCC -->
  <!-- START IP POOL -->
<script type = "text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'IPPOOL'],
          ['IP POOL USAGE  <?php echo $getIP_Pool_Usage ; ?>', <?php echo $getIP_Pool_Usage ; ?>],
          ['Avaliable  <?php echo $Avaliable_IPPOOL_HUAWEI ; ?>', <?php echo $Avaliable_IPPOOL_HUAWEI ; ?>],
        ]);

        var options = {
          title: '',
          colors: ['#4cd137', '#dcdde1'],
          pieSliceText:{
            color: 'black',
          },
		  chartArea:{left:0,width:"100%",height:"60%"},
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('IPPOOL_Chart'));
        chart.draw(data, options);
      }
</script>
  <!-- END IP POOL -->
<!-- CHART PAYLOAD TREND 3G 4G ------------- -->
<!-- get data from database -- -->


<!-- end get data ------- -->
<script type="text/javascript" src="../vendors/echarts/dist/echarts.min.js"></script>
<script type="text/javascript">
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('chart_div'));

        // specify chart configuration item and data
        option = {
    
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:['3G','4G']
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        },
        show : true,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: true},
            magicType : {show: false, type: ['line', 'bar', 'stack', 'tiled']},
            saveAsImage : {show: true}
        }
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data:[
        <?php 
        $SqlPayload = "SELECT a.[DateId]
						  ,sum(a.[Central] + a.[East] + a.[Jabodetabek] + a.[North] + a.[West]) as Payload3G
						  ,sum(b.[Central] + b.[East] + b.[Jabodetabek] + b.[North] + b.[West]) as Payload4G
					  FROM [WebDashboard].[dbo].[3GAmpuhDaily] a 
					  inner join [WebDashboard].[dbo].[4GAmpuhDaily] b
					  on a.[DateId] = b.[DateId] 
					  WHERE a.[DateId] BETWEEN GETDATE()-15 AND getdate()
					  GROUP BY a.[DateId]";
		 $result = sqlsrv_query($conn, $SqlPayload, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());
					
					while($data = sqlsrv_fetch_array($result))
					{//ambil semua hasil eksekusi $sql
					  echo "'".$data['DateId']->format('M j')."',";
					}
	  	?>]
	  	
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'3G',
            type:'line',
            stack: '总量',
            data:[
            <?php 
            $SqlPayload = "SELECT a.[DateId]
						  ,sum(a.[Central] + a.[East] + a.[Jabodetabek] + a.[North] + a.[West]) as Payload3G
						  ,sum(b.[Central] + b.[East] + b.[Jabodetabek] + b.[North] + b.[West]) as Payload4G
					  FROM [WebDashboard].[dbo].[3GAmpuhDaily] a 
					  inner join [WebDashboard].[dbo].[4GAmpuhDaily] b
					  on a.[DateId] = b.[DateId] 
					  WHERE a.[DateId] BETWEEN GETDATE()-15 AND getdate()
					  GROUP BY a.[DateId]";
		 $result = sqlsrv_query($conn, $SqlPayload, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());
            while($data = sqlsrv_fetch_array($result))
					{//ambil semua hasil eksekusi $sql
					  echo "".$data['Payload3G'].",";
					}
			?>]
        },
        {
            name:'4G',
            type:'line',
            stack: '总量',
            data:[
            <?php 
            $SqlPayload = "SELECT a.[DateId]
						  ,sum(a.[Central] + a.[East] + a.[Jabodetabek] + a.[North] + a.[West]) as Payload3G
						  ,sum(b.[Central] + b.[East] + b.[Jabodetabek] + b.[North] + b.[West]) as Payload4G
					  FROM [WebDashboard].[dbo].[3GAmpuhDaily] a 
					  inner join [WebDashboard].[dbo].[4GAmpuhDaily] b
					  on a.[DateId] = b.[DateId] 
					  WHERE a.[DateId] BETWEEN GETDATE()-15 AND getdate()
					  GROUP BY a.[DateId]";
		 $result = sqlsrv_query($conn, $SqlPayload, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());
            while($data = sqlsrv_fetch_array($result))
					{//ambil semua hasil eksekusi $sql
					  echo "".$data['Payload4G'].",";
					}
			?>]
        }
    ]
};

        // use configuration item and data specified to show chart
        myChart.setOption(option);
    </script>
<!-- END CHART PAYLOAD TREND 3G 4G --- -->
<!-- CHART 3G -->
<?php
	$sqlcecongest = "SELECT [DateId]
      ,[Resource]
      ,sum([Congest]) as [Congest]
      ,sum([High]) as [High]
      ,sum([Medium]) as [Medium]
      ,sum([Low]) as [Low]
  FROM [WebDashboard].[dbo].[RemarksDaily]
  where [Dateid] >= getdate()-3 and [Resource] = 'CE'
  group by [DateId],[Resource]";
	$resultcecongest = sqlsrv_query($conn, $sqlcecongest, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datacecongest = sqlsrv_fetch_array($resultcecongest);
	$CeCongest= $datacecongest ['Congest'];
	$CeHigh= $datacecongest ['High'];
	$CeMedium= $datacecongest ['Medium'];
	$CeLow= $datacecongest ['Low'];
	
	
	//ambil data value untuk Resource CODE 
	$sqlcodecongest = "SELECT [DateId]
      ,[Resource]
      ,sum([Congest]) as [Congest]
      ,sum([High]) as [High]
      ,sum([Medium]) as [Medium]
      ,sum([Low]) as [Low]
  FROM [WebDashboard].[dbo].[RemarksDaily]
  where [Dateid] >= getdate()-3 and [Resource] = 'CODE'
  group by [DateId],[Resource]";
	$resultcodecongest = sqlsrv_query($conn, $sqlcodecongest, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datacodecongest = sqlsrv_fetch_array($resultcodecongest);
	$CodeCongest= $datacodecongest ['Congest'];
	$CodeHigh= $datacodecongest ['High'];
	$CodeMedium= $datacodecongest ['Medium'];
	$CodeLow= $datacodecongest ['Low'];
	
	//ambil data value untuk Resource POWER 
	$sqlpowercongest = "SELECT [DateId]
      ,[Resource]
      ,sum([Congest]) as [Congest]
      ,sum([High]) as [High]
      ,sum([Medium]) as [Medium]
      ,sum([Low]) as [Low]
  FROM [WebDashboard].[dbo].[RemarksDaily]
  where [Dateid] >= getdate()-3 and [Resource] = 'POWER'
  group by [DateId],[Resource]";
	$resultpowercongest = sqlsrv_query($conn, $sqlpowercongest, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datapowercongest = sqlsrv_fetch_array($resultpowercongest);
	$PowerCongest= $datapowercongest ['Congest'];
	$PowerHigh= $datapowercongest ['High'];
	$PowerMedium= $datapowercongest ['Medium'];
	$PowerLow= $datapowercongest ['Low'];
	
	
	//ambil data value untuk Resource HDSPA 
	$sqlhdspahigh = "SELECT [DateId]
      ,[Resource]
      ,sum([Congest]) as [Congest]
      ,sum([High]) as [High]
      ,sum([Medium]) as [Medium]
      ,sum([Low]) as [Low]
  FROM [WebDashboard].[dbo].[RemarksDaily]
  where [Dateid] >= getdate()-3 and [Resource] = 'HDSPA'
  group by [DateId],[Resource]";
	$resulthdspahigh = sqlsrv_query($conn, $sqlhdspahigh, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$datahdspahigh = sqlsrv_fetch_array($resulthdspahigh);
	$HdspaHigh= $datahdspahigh ['High'];
	$HdspaMedium= $datahdspahigh ['Medium'];
	$HdspaLow= $datahdspahigh ['Low'];
?>
<!-- CHART 4G -->
<?php
	$sqlLicense = "SELECT [Resource]
      ,[DateId]
      ,[High]
      ,[Fair]
      ,[Low]
  FROM [WebDashboard].[dbo].[4GAmpuhDailyRemark]
  where [DateId] >= getdate()-2 and [Resource] = 'License'";
	$resultLicense 	= sqlsrv_query($conn, $sqlLicense, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataLicense 	= sqlsrv_fetch_array($resultLicense);
	$LicenseLow			= $dataLicense ['Low'];
	$LicenseHigh		= $dataLicense ['High'];
	$LicenseFair		= $dataLicense ['Fair'];
	
	//ambil data value untuk Resource CODE 
	$sqlPRB = "SELECT [Resource]
      ,[DateId]
      ,[High]
      ,[Fair]
      ,[Low]
  FROM [WebDashboard].[dbo].[4GAmpuhDailyRemark]
  where [DateId] >= getdate()-2 and [Resource] = 'PRB'";
	$resultPRB 	= sqlsrv_query($conn, $sqlPRB, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataPRB 	= sqlsrv_fetch_array($resultPRB);
	$PRBLow			= $dataPRB ['Low'];
	$PRBHigh		= $dataPRB ['High'];
	$PRBFair		= $dataPRB ['Fair'];
	
	//ambil data value untuk Resource POWER 
	$sqlUsage = "SELECT [Resource]
      ,[DateId]
      ,[High]
      ,[Fair]
      ,[Low]
  FROM [WebDashboard].[dbo].[4GAmpuhDailyRemark]
  where [DateId] >= getdate()-2 and [Resource] = 'Usage'";
	$resultUsage 	= sqlsrv_query($conn, $sqlUsage, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataUsage 		= sqlsrv_fetch_array($resultUsage);
	$UsageHigh		= $dataUsage ['High'];
	$UsageLow		= $dataUsage ['Low'];
	$UsageFair		= $dataUsage ['Fair'];
	
	
	//ambil data value untuk Resource HDSPA 
	$sqlUser = "SELECT [Resource]
      ,[DateId]
      ,[High]
      ,[Fair]
      ,[Low]
  FROM [WebDashboard].[dbo].[4GAmpuhDailyRemark]
  where [DateId] >= getdate()-2 and [Resource] = 'User'";
	$resultUser 	= sqlsrv_query($conn, $sqlUser, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
	$dataUser 		= sqlsrv_fetch_array($resultUser);
	$UserHigh		= $dataUser ['High'];
	$UserLow		= $dataUser ['Low'];
	$UserFair		= $dataUser ['Fair'];
?>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Resource","Low","Meium","High","Congest"],
        ['CE', <?php echo $CeLow ; ?> , <?php echo $CeMedium ; ?>, <?php echo $CeHigh ; ?>, <?php echo $CeCongest ; ?> ],
	    ['CODE' , <?php echo $CodeLow ;?>, <?php echo $CodeMedium ; ?>, <?php echo $CodeHigh ; ?>, <?php echo $CodeCongest ; ?> ],
	    ['POWER' , <?php echo $PowerLow ; ?> , <?php echo $PowerMedium ; ?>, <?php echo $PowerHigh ; ?>, <?php echo $PowerCongest ; ?>],
	    ['HDSPA' , <?php echo $HdspaLow ?> ,<?php echo $HdspaMedium ?> , <?php echo $HdspaHigh ?>, 0]
      ]);

      var view = new google.visualization.DataView(data);
 
      var options = {
        title: '',
		chartArea:{width:"300",height:"50%"},
		legend: {position: 'top', maxline:2},
	    isStacked:'percent', 
        height:280,
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
      var chart = new google.visualization.ColumnChart(document.getElementById("stacked3G"));
      chart.draw(view, options);
  }
  </script>
<!-- END CHART 3G -->
<!-- START CHART 4G -->
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Resource","Low","Fair","High"],
        ['LICENSE', <?php echo $LicenseLow ; ?> , <?php echo $LicenseFair;?>,<?php echo $LicenseHigh;?> ],
	    ['PRB' , <?php echo $PRBLow ; ?>,<?php echo $PRBFair;?>,<?php echo $PRBHigh;?> ],
	    ['USAGE' , <?php echo $UsagLow ; ?>,<?php echo $UsageFair;?>,<?php echo $UsageHigh;?>],
	    ['USER' , <?php echo $UserLow ; ?>,<?php echo $UserFair;?>,<?php echo $UserHigh;?>]
      ]);

      var view = new google.visualization.DataView(data);
 
      var options = {
        title: '',
		chartArea:{width:"300",height:"50%"},
		legend: {position: 'top', maxline:2},
	    isStacked:'percent', 
        height:280,
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
      var chart = new google.visualization.ColumnChart(document.getElementById("stacked4G"));
      chart.draw(view, options);
  }
  </script>
<!-- END CHART 4G -->
<!-- START CHART bsc -->
<?php 
$SqlBSC_FachDchHsUsers= " SELECT [System]
      ,[DateId]
      ,[Resource]
      ,[High]
      ,[Warning]
      ,[Low]
  FROM [WebDashboard].[dbo].[BscRncDaily]
  WHERE [Resource] = 'FachDchHsUsers' " ;
$ResultIBSC_FachDchHsUsers = sqlsrv_query($conn, $SqlBSC_FachDchHsUsers, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetBSC_FachDchHsUsers = sqlsrv_fetch_array($ResultIBSC_FachDchHsUsers);
$getLowFachDchHsUsers = $GetBSC_FachDchHsUsers['Low'];
$getWarningFachDchHsUsers = $GetBSC_FachDchHsUsers['Warning'];
$getHighFachDchHsUsers = $GetBSC_FachDchHsUsers['High'];

$SqlBSC_MPLoad= " SELECT [System]
      ,[DateId]
      ,[Resource]
      ,[High]
      ,[Warning]
      ,[Low]
  FROM [WebDashboard].[dbo].[BscRncDaily]
  WHERE [Resource] = 'MPLoad' " ;
$ResultIBSC_MPLoad = sqlsrv_query($conn, $SqlBSC_MPLoad, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetBSC_MPLoad = sqlsrv_fetch_array($ResultIBSC_MPLoad);
$getLowMPLoad = $GetBSC_MPLoad['Low'];
$getWarningMPLoad = $GetBSC_MPLoad['Warning'];
$getHighMPLoad = $GetBSC_MPLoad['High'];

$SqlBSC_VsDspLoadMean= " SELECT [System]
      ,[DateId]
      ,[Resource]
      ,[High]
      ,[Warning]
      ,[Low]
  FROM [WebDashboard].[dbo].[BscRncDaily]
  WHERE [Resource] = 'VsDspLoadMean' " ;
$ResultIBSC_VsDspLoadMean = sqlsrv_query($conn, $SqlBSC_VsDspLoadMean, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetBSC_VsDspLoadMean = sqlsrv_fetch_array($ResultIBSC_VsDspLoadMean);
$getLowVsDspLoadMean = $GetBSC_VsDspLoadMean['Low'];
$getWarningVsDspLoadMean = $GetBSC_VsDspLoadMean['Warning'];
$getHighVsDspLoadMean = $GetBSC_VsDspLoadMean['High'];

$SqlBSC_IubThroughput= " SELECT [System]
      ,[DateId]
      ,[Resource]
      ,[High]
      ,[Warning]
      ,[Low]
  FROM [WebDashboard].[dbo].[BscRncDaily]
  WHERE [Resource] = 'IubThroughput' " ;
$ResultIBSC_IubThroughput = sqlsrv_query($conn, $SqlBSC_IubThroughput, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetBSC_IubThroughput = sqlsrv_fetch_array($ResultIBSC_IubThroughput);
$getLowIubThroughput = $GetBSC_IubThroughput['Low'];
$getWarningIubThroughput = $GetBSC_IubThroughput['Warning'];
$getHighIubThroughput = $GetBSC_IubThroughput['High'];

$SqlBSC_PSThroughput= " SELECT [System]
      ,[DateId]
      ,[Resource]
      ,[High]
      ,[Warning]
      ,[Low]
  FROM [WebDashboard].[dbo].[BscRncDaily]
  WHERE [Resource] = 'PSThroughput' " ;
$ResultIBSC_PSThroughput = sqlsrv_query($conn, $SqlBSC_PSThroughput, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
$GetBSC_PSThroughput = sqlsrv_fetch_array($ResultIBSC_PSThroughput);
$getLowPSThroughput = $GetBSC_PSThroughput['Low'];
$getWarningPSThroughput = $GetBSC_PSThroughput['Warning'];
$getHighPSThroughput = $GetBSC_PSThroughput['High'];
	if($getLowPSThroughput == null  ){
		$getLowPSThroughput2 = '0';
	}else {
		$getLowPSThroughput2 = $GetBSC_PSThroughput['Low'];
		
	}
	if($getWarningPSThroughput == null  ){
		$getWarningPSThroughput2 = '0';
	}else {
		$getWarningPSThroughput2 = $GetBSC_PSThroughput['Warning'];
		
	}
		if($getHighPSThroughput == null  ){
		$getHighPSThroughput2 = '0';
	}else {
		$getHighPSThroughput2 = $GetBSC_PSThroughput['High'];
		
	}
?>
<script type="text/javascript">
Highcharts.chart('stackedBSC', {
  chart: {
    type: 'column',
    width: 300,
    height: 300
  },
  title: {
    text: ''
  },
  xAxis: {
    categories: ['MP Load', 'FachDchHsUsers', 'IubThroughput', 'DSP Load', 'PS Thryoughput'],
  },
  yAxis: {
    min: 0,
    title: {
      text: '',
	  visible :false
    },
  },
  colors: ['red', 'yellow', 'green'],
  tooltip: {
    pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
    shared: true
  },
  plotOptions: {
    column: {
      stacking: 'percent'
    }
  },
  series: [{
    name: 'High',
    data: [<?php echo $getHighMPLoad ; ?>, <?php echo $getHighFachDchHsUsers ; ?>, <?php echo $getHighIubThroughput ; ?>, <?php echo $getHighVsDspLoadMean ; ?>, <?php echo $getHighPSThroughput2 ; ?>]
  }, {
    name: 'Warning',
    data: [<?php echo $getWarningMPLoad ; ?>, <?php echo $getWarningFachDchHsUsers ; ?>, <?php echo $getWarningIubThroughput ;?>, <?php echo $getWarningVsDspLoadMean ; ?>, <?php echo $getWarningPSThroughput2 ; ?>]
  }, {
    name: 'Low',
    data: [<?php echo $getLowMPLoad ; ?>, <?php echo $getLowFachDchHsUsers ; ?>, <?php echo $getLowIubThroughput ; ?>, <?php echo $getLowVsDspLoadMean ; ?>, <?php echo $getLowPSThroughput2 ; ?>]
  }]
});
</script>
<!-- END CHART BSC -->

<?php 
include 'footer.php';
?>