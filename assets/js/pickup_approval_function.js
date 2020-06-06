$(function(){
	$(document).on("click", "#checkAssignStatus", function() {
		$.ajax({
			url: BASE_URL+'get-pickup-details',
			type: 'POST',
			data: {pickup_id: $(this).attr('data-source')},
		})
		.done(function(resposne) {
			if(resposne.key == 200){
				$("#company_name").html(resposne.data.pickup_details.company);
				$("#site_location").html(resposne.data.pickup_details.fld_location);
				$("#qty").html(resposne.data.pickup_details.fld_qty+'<small>tons (approx.)</small>');
				$("#modalBillingInfo").modal("show");
				if(resposne.data.assign_details.length != 0){
					var html = ''; 
					$.each(resposne.data.assign_details, function(index, val) {
						var cs = { "1": "Assigned","2": "Collected","3": "Received","4": "Processing","5": "Dispatched" };
						 html += '<tr><td>'+val.fld_assigned_date+'</td>';
						 html += '<td>'+val.assign_firstname+' '+val.assign_lastname+'</td>';
						 html += '<td>'+val.fld_dealer_name+'</td>';
						 html += '<td class="font-weight-bold">'+val.fld_assigned_qty+' <small>tons (approx.)</small></td>';
						 if(val.fld_notes != ''){
						 	html += '<td>'+val.fld_notes+'</td>';
						 } else {
						 	html += '<td class="text-warning">Notes not added</td>';
						 }
						 html += '<td>'+cs[val.current_status]+'</td>';
						 if(val.current_status == 5){
						 	html += '<td><a href="'+BASE_URL+'add-carbon-footprints?assign_key='+val.fld_assign_unique_id+'"><small>Add Carbon Footprints</small></a></td></tr>';
						 } else {
						 	html += '<td></td></tr>';
						 }
					});
					$("#list_assign").html(html);
				}
			}
		})
		.fail(function() {
			console.log("error");
		});
		
	})
});