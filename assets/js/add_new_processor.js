$(function() {
	window.onload = function () {
	    var mapOptions = {
	        center: new google.maps.LatLng(12.9716, 77.5946),
	        zoom: 10,
	        // mapTypeId: google.maps.MapTypeId.ROADMAP
	    };
	    // var infoWindow = new google.maps.InfoWindow();
	    // var latlngbounds = new google.maps.LatLngBounds();
	    var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);

	    google.maps.event.addListener(map, 'click', function (e) {
	    	DeleteMarkers();
	    	$("#geo_latitude").val(e.latLng.lat());
			$("#geo_longitude").val(e.latLng.lng());
			var location = e.latLng;

			var marker = new google.maps.Marker({
	            position: location,
	            map: map,
	            icon: BASE_URL+'../assets/buckets/map/site_marker.png'
	        });

	        google.maps.event.addListener(marker, "click", function (e) {
	            var infoWindow = new google.maps.InfoWindow({
	                content: 'Latitude: ' + location.lat() + '<br />Longitude: ' + location.lng()
	            });
	            infoWindow.open(map, marker);
	        });
	        markers.push(marker);

	        // alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
	    });

		function DeleteMarkers() {
	        //Loop through all the markers and remove
	        for (var i = 0; i < markers.length; i++) {
	            markers[i].setMap(null);
	        }
	        markers = [];
	    };
	}
});