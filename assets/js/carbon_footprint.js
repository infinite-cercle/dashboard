$(function(){
	$(document).ready(function($) {
		// Carbon footprint for balling
		var bq = $("#balling_qty").val();
		$("#total_co2_balling").text((parseInt(bq)*1.5)/1000);
		// Carbon footprint for recycling
		var rq = $("#recycling_qty").val();
		$("#total_co2_recycling").text((parseInt(bq)*1.4)/1000);
	});

	$(document).on('click', '#save_carbonfootprint', function(event) {
		var trasport_distance = $("#trasport_distance").val();
		var trasport_trucks = $("#trasport_trucks").val();
		if(trasport_distance == ''){
			alert('Please enter the value');
			$("#trasport_distance").focus();
			return false;
		} else if(trasport_trucks == ''){
			$("#trasport_trucks").focus();
			return false;
		} else {
			// Save into database
			var trasport_distance = $("#trasport_distance").val();
			var trasport_trucks = $("#trasport_trucks").val();
			var tq = $("#total_co2_transport").text();
			var qty = $("#balling_qty").val();
			var bq = $("#total_co2_balling").text();
			var rq = $("#total_co2_recycling").text();
			var total_cf = $("#total_co2_total").text();
			var assign_key = $("#assign_key").val();
			var data = {
				'trasport_distance' : trasport_distance,
				'trasport_trucks' : trasport_trucks,
				'qty' : qty,
				'bq' : bq,
				'rq' : rq,
				'tq' : tq,
				'total_cf' : total_cf,
				'assign_key' : assign_key
			}
			$.ajax({
				url: BASE_URL+'saveCarbonFootPrint',
				type: 'POST',
				data: data,
			})
			.done(function(response) {
				console.log("success");
				// swal("Good job!", "Your ", "success");
				swal({
				  title: "Good job!",
				  text: "Carbon footprint has been added successfully",
				  icon: "success",
				  buttons: true,
				  dangerMode: false,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    window.location.reload();
				  }
				});
			})
			.error(function() {
				console.log("error");
			});
			
		}
	});

	$(document).on('blur', '#trasport_distance, #trasport_trucks', function(event) {
		var trasport_distance = $("#trasport_distance").val();
		var trasport_trucks = $("#trasport_trucks").val();
		if(trasport_distance != '' && trasport_trucks != ''){
			console.info("Calculation Started");
			var calculation = ((trasport_distance/4.3)*trasport_trucks*2.734)/1000;
			$("#total_co2_transport").text(calculation.toFixed(4));
			// Calcualte total co2
			var bq = $("#total_co2_balling").text();
			var rq = $("#total_co2_recycling").text();

			var total_co2 = (parseFloat(bq)+parseFloat(rq)+parseFloat(calculation));
			$("#total_co2_total").text(total_co2.toFixed(4));
		} else {
			$("#total_co2_transport").text('');
		}
	});

	/*$(document).on('blur', '#trasport_trucks', function(event) {
		var trasport_distance = $("#trasport_distance").val();
		var trasport_trucks = $("#trasport_trucks").val();
		if(trasport_distance != '' && trasport_trucks != ''){
			console.info("Calculation Started");
			var calculation = ((trasport_distance/4.3)*trasport_trucks*2.734)/1000;
			$("#total_co2_transport").text(calculation);
		}
	});*/

});