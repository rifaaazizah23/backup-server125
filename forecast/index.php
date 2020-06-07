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
<div class="container-fluid">
    <div class="row">
		<div class="outer-w3-agile col-xl ml-xl-3 mt-xl-0 mt-3">
			<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		</div>
	</div>
	<br>
		<div class="row">
			<div class="outer-w3-agile col-xl ml-xl-3 mt-xl-0 mt-3">
				<div id="LinierREGION" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			</div>
			<div class="outer-w3-agile col-xl ml-xl-3 mt-xl-0 mt-3">
				<div id="ExponentialREGION" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<hr>
		<div class="row">
			<div class="outer-w3-agile col-xl ml-xl-3 mt-xl-0 mt-3">
				<div id="nationwideLinier" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="outer-w3-agile col-xl ml-xl-3 mt-xl-0 mt-3">
				<div id="nationwideExponential" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			</div>
		</div>
</div>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/highcharts.js"></script>
<?php 
$queryLineNationwide = "/****** Script for SelectTopNRows command from SSMS  ******/
/****** Script for SelectTopNRows command from SSMS  ******/
SELECT [Forecasting]
      ,[2018/1]
      ,[2018/2]
      ,[2018/3]
      ,[2018/4]
      ,[2018/5]
      ,[2018/6]
      ,[2018/7]
      ,[2018/8]
      ,[2018/9]
      ,[2018/10]
      ,[2018/11]
      ,[2018/12]
      ,[2018/13]
      ,[2018/14]
      ,[2018/15]
      ,[2018/16]
      ,[2018/17]
      ,[2018/18]
      ,[2018/19]
      ,[2018/20]
      ,[2018/21]
      ,[2018/22]
      ,[2018/23]
      ,[2018/24]
      ,[2018/25]
      ,[2018/26]
      ,[2018/27]
      ,[2018/28]
      ,[2018/29]
      ,[2018/30]
      ,[2018/31]
      ,[2018/32]
      ,[2018/33]
      ,[2018/34]
      ,[2018/35]
      ,[2018/36]
      ,[2018/37]
      ,[2018/38]
      ,[2018/39]
      ,[2018/40]
      ,[2018/41]
      ,[2018/42]
      ,[2018/43]
      ,[2018/44]
      ,[2018/45]
      ,[2018/46]
      ,[2018/47]
      ,[2018/48]
      ,[2018/49]
      ,[2018/50]
      ,[2018/51]
      ,[2018/52]
      ,[2019/1]
      ,[2019/2]
      ,[2019/3]
      ,[2019/4]
      ,[2019/5]
      ,[2019/6]
      ,[2019/7]
      ,[2019/8]
      ,[2019/9]
      ,[2019/10]
      ,[2019/11]
      ,[2019/12]
  FROM [WebDashboard].[dbo].[Value_Forecast_Nationwide] 
  where [Forecasting] = 'Linier' 
  ";
  $resultlineNationwide = sqlsrv_query($conn, $queryLineNationwide, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
  $datalineNationwide = sqlsrv_fetch_array($resultlineNationwide);
  $valueLinier1 = $datalineNationwide['2018/1'];	$valueLinier2 = $datalineNationwide['2018/2'];	$valueLinier3 = $datalineNationwide['2018/3'];	$valueLinier4 = $datalineNationwide['2018/4'];	$valueLinier5 = $datalineNationwide['2018/5'];	$valueLinier6 = $datalineNationwide['2018/6'];	$valueLinier7 = $datalineNationwide['2018/7'];	$valueLinier8 = $datalineNationwide['2018/8'];	$valueLinier9 = $datalineNationwide['2018/9'];	$valueLinier10 = $datalineNationwide['2018/10'];	$valueLinier11 = $datalineNationwide['2018/11'];	$valueLinier12 = $datalineNationwide['2018/12'];	$valueLinier13 = $datalineNationwide['2018/13'];	$valueLinier14 = $datalineNationwide['2018/14'];	$valueLinier15 = $datalineNationwide['2018/15'];	$valueLinier16 = $datalineNationwide['2018/16'];	$valueLinier17 = $datalineNationwide['2018/17'];	$valueLinier18 = $datalineNationwide['2018/18'];	$valueLinier19 = $datalineNationwide['2018/19'];	$valueLinier20 = $datalineNationwide['2018/20'];	$valueLinier21 = $datalineNationwide['2018/21'];	$valueLinier22 = $datalineNationwide['2018/22'];	$valueLinier23 = $datalineNationwide['2018/23'];	$valueLinier24 = $datalineNationwide['2018/24'];	$valueLinier25 = $datalineNationwide['2018/25'];	$valueLinier26 = $datalineNationwide['2018/26'];	$valueLinier27 = $datalineNationwide['2018/27'];	$valueLinier28 = $datalineNationwide['2018/28'];	$valueLinier29 = $datalineNationwide['2018/29'];	$valueLinier30 = $datalineNationwide['2018/30'];	$valueLinier31 = $datalineNationwide['2018/31'];	$valueLinier32 = $datalineNationwide['2018/32'];	$valueLinier33 = $datalineNationwide['2018/33'];	$valueLinier34 = $datalineNationwide['2018/34'];	$valueLinier35 = $datalineNationwide['2018/35'];	$valueLinier36 = $datalineNationwide['2018/36'];	$valueLinier37 = $datalineNationwide['2018/37'];	$valueLinier38 = $datalineNationwide['2018/38'];	$valueLinier39 = $datalineNationwide['2018/39'];	$valueLinier40 = $datalineNationwide['2018/40'];	$valueLinier41 = $datalineNationwide['2018/41'];	$valueLinier42 = $datalineNationwide['2018/42'];	$valueLinier43 = $datalineNationwide['2018/43'];	$valueLinier44 = $datalineNationwide['2018/44'];	$valueLinier45 = $datalineNationwide['2018/45'];	$valueLinier46 = $datalineNationwide['2018/46'];	$valueLinier47 = $datalineNationwide['2018/47'];	$valueLinier48 = $datalineNationwide['2018/48'];	$valueLinier49 = $datalineNationwide['2018/49'];	$valueLinier50 = $datalineNationwide['2018/50'];	$valueLinier51 = $datalineNationwide['2018/51'];	$valueLinier52 = $datalineNationwide['2018/52']; $valueLinier1_2019 = $datalineNationwide['2019/1'];	$valueLinier2_2019 = $datalineNationwide['2019/2'];	$valueLinier3_2019 = $datalineNationwide['2019/3'];	$valueLinier4_2019 = $datalineNationwide['2019/4'];	$valueLinier5_2019 = $datalineNationwide['2019/5'];	$valueLinier6_2019 = $datalineNationwide['2019/6'];	$valueLinier7_2019 = $datalineNationwide['2019/7'];	$valueLinier8_2019 = $datalineNationwide['2019/8'];	$valueLinier9_2019 = $datalineNationwide['2019/9'];	$valueLinier10_2019 = $datalineNationwide['2019/10'];	$valueLinier11_2019 = $datalineNationwide['2019/11'];	$valueLinier12_2019 = $datalineNationwide['2019/12'];

$queryLineNationwideExponential = "/****** Script for SelectTopNRows command from SSMS  ******/
/****** Script for SelectTopNRows command from SSMS  ******/
SELECT [Forecasting]
      ,[2018/1]
      ,[2018/2]
      ,[2018/3]
      ,[2018/4]
      ,[2018/5]
      ,[2018/6]
      ,[2018/7]
      ,[2018/8]
      ,[2018/9]
      ,[2018/10]
      ,[2018/11]
      ,[2018/12]
      ,[2018/13]
      ,[2018/14]
      ,[2018/15]
      ,[2018/16]
      ,[2018/17]
      ,[2018/18]
      ,[2018/19]
      ,[2018/20]
      ,[2018/21]
      ,[2018/22]
      ,[2018/23]
      ,[2018/24]
      ,[2018/25]
      ,[2018/26]
      ,[2018/27]
      ,[2018/28]
      ,[2018/29]
      ,[2018/30]
      ,[2018/31]
      ,[2018/32]
      ,[2018/33]
      ,[2018/34]
      ,[2018/35]
      ,[2018/36]
      ,[2018/37]
      ,[2018/38]
      ,[2018/39]
      ,[2018/40]
      ,[2018/41]
      ,[2018/42]
      ,[2018/43]
      ,[2018/44]
      ,[2018/45]
      ,[2018/46]
      ,[2018/47]
      ,[2018/48]
      ,[2018/49]
      ,[2018/50]
      ,[2018/51]
      ,[2018/52]
      ,[2019/1]
      ,[2019/2]
      ,[2019/3]
      ,[2019/4]
      ,[2019/5]
      ,[2019/6]
      ,[2019/7]
      ,[2019/8]
      ,[2019/9]
      ,[2019/10]
      ,[2019/11]
      ,[2019/12]
  FROM [WebDashboard].[dbo].[Value_Forecast_Nationwide] 
  where [Forecasting] = 'Exponential' 
  ";
  $resultlineNationwideExponential = sqlsrv_query($conn, $queryLineNationwideExponential, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
  $datalineNationwideExponential = sqlsrv_fetch_array($resultlineNationwideExponential);
  $valueExponential1 = $datalineNationwideExponential['2018/1'];	$valueExponential2 = $datalineNationwideExponential['2018/2'];	$valueExponential3 = $datalineNationwideExponential['2018/3'];	$valueExponential4 = $datalineNationwideExponential['2018/4'];	$valueExponential5 = $datalineNationwideExponential['2018/5'];	$valueExponential6 = $datalineNationwideExponential['2018/6'];	$valueExponential7 = $datalineNationwideExponential['2018/7'];	$valueExponential8 = $datalineNationwideExponential['2018/8'];	$valueExponential9 = $datalineNationwideExponential['2018/9'];	$valueExponential10 = $datalineNationwideExponential['2018/10'];	$valueExponential11 = $datalineNationwideExponential['2018/11'];	$valueExponential12 = $datalineNationwideExponential['2018/12'];	$valueExponential13 = $datalineNationwideExponential['2018/13'];	$valueExponential14 = $datalineNationwideExponential['2018/14'];	$valueExponential15 = $datalineNationwideExponential['2018/15'];	$valueExponential16 = $datalineNationwideExponential['2018/16'];	$valueExponential17 = $datalineNationwideExponential['2018/17'];	$valueExponential18 = $datalineNationwideExponential['2018/18'];	$valueExponential19 = $datalineNationwideExponential['2018/19'];	$valueExponential20 = $datalineNationwideExponential['2018/20'];	$valueExponential21 = $datalineNationwideExponential['2018/21'];	$valueExponential22 = $datalineNationwideExponential['2018/22'];	$valueExponential23 = $datalineNationwideExponential['2018/23'];	$valueExponential24 = $datalineNationwideExponential['2018/24'];	$valueExponential25 = $datalineNationwideExponential['2018/25'];	$valueExponential26 = $datalineNationwideExponential['2018/26'];	$valueExponential27 = $datalineNationwideExponential['2018/27'];	$valueExponential28 = $datalineNationwideExponential['2018/28'];	$valueExponential29 = $datalineNationwideExponential['2018/29'];	$valueExponential30 = $datalineNationwideExponential['2018/30'];	$valueExponential31 = $datalineNationwideExponential['2018/31'];	$valueExponential32 = $datalineNationwideExponential['2018/32'];	$valueExponential33 = $datalineNationwideExponential['2018/33'];	$valueExponential34 = $datalineNationwideExponential['2018/34'];	$valueExponential35 = $datalineNationwideExponential['2018/35'];	$valueExponential36 = $datalineNationwideExponential['2018/36'];	$valueExponential37 = $datalineNationwideExponential['2018/37'];	$valueExponential38 = $datalineNationwideExponential['2018/38'];	$valueExponential39 = $datalineNationwideExponential['2018/39'];	$valueExponential40 = $datalineNationwideExponential['2018/40'];	$valueExponential41 = $datalineNationwideExponential['2018/41'];	$valueExponential42 = $datalineNationwideExponential['2018/42'];	$valueExponential43 = $datalineNationwideExponential['2018/43'];	$valueExponential44 = $datalineNationwideExponential['2018/44'];	$valueExponential45 = $datalineNationwideExponential['2018/45'];	$valueExponential46 = $datalineNationwideExponential['2018/46'];	$valueExponential47 = $datalineNationwideExponential['2018/47'];	$valueExponential48 = $datalineNationwideExponential['2018/48'];	$valueExponential49 = $datalineNationwideExponential['2018/49'];	$valueExponential50 = $datalineNationwideExponential['2018/50'];	$valueExponential51 = $datalineNationwideExponential['2018/51'];	$valueExponential52 = $datalineNationwideExponential['2018/52']; $valueExponential1_2019 = $datalineNationwideExponential['2019/1'];	$valueExponential2_2019 = $datalineNationwideExponential['2019/2'];	$valueExponential3_2019 = $datalineNationwideExponential['2019/3'];	$valueExponential4_2019 = $datalineNationwideExponential['2019/4'];	$valueExponential5_2019 = $datalineNationwideExponential['2019/5'];	$valueExponential6_2019 = $datalineNationwideExponential['2019/6'];	$valueExponential7_2019 = $datalineNationwideExponential['2019/7'];	$valueExponential8_2019 = $datalineNationwideExponential['2019/8'];	$valueExponential9_2019 = $datalineNationwideExponential['2019/9'];	$valueExponential10_2019 = $datalineNationwideExponential['2019/10'];	$valueExponential11_2019 = $datalineNationwideExponential['2019/11'];	$valueExponential12_2019 = $datalineNationwideExponential['2019/12'];
?>
<script type="text/javascript">
	$(function () {
            console.log('ready ', Highcharts.version);
            Highcharts.chart('container', {
                xAxis: [
                    {
					plotLines: [{
						color: '#FF0000',
						width: 1,
						value: 34
					}],categories: ['2018 / 1 ',	'2018 / 2 ',	'2018 / 3 ',	'2018 / 4 ',	'2018 / 5 ',	'2018 / 6 ',	'2018 / 7 ',	'2018 / 8 ',	'2018 / 9 ',	'2018 / 10',	'2018 / 11',	'2018 / 12',	'2018 / 13',	'2018 / 14',	'2018 / 15',	'2018 / 16',	'2018 / 17',	'2018 / 18',	'2018 / 19',	'2018 / 20',	'2018 / 21',	'2018 / 22',	'2018 / 23',	'2018 / 24',	'2018 / 25',	'2018 / 26',	'2018 / 27',	'2018 / 28',	'2018 / 29',	'2018 / 30',	'2018 / 31',	'2018 / 32',	'2018 / 33',	'2018 / 34',	'2018 / 35',	'2018 / 36',	'2018 / 37',	'2018 / 38',	'2018 / 39',	'2018 / 40',	'2018 / 41',	'2018 / 42',	'2018 / 43',	'2018 / 44',	'2018 / 45',	'2018 / 46',	'2018 / 47',	'2018 / 48',	'2018 / 49',	'2018 / 50',	'2018 / 51',	'2018 / 52',	'2019 /1 ',	'2019 /2 ',	'2019 /3 ',	'2019 /4 ',	'2019 /5 ',	'2019 /6 ',	'2019 /7 ',	'2019 /8 ',	'2019 /9 ',	'2019 /10',	'2019 /11',	'2019 /12'],
                    title :{
                    	text : 'Year / Week'
                    }},
                ],

                title: {
                    text: 'Payload Trendlines Nationwide'
                },

                series: [{
                	name : ['Linier (Total) '],
			        keys: ['y'],
			        data: [[<?php echo $valueLinier1 ;?>], 	[<?php echo $valueLinier2 ;?>], 	[<?php echo $valueLinier3 ;?>], 	[<?php echo $valueLinier4 ;?>], 	[<?php echo $valueLinier5 ;?>], 	[<?php echo $valueLinier6 ;?>], 	[<?php echo $valueLinier7 ;?>], 	[<?php echo $valueLinier8 ;?>], 	[<?php echo $valueLinier9 ;?>], 	[<?php echo $valueLinier10 ;?>],	[<?php echo $valueLinier11 ;?>],	[<?php echo $valueLinier12 ;?>],	[<?php echo $valueLinier13 ;?>],	[<?php echo $valueLinier14 ;?>],	[<?php echo $valueLinier15 ;?>],	[<?php echo $valueLinier16 ;?>],	[<?php echo $valueLinier17 ;?>],	[<?php echo $valueLinier18 ;?>],	[<?php echo $valueLinier19 ;?>],	[<?php echo $valueLinier20 ;?>],	[<?php echo $valueLinier21 ;?>],	[<?php echo $valueLinier22 ;?>],	[<?php echo $valueLinier23 ;?>],	[<?php echo $valueLinier24 ;?>],	[<?php echo $valueLinier25 ;?>],	[<?php echo $valueLinier26 ;?>],	[<?php echo $valueLinier27 ;?>],	[<?php echo $valueLinier28 ;?>],	[<?php echo $valueLinier29 ;?>],	[<?php echo $valueLinier30 ;?>],	[<?php echo $valueLinier31 ;?>],	[<?php echo $valueLinier32 ;?>],	[<?php echo $valueLinier33 ;?>],	[<?php echo $valueLinier34 ;?>],	[<?php echo $valueLinier35 ;?>],	[<?php echo $valueLinier36 ;?>],	[<?php echo $valueLinier37 ;?>],	[<?php echo $valueLinier38 ;?>],	[<?php echo $valueLinier39 ;?>],	[<?php echo $valueLinier40 ;?>],	[<?php echo $valueLinier41 ;?>],	[<?php echo $valueLinier42 ;?>],	[<?php echo $valueLinier43 ;?>],	[<?php echo $valueLinier44 ;?>],	[<?php echo $valueLinier45 ;?>],	[<?php echo $valueLinier46 ;?>],	[<?php echo $valueLinier47 ;?>],	[<?php echo $valueLinier48 ;?>],	[<?php echo $valueLinier49 ;?>],	[<?php echo $valueLinier50 ;?>],	[<?php echo $valueLinier51 ;?>],	[<?php echo $valueLinier52 ;?>],	[<?php echo $valueLinier1_2019 ;?>], 	[<?php echo $valueLinier2_2019 ;?>], 	[<?php echo $valueLinier3_2019 ;?>], 	[<?php echo $valueLinier4_2019 ;?>], 	[<?php echo $valueLinier5_2019 ;?>], 	[<?php echo $valueLinier6_2019 ;?>], 	[<?php echo $valueLinier7_2019 ;?>], 	[<?php echo $valueLinier8_2019 ;?>], 	[<?php echo $valueLinier9_2019 ;?>], 	[<?php echo $valueLinier10_2019 ;?>],	[<?php echo $valueLinier11_2019 ;?>],	[<?php echo $valueLinier12_2019 ;?>],],
			color: '#4d94ff',
			zoneAxis: 'x',
			zones: [{
				value: 34
			}, {
				dashStyle: 'shortdot'
			}]
			    },
				{
                	name : ['Exponential (Total) '],
			        keys: ['y'],
			        data: [[<?php echo $valueExponential1 ;?>], 	[<?php echo $valueExponential2 ;?>], 	[<?php echo $valueExponential3 ;?>], 	[<?php echo $valueExponential4 ;?>], 	[<?php echo $valueExponential5 ;?>], 	[<?php echo $valueExponential6 ;?>], 	[<?php echo $valueExponential7 ;?>], 	[<?php echo $valueExponential8 ;?>], 	[<?php echo $valueExponential9 ;?>], 	[<?php echo $valueExponential10 ;?>],	[<?php echo $valueExponential11 ;?>],	[<?php echo $valueExponential12 ;?>],	[<?php echo $valueExponential13 ;?>],	[<?php echo $valueExponential14 ;?>],	[<?php echo $valueExponential15 ;?>],	[<?php echo $valueExponential16 ;?>],	[<?php echo $valueExponential17 ;?>],	[<?php echo $valueExponential18 ;?>],	[<?php echo $valueExponential19 ;?>],	[<?php echo $valueExponential20 ;?>],	[<?php echo $valueExponential21 ;?>],	[<?php echo $valueExponential22 ;?>],	[<?php echo $valueExponential23 ;?>],	[<?php echo $valueExponential24 ;?>],	[<?php echo $valueExponential25 ;?>],	[<?php echo $valueExponential26 ;?>],	[<?php echo $valueExponential27 ;?>],	[<?php echo $valueExponential28 ;?>],	[<?php echo $valueExponential29 ;?>],	[<?php echo $valueExponential30 ;?>],	[<?php echo $valueExponential31 ;?>],	[<?php echo $valueExponential32 ;?>],	[<?php echo $valueExponential33 ;?>],	[<?php echo $valueExponential34 ;?>],	[<?php echo $valueExponential35 ;?>],	[<?php echo $valueExponential36 ;?>],	[<?php echo $valueExponential37 ;?>],	[<?php echo $valueExponential38 ;?>],	[<?php echo $valueExponential39 ;?>],	[<?php echo $valueExponential40 ;?>],	[<?php echo $valueExponential41 ;?>],	[<?php echo $valueExponential42 ;?>],	[<?php echo $valueExponential43 ;?>],	[<?php echo $valueExponential44 ;?>],	[<?php echo $valueExponential45 ;?>],	[<?php echo $valueExponential46 ;?>],	[<?php echo $valueExponential47 ;?>],	[<?php echo $valueExponential48 ;?>],	[<?php echo $valueExponential49 ;?>],	[<?php echo $valueExponential50 ;?>],	[<?php echo $valueExponential51 ;?>],	[<?php echo $valueExponential52 ;?>],	[<?php echo $valueExponential1_2019 ;?>], 	[<?php echo $valueExponential2_2019 ;?>], 	[<?php echo $valueExponential3_2019 ;?>], 	[<?php echo $valueExponential4_2019 ;?>], 	[<?php echo $valueExponential5_2019 ;?>], 	[<?php echo $valueExponential6_2019 ;?>], 	[<?php echo $valueExponential7_2019 ;?>], 	[<?php echo $valueExponential8_2019 ;?>], 	[<?php echo $valueExponential9_2019 ;?>], 	[<?php echo $valueExponential10_2019 ;?>],	[<?php echo $valueExponential11_2019 ;?>],	[<?php echo $valueExponential12_2019 ;?>],],
			color: '#4dff4d',
			zoneAxis: 'x',
			zones: [{
				value: 34
			}, {
				dashStyle: 'shortdot'
			}]
			    },
			    {
			    	name: ['Total'],
			        keys: ['y'],
			        data: [[<?php echo $valueLinier1 ;?>], 	[<?php echo $valueLinier2 ;?>], 	[<?php echo $valueLinier3 ;?>], 	[<?php echo $valueLinier4 ;?>], 	[<?php echo $valueLinier5 ;?>], 	[<?php echo $valueLinier6 ;?>], 	[<?php echo $valueLinier7 ;?>], 	[<?php echo $valueLinier8 ;?>], 	[<?php echo $valueLinier9 ;?>], 	[<?php echo $valueLinier10 ;?>],	[<?php echo $valueLinier11 ;?>],	[<?php echo $valueLinier12 ;?>],	[<?php echo $valueLinier13 ;?>],	[<?php echo $valueLinier14 ;?>],	[<?php echo $valueLinier15 ;?>],	[<?php echo $valueLinier16 ;?>],	[<?php echo $valueLinier17 ;?>],	[<?php echo $valueLinier18 ;?>],	[<?php echo $valueLinier19 ;?>],	[<?php echo $valueLinier20 ;?>],	[<?php echo $valueLinier21 ;?>],	[<?php echo $valueLinier22 ;?>],	[<?php echo $valueLinier23 ;?>],	[<?php echo $valueLinier24 ;?>],	[<?php echo $valueLinier25 ;?>],	[<?php echo $valueLinier26 ;?>],	[<?php echo $valueLinier27 ;?>],	[<?php echo $valueLinier28 ;?>],	[<?php echo $valueLinier29 ;?>],	[<?php echo $valueLinier30 ;?>],	[<?php echo $valueLinier31 ;?>],	[<?php echo $valueLinier32 ;?>],	[<?php echo $valueLinier33 ;?>],	[<?php echo $valueLinier34 ;?>],	[<?php echo $valueLinier35 ;?>]],
			    color: '#000000'
				}
				],
			    tooltip: {
			        enabled: true
			    },
			    annotations: [{
			    	visible: false,
			        labels: [{
			            point: 'safe',
			            format: '-'
			        }, {
			            point: 'need upgrade',
			            text: 'need upgrade'
			        }]
			    }]
            });
        }
    )
</script>
<script>
  var chart1; // globally available
  $(document).ready(function() {
        chart1 = new Highcharts.Chart({
        chart: {
        renderTo: 'nationwideLinier',
        type: 'column'
        },
        title: {
            text: 'Nationwide - Linier'
        },
        xAxis: {
            gridLineWidth: 0,
             plotLines: [{
                            color: '#FF0000',
                            width: 1,
                            value: 34.5
                        }],
            categories: ['2018 / 1 ',	'2018 / 2 ',	'2018 / 3 ',	'2018 / 4 ',	'2018 / 5 ',	'2018 / 6 ',	'2018 / 7 ',	'2018 / 8 ',	'2018 / 9 ',	'2018 / 10',	'2018 / 11',	'2018 / 12',	'2018 / 13',	'2018 / 14',	'2018 / 15',	'2018 / 16',	'2018 / 17',	'2018 / 18',	'2018 / 19',	'2018 / 20',	'2018 / 21',	'2018 / 22',	'2018 / 23',	'2018 / 24',	'2018 / 25',	'2018 / 26',	'2018 / 27',	'2018 / 28',	'2018 / 29',	'2018 / 30',	'2018 / 31',	'2018 / 32',	'2018 / 33',	'2018 / 34',	'2018 / 35',	'2018 / 36',	'2018 / 37',	'2018 / 38',	'2018 / 39',	'2018 / 40',	'2018 / 41',	'2018 / 42',	'2018 / 43',	'2018 / 44',	'2018 / 45',	'2018 / 46',	'2018 / 47',	'2018 / 48',	'2018 / 49',	'2018 / 50',	'2018 / 51',	'2018 / 52',	'2019 /1 ',	'2019 /2 ',	'2019 /3 ',	'2019 /4 ',	'2019 /5 ',	'2019 /6 ',	'2019 /7 ',	'2019 /8 ',	'2019 /9 ',	'2019 /10',	'2019 /11',	'2019 /12'],},
        yAxis: {
            min: 0,
            title: {
                text: 'Percentage %'
            }
        },
        colors: ['blue', 'green'],
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
            shared: true
        },
        plotOptions: {
            column: {
                stacking: 'percent'
            },
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function() {
                            location.href = this.options.url;
                        }
                    }
                }
            }
        },
        series: [{
            name: 'Cell Need Upgrade',
            data: [<?php 
           $query_forcast_remark_2018 = " SELECT [CellNeedUpgrade],[Week],[Year]
          FROM [WebDashboard].[dbo].[Count_Remark_Forcasting] where [Year] ='2018' and [Forecast] = 'Linier'" ;
          $Result_forcast_remark_2018 = sqlsrv_query($conn, $query_forcast_remark_2018, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors()); 
          while($data = sqlsrv_fetch_array($Result_forcast_remark_2018))
          {//ambil semua hasil eksekusi $sql
            echo "{ y: ".$data['CellNeedUpgrade'].", url:'http://10.17.6.125/forecast/detail.php?Week=".$data['Week']."&Year=".$data['Year']."'}, ";
          } 
          $query_forcast_remark_2019 = " SELECT [CellNeedUpgrade],[Week],[Year]
          FROM [WebDashboard].[dbo].[Count_Remark_Forcasting] where [Year] ='2019' and [Forecast] = 'Linier'" ;
          $Result_forcast_remark_2019 = sqlsrv_query($conn, $query_forcast_remark_2019, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors()); 
          while($data2 = sqlsrv_fetch_array($Result_forcast_remark_2019))
          {//ambil semua hasil eksekusi $sql
            echo "{ y: ".$data2['CellNeedUpgrade'].", url:'http://10.17.6.125/forecast/detail.php?Week=".$data2['Week']."&Year=".$data2['Year']."'}, ";
          } ?>]
          },{
            name: 'Cell Safe',
            data: [<?php 
           $query_forcast_remark_2018 = " SELECT[CellSafe],[Week],[Year]
          FROM [WebDashboard].[dbo].[Count_Remark_Forcasting] where [Year] ='2018' and [Forecast] = 'Linier'" ;
          $Result_forcast_remark_2018 = sqlsrv_query($conn, $query_forcast_remark_2018, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors()); 
          while($data = sqlsrv_fetch_array($Result_forcast_remark_2018))
          {//ambil semua hasil eksekusi $sql
            echo "{ y: ".$data['CellSafe'].", url:'#' },";
          } 
          $query_forcast_remark_2019 = " SELECT [CellSafe],[Week],[Year]
          FROM [WebDashboard].[dbo].[Count_Remark_Forcasting] where [Year] ='2019' and [Forecast] = 'Linier'" ;
          $Result_forcast_remark_2019 = sqlsrv_query($conn, $query_forcast_remark_2019, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors()); 
          while($data2 = sqlsrv_fetch_array($Result_forcast_remark_2019))
          {//ambil semua hasil eksekusi $sql
            echo "{ y: ".$data2['CellSafe'].", url:'#' },";
          } ?>]
        }]
        });
     });  
</script>
<script>
  var chart1; // globally available
  $(document).ready(function() {
        chart1 = new Highcharts.Chart({
        chart: {
        renderTo: 'nationwideExponential',
        type: 'column'
        },
        title: {
            text: 'Nationwide - Exponential'
        },
        xAxis: {
            gridLineWidth: 0,
             plotLines: [{
                            color: '#FF0000',
                            width: 1,
                            value: 34.5
                        }],
            categories: ['2018 / 1 ',	'2018 / 2 ',	'2018 / 3 ',	'2018 / 4 ',	'2018 / 5 ',	'2018 / 6 ',	'2018 / 7 ',	'2018 / 8 ',	'2018 / 9 ',	'2018 / 10',	'2018 / 11',	'2018 / 12',	'2018 / 13',	'2018 / 14',	'2018 / 15',	'2018 / 16',	'2018 / 17',	'2018 / 18',	'2018 / 19',	'2018 / 20',	'2018 / 21',	'2018 / 22',	'2018 / 23',	'2018 / 24',	'2018 / 25',	'2018 / 26',	'2018 / 27',	'2018 / 28',	'2018 / 29',	'2018 / 30',	'2018 / 31',	'2018 / 32',	'2018 / 33',	'2018 / 34',	'2018 / 35',	'2018 / 36',	'2018 / 37',	'2018 / 38',	'2018 / 39',	'2018 / 40',	'2018 / 41',	'2018 / 42',	'2018 / 43',	'2018 / 44',	'2018 / 45',	'2018 / 46',	'2018 / 47',	'2018 / 48',	'2018 / 49',	'2018 / 50',	'2018 / 51',	'2018 / 52',	'2019 /1 ',	'2019 /2 ',	'2019 /3 ',	'2019 /4 ',	'2019 /5 ',	'2019 /6 ',	'2019 /7 ',	'2019 /8 ',	'2019 /9 ',	'2019 /10',	'2019 /11',	'2019 /12'],},
        yAxis: {
            min: 0,
            title: {
                text: 'Percentage %'
            }
        },
        colors: ['blue', 'green'],
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
            shared: true
        },
        plotOptions: {
            column: {
                stacking: 'percent'
            },
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function() {
                            location.href = this.options.url;
                        }
                    }
                }
            }
        },
        series: [{
            name: 'Cell Need Upgrade',
            data: [<?php 
           $query_forcast_remark_2018 = " SELECT [CellNeedUpgrade],[Week],[Year]
          FROM [WebDashboard].[dbo].[Count_Remark_Forcasting] where [Year] ='2018' and [Forecast] = 'Exponential'" ;
          $Result_forcast_remark_2018 = sqlsrv_query($conn, $query_forcast_remark_2018, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors()); 
          while($data = sqlsrv_fetch_array($Result_forcast_remark_2018))
          {//ambil semua hasil eksekusi $sql
            echo "{ y: ".$data['CellNeedUpgrade'].", url:'http://10.17.6.125/forecast/detail.php?Week=".$data['Week']."&Year=".$data['Year']."'}, ";
          } 
          $query_forcast_remark_2019 = " SELECT [CellNeedUpgrade],[Week],[Year]
          FROM [WebDashboard].[dbo].[Count_Remark_Forcasting] where [Year] ='2019' and [Forecast] = 'Exponential'" ;
          $Result_forcast_remark_2019 = sqlsrv_query($conn, $query_forcast_remark_2019, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors()); 
          while($data2 = sqlsrv_fetch_array($Result_forcast_remark_2019))
          {//ambil semua hasil eksekusi $sql
            echo "{ y: ".$data2['CellNeedUpgrade'].", url:'http://10.17.6.125/forecast/detail.php?Week=".$data2['Week']."&Year=".$data2['Year']."'}, ";
          } ?>]
          },{
            name: 'Cell Safe',
            data: [<?php 
           $query_forcast_remark_2018 = " SELECT[CellSafe],[Week],[Year]
          FROM [WebDashboard].[dbo].[Count_Remark_Forcasting] where [Year] ='2018' and [Forecast] = 'Exponential'" ;
          $Result_forcast_remark_2018 = sqlsrv_query($conn, $query_forcast_remark_2018, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors()); 
          while($data = sqlsrv_fetch_array($Result_forcast_remark_2018))
          {//ambil semua hasil eksekusi $sql
            echo "{ y: ".$data['CellSafe'].", url:'#' },";
          } 
          $query_forcast_remark_2019 = " SELECT [CellSafe],[Week],[Year]
          FROM [WebDashboard].[dbo].[Count_Remark_Forcasting] where [Year] ='2019' and [Forecast] = 'Exponential'" ;
          $Result_forcast_remark_2019 = sqlsrv_query($conn, $query_forcast_remark_2019, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors()); 
          while($data2 = sqlsrv_fetch_array($Result_forcast_remark_2019))
          {//ambil semua hasil eksekusi $sql
            echo "{ y: ".$data2['CellSafe'].", url:'#' },";
          } ?>]
        }]
        });
     });  
</script>
<?php 
$queryLinierRegionCENTRAL = "
SELECT [Forecasting]
      ,[Region]
      ,[2018/1]
      ,[2018/2]
      ,[2018/3]
      ,[2018/4]
      ,[2018/5]
      ,[2018/6]
      ,[2018/7]
      ,[2018/8]
      ,[2018/9]
      ,[2018/10]
      ,[2018/11]
      ,[2018/12]
      ,[2018/13]
      ,[2018/14]
      ,[2018/15]
      ,[2018/16]
      ,[2018/17]
      ,[2018/18]
      ,[2018/19]
      ,[2018/20]
      ,[2018/21]
      ,[2018/22]
      ,[2018/23]
      ,[2018/24]
      ,[2018/25]
      ,[2018/26]
      ,[2018/27]
      ,[2018/28]
      ,[2018/29]
      ,[2018/30]
      ,[2018/31]
      ,[2018/32]
      ,[2018/33]
      ,[2018/34]
      ,[2018/35]
      ,[2018/36]
      ,[2018/37]
      ,[2018/38]
      ,[2018/39]
      ,[2018/40]
      ,[2018/41]
      ,[2018/42]
      ,[2018/43]
      ,[2018/44]
      ,[2018/45]
      ,[2018/46]
      ,[2018/47]
      ,[2018/48]
      ,[2018/49]
      ,[2018/50]
      ,[2018/51]
      ,[2018/52]
      ,[2019/1]
      ,[2019/2]
      ,[2019/3]
      ,[2019/4]
      ,[2019/5]
      ,[2019/6]
      ,[2019/7]
      ,[2019/8]
      ,[2019/9]
      ,[2019/10]
      ,[2019/11]
      ,[2019/12]
  FROM [WebDashboard].[dbo].[Value_Forecast_Region]
  where [Forecasting] = 'Linier' AND [Region] = 'CENTRAL' 
  ";
  $resultLinierRegionCENTRAL = sqlsrv_query($conn, $queryLinierRegionCENTRAL, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
  $dataLinierRegionCENTRAL = sqlsrv_fetch_array($resultLinierRegionCENTRAL);
  $valueLinierRegionCENTRAL1 = $dataLinierRegionCENTRAL['2018/1'];	$valueLinierRegionCENTRAL2 = $dataLinierRegionCENTRAL['2018/2'];	$valueLinierRegionCENTRAL3 = $dataLinierRegionCENTRAL['2018/3'];	$valueLinierRegionCENTRAL4 = $dataLinierRegionCENTRAL['2018/4'];	$valueLinierRegionCENTRAL5 = $dataLinierRegionCENTRAL['2018/5'];	$valueLinierRegionCENTRAL6 = $dataLinierRegionCENTRAL['2018/6'];	$valueLinierRegionCENTRAL7 = $dataLinierRegionCENTRAL['2018/7'];	$valueLinierRegionCENTRAL8 = $dataLinierRegionCENTRAL['2018/8'];	$valueLinierRegionCENTRAL9 = $dataLinierRegionCENTRAL['2018/9'];	$valueLinierRegionCENTRAL10 = $dataLinierRegionCENTRAL['2018/10'];	$valueLinierRegionCENTRAL11 = $dataLinierRegionCENTRAL['2018/11'];	$valueLinierRegionCENTRAL12 = $dataLinierRegionCENTRAL['2018/12'];	$valueLinierRegionCENTRAL13 = $dataLinierRegionCENTRAL['2018/13'];	$valueLinierRegionCENTRAL14 = $dataLinierRegionCENTRAL['2018/14'];	$valueLinierRegionCENTRAL15 = $dataLinierRegionCENTRAL['2018/15'];	$valueLinierRegionCENTRAL16 = $dataLinierRegionCENTRAL['2018/16'];	$valueLinierRegionCENTRAL17 = $dataLinierRegionCENTRAL['2018/17'];	$valueLinierRegionCENTRAL18 = $dataLinierRegionCENTRAL['2018/18'];	$valueLinierRegionCENTRAL19 = $dataLinierRegionCENTRAL['2018/19'];	$valueLinierRegionCENTRAL20 = $dataLinierRegionCENTRAL['2018/20'];	$valueLinierRegionCENTRAL21 = $dataLinierRegionCENTRAL['2018/21'];	$valueLinierRegionCENTRAL22 = $dataLinierRegionCENTRAL['2018/22'];	$valueLinierRegionCENTRAL23 = $dataLinierRegionCENTRAL['2018/23'];	$valueLinierRegionCENTRAL24 = $dataLinierRegionCENTRAL['2018/24'];	$valueLinierRegionCENTRAL25 = $dataLinierRegionCENTRAL['2018/25'];	$valueLinierRegionCENTRAL26 = $dataLinierRegionCENTRAL['2018/26'];	$valueLinierRegionCENTRAL27 = $dataLinierRegionCENTRAL['2018/27'];	$valueLinierRegionCENTRAL28 = $dataLinierRegionCENTRAL['2018/28'];	$valueLinierRegionCENTRAL29 = $dataLinierRegionCENTRAL['2018/29'];	$valueLinierRegionCENTRAL30 = $dataLinierRegionCENTRAL['2018/30'];	$valueLinierRegionCENTRAL31 = $dataLinierRegionCENTRAL['2018/31'];	$valueLinierRegionCENTRAL32 = $dataLinierRegionCENTRAL['2018/32'];	$valueLinierRegionCENTRAL33 = $dataLinierRegionCENTRAL['2018/33'];	$valueLinierRegionCENTRAL34 = $dataLinierRegionCENTRAL['2018/34'];	$valueLinierRegionCENTRAL35 = $dataLinierRegionCENTRAL['2018/35'];	$valueLinierRegionCENTRAL36 = $dataLinierRegionCENTRAL['2018/36'];	$valueLinierRegionCENTRAL37 = $dataLinierRegionCENTRAL['2018/37'];	$valueLinierRegionCENTRAL38 = $dataLinierRegionCENTRAL['2018/38'];	$valueLinierRegionCENTRAL39 = $dataLinierRegionCENTRAL['2018/39'];	$valueLinierRegionCENTRAL40 = $dataLinierRegionCENTRAL['2018/40'];	$valueLinierRegionCENTRAL41 = $dataLinierRegionCENTRAL['2018/41'];	$valueLinierRegionCENTRAL42 = $dataLinierRegionCENTRAL['2018/42'];	$valueLinierRegionCENTRAL43 = $dataLinierRegionCENTRAL['2018/43'];	$valueLinierRegionCENTRAL44 = $dataLinierRegionCENTRAL['2018/44'];	$valueLinierRegionCENTRAL45 = $dataLinierRegionCENTRAL['2018/45'];	$valueLinierRegionCENTRAL46 = $dataLinierRegionCENTRAL['2018/46'];	$valueLinierRegionCENTRAL47 = $dataLinierRegionCENTRAL['2018/47'];	$valueLinierRegionCENTRAL48 = $dataLinierRegionCENTRAL['2018/48'];	$valueLinierRegionCENTRAL49 = $dataLinierRegionCENTRAL['2018/49'];	$valueLinierRegionCENTRAL50 = $dataLinierRegionCENTRAL['2018/50'];	$valueLinierRegionCENTRAL51 = $dataLinierRegionCENTRAL['2018/51'];	$valueLinierRegionCENTRAL52 = $dataLinierRegionCENTRAL['2018/52']; $valueLinierRegionCENTRAL1_2019 = $dataLinierRegionCENTRAL['2019/1'];	$valueLinierRegionCENTRAL2_2019 = $dataLinierRegionCENTRAL['2019/2'];	$valueLinierRegionCENTRAL3_2019 = $dataLinierRegionCENTRAL['2019/3'];	$valueLinierRegionCENTRAL4_2019 = $dataLinierRegionCENTRAL['2019/4'];	$valueLinierRegionCENTRAL5_2019 = $dataLinierRegionCENTRAL['2019/5'];	$valueLinierRegionCENTRAL6_2019 = $dataLinierRegionCENTRAL['2019/6'];	$valueLinierRegionCENTRAL7_2019 = $dataLinierRegionCENTRAL['2019/7'];	$valueLinierRegionCENTRAL8_2019 = $dataLinierRegionCENTRAL['2019/8'];	$valueLinierRegionCENTRAL9_2019 = $dataLinierRegionCENTRAL['2019/9'];	$valueLinierRegionCENTRAL10_2019 = $dataLinierRegionCENTRAL['2019/10'];	$valueLinierRegionCENTRAL11_2019 = $dataLinierRegionCENTRAL['2019/11'];	$valueLinierRegionCENTRAL12_2019 = $dataLinierRegionCENTRAL['2019/12'];

$queryExponentialRegionCENTRALExponential = "
SELECT [Forecasting]
      ,[Region]
      ,[2018/1]
      ,[2018/2]
      ,[2018/3]
      ,[2018/4]
      ,[2018/5]
      ,[2018/6]
      ,[2018/7]
      ,[2018/8]
      ,[2018/9]
      ,[2018/10]
      ,[2018/11]
      ,[2018/12]
      ,[2018/13]
      ,[2018/14]
      ,[2018/15]
      ,[2018/16]
      ,[2018/17]
      ,[2018/18]
      ,[2018/19]
      ,[2018/20]
      ,[2018/21]
      ,[2018/22]
      ,[2018/23]
      ,[2018/24]
      ,[2018/25]
      ,[2018/26]
      ,[2018/27]
      ,[2018/28]
      ,[2018/29]
      ,[2018/30]
      ,[2018/31]
      ,[2018/32]
      ,[2018/33]
      ,[2018/34]
      ,[2018/35]
      ,[2018/36]
      ,[2018/37]
      ,[2018/38]
      ,[2018/39]
      ,[2018/40]
      ,[2018/41]
      ,[2018/42]
      ,[2018/43]
      ,[2018/44]
      ,[2018/45]
      ,[2018/46]
      ,[2018/47]
      ,[2018/48]
      ,[2018/49]
      ,[2018/50]
      ,[2018/51]
      ,[2018/52]
      ,[2019/1]
      ,[2019/2]
      ,[2019/3]
      ,[2019/4]
      ,[2019/5]
      ,[2019/6]
      ,[2019/7]
      ,[2019/8]
      ,[2019/9]
      ,[2019/10]
      ,[2019/11]
      ,[2019/12]
  FROM [WebDashboard].[dbo].[Value_Forecast_Region]
  where [Forecasting] = 'Exponential' AND [Region] = 'CENTRAL' 
  ";
  $resultExponentialRegionCENTRAL = sqlsrv_query($conn, $queryExponentialRegionCENTRALExponential, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
  $dataExponentialRegionCENTRAL = sqlsrv_fetch_array($resultExponentialRegionCENTRAL);
  $valueExponential1 = $dataExponentialRegionCENTRAL['2018/1'];	$valueExponential2 = $dataExponentialRegionCENTRAL['2018/2'];	$valueExponential3 = $dataExponentialRegionCENTRAL['2018/3'];	$valueExponential4 = $dataExponentialRegionCENTRAL['2018/4'];	$valueExponential5 = $dataExponentialRegionCENTRAL['2018/5'];	$valueExponential6 = $dataExponentialRegionCENTRAL['2018/6'];	$valueExponential7 = $dataExponentialRegionCENTRAL['2018/7'];	$valueExponential8 = $dataExponentialRegionCENTRAL['2018/8'];	$valueExponential9 = $dataExponentialRegionCENTRAL['2018/9'];	$valueExponential10 = $dataExponentialRegionCENTRAL['2018/10'];	$valueExponential11 = $dataExponentialRegionCENTRAL['2018/11'];	$valueExponential12 = $dataExponentialRegionCENTRAL['2018/12'];	$valueExponential13 = $dataExponentialRegionCENTRAL['2018/13'];	$valueExponential14 = $dataExponentialRegionCENTRAL['2018/14'];	$valueExponential15 = $dataExponentialRegionCENTRAL['2018/15'];	$valueExponential16 = $dataExponentialRegionCENTRAL['2018/16'];	$valueExponential17 = $dataExponentialRegionCENTRAL['2018/17'];	$valueExponential18 = $dataExponentialRegionCENTRAL['2018/18'];	$valueExponential19 = $dataExponentialRegionCENTRAL['2018/19'];	$valueExponential20 = $dataExponentialRegionCENTRAL['2018/20'];	$valueExponential21 = $dataExponentialRegionCENTRAL['2018/21'];	$valueExponential22 = $dataExponentialRegionCENTRAL['2018/22'];	$valueExponential23 = $dataExponentialRegionCENTRAL['2018/23'];	$valueExponential24 = $dataExponentialRegionCENTRAL['2018/24'];	$valueExponential25 = $dataExponentialRegionCENTRAL['2018/25'];	$valueExponential26 = $dataExponentialRegionCENTRAL['2018/26'];	$valueExponential27 = $dataExponentialRegionCENTRAL['2018/27'];	$valueExponential28 = $dataExponentialRegionCENTRAL['2018/28'];	$valueExponential29 = $dataExponentialRegionCENTRAL['2018/29'];	$valueExponential30 = $dataExponentialRegionCENTRAL['2018/30'];	$valueExponential31 = $dataExponentialRegionCENTRAL['2018/31'];	$valueExponential32 = $dataExponentialRegionCENTRAL['2018/32'];	$valueExponential33 = $dataExponentialRegionCENTRAL['2018/33'];	$valueExponential34 = $dataExponentialRegionCENTRAL['2018/34'];	$valueExponential35 = $dataExponentialRegionCENTRAL['2018/35'];	$valueExponential36 = $dataExponentialRegionCENTRAL['2018/36'];	$valueExponential37 = $dataExponentialRegionCENTRAL['2018/37'];	$valueExponential38 = $dataExponentialRegionCENTRAL['2018/38'];	$valueExponential39 = $dataExponentialRegionCENTRAL['2018/39'];	$valueExponential40 = $dataExponentialRegionCENTRAL['2018/40'];	$valueExponential41 = $dataExponentialRegionCENTRAL['2018/41'];	$valueExponential42 = $dataExponentialRegionCENTRAL['2018/42'];	$valueExponential43 = $dataExponentialRegionCENTRAL['2018/43'];	$valueExponential44 = $dataExponentialRegionCENTRAL['2018/44'];	$valueExponential45 = $dataExponentialRegionCENTRAL['2018/45'];	$valueExponential46 = $dataExponentialRegionCENTRAL['2018/46'];	$valueExponential47 = $dataExponentialRegionCENTRAL['2018/47'];	$valueExponential48 = $dataExponentialRegionCENTRAL['2018/48'];	$valueExponential49 = $dataExponentialRegionCENTRAL['2018/49'];	$valueExponential50 = $dataExponentialRegionCENTRAL['2018/50'];	$valueExponential51 = $dataExponentialRegionCENTRAL['2018/51'];	$valueExponential52 = $dataExponentialRegionCENTRAL['2018/52']; $valueExponential1_2019 = $dataExponentialRegionCENTRAL['2019/1'];	$valueExponential2_2019 = $dataExponentialRegionCENTRAL['2019/2'];	$valueExponential3_2019 = $dataExponentialRegionCENTRAL['2019/3'];	$valueExponential4_2019 = $dataExponentialRegionCENTRAL['2019/4'];	$valueExponential5_2019 = $dataExponentialRegionCENTRAL['2019/5'];	$valueExponential6_2019 = $dataExponentialRegionCENTRAL['2019/6'];	$valueExponential7_2019 = $dataExponentialRegionCENTRAL['2019/7'];	$valueExponential8_2019 = $dataExponentialRegionCENTRAL['2019/8'];	$valueExponential9_2019 = $dataExponentialRegionCENTRAL['2019/9'];	$valueExponential10_2019 = $dataExponentialRegionCENTRAL['2019/10'];	$valueExponential11_2019 = $dataExponentialRegionCENTRAL['2019/11'];	$valueExponential12_2019 = $dataExponentialRegionCENTRAL['2019/12'];

?>
<script type="text/javascript">
	$(function () {
            console.log('ready ', Highcharts.version);
            Highcharts.chart('LinierREGION', {
                xAxis: [
                    {
					plotLines: [{
						color: '#FF0000',
						width: 1,
						value: 34
					}],categories: ['2018 / 1 ',	'2018 / 2 ',	'2018 / 3 ',	'2018 / 4 ',	'2018 / 5 ',	'2018 / 6 ',	'2018 / 7 ',	'2018 / 8 ',	'2018 / 9 ',	'2018 / 10',	'2018 / 11',	'2018 / 12',	'2018 / 13',	'2018 / 14',	'2018 / 15',	'2018 / 16',	'2018 / 17',	'2018 / 18',	'2018 / 19',	'2018 / 20',	'2018 / 21',	'2018 / 22',	'2018 / 23',	'2018 / 24',	'2018 / 25',	'2018 / 26',	'2018 / 27',	'2018 / 28',	'2018 / 29',	'2018 / 30',	'2018 / 31',	'2018 / 32',	'2018 / 33',	'2018 / 34',	'2018 / 35',	'2018 / 36',	'2018 / 37',	'2018 / 38',	'2018 / 39',	'2018 / 40',	'2018 / 41',	'2018 / 42',	'2018 / 43',	'2018 / 44',	'2018 / 45',	'2018 / 46',	'2018 / 47',	'2018 / 48',	'2018 / 49',	'2018 / 50',	'2018 / 51',	'2018 / 52',	'2019 /1 ',	'2019 /2 ',	'2019 /3 ',	'2019 /4 ',	'2019 /5 ',	'2019 /6 ',	'2019 /7 ',	'2019 /8 ',	'2019 /9 ',	'2019 /10',	'2019 /11',	'2019 /12'],
                    title :{
                    	text : 'Year / Week'
                    }},
                ],

                title: {
                    text: 'Payload Trendlines Region - Linier'
                },

                series: [{
                	name : ['CENTRAL'],
			        keys: ['y'],
			        data: [[<?php echo $valueLinierRegionCENTRAL1 ;?>], 	[<?php echo $valueLinierRegionCENTRAL2 ;?>], 	[<?php echo $valueLinierRegionCENTRAL3 ;?>], 	[<?php echo $valueLinierRegionCENTRAL4 ;?>], 	[<?php echo $valueLinierRegionCENTRAL5 ;?>], 	[<?php echo $valueLinierRegionCENTRAL6 ;?>], 	[<?php echo $valueLinierRegionCENTRAL7 ;?>], 	[<?php echo $valueLinierRegionCENTRAL8 ;?>], 	[<?php echo $valueLinierRegionCENTRAL9 ;?>], 	[<?php echo $valueLinierRegionCENTRAL10 ;?>],	[<?php echo $valueLinierRegionCENTRAL11 ;?>],	[<?php echo $valueLinierRegionCENTRAL12 ;?>],	[<?php echo $valueLinierRegionCENTRAL13 ;?>],	[<?php echo $valueLinierRegionCENTRAL14 ;?>],	[<?php echo $valueLinierRegionCENTRAL15 ;?>],	[<?php echo $valueLinierRegionCENTRAL16 ;?>],	[<?php echo $valueLinierRegionCENTRAL17 ;?>],	[<?php echo $valueLinierRegionCENTRAL18 ;?>],	[<?php echo $valueLinierRegionCENTRAL19 ;?>],	[<?php echo $valueLinierRegionCENTRAL20 ;?>],	[<?php echo $valueLinierRegionCENTRAL21 ;?>],	[<?php echo $valueLinierRegionCENTRAL22 ;?>],	[<?php echo $valueLinierRegionCENTRAL23 ;?>],	[<?php echo $valueLinierRegionCENTRAL24 ;?>],	[<?php echo $valueLinierRegionCENTRAL25 ;?>],	[<?php echo $valueLinierRegionCENTRAL26 ;?>],	[<?php echo $valueLinierRegionCENTRAL27 ;?>],	[<?php echo $valueLinierRegionCENTRAL28 ;?>],	[<?php echo $valueLinierRegionCENTRAL29 ;?>],	[<?php echo $valueLinierRegionCENTRAL30 ;?>],	[<?php echo $valueLinierRegionCENTRAL31 ;?>],	[<?php echo $valueLinierRegionCENTRAL32 ;?>],	[<?php echo $valueLinierRegionCENTRAL33 ;?>],	[<?php echo $valueLinierRegionCENTRAL34 ;?>],	[<?php echo $valueLinierRegionCENTRAL35 ;?>],	[<?php echo $valueLinierRegionCENTRAL36 ;?>],	[<?php echo $valueLinierRegionCENTRAL37 ;?>],	[<?php echo $valueLinierRegionCENTRAL38 ;?>],	[<?php echo $valueLinierRegionCENTRAL39 ;?>],	[<?php echo $valueLinierRegionCENTRAL40 ;?>],	[<?php echo $valueLinierRegionCENTRAL41 ;?>],	[<?php echo $valueLinierRegionCENTRAL42 ;?>],	[<?php echo $valueLinierRegionCENTRAL43 ;?>],	[<?php echo $valueLinierRegionCENTRAL44 ;?>],	[<?php echo $valueLinierRegionCENTRAL45 ;?>],	[<?php echo $valueLinierRegionCENTRAL46 ;?>],	[<?php echo $valueLinierRegionCENTRAL47 ;?>],	[<?php echo $valueLinierRegionCENTRAL48 ;?>],	[<?php echo $valueLinierRegionCENTRAL49 ;?>],	[<?php echo $valueLinierRegionCENTRAL50 ;?>],	[<?php echo $valueLinierRegionCENTRAL51 ;?>],	[<?php echo $valueLinierRegionCENTRAL52 ;?>],	[<?php echo $valueLinierRegionCENTRAL1_2019 ;?>], 	[<?php echo $valueLinierRegionCENTRAL2_2019 ;?>], 	[<?php echo $valueLinierRegionCENTRAL3_2019 ;?>], 	[<?php echo $valueLinierRegionCENTRAL4_2019 ;?>], 	[<?php echo $valueLinierRegionCENTRAL5_2019 ;?>], 	[<?php echo $valueLinierRegionCENTRAL6_2019 ;?>], 	[<?php echo $valueLinierRegionCENTRAL7_2019 ;?>], 	[<?php echo $valueLinierRegionCENTRAL8_2019 ;?>], 	[<?php echo $valueLinierRegionCENTRAL9_2019 ;?>], 	[<?php echo $valueLinierRegionCENTRAL10_2019 ;?>],	[<?php echo $valueLinierRegionCENTRAL11_2019 ;?>],	[<?php echo $valueLinierRegionCENTRAL12_2019 ;?>],],
			zoneAxis: 'x',
			zones: [{
				value: 34
			}, {
				dashStyle: 'shortdot'
			}]
			    },
			    {
			    	name: ['Total'],
			        keys: ['y'],
			        data: [[<?php echo $valueLinierRegionCENTRAL1 ;?>], 	[<?php echo $valueLinierRegionCENTRAL2 ;?>], 	[<?php echo $valueLinierRegionCENTRAL3 ;?>], 	[<?php echo $valueLinierRegionCENTRAL4 ;?>], 	[<?php echo $valueLinierRegionCENTRAL5 ;?>], 	[<?php echo $valueLinierRegionCENTRAL6 ;?>], 	[<?php echo $valueLinierRegionCENTRAL7 ;?>], 	[<?php echo $valueLinierRegionCENTRAL8 ;?>], 	[<?php echo $valueLinierRegionCENTRAL9 ;?>], 	[<?php echo $valueLinierRegionCENTRAL10 ;?>],	[<?php echo $valueLinierRegionCENTRAL11 ;?>],	[<?php echo $valueLinierRegionCENTRAL12 ;?>],	[<?php echo $valueLinierRegionCENTRAL13 ;?>],	[<?php echo $valueLinierRegionCENTRAL14 ;?>],	[<?php echo $valueLinierRegionCENTRAL15 ;?>],	[<?php echo $valueLinierRegionCENTRAL16 ;?>],	[<?php echo $valueLinierRegionCENTRAL17 ;?>],	[<?php echo $valueLinierRegionCENTRAL18 ;?>],	[<?php echo $valueLinierRegionCENTRAL19 ;?>],	[<?php echo $valueLinierRegionCENTRAL20 ;?>],	[<?php echo $valueLinierRegionCENTRAL21 ;?>],	[<?php echo $valueLinierRegionCENTRAL22 ;?>],	[<?php echo $valueLinierRegionCENTRAL23 ;?>],	[<?php echo $valueLinierRegionCENTRAL24 ;?>],	[<?php echo $valueLinierRegionCENTRAL25 ;?>],	[<?php echo $valueLinierRegionCENTRAL26 ;?>],	[<?php echo $valueLinierRegionCENTRAL27 ;?>],	[<?php echo $valueLinierRegionCENTRAL28 ;?>],	[<?php echo $valueLinierRegionCENTRAL29 ;?>],	[<?php echo $valueLinierRegionCENTRAL30 ;?>],	[<?php echo $valueLinierRegionCENTRAL31 ;?>],	[<?php echo $valueLinierRegionCENTRAL32 ;?>],	[<?php echo $valueLinierRegionCENTRAL33 ;?>],	[<?php echo $valueLinierRegionCENTRAL34 ;?>],	[<?php echo $valueLinierRegionCENTRAL35 ;?>],,
]
			    }],
			    

			    tooltip: {
			        enabled: true
			    },

			    annotations: [{
			    	visible: false,
			        labels: [{
			            point: 'safe',
			            format: '-'
			        }, {
			            point: 'need upgrade',
			            text: 'need upgrade'
			        }]
			    }]
            });
        }
    )
</script>



<script type="text/javascript">
  $(function () {
            console.log('ready ', Highcharts.version);
            Highcharts.chart('ExponentialREGION', {
                xAxis: [
                    {
				    plotLines: [{
                            color: '#FF0000',
                            width: 1,
                            value: 34
                        }],
					categories: ['2018 / 1 ',  '2018 / 2 ',  '2018 / 3 ',  '2018 / 4 ',  '2018 / 5 ',  '2018 / 6 ',  '2018 / 7 ',  '2018 / 8 ',  '2018 / 9 ',  '2018 / 10',  '2018 / 11',  '2018 / 12',  '2018 / 13',  '2018 / 14',  '2018 / 15',  '2018 / 16',  '2018 / 17',  '2018 / 18',  '2018 / 19',  '2018 / 20',  '2018 / 21',  '2018 / 22',  '2018 / 23',  '2018 / 24',  '2018 / 25',  '2018 / 26',  '2018 / 27',  '2018 / 28',  '2018 / 29',  '2018 / 30',  '2018 / 31',  '2018 / 32',  '2018 / 33',  '2018 / 34',  '2018 / 35',  '2018 / 36',  '2018 / 37',  '2018 / 38',  '2018 / 39',  '2018 / 40',  '2018 / 41',  '2018 / 42',  '2018 / 43',  '2018 / 44',  '2018 / 45',  '2018 / 46',  '2018 / 47',  '2018 / 48',  '2018 / 49',  '2018 / 50',  '2018 / 51',  '2018 / 52',  '2019 /1 ', '2019 /2 ', '2019 /3 ', '2019 /4 ', '2019 /5 ', '2019 /6 ', '2019 /7 ', '2019 /8 ', '2019 /9 ', '2019 /10', '2019 /11', '2019 /12'],
                    title :{
                      text : 'Year / Week'
                    }},
                ],

                title: {
                    text: 'Payload Trendlines Region - Exponential'
                },

                series: [
          {
		    name : ['CENTRAL'],
		    keys: ['y'],
		    data: [[<?php echo $valueExponential1 ;?>],   [<?php echo $valueExponential2 ;?>],  [<?php echo $valueExponential3 ;?>],  [<?php echo $valueExponential4 ;?>],  [<?php echo $valueExponential5 ;?>],  [<?php echo $valueExponential6 ;?>],  [<?php echo $valueExponential7 ;?>],  [<?php echo $valueExponential8 ;?>],  [<?php echo $valueExponential9 ;?>],  [<?php echo $valueExponential10 ;?>], [<?php echo $valueExponential11 ;?>], [<?php echo $valueExponential12 ;?>], [<?php echo $valueExponential13 ;?>], [<?php echo $valueExponential14 ;?>], [<?php echo $valueExponential15 ;?>], [<?php echo $valueExponential16 ;?>], [<?php echo $valueExponential17 ;?>], [<?php echo $valueExponential18 ;?>], [<?php echo $valueExponential19 ;?>], [<?php echo $valueExponential20 ;?>], [<?php echo $valueExponential21 ;?>], [<?php echo $valueExponential22 ;?>], [<?php echo $valueExponential23 ;?>], [<?php echo $valueExponential24 ;?>], [<?php echo $valueExponential25 ;?>], [<?php echo $valueExponential26 ;?>], [<?php echo $valueExponential27 ;?>], [<?php echo $valueExponential28 ;?>], [<?php echo $valueExponential29 ;?>], [<?php echo $valueExponential30 ;?>], [<?php echo $valueExponential31 ;?>], [<?php echo $valueExponential32 ;?>], [<?php echo $valueExponential33 ;?>], [<?php echo $valueExponential34 ;?>], [<?php echo $valueExponential35 ;?>], [<?php echo $valueExponential36 ;?>], [<?php echo $valueExponential37 ;?>], [<?php echo $valueExponential38 ;?>], [<?php echo $valueExponential39 ;?>], [<?php echo $valueExponential40 ;?>], [<?php echo $valueExponential41 ;?>], [<?php echo $valueExponential42 ;?>], [<?php echo $valueExponential43 ;?>], [<?php echo $valueExponential44 ;?>], [<?php echo $valueExponential45 ;?>], [<?php echo $valueExponential46 ;?>], [<?php echo $valueExponential47 ;?>], [<?php echo $valueExponential48 ;?>], [<?php echo $valueExponential49 ;?>], [<?php echo $valueExponential50 ;?>], [<?php echo $valueExponential51 ;?>], [<?php echo $valueExponential52 ;?>], [<?php echo $valueExponential1_2019 ;?>],   [<?php echo $valueExponential2_2019 ;?>],   [<?php echo $valueExponential3_2019 ;?>],   [<?php echo $valueExponential4_2019 ;?>],   [<?php echo $valueExponential5_2019 ;?>],   [<?php echo $valueExponential6_2019 ;?>],   [<?php echo $valueExponential7_2019 ;?>],   [<?php echo $valueExponential8_2019 ;?>],   [<?php echo $valueExponential9_2019 ;?>],   [<?php echo $valueExponential10_2019 ;?>],  [<?php echo $valueExponential11_2019 ;?>],  [<?php echo $valueExponential12_2019 ;?>],
				],
			zoneAxis: 'x',
			zones: [{
				value: 34
			}, {
				dashStyle: 'shortdot'
			}]
          },
        {
		      name: ['Total'],
              keys: ['y'],
              data: [[<?php echo $valueExponential1 ;?>],   [<?php echo $valueExponential2 ;?>],  [<?php echo $valueExponential3 ;?>],  [<?php echo $valueExponential4 ;?>],  [<?php echo $valueExponential5 ;?>],  [<?php echo $valueExponential6 ;?>],  [<?php echo $valueExponential7 ;?>],  [<?php echo $valueExponential8 ;?>],  [<?php echo $valueExponential9 ;?>],  [<?php echo $valueExponential10 ;?>], [<?php echo $valueExponential11 ;?>], [<?php echo $valueExponential12 ;?>], [<?php echo $valueExponential13 ;?>], [<?php echo $valueExponential14 ;?>], [<?php echo $valueExponential15 ;?>], [<?php echo $valueExponential16 ;?>], [<?php echo $valueExponential17 ;?>], [<?php echo $valueExponential18 ;?>], [<?php echo $valueExponential19 ;?>], [<?php echo $valueExponential20 ;?>], [<?php echo $valueExponential21 ;?>], [<?php echo $valueExponential22 ;?>], [<?php echo $valueExponential23 ;?>], [<?php echo $valueExponential24 ;?>], [<?php echo $valueExponential25 ;?>], [<?php echo $valueExponential26 ;?>], [<?php echo $valueExponential27 ;?>], [<?php echo $valueExponential28 ;?>], [<?php echo $valueExponential29 ;?>], [<?php echo $valueExponential30 ;?>], [<?php echo $valueExponential31 ;?>], [<?php echo $valueExponential32 ;?>], [<?php echo $valueExponential33 ;?>], [<?php echo $valueExponential34 ;?>], [<?php echo $valueExponential35 ;?>],
    ]
          }],
          tooltip: {
              enabled: true
          },

          annotations: [{
            visible: false,
              labels: [{
                  point: 'safe',
                  format: '-'
              }, {
                  point: 'need upgrade',
                  text: 'need upgrade'
              }]
          }]
            });
        }
    )
</script>
<?php
include 'footer.php';
?>