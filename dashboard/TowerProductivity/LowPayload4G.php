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
<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h3>Tower Productivity <small>Low Payload 4G</small></h3>
		</div>
	</div>
<!-- Menu Bar -->
<div class="row">
	<div class="clearfix"></div>
        
            <div class="x_content">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
						<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Maps</a></li>
						<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Table</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
							<p>
								<div class="x_panel">
									<p>Low Payload = <img src="towerLow.png" style="width:20px ; height:20px;"></p>
										<div id="map" style="width:100%; height:700px;"></div>
								</div>
							</p>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
							<p>
								<div class="x_panel">
									<form method="POST" action="">
										<div class="col-md-3">
											<fieldset>
												<div class="control-group">
													<div class="col-md-12 xdisplay_inputx form-group has-feedback">
														<input type="text" class="form-control has-feedback-left" id="single_cal2" name="tanggal" placeholder="Select Date" aria-describedby="inputSuccess2Status">
															<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
															<span id="inputSuccess2Status" class="sr-only">(success)</span>
													</div>
												</div>
											</fieldset>
										</div>
										<div class="col-md-3">
											<button type="submit" class="btn btn-primary" name="submit">Tampil</button>
										</div>
									</form>						
									<div class="x_content">
										<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
											<thead>
												<tr>
													<th class="text-center">Region</th>
													<th class="text-center">System</th>
													<th class="text-center">eNodebId</th>
													<th class="text-center">DateId</th>
													<th class="text-center">TotalPayloadGB</th>
												</tr>
											</thead>
												<tbody>
													<?php
														$tgl	= $_POST['tanggal'];
														$SQL	= "SELECT * FROM [WebDashboard].[dbo].[LowPayload4G] WHERE [DateId]='$tgl'";
														$result = sqlsrv_query($conn, $SQL, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
																	while($data = sqlsrv_fetch_array($result))
																		{
																			echo	'<tr>
																						<th class="text-center">'.$data['region'].'</th>
																						<th class="text-center">'.$data['System'].'</th>
																						<th class="text-center">'.$data['eNodebId'].'</th>
																						<th class="text-center">'.$data['DateId']->format("Y-m-d").'</th>
																						<th class="text-center">'.$data['TotalPayloadGB'].'</th>
																					</tr>'
																		;}
													?>
												</tbody>
										</table>
									</div>
								</div>
							</p>
						</div>
					</div>
                </div>
			</div>
       
       
</div>
<!-- End Menu Bar -->
<!-- MULAI DARI SINI -->
</div>
<!-- /page content -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
      var map, newUser, users, mapquest, firstLoad;

      firstLoad = true;

      //users = new L.FeatureGroup();
      users = new L.MarkerClusterGroup({spiderfyOnMaxZoom: true, showCoverageOnHover: false, zoomToBoundsOnClick: true});
      newUser = new L.LayerGroup();

      mapquest = new L.TileLayer("http://10.23.32.174:8200/osm_tiles/{z}/{x}/{y}.png", {
        maxZoom: 18,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      });

      map = new L.Map('map', {
        center: new L.LatLng(-1.604148, 117.498097),
        zoom: 5,
        layers: [mapquest, users],
		fullscreenControl: true,
			fullscreenControlOptions: { // optional
				title:"Show me the fullscreen !",
				titleCancel:"Exit fullscreen mode"
			}
      });
	  // search box by sitename
		var markersLayer = new L.LayerGroup();   
		map.addLayer(markersLayer);

		  var controlSearch = new L.Control.Search({
			position:'topleft',    
			layer: users,
			initial: false,
			zoom: 17,
			marker: false,
			textPlaceholder: 'Search By SiteName...'
		  });

		  map.addControl(controlSearch); 

	  // Full Screen Control
	  map.on('enterFullscreen', function(){
			if(window.console) window.console.log('enterFullscreen');
		});
		map.on('exitFullscreen', function(){
			if(window.console) window.console.log('exitFullscreen');
		});
      // GeoLocation Control
      function geoLocate() {
        map.locate({setView: true, maxZoom: 17});
      }
      var geolocControl = new L.control({
        position: 'topright'
      });
      geolocControl.onAdd = function (map) {
        var div = L.DomUtil.create('div', 'leaflet-control-zoom leaflet-control');
        div.innerHTML = '<a class="leaflet-control-geoloc" href="#" onclick="geoLocate(); return false;" title="My location"></a>';
        return div;
      };
      
      map.addControl(geolocControl);
      map.addControl(new L.Control.Scale());

      //map.locate({setView: true, maxZoom: 3});

      $(document).ready(function() {
        $.ajaxSetup({cache:false});
        $('#map').css('height', ($(window).height() - 40));
        getUsers();
      });

      $(window).resize(function () {
        $('#map').css('height', ($(window).height() - 40));
      }).resize();

      function geoLocate() {
        map.locate({setView: true, maxZoom: 17});
      }
			
	  var LeafIcon = L.Icon.extend({
			options: {
				shadowUrl: 'leaf-shadow.png',
				iconSize:     [30, 30],
				shadowSize:   [50, 64],
				iconAnchor:   [22, 94],
				shadowAnchor: [4, 62],
				popupAnchor:  [-3, -76]
			}
		});
	   
      function getUsers() {
        $.getJSON("getPayload4G.php", function (data) {
          for (var i = 0; i < data.length; i++) {
            var location = new L.LatLng(data[i].lat, data[i].lng);
            var name = data[i].eNodebId;
			var  greenIcon = new LeafIcon({iconUrl: 'towerLow.png'});
			L.icon = function (options) {
						return new L.Icon(options);
					};
            if (data[i].eNodebId.length > 1) {
              var title = "<div style='font-size: 12px; color: #000000;'>Site Id : "+ data[i].eNodebId + "</a><br>System : "+data[i].System + "<br>Region : "+data[i].region + "<br>Date : "+data[i].DateId + "<br>Total Payload : "+data[i].TotalPayloadGB + "</div>";
            }
            else {
              var title = "<div style='font-size: 18px; color: #0078A8;'>"+ data[i].name +"</div>";
            }            var marker = new L.Marker(location, {
              title: name,
			  icon: greenIcon
            });
            marker.bindPopup("<div style='margin-left: auto; margin-right: auto;'>"+ title +"</div>", {maxWidth: '400'});
            users.addLayer(marker);
			
			
          }
        }).complete(function() {
          if (firstLoad == true) {
            map.fitBounds(users.getBounds());
            firstLoad = false;
          };
        });
      }


      
</script>
<?php
include 'footer.php';
?>