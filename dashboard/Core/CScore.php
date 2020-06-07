<?php 
include '../header2.php';
ini_set('max_execution_time', 0);
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
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/exporting.js"></script>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>CORE <small>CS Core</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
<!-- ISI DISINI -->
					<div id="CSCore" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<!-- AKHIR ISI  -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$tanggal        	=  "SELECT distinct [tanggal] FROM [WebDashboard].[dbo].[V_SCR_POI_NATIONAL_D-1] ORDER BY [tanggal] asc";
$get_tanggal		=	sqlsrv_query($conn, $tanggal, array(), array( "scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());

$scr_HCPT			= 	"SELECT [scr] FROM [WebDashboard].[dbo].[V_SCR_POI_NATIONAL_D-1] WHERE [partner]='HCPT' ORDER BY [tanggal] asc";
$hsl_scr_HCPT		=	sqlsrv_query($conn, $scr_HCPT, array(), array( "scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());

$scr_telkom			= 	"SELECT [scr] FROM [WebDashboard].[dbo].[V_SCR_POI_NATIONAL_D-1] WHERE [partner]='TELKOM' ORDER BY [tanggal] asc";
$hsl_scr_telkom		=	sqlsrv_query($conn, $scr_telkom, array(), array( "scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());

$scr_telkomsel		= 	"SELECT [scr]FROM [WebDashboard].[dbo].[V_SCR_POI_NATIONAL_D-1] WHERE [partner]='TELKOMSEL' ORDER BY [tanggal] asc";
$hsl_scr_telkomsel	=	sqlsrv_query($conn, $scr_telkomsel, array(), array( "scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());

$scr_indosat		= 	"SELECT [scr] FROM [WebDashboard].[dbo].[V_SCR_POI_NATIONAL_D-1] WHERE [partner]='INDOSAT' ORDER BY [tanggal] asc";
$hsl_scr_indosat	=	sqlsrv_query($conn, $scr_indosat, array(), array( "scrollable" => SQLSRV_CURSOR_KEYSET)) OR die(sqlsrv_errors());
?>
<script type="text/javascript">
var options = {
	chart: {
		renderTo: 'CSCore',
	},
	
	legend: {
		enabled: true,
		backgroundColor: '#FFFFFF',
		layout: 'horizontal',
		align: 'top',
		floating: true,
		reversed: true,
		verticalAlign: 'top',
		horizontalAlign: 'center',
		y: 30.0,
		x: 30.0
	},
	
	xAxis: {
		categories: []
	},
	yAxis: {
		title: {
			text: 'Percentage'
		},
		min:0,
        max: 100,
		plotLines: [{
		value: 0,
			width: 1,
			color: '#808080'
		}]
	},
	tooltip: {
		crosshairs: true,
		animation: true,
		shared: true,
		formatter: function() {
			return this.x + '<br>'
			+ this.points[0].series.name + ': ' + this.points[0].y + '<br>'
			+ this.points[1].series.name + ': ' + this.points[1].y + '<br>'
			+ this.points[2].series.name + ': ' + this.points[2].y + '<br>'
			+ this.points[3].series.name + ': ' + this.points[3].y;
		}
	},
	title: {
		text: 'SCR POI National (%)',
		
		x: -20 //center
	},
	subtitle: {
		text: 'Capacity Management',
		x: -20
	},
	plotOptions: {
		line: {
			allowPointSelect: false,
			cursor: '',
			events: {
				legendItemClick: ' '
			},
			showInLegend: true
		}
	},
	series: [{
		color: Highcharts.getOptions().colors[2]}
	]
};

//$.getJSON("data.php", function(json) {
	options.xAxis.categories = [ <?php while ($hasil_tanggal = sqlsrv_fetch_array($get_tanggal)) { echo '"' . $hasil_tanggal['tanggal']->format("j M h A"). '",';}?>];
	options.series[0] = {	name: 'HCPT', data: [<?php while ($get_scr_HCPT	          = sqlsrv_fetch_array($hsl_scr_HCPT)) { echo $get_scr_HCPT['scr']; echo "," ;}?>] };
	options.series[1] = {	name: 'TELKOM', data: [<?php while ($get_scr_telkom	      =	sqlsrv_fetch_array($hsl_scr_telkom)){ echo $get_scr_telkom['scr']; echo ",";} ?>] };
	options.series[2] = {	name: 'TELKOMSEL', data: [<?php while ($get_scr_telkomsel =	sqlsrv_fetch_array($hsl_scr_telkomsel)){ echo $get_scr_telkomsel['scr']; echo ",";}?>] };
	options.series[3] = {	name: 'INDOSAT', data: [<?php while ($get_scr_indosat     =	sqlsrv_fetch_array($hsl_scr_indosat)){ echo $get_scr_indosat['scr']; echo ",";}?>] };
	chart = new Highcharts.Chart(options);
//});
</script>
<?php
include 'footer.php';
?>