<?php
include 'header.php';
ini_set('max_execution_time', 0);
ini_set('memory_limit', '1024M');
ini_set("display_errors","Off");
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
<style type="text/css">
#container {
	max-width: 800px;
	margin: 0 auto;
}
/*load all data*/
</style>
<!-- EXPERIMEN 1 -->
<!-- Forms-4 -->
<div class="outer-w3-agile mt-3">
    <h4 class="tittle-w3-agileits mb-4">Payload Trendlines by TowerId</h4>
        <div class="row validform">
            <div class="col-md-4 order-md-1 validform2">
				<form action="#" method="post" class="card p-2">
                    <div class="input-group">
						<input type="text" class="form-control" id="ti" name="ti" placeholder="Tower Id" required="">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Show</button>
                        </div>
                    </div>
                </form>
            </div>
			<div class="col-md-8 order-md-2 mb-4 validform1">
                <table class="table">
					<thead>
						<tr>
							<th scope="col">TowerId</th>
							<th scope="col">CellName</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php
								$tower = $_POST['ti'];
								$queryshowtower = "SELECT distinct
								[CellName]
								,[TowerId]
								FROM [WebDashboard].[dbo].[Value_Forecast]
								where [TowerId] ='$tower' ";
								$resultquerytower = sqlsrv_query($conn, $queryshowtower, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
								while($dataresultquerytower = sqlsrv_fetch_array($resultquerytower))
									{ // Ambil semua data dari hasil eksekusi $sql 
										echo' 
											<tr>
												<td>'.$dataresultquerytower['TowerId'].'</td>
												<td>'.$dataresultquerytower['CellName'].'</td>
												<td>
													<a href="Payload.php?cn='.$dataresultquerytower['CellName'].'" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Payload Trendlines</a>
												</td>
											</tr>';
								 	}
							?>
						</tr>
					</tbody>
				</table>
            </div>
        </div>
</div>
<!--// Forms-4 -->
<!-- END EXPERIMEN 1 -->
<!-- table7 -->
<div class="outer-w3-agile mt-3">
	<div id="container"></div> <!-- CHART 1 -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Forecasting</th>
                        <th scope="col">System</th>
                        <th scope="col">CellName</th>
                        <th scope="col">eNodebId</th>
                        <th scope="col">TowerId</th>
                        <th scope="col">BW Mimo</th>
                        <th scope="col">Payload Capability</th>
                        <th scope="col">Region</th>
                        <th scope="col">Kabupaten</th>
                        <th scope="col">RecommendationQ12019</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Linier</th>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                    </tr>
                    <tr>
                        <th scope="row">Exponential</th>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
<!--// table7 -->
<?php
if(isset($_POST['cn'])){
	$cellname = $_POST['cn'];
}else {
	//
}
if(isset($_GET['cn'])){
	$cellname = $_GET['cn'];
}else {
	//
}
$queryLinier2018 = "
SELECT a.[CellName]
      ,a.[2018/1]  as [value1]
      ,a.[2018/2]  as [value2]
      ,a.[2018/3]  as [value3]
      ,a.[2018/4]  as [value4]
      ,a.[2018/5]  as [value5]
      ,a.[2018/6]  as [value6]
      ,a.[2018/7]  as [value7]
      ,a.[2018/8]  as [value8]
      ,a.[2018/9]  as [value9]
      ,a.[2018/10] as [value10]
      ,a.[2018/11] as [value11]
      ,a.[2018/12] as [value12]
      ,a.[2018/13] as [value13]
      ,a.[2018/14] as [value14]
      ,a.[2018/15] as [value15]
      ,a.[2018/16] as [value16]
      ,a.[2018/17] as [value17]
      ,a.[2018/18] as [value18]
      ,a.[2018/19] as [value19]
      ,a.[2018/20] as [value20]
      ,a.[2018/21] as [value21]
      ,a.[2018/22] as [value22]
      ,a.[2018/23] as [value23]
      ,a.[2018/24] as [value24]
      ,a.[2018/25] as [value25]
      ,a.[2018/26] as [value26]
      ,a.[2018/27] as [value27]
      ,a.[2018/28] as [value28]
      ,a.[2018/29] as [value29]
      ,a.[2018/30] as [value30]
      ,a.[2018/31] as [value31]
      ,a.[2018/32] as [value32]
      ,a.[2018/33] as [value33]
      ,a.[2018/34] as [value34]
      ,a.[2018/35] as [value35]
      ,a.[2018/36] as [value36]
      ,a.[2018/37] as [value37]
      ,a.[2018/38] as [value38]
      ,a.[2018/39] as [value39]
      ,a.[2018/40] as [value40]
      ,a.[2018/41] as [value41]
      ,a.[2018/42] as [value42]
      ,a.[2018/43] as [value43]
      ,a.[2018/44] as [value44]
      ,a.[2018/45] as [value45]
      ,a.[2018/46] as [value46]
      ,a.[2018/47] as [value47]
      ,a.[2018/48] as [value48]
      ,a.[2018/49] as [value49]
      ,a.[2018/50] as [value50]
      ,a.[2018/51] as [value51]
      ,a.[2018/52] as [value52]
      ,a.[2019/1]  as [value1_2019]
      ,a.[2019/2]  as [value2_2019]
      ,a.[2019/3]  as [value3_2019]
      ,a.[2019/4]  as [value4_2019]
      ,a.[2019/5]  as [value5_2019]
      ,a.[2019/6]  as [value6_2019]
      ,a.[2019/7]  as [value7_2019]
      ,a.[2019/8]  as [value8_2019]
      ,a.[2019/9]  as [value9_2019]
      ,a.[2019/10] as [value10_2019]
      ,a.[2019/11] as [value11_2019]
      ,a.[2019/12] as [value12_2019]
	  ,b.[2018/1]  as [remark1]
      ,b.[2018/2]  as [remark2]
      ,b.[2018/3]  as [remark3]
      ,b.[2018/4]  as [remark4]
      ,b.[2018/5]  as [remark5]
      ,b.[2018/6]  as [remark6]
      ,b.[2018/7]  as [remark7]
      ,b.[2018/8]  as [remark8]
      ,b.[2018/9]  as [remark9]
      ,b.[2018/10] as [remark10]
      ,b.[2018/11] as [remark11]
      ,b.[2018/12] as [remark12]
      ,b.[2018/13] as [remark13]
      ,b.[2018/14] as [remark14]
      ,b.[2018/15] as [remark15]
      ,b.[2018/16] as [remark16]
      ,b.[2018/17] as [remark17]
      ,b.[2018/18] as [remark18]
      ,b.[2018/19] as [remark19]
      ,b.[2018/20] as [remark20]
      ,b.[2018/21] as [remark21]
      ,b.[2018/22] as [remark22]
      ,b.[2018/23] as [remark23]
      ,b.[2018/24] as [remark24]
      ,b.[2018/25] as [remark25]
      ,b.[2018/26] as [remark26]
      ,b.[2018/27] as [remark27]
      ,b.[2018/28] as [remark28]
      ,b.[2018/29] as [remark29]
      ,b.[2018/30] as [remark30]
      ,b.[2018/31] as [remark31]
      ,b.[2018/32] as [remark32]
      ,b.[2018/33] as [remark33]
      ,b.[2018/34] as [remark34]
      ,b.[2018/35] as [remark35]
      ,b.[2018/36] as [remark36]
      ,b.[2018/37] as [remark37]
      ,b.[2018/38] as [remark38]
      ,b.[2018/39] as [remark39]
      ,b.[2018/40] as [remark40]
      ,b.[2018/41] as [remark41]
      ,b.[2018/42] as [remark42]
      ,b.[2018/43] as [remark43]
      ,b.[2018/44] as [remark44]
      ,b.[2018/45] as [remark45]
      ,b.[2018/46] as [remark46]
      ,b.[2018/47] as [remark47]
      ,b.[2018/48] as [remark48]
      ,b.[2018/49] as [remark49]
      ,b.[2018/50] as [remark50]
      ,b.[2018/51] as [remark51]
      ,b.[2018/52] as [remark52]
	  ,b.[2019/1]  as [remark1_2019]
      ,b.[2019/2]  as [remark2_2019]
      ,b.[2019/3]  as [remark3_2019]
      ,b.[2019/4]  as [remark4_2019]
      ,b.[2019/5]  as [remark5_2019]
      ,b.[2019/6]  as [remark6_2019]
      ,b.[2019/7]  as [remark7_2019]
      ,b.[2019/8]  as [remark8_2019]
      ,b.[2019/9]  as [remark9_2019]
      ,b.[2019/10] as [remark10_2019]
      ,b.[2019/11] as [remark11_2019]
      ,b.[2019/12] as [remark12_2019]
  FROM [WebDashboard].[dbo].[Value_Forecast] a
  inner join [WebDashboard].[dbo].[Remark_Forecast] b
  on a.[CellName]=b.[CellName] 
  where a.[CellName] = '$cellname' and a.[Forecasting] = 'Linier' and b.[Forecasting] = 'Linier' ";
  $result = sqlsrv_query($conn, $queryLinier2018, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
  $data = sqlsrv_fetch_array($result);
  $value1 = $data['value1'];$remark1 = $data['remark1'];	$value2 = $data['value2'];$remark2 = $data['remark2'];	$value3 = $data['value3'];$remark3 = $data['remark3'];	$value4 = $data['value4'];$remark4 = $data['remark4'];	$value5 = $data['value5'];$remark5 = $data['remark5'];	$value6 = $data['value6'];$remark6 = $data['remark6'];	$value7 = $data['value7'];$remark7 = $data['remark7'];	$value8 = $data['value8'];$remark8 = $data['remark8'];	$value9 = $data['value9'];$remark9 = $data['remark9'];	$value10 = $data['value10'];$remark10 = $data['remark10'];	$value11 = $data['value11'];$remark11 = $data['remark11'];	$value12 = $data['value12'];$remark12 = $data['remark12'];	$value13 = $data['value13'];$remark13 = $data['remark13'];	$value14 = $data['value14'];$remark14 = $data['remark14'];	$value15 = $data['value15'];$remark15 = $data['remark15'];	$value16 = $data['value16'];$remark16 = $data['remark16'];	$value17 = $data['value17'];$remark17 = $data['remark17'];	$value18 = $data['value18'];$remark18 = $data['remark18'];	$value19 = $data['value19'];$remark19 = $data['remark19'];	$value20 = $data['value20'];$remark20 = $data['remark20'];	$value21 = $data['value21'];$remark21 = $data['remark21'];	$value22 = $data['value22'];$remark22 = $data['remark22'];	$value23 = $data['value23'];$remark23 = $data['remark23'];	$value24 = $data['value24'];$remark24 = $data['remark24'];	$value25 = $data['value25'];$remark25 = $data['remark25'];	$value26 = $data['value26'];$remark26 = $data['remark26'];	$value27 = $data['value27'];$remark27 = $data['remark27'];	$value28 = $data['value28'];$remark28 = $data['remark28'];	$value29 = $data['value29'];$remark29 = $data['remark29'];	$value30 = $data['value30'];$remark30 = $data['remark30'];	$value31 = $data['value31'];$remark31 = $data['remark31'];	$value32 = $data['value32'];$remark32 = $data['remark32'];	$value33 = $data['value33'];$remark33 = $data['remark33'];	$value34 = $data['value34'];$remark34 = $data['remark34'];	$value35 = $data['value35'];$remark35 = $data['remark35'];	$value36 = $data['value36'];$remark36 = $data['remark36'];	$value37 = $data['value37'];$remark37 = $data['remark37'];	$value38 = $data['value38'];$remark38 = $data['remark38'];	$value39 = $data['value39'];$remark39 = $data['remark39'];	$value40 = $data['value40'];$remark40 = $data['remark40'];	$value41 = $data['value41'];$remark41 = $data['remark41'];	$value42 = $data['value42'];$remark42 = $data['remark42'];	$value43 = $data['value43'];$remark43 = $data['remark43'];	$value44 = $data['value44'];$remark44 = $data['remark44'];	$value45 = $data['value45'];$remark45 = $data['remark45'];	$value46 = $data['value46'];$remark46 = $data['remark46'];	$value47 = $data['value47'];$remark47 = $data['remark47'];	$value48 = $data['value48'];$remark48 = $data['remark48'];	$value49 = $data['value49'];$remark49 = $data['remark49'];	$value50 = $data['value50'];$remark50 = $data['remark50'];	$value51 = $data['value51'];$remark51 = $data['remark51'];	$value52 = $data['value52'];$remark52 = $data['remark52'];$value1_2019 = $data['value1_2019'];$remark1_2019 = $data['remark1_2019'];	$value2_2019 = $data['value2_2019'];$remark2_2019 = $data['remark2_2019'];	$value3_2019 = $data['value3_2019'];$remark3_2019 = $data['remark3_2019'];	$value4_2019 = $data['value4_2019'];$remark4_2019 = $data['remark4_2019'];	$value5_2019 = $data['value5_2019'];$remark5_2019 = $data['remark5_2019'];	$value6_2019 = $data['value6_2019'];$remark6_2019 = $data['remark6_2019'];	$value7_2019 = $data['value7_2019'];$remark7_2019 = $data['remark7_2019'];	$value8_2019 = $data['value8_2019'];$remark8_2019 = $data['remark8_2019'];	$value9_2019 = $data['value9_2019'];$remark9_2019 = $data['remark9_2019'];	$value10_2019 = $data['value10_2019'];$remark10_2019 = $data['remark10_2019'];	$value11_2019 = $data['value11_2019'];$remark11_2019 = $data['remark11_2019'];	$value12_2019 = $data['value12_2019'];$remark12_2019 = $data['remark12_2019'];

  	$queryExponential2018 = "
SELECT a.[CellName]
      ,a.[2018/1]  as [valueEx1]
      ,a.[2018/2]  as [valueEx2]
      ,a.[2018/3]  as [valueEx3]
      ,a.[2018/4]  as [valueEx4]
      ,a.[2018/5]  as [valueEx5]
      ,a.[2018/6]  as [valueEx6]
      ,a.[2018/7]  as [valueEx7]
      ,a.[2018/8]  as [valueEx8]
      ,a.[2018/9]  as [valueEx9]
      ,a.[2018/10] as [valueEx10]
      ,a.[2018/11] as [valueEx11]
      ,a.[2018/12] as [valueEx12]
      ,a.[2018/13] as [valueEx13]
      ,a.[2018/14] as [valueEx14]
      ,a.[2018/15] as [valueEx15]
      ,a.[2018/16] as [valueEx16]
      ,a.[2018/17] as [valueEx17]
      ,a.[2018/18] as [valueEx18]
      ,a.[2018/19] as [valueEx19]
      ,a.[2018/20] as [valueEx20]
      ,a.[2018/21] as [valueEx21]
      ,a.[2018/22] as [valueEx22]
      ,a.[2018/23] as [valueEx23]
      ,a.[2018/24] as [valueEx24]
      ,a.[2018/25] as [valueEx25]
      ,a.[2018/26] as [valueEx26]
      ,a.[2018/27] as [valueEx27]
      ,a.[2018/28] as [valueEx28]
      ,a.[2018/29] as [valueEx29]
      ,a.[2018/30] as [valueEx30]
      ,a.[2018/31] as [valueEx31]
      ,a.[2018/32] as [valueEx32]
      ,a.[2018/33] as [valueEx33]
      ,a.[2018/34] as [valueEx34]
      ,a.[2018/35] as [valueEx35]
      ,a.[2018/36] as [valueEx36]
      ,a.[2018/37] as [valueEx37]
      ,a.[2018/38] as [valueEx38]
      ,a.[2018/39] as [valueEx39]
      ,a.[2018/40] as [valueEx40]
      ,a.[2018/41] as [valueEx41]
      ,a.[2018/42] as [valueEx42]
      ,a.[2018/43] as [valueEx43]
      ,a.[2018/44] as [valueEx44]
      ,a.[2018/45] as [valueEx45]
      ,a.[2018/46] as [valueEx46]
      ,a.[2018/47] as [valueEx47]
      ,a.[2018/48] as [valueEx48]
      ,a.[2018/49] as [valueEx49]
      ,a.[2018/50] as [valueEx50]
      ,a.[2018/51] as [valueEx51]
      ,a.[2018/52] as [valueEx52]
      ,a.[2019/1]  as [valueEx1_2019]
      ,a.[2019/2]  as [valueEx2_2019]
      ,a.[2019/3]  as [valueEx3_2019]
      ,a.[2019/4]  as [valueEx4_2019]
      ,a.[2019/5]  as [valueEx5_2019]
      ,a.[2019/6]  as [valueEx6_2019]
      ,a.[2019/7]  as [valueEx7_2019]
      ,a.[2019/8]  as [valueEx8_2019]
      ,a.[2019/9]  as [valueEx9_2019]
      ,a.[2019/10] as [valueEx10_2019]
      ,a.[2019/11] as [valueEx11_2019]
      ,a.[2019/12] as [valueEx12_2019]
	  ,b.[2018/1]  as [remarkEx1]
      ,b.[2018/2]  as [remarkEx2]
      ,b.[2018/3]  as [remarkEx3]
      ,b.[2018/4]  as [remarkEx4]
      ,b.[2018/5]  as [remarkEx5]
      ,b.[2018/6]  as [remarkEx6]
      ,b.[2018/7]  as [remarkEx7]
      ,b.[2018/8]  as [remarkEx8]
      ,b.[2018/9]  as [remarkEx9]
      ,b.[2018/10] as [remarkEx10]
      ,b.[2018/11] as [remarkEx11]
      ,b.[2018/12] as [remarkEx12]
      ,b.[2018/13] as [remarkEx13]
      ,b.[2018/14] as [remarkEx14]
      ,b.[2018/15] as [remarkEx15]
      ,b.[2018/16] as [remarkEx16]
      ,b.[2018/17] as [remarkEx17]
      ,b.[2018/18] as [remarkEx18]
      ,b.[2018/19] as [remarkEx19]
      ,b.[2018/20] as [remarkEx20]
      ,b.[2018/21] as [remarkEx21]
      ,b.[2018/22] as [remarkEx22]
      ,b.[2018/23] as [remarkEx23]
      ,b.[2018/24] as [remarkEx24]
      ,b.[2018/25] as [remarkEx25]
      ,b.[2018/26] as [remarkEx26]
      ,b.[2018/27] as [remarkEx27]
      ,b.[2018/28] as [remarkEx28]
      ,b.[2018/29] as [remarkEx29]
      ,b.[2018/30] as [remarkEx30]
      ,b.[2018/31] as [remarkEx31]
      ,b.[2018/32] as [remarkEx32]
      ,b.[2018/33] as [remarkEx33]
      ,b.[2018/34] as [remarkEx34]
      ,b.[2018/35] as [remarkEx35]
      ,b.[2018/36] as [remarkEx36]
      ,b.[2018/37] as [remarkEx37]
      ,b.[2018/38] as [remarkEx38]
      ,b.[2018/39] as [remarkEx39]
      ,b.[2018/40] as [remarkEx40]
      ,b.[2018/41] as [remarkEx41]
      ,b.[2018/42] as [remarkEx42]
      ,b.[2018/43] as [remarkEx43]
      ,b.[2018/44] as [remarkEx44]
      ,b.[2018/45] as [remarkEx45]
      ,b.[2018/46] as [remarkEx46]
      ,b.[2018/47] as [remarkEx47]
      ,b.[2018/48] as [remarkEx48]
      ,b.[2018/49] as [remarkEx49]
      ,b.[2018/50] as [remarkEx50]
      ,b.[2018/51] as [remarkEx51]
      ,b.[2018/52] as [remarkEx52]
	  ,b.[2019/1]  as [remarkEx1_2019]
      ,b.[2019/2]  as [remarkEx2_2019]
      ,b.[2019/3]  as [remarkEx3_2019]
      ,b.[2019/4]  as [remarkEx4_2019]
      ,b.[2019/5]  as [remarkEx5_2019]
      ,b.[2019/6]  as [remarkEx6_2019]
      ,b.[2019/7]  as [remarkEx7_2019]
      ,b.[2019/8]  as [remarkEx8_2019]
      ,b.[2019/9]  as [remarkEx9_2019]
      ,b.[2019/10] as [remarkEx10_2019]
      ,b.[2019/11] as [remarkEx11_2019]
      ,b.[2019/12] as [remarkEx12_2019]
  FROM [WebDashboard].[dbo].[Value_Forecast] a
  inner join [WebDashboard].[dbo].[Remark_Forecast] b
  on a.[CellName]=b.[CellName]
  where a.[CellName] = '$cellname' and a.[Forecasting] = 'Exponential' and  b.[Forecasting] = 'Exponential'  ";
  $result2 = sqlsrv_query($conn, $queryExponential2018, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
  $data2 = sqlsrv_fetch_array($result2);
  $valueEx1 = $data2['valueEx1'];$remarkEx1 = $data2['remarkEx1'];	$valueEx2 = $data2['valueEx2'];$remarkEx2 = $data2['remarkEx2'];	$valueEx3 = $data2['valueEx3'];$remarkEx3 = $data2['remarkEx3'];	$valueEx4 = $data2['valueEx4'];$remarkEx4 = $data2['remarkEx4'];	$valueEx5 = $data2['valueEx5'];$remarkEx5 = $data2['remarkEx5'];	$valueEx6 = $data2['valueEx6'];$remarkEx6 = $data2['remarkEx6'];	$valueEx7 = $data2['valueEx7'];$remarkEx7 = $data2['remarkEx7'];	$valueEx8 = $data2['valueEx8'];$remarkEx8 = $data2['remarkEx8'];	$valueEx9 = $data2['valueEx9'];$remarkEx9 = $data2['remarkEx9'];	$valueEx10 = $data2['valueEx10'];$remarkEx10 = $data2['remarkEx10'];	$valueEx11 = $data2['valueEx11'];$remarkEx11 = $data2['remarkEx11'];	$valueEx12 = $data2['valueEx12'];$remarkEx12 = $data2['remarkEx12'];	$valueEx13 = $data2['valueEx13'];$remarkEx13 = $data2['remarkEx13'];	$valueEx14 = $data2['valueEx14'];$remarkEx14 = $data2['remarkEx14'];	$valueEx15 = $data2['valueEx15'];$remarkEx15 = $data2['remarkEx15'];	$valueEx16 = $data2['valueEx16'];$remarkEx16 = $data2['remarkEx16'];	$valueEx17 = $data2['valueEx17'];$remarkEx17 = $data2['remarkEx17'];	$valueEx18 = $data2['valueEx18'];$remarkEx18 = $data2['remarkEx18'];	$valueEx19 = $data2['valueEx19'];$remarkEx19 = $data2['remarkEx19'];	$valueEx20 = $data2['valueEx20'];$remarkEx20 = $data2['remarkEx20'];	$valueEx21 = $data2['valueEx21'];$remarkEx21 = $data2['remarkEx21'];	$valueEx22 = $data2['valueEx22'];$remarkEx22 = $data2['remarkEx22'];	$valueEx23 = $data2['valueEx23'];$remarkEx23 = $data2['remarkEx23'];	$valueEx24 = $data2['valueEx24'];$remarkEx24 = $data2['remarkEx24'];	$valueEx25 = $data2['valueEx25'];$remarkEx25 = $data2['remarkEx25'];	$valueEx26 = $data2['valueEx26'];$remarkEx26 = $data2['remarkEx26'];	$valueEx27 = $data2['valueEx27'];$remarkEx27 = $data2['remarkEx27'];	$valueEx28 = $data2['valueEx28'];$remarkEx28 = $data2['remarkEx28'];	$valueEx29 = $data2['valueEx29'];$remarkEx29 = $data2['remarkEx29'];	$valueEx30 = $data2['valueEx30'];$remarkEx30 = $data2['remarkEx30'];	$valueEx31 = $data2['valueEx31'];$remarkEx31 = $data2['remarkEx31'];	$valueEx32 = $data2['valueEx32'];$remarkEx32 = $data2['remarkEx32'];	$valueEx33 = $data2['valueEx33'];$remarkEx33 = $data2['remarkEx33'];	$valueEx34 = $data2['valueEx34'];$remarkEx34 = $data2['remarkEx34'];	$valueEx35 = $data2['valueEx35'];$remarkEx35 = $data2['remarkEx35'];	$valueEx36 = $data2['valueEx36'];$remarkEx36 = $data2['remarkEx36'];	$valueEx37 = $data2['valueEx37'];$remarkEx37 = $data2['remarkEx37'];	$valueEx38 = $data2['valueEx38'];$remarkEx38 = $data2['remarkEx38'];	$valueEx39 = $data2['valueEx39'];$remarkEx39 = $data2['remarkEx39'];	$valueEx40 = $data2['valueEx40'];$remarkEx40 = $data2['remarkEx40'];	$valueEx41 = $data2['valueEx41'];$remarkEx41 = $data2['remarkEx41'];	$valueEx42 = $data2['valueEx42'];$remarkEx42 = $data2['remarkEx42'];	$valueEx43 = $data2['valueEx43'];$remarkEx43 = $data2['remarkEx43'];	$valueEx44 = $data2['valueEx44'];$remarkEx44 = $data2['remarkEx44'];	$valueEx45 = $data2['valueEx45'];$remarkEx45 = $data2['remarkEx45'];	$valueEx46 = $data2['valueEx46'];$remarkEx46 = $data2['remarkEx46'];	$valueEx47 = $data2['valueEx47'];$remarkEx47 = $data2['remarkEx47'];	$valueEx48 = $data2['valueEx48'];$remarkEx48 = $data2['remarkEx48'];	$valueEx49 = $data2['valueEx49'];$remarkEx49 = $data2['remarkEx49'];	$valueEx50 = $data2['valueEx50'];$remarkEx50 = $data2['remarkEx50'];	$valueEx51 = $data2['valueEx51'];$remarkEx51 = $data2['remarkEx51'];	$valueEx52 = $data2['valueEx52'];$remarkEx52 = $data2['remarkEx52'];   $valueEx1_2019 = $data2['valueEx1_2019'];$remarkEx1_2019 = $data2['remarkEx1_2019'];	$valueEx2_2019 = $data2['valueEx2_2019'];$remarkEx2_2019 = $data2['remarkEx2_2019'];	$valueEx3_2019 = $data2['valueEx3_2019'];$remarkEx3_2019 = $data2['remarkEx3_2019'];	$valueEx4_2019 = $data2['valueEx4_2019'];$remarkEx4_2019 = $data2['remarkEx4_2019'];	$valueEx5_2019 = $data2['valueEx5_2019'];$remarkEx5_2019 = $data2['remarkEx5_2019'];	$valueEx6_2019 = $data2['valueEx6_2019'];$remarkEx6_2019 = $data2['remarkEx6_2019'];	$valueEx7_2019 = $data2['valueEx7_2019'];$remarkEx7_2019 = $data2['remarkEx7_2019'];	$valueEx8_2019 = $data2['valueEx8_2019'];$remarkEx8_2019 = $data2['remarkEx8_2019'];	$valueEx9_2019 = $data2['valueEx9_2019'];$remarkEx9_2019 = $data2['remarkEx9_2019'];	$valueEx10_2019 = $data2['valueEx10_2019'];$remarkEx10_2019 = $data2['remarkEx10_2019'];	$valueEx11_2019 = $data2['valueEx11_2019'];$remarkEx11_2019 = $data2['remarkEx11_2019'];	$valueEx12_2019 = $data2['valueEx12_2019'];$remarkEx12_2019 = $data2['remarkEx12_2019'];
                         
?>
<script src="js/annotations.js"></script>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/highcharts.js"></script>

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
					}],
					categories: ['2018 / 1 ',	'2018 / 2 ',	'2018 / 3 ',	'2018 / 4 ',	'2018 / 5 ',	'2018 / 6 ',	'2018 / 7 ',	'2018 / 8 ',	'2018 / 9 ',	'2018 / 10',	'2018 / 11',	'2018 / 12',	'2018 / 13',	'2018 / 14',	'2018 / 15',	'2018 / 16',	'2018 / 17',	'2018 / 18',	'2018 / 19',	'2018 / 20',	'2018 / 21',	'2018 / 22',	'2018 / 23',	'2018 / 24',	'2018 / 25',	'2018 / 26',	'2018 / 27',	'2018 / 28',	'2018 / 29',	'2018 / 30',	'2018 / 31',	'2018 / 32',	'2018 / 33',	'2018 / 34',	'2018 / 35',	'2018 / 36',	'2018 / 37',	'2018 / 38',	'2018 / 39',	'2018 / 40',	'2018 / 41',	'2018 / 42',	'2018 / 43',	'2018 / 44',	'2018 / 45',	'2018 / 46',	'2018 / 47',	'2018 / 48',	'2018 / 49',	'2018 / 50',	'2018 / 51',	'2018 / 52',	'2019 /1 ',	'2019 /2 ',	'2019 /3 ',	'2019 /4 ',	'2019 /5 ',	'2019 /6 ',	'2019 /7 ',	'2019 /8 ',	'2019 /9 ',	'2019 /10',	'2019 /11',	'2019 /12'],
                    title :{
                    	text : 'Year / Week'
                    }},
                ],

                title: {
                    text: 'Payload Trendlines',
					align: 'left',
					x : 60
                },
				series: [{
				name : 'Linier' ,
				data: [{y: <?php echo $value1  ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark1  ; ?>'},	{y: <?php echo $value2  ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark2  ; ?>'},	{y: <?php echo $value3  ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark3  ; ?>'},	{y: <?php echo $value4  ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark4  ; ?>'},	{y: <?php echo $value5  ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark5  ; ?>'},	{y: <?php echo $value6  ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark6  ; ?>'},	{y: <?php echo $value7  ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark7  ; ?>'},	{y: <?php echo $value8  ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark8  ; ?>'},	{y: <?php echo $value9  ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark9  ; ?>'},	{y: <?php echo $value10 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark10 ; ?>'},	{y: <?php echo $value11 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark11 ; ?>'},	{y: <?php echo $value12 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark12 ; ?>'},	{y: <?php echo $value13 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark13 ; ?>'},	{y: <?php echo $value14 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark14 ; ?>'},	{y: <?php echo $value15 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark15 ; ?>'},	{y: <?php echo $value16 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark16 ; ?>'},	{y: <?php echo $value17 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark17 ; ?>'},	{y: <?php echo $value18 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark18 ; ?>'},	{y: <?php echo $value19 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark19 ; ?>'},	{y: <?php echo $value20 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark20 ; ?>'},	{y: <?php echo $value21 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark21 ; ?>'},	{y: <?php echo $value22 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark22 ; ?>'},	{y: <?php echo $value23 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark23 ; ?>'},	{y: <?php echo $value24 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark24 ; ?>'},	{y: <?php echo $value25 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark25 ; ?>'},	{y: <?php echo $value26 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark26 ; ?>'},	{y: <?php echo $value27 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark27 ; ?>'},	{y: <?php echo $value28 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark28 ; ?>'},	{y: <?php echo $value29 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark29 ; ?>'},	{y: <?php echo $value30 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark30 ; ?>'},	{y: <?php echo $value31 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark31 ; ?>'},	{y: <?php echo $value32 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark32 ; ?>'},	{y: <?php echo $value33 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark33 ; ?>'},	{y: <?php echo $value34 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark34 ; ?>'},	{y: <?php echo $value35 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark35 ; ?>'},	{y: <?php echo $value36 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark36 ; ?>'},	{y: <?php echo $value37 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark37 ; ?>'},	{y: <?php echo $value38 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark38 ; ?>'},	{y: <?php echo $value39 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark39 ; ?>'},	{y: <?php echo $value40 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark40 ; ?>'},	{y: <?php echo $value41 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark41 ; ?>'},	{y: <?php echo $value42 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark42 ; ?>'},	{y: <?php echo $value43 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark43 ; ?>'},	{y: <?php echo $value44 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark44 ; ?>'},	{y: <?php echo $value45 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark45 ; ?>'},	{y: <?php echo $value46 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark46 ; ?>'},	{y: <?php echo $value47 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark47 ; ?>'},	{y: <?php echo $value48 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark48 ; ?>'},	{y: <?php echo $value49 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark49 ; ?>'},	{y: <?php echo $value50 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark50 ; ?>'},	{y: <?php echo $value51 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark51 ; ?>'},	{y: <?php echo $value52 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark52 ; ?>'},	{y: <?php echo $value1_2019; ?> ,tittle: 'Linier', Remark : '<?php echo $remark1_2019 ; ?>'},	{y: <?php echo $value2_2019; ?> ,tittle: 'Linier', Remark : '<?php echo $remark2_2019 ; ?>'},	{y: <?php echo $value3_2019; ?> ,tittle: 'Linier', Remark : '<?php echo $remark3_2019 ; ?>'},	{y: <?php echo $value4_2019; ?> ,tittle: 'Linier', Remark : '<?php echo $remark4_2019 ; ?>'},	{y: <?php echo $value5_2019; ?> ,tittle: 'Linier', Remark : '<?php echo $remark5_2019 ; ?>'},	{y: <?php echo $value6_2019; ?> ,tittle: 'Linier', Remark : '<?php echo $remark6_2019 ; ?>'},	{y: <?php echo $value7_2019; ?> ,tittle: 'Linier', Remark : '<?php echo $remark7_2019 ; ?>'},	{y: <?php echo $value8_2019; ?> ,tittle: 'Linier', Remark : '<?php echo $remark8_2019 ; ?>'},	{y: <?php echo $value9_2019; ?> ,tittle: 'Linier', Remark : '<?php echo $remark9_2019 ; ?>'},	{y: <?php echo $value10_2019 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark10_2019 ; ?>'},	{y: <?php echo $value11_2019 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark11_2019 ; ?>'},	{y: <?php echo $value12_2019 ; ?> ,tittle: 'Linier', Remark : '<?php echo $remark12_2019 ; ?>'}],
				color: '#4d94ff',
				zoneAxis: 'x',
				zones: [{
					value: 34
				}, {
					dashStyle: 'shortdot'
				}]},
				{
				name : 'Exponential' ,
				data: [{y: <?php echo $valueEx1  ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx1  ; ?>'},	{y: <?php echo $valueEx2  ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx2  ; ?>'},	{y: <?php echo $valueEx3  ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx3  ; ?>'},	{y: <?php echo $valueEx4  ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx4  ; ?>'},	{y: <?php echo $valueEx5  ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx5  ; ?>'},	{y: <?php echo $valueEx6  ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx6  ; ?>'},	{y: <?php echo $valueEx7  ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx7  ; ?>'},	{y: <?php echo $valueEx8  ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx8  ; ?>'},	{y: <?php echo $valueEx9  ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx9  ; ?>'},	{y: <?php echo $valueEx10 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx10 ; ?>'},	{y: <?php echo $valueEx11 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx11 ; ?>'},	{y: <?php echo $valueEx12 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx12 ; ?>'},	{y: <?php echo $valueEx13 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx13 ; ?>'},	{y: <?php echo $valueEx14 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx14 ; ?>'},	{y: <?php echo $valueEx15 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx15 ; ?>'},	{y: <?php echo $valueEx16 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx16 ; ?>'},	{y: <?php echo $valueEx17 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx17 ; ?>'},	{y: <?php echo $valueEx18 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx18 ; ?>'},	{y: <?php echo $valueEx19 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx19 ; ?>'},	{y: <?php echo $valueEx20 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx20 ; ?>'},	{y: <?php echo $valueEx21 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx21 ; ?>'},	{y: <?php echo $valueEx22 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx22 ; ?>'},	{y: <?php echo $valueEx23 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx23 ; ?>'},	{y: <?php echo $valueEx24 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx24 ; ?>'},	{y: <?php echo $valueEx25 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx25 ; ?>'},	{y: <?php echo $valueEx26 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx26 ; ?>'},	{y: <?php echo $valueEx27 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx27 ; ?>'},	{y: <?php echo $valueEx28 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx28 ; ?>'},	{y: <?php echo $valueEx29 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx29 ; ?>'},	{y: <?php echo $valueEx30 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx30 ; ?>'},	{y: <?php echo $valueEx31 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx31 ; ?>'},	{y: <?php echo $valueEx32 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx32 ; ?>'},	{y: <?php echo $valueEx33 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx33 ; ?>'},	{y: <?php echo $valueEx34 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx34 ; ?>'},	{y: <?php echo $valueEx35 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx35 ; ?>'},	{y: <?php echo $valueEx36 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx36 ; ?>'},	{y: <?php echo $valueEx37 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx37 ; ?>'},	{y: <?php echo $valueEx38 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx38 ; ?>'},	{y: <?php echo $valueEx39 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx39 ; ?>'},	{y: <?php echo $valueEx40 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx40 ; ?>'},	{y: <?php echo $valueEx41 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx41 ; ?>'},	{y: <?php echo $valueEx42 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx42 ; ?>'},	{y: <?php echo $valueEx43 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx43 ; ?>'},	{y: <?php echo $valueEx44 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx44 ; ?>'},	{y: <?php echo $valueEx45 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx45 ; ?>'},	{y: <?php echo $valueEx46 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx46 ; ?>'},	{y: <?php echo $valueEx47 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx47 ; ?>'},	{y: <?php echo $valueEx48 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx48 ; ?>'},	{y: <?php echo $valueEx49 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx49 ; ?>'},	{y: <?php echo $valueEx50 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx50 ; ?>'},	{y: <?php echo $valueEx51 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx51 ; ?>'},	{y: <?php echo $valueEx52 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx52 ; ?>'},	{y: <?php echo $valueEx1_2019; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx1_2019 ; ?>'},	{y: <?php echo $valueEx2_2019; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx2_2019 ; ?>'},	{y: <?php echo $valueEx3_2019; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx3_2019 ; ?>'},	{y: <?php echo $valueEx4_2019; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx4_2019 ; ?>'},	{y: <?php echo $valueEx5_2019; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx5_2019 ; ?>'},	{y: <?php echo $valueEx6_2019; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx6_2019 ; ?>'},	{y: <?php echo $valueEx7_2019; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx7_2019 ; ?>'},	{y: <?php echo $valueEx8_2019; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx8_2019 ; ?>'},	{y: <?php echo $valueEx9_2019; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx9_2019 ; ?>'},	{y: <?php echo $valueEx10_2019 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx10_2019 ; ?>'},	{y: <?php echo $valueEx11_2019 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx11_2019 ; ?>'},	{y: <?php echo $valueEx12_2019 ; ?> ,tittle: 'Exponential', Remark : '<?php echo $remarkEx12_2019 ; ?>'}],
				color: '#4dff4d',
				zoneAxis: 'x',
				zones: [{
					value: 34
				}, {
					dashStyle: 'shortdot'
				}]
				}],
			    

			    tooltip: {
					enabled: true,
			        shared: true,
					useHTML: true,
				    headerFormat: 'Week :{point.x}',
					pointFormat: '<hr>{point.tittle}<br>'+
					    '{point.y}<br>' +
						'{point.Remark}<br>',
					footerFormat: '',
					valueDecimals: 1,
					borderColor: 'black',
					borderRadius: 10,
					borderWidth: 3,
			    }
            });
        }
    )
</script>
<?php
include 'footer.php';
?>