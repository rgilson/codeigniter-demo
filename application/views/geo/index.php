
<html>
  <head> 
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
		margin-top: 40px;
        height: 90%;
		width: 80%;
		margin-left: auto; 
        margin-right: auto; 
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin:0;
        padding:0;
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
#button {
	  margin-left:10%;
	  margin-top:30px;
}
    </style>
  </head>
  
  <body>
 
	<input id="pac-input" class="controls" type="text" placeholder="Search Box">
	<button id="button">Click me and press Enter for Travel Agencies nearby</button>
    <div id="map"></div>
   
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.	  
var map;
var infowindow;

	function initMap() {
		var defaultPos = {lat: 51.5074, lng: 0.1278};
		var map = new google.maps.Map(document.getElementById('map'), {
			center: defaultPos,
			zoom: 6,
			mapTypeId: 'roadmap'
		});
		// Try HTML5 geolocation.
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
			var pos = {
			  lat: position.coords.latitude,
			  lng: position.coords.longitude
			};

			var marker = new google.maps.Marker({
			  position: pos,
			  map: map
			});

			map.setCenter(pos);
			map.setZoom(15);
			}, function() {
			handleLocationError(true, infoWindow, map.getCenter());
			});
		} else {
			// Browser doesn't support Geolocation
			handleLocationError(false, infoWindow, map.getCenter());
		}
		 var button = document.getElementById('button'); 
         button.onclick = function() {		 
         input.value = 'travel agency';		
         input.focus(); 
        }
	
		// Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
			searchBox.setBounds(map.getBounds());
        });
        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
			var places = searchBox.getPlaces();

            if (places.length == 0) {
				return;
           }
           // Clear out the old markers.
            markers.forEach(function(marker) {
				marker.setMap(null);
			});
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
				if (!place.geometry) {
					console.log("Returned place contains no geometry");
					return;
				}
            var icon = {
				url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });

	}

	function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ?
					  'Error: The Geolocation service failed.' :
					  'Error: Your browser doesn\'t support geolocation.');
	}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpl9SKDBgdVa_mw3zrn226F7looQDHmCI 
&libraries=places&callback=initMap">
    </script>
  </body>
</html>
   