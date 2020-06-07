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
<style type="text/css">
#map { width: 700px; height: 433px; }
		.fullscreen-icon { background-image: url(icon-fullscreen.png); }
		/* one selector per rule as explained here : http://www.sitepoint.com/html5-full-screen-api/ */
		#map:-webkit-full-screen { width: 100% !important; height: 100% !important; z-index: 99999; }
		#map:-ms-fullscreen { width: 100% !important; height: 100% !important; z-index: 99999; }
		#map:full-screen { width: 100% !important; height: 100% !important; z-index: 99999; }
		#map:fullscreen { width: 100% !important; height: 100% !important; z-index: 99999; }
		.leaflet-pseudo-fullscreen { position: fixed !important; width: 100% !important; height: 100% !important; top: 0px !important; left: 0px !important; z-index: 99999; }

/* Optional: Makes the sample page fill the window. */
  html, body {
	height: 100%;
	margin: 0;
	padding: 0;
  }
  .controls {
	margin-top: 10px;
	border: 1px solid transparent;
	border-radius: 2px 0 0 2px;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	height: 32px;
	outline: none;
	box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
  }

  #pac-input {
	background-color: #fff;
	font-family: Roboto;
	font-size: 15px;
	font-weight: 300;
	margin-left: 12px;
	padding: 0 11px 0 13px;
	text-overflow: ellipsis;
	width: 300px;
  }

  #pac-input:focus {
	border-color: #4d90fe;
  }

  .pac-container {
	font-family: Roboto;
  }

  #type-selector {
	color: #fff;
	background-color: #4d90fe;
	padding: 5px 11px 0px 11px;
  }

  #type-selector label {
	font-family: Roboto;
	font-size: 13px;
	font-weight: 300;
  }
  #target {
	width: 345px;
  }
 </style>
 
 
<!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          
          <!-- /top tiles -->

          <br />

          <div class="row">

      <!-- MULAI DARI SINI -->
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>BSC & RNC </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				  <div class="col-md-3 col-sm-12 col-xs-12 form-group">
					<form class="form-horizontal bucket-form" method="post">
						<select class="form-control" id="data" name="data">
							<option>Pilih Opsi</option>
							<option value="1">MPLoad High & Warning</option>
							<option value="2">MPLoad High</option>
							<option value="3">MPLoad Warning</option>
							<option value="11">FachDchHsUser Utilization (Ericsson) High & Warning</option>
							<option value="21">FachDchHsUser Utilization (Ericsson) High</option>
							<option value="31">FachDchHsUser Utilization (Ericsson) Warning</option>
							<option value="12">IubThroughput Utilization (Ericsson) High & Warning</option>
							<option value="22">IubThroughput Utilization (Ericsson) High</option>
							<option value="32">IubThroughput Utilization (Ericsson) Warning</option>
							<option value="13">DSP Load (Huawei) High & Warning</option>
							<option value="23">DSP Load (Huawei) High</option>
							<option value="33">DSP Load (Huawei) Warning</option>
							<option value="14">PS Throughput (Huawei) High & Warning</option>
							<option value="24">PS Throughput (Huawei) High</option>
							<option value="34">PS Throughput (Huawei) Warning</option>
						</select>
                </div>
				<div class="col-md-3 col-sm-12 col-xs-12 form-group">
					<input type="submit" class="btn btn-primary" value="Show" name="submit">
				</div>
				<br>
				  <p style="margin-left : 100px;">High = <img src="towerHigh.png" style="width:20px ; height : 20px">|
					Warning = <img src="towerMediumHigh.png" style="width:20px ; height : 20px">|
                    <div class="bs-docs-section">
					<div id="map"  style="width:100% ; height:700px;"></div>
                    </div>
                  </div>
                </div>
              </div>
	  
	  <!-- END -->

          </div>


        </div>
        <!-- /page content -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<?php 
$value = $_POST['data'];
if ($value == 1 ){
	include ('loadall.php');
	}
	else if($value == 2){
		include ('loadhigh.php');
	}
	else if($value == 3){
		 include ('loadwarning.php');
	}else if($value == 11){
		 include ('FachDchHsUserall.php');
	}else if($value == 21){
		 include ('FachDchHsUserhigh.php');
	}else if($value == 31){
		 include ('FachDchHsUserwarning.php');
	}else if($value == 12){
		 include ('IubThroughputall.php');
	}else if($value == 22){
		 include ('IubThroughputhigh.php');
	}else if($value == 32){
		 include ('IubThroughputwarning.php');
	}else if($value == 13){
		 include ('DSPall.php');
	}else if($value == 23){
		 include ('DSPhigh.php');
	}else if($value == 33){
		 include ('DSPwarning.php');
	}else if($value == 14){
		 include ('PSall.php');
	}else if($value == 24){
		 include ('PShigh.php');
	}else if($value == 34){
		 include ('PSwarning.php');
	}
	else {
		include('loadall.php');
	} 
?>

<?php
include 'footer.php';
?>
