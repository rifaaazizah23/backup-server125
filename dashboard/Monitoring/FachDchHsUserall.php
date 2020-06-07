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

      function initRegistration() {
        map.addEventListener('click', onMapClick);
        $('#map').css('cursor', 'crosshair');
        return false;
      }

      function cancelRegistration() {
        newUser.clearLayers();
        $('#map').css('cursor', '');
        map.removeEventListener('click', onMapClick);
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
        $.getJSON("get_fachdchhsuserall.php", function (data) {
          for (var i = 0; i < data.length; i++) {
            var location = new L.LatLng(data[i].lat, data[i].lng);
            var name = data[i].name;
			var load = data[i].load;
			var remark = data[i].remark;
            if ( data[i].remark == "Congest" ){		
				var  greenIcon = new LeafIcon({iconUrl: 'towerHigh.png'});
			} else {
				var  greenIcon = new LeafIcon({iconUrl: 'towerMediumHigh.png'});
			}
			L.icon = function (options) {
						return new L.Icon(options);
					};
            if (data[i].name.length > 1) {
              var title = "<div style='font-size: 12px; color: #000000;'>Bsc Id / Rnc Id : <a href='detailFachDchHsUser.php?rnc="+ data[i].name +"' target='_blank'>"+ data[i].name + "</a><br>pmCapacityLimit : "+data[i].pmCapacityLimit + "<br>NumOfUsage : "+data[i].NumOfUsage + "<br>UtilizationRate : "+data[i].UtilizationRate + "</div>";
            }
            else {
              var title = "<div style='font-size: 12px; color: #000000;'>Bsc Id / Rnc Id : "+ data[i].name +"</div>";
            }            var marker = new L.Marker(location, {
              title: name,
			  icon: greenIcon
            });
            marker.bindPopup("<div style='text-align: center; margin-left: auto; margin-right: auto;'>"+ title +"</div>", {maxWidth: '400'});
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