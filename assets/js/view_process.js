var loading_mens = new Cleave('#loading_mens', {
  numeral: true,
  numeralThousandsGroupStyle: 'thousand'
});

$(function(){
	$(document).on('change', '#add_transport', function(e){
		if($(this).is(':checked')){
			$("#transport_detail").removeAttr('disabled');
			$("#transport_detail").removeClass('d-none');
		} else {
			$("#transport_detail").attr('disabled', 'disabled');
			$("#transport_detail").addClass('d-none');
		}
	});

	$(document).on('change', '#current_status', function(e){
		if($(this).val() == '2'){
			$("#transport_detail").attr('disabled', 'disabled');
			$("#transport_detail").addClass('d-none');
			$("#upload_manifest").removeAttr('disabled');
			$("#upload_manifest").removeClass('d-none');
		} else {
			$("#transport_detail").attr('disabled', 'disabled');
			$("#transport_detail").addClass('d-none');
			$("#upload_manifest").attr('disabled', 'disabled');
			$("#upload_manifest").addClass('d-none');
		}
	});
});