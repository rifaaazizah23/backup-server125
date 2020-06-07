<?php 
include 'header3.php';
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
<script type="text/javascript" src="Core/js/highcharts.js"></script>
<script type="text/javascript" src="Core/js/exporting.js"></script>
<script type="text/javascript" src="loader.js"></script>

       <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          
          <!-- /top tiles -->

          <br />

	
	<div class="row">
	<!-- MULAI DARI SINI -->
	<center>
	<br>
    <button type="button"  class="btn btn-primary btn-lg" style="height:200px ; width:400px ; font-size:50px">Capacity</button>
	<button type="button" class="btn btn-warning btn-lg" style="height:200px ; width:400px; font-size:50px">NQI</button><br>
	<button type="button" class="btn btn-danger btn-lg" style="height:200px ; width:400px; font-size:50px">NPS</button>
	<button type="button" class="btn btn-success btn-lg" style="height:200px ; width:400px; font-size:40px">PERFORMANCE</button>
	
	</center>

      <!-- END -->

          </div>


        </div>
        <!-- /page content -->

<?php 
include 'footer.php';
?>