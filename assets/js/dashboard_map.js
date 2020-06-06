$(function(){
	$.ajax({
		url: BASE_URL+'siteMarkers',
		type: 'GET',
		success: function(r) {
			console.log(r);

			var mapOptions = {
				center: new google.maps.LatLng(13.056861, 80.210784),
		        zoom: 10,
		        // mapTypeId: google.maps.MapTypeId.ROADMAP
		    };
		    var map = new google.maps.Map(document.getElementById("map2"), mapOptions);
		    DeleteMarkers();
		    bounds  = new google.maps.LatLngBounds();

		    if(r.key == 200){
		    	$.each( r.data, function( key, value ) {
			        var marker = new google.maps.Marker({
			            position: new google.maps.LatLng(value.latitide, value.longitude),
			            map: map,
			            icon: BASE_URL+'../assets/buckets/map/site_marker.png'
			        });
					loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
					bounds.extend(loc);
				});
				map.fitBounds(bounds);
		    	map.panToBounds(bounds);
		    }

		}
	});

	function DeleteMarkers() {
        //Loop through all the markers and remove
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
    };
});