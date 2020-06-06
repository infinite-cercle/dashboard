$('.select2').select2({
  placeholder: 'Choose any'
});

$('.select-multilple').select2({
  placeholder: 'Choose multiple'
});

$('.custom-file-input').change(function(){
	$(this).next().parent().find('label').text($(this).val().match(/[-_\w]+[.][\w]+$/i)[0]);
	console.log($(this).val());
});

// Datatables

$(function(){
  'use strict';
  if($('#existing-pickup-request-table').length){
	$('#existing-pickup-request-table').DataTable({
		responsive: true,
	  	language: {
	    	searchPlaceholder: 'Search...',
		    sSearch: '',
		    lengthMenu: '_MENU_ items/page',
	  	},
	  	ordering: false
	});
  }
  if($('#existing-sites-table').length){
	$('#existing-sites-table').DataTable({
		responsive: true,
	  	language: {
	    	searchPlaceholder: 'Search...',
		    sSearch: '',
		    lengthMenu: '_MENU_ items/page',
	  	},
	  	ordering: false
	});
  }
  if($('#carbon-footprint-table').length){
	$('#carbon-footprint-table').DataTable({
		responsive: true,
	  	language: {
	    	searchPlaceholder: 'Search...',
		    sSearch: '',
		    lengthMenu: '_MENU_ items/page',
	  	},
	  	ordering: false,
	  	dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
	});
  }
});

$(document).on('click', '.getContactInfo', function(e) {
	$(".getContactInfo").removeClass('active');
	$(this).addClass('active');
	$.ajax({
		url: BASE_URL+'getContactDetail',
		type: 'POST',
		data: { contactid: $(this).attr('data-target') },
		success: function(res) {
			if(res.key == 200){
				$("#contact_target").attr('data-target', res.data.id);
				$("#contact_firstname").html(res.data.firstname);
				$("#contact_lastname").html(res.data.lastname);
				$("#contact_phone").html(res.data.phone);
				$("#contact_email").html(res.data.email);
				$("#contact_designation").html(res.data.designation);
				$("#contact_address").html(res.data.address1);
				$("#contact_note").html(res.data.notes);
				$("#contactInformation").removeClass('d-none');
			}
		}
	});
});

$(document).on('click', '.edit_contact', function(e) {
	$.ajax({
		url: BASE_URL+'getContactDetail',
		type: 'POST',
		data: { contactid: $(this).attr('data-target') },
		success: function(res) {
			if(res.key == 200){
				$("input[name=con_id]").val(res.data.id);
				$("input[name=firstname]").val(res.data.firstname);
				$("input[name=lastname]").val(res.data.lastname);
				$("input[name=address_1]").val(res.data.address1);
				$("input[name=address_2]").val(res.data.address2);
				$("input[name=designation]").val(res.data.designation);
				$("input[name=phone_number]").val(res.data.phone);
				$("input[name=email]").val(res.data.email);
				$("input[name=notes]").val(res.data.notes);
				$("#modalEditContact").modal("show");
			}
		}
	});
});

if(!window.location.href.indexOf('dashboard') > -1){
	// This sample uses the Autocomplete widget to help the user select a
	// place, then it retrieves the address components associated with that
	// place, and then it populates the form fields with those details.
	// This sample requires the Places library. Include the libraries=places
	// parameter when you first load the API. For example:
	// <script
	// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
	var markers = [];
	var autocomplete;
	function initialize() {
	  	var input = document.getElementById('searchTextField');
	  	autocomplete = new google.maps.places.Autocomplete(input, {types: ['geocode']});
		autocomplete.addListener('place_changed', fillInAddress);
	}
	google.maps.event.addDomListener(window, 'load', initialize);

	function fillInAddress() {
		var places = autocomplete.getPlace();
		var address_components = places.address_components;
		// console.log(places);
		$.each( address_components, function( key, value ) {
		  if(value.types[0] == 'administrative_area_level_2'){
		  	$("#geo_district").val(value.long_name);
		  }
		});
	}

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
	    if(window.location.href.indexOf("add-new-site") == -1){
	    	// console.log("true");
		    setTimeout(function() {
		    	callLocation();
		    }, 1000);
		}

	    function callLocation() {
	    	var lat = $("#geo_latitude").val();
			var lng = $("#geo_longitude").val();
			var marker = new google.maps.Marker({
	            position: new google.maps.LatLng(lat, lng),
	            map: map
	        });
	        map.setCenter(new google.maps.LatLng(lat, lng));
	    }
	}
}