$(function() {
	$(document).on('change', '#site_selected', function(e){
		var siteid = $(this).val();
		$.ajax({
			url: BASE_URL+'getInchargePerson',
			type: 'POST',
			data: { siteid: siteid },
		})
		.done(function(res) {
			var text1 = res.firstname+' '+res.lastname;
			var p = res.key;
			$("#incharge_person option[data-target=per"+p+"]").attr('selected', 'selected');
			$("#workmail").val(res.email);
			$("#phone").val(res.phone);
		});
	});

	$(document).on('change', '.recurring-pickup', function(event) {
		var v = $(this).val();
		if(v == 1){
			$("#rec-day").removeClass('d-none');
			$("#recurring-day").removeAttr('disabled');
		} else {
			$("#rec-day").addClass('d-none');
			$("#recurring-day").attr('disabled', 'disabled');
		}
	});

	$(document).on('change', '#incharge_person', function(e){
		var incharge = $(this).val();
		$.ajax({
			url: BASE_URL+'get_inchage_person_detail',
			type: 'POST',
			data: { incharge: incharge },
		})
		.done(function(res) {
			$("#workmail").val(res.email);
			$("#phone").val(res.phone);
		});
	});

	var cleaveQty = new Cleave('#qty', {
      	numeral: true,
      	numeralThousandsGroupStyle: 'thousand'
    });

	$(document).on('click', '#add-more-images', function(event) {
		var html = '';
		html += '<div class="form-group col-md-3 ex-image"><span class="del-image">Delete</span><div class="custom-file"><input type="file" class="custom-file-input" name="waste_file[]" id="waste_file" required="required"><label class="custom-file-label" for="waste_file">Attach Photographs</label></div></div>';
		$(".multi_file").append(html);
	});

	$(document).on('click', '.del-image', function(event) {
		$(this).parent().remove();
	});

	$(document).on('change', '.custom-file-input', function () {
		$(this).next().parent().find('label').text($(this).val().match(/[-_\w]+[.][\w]+$/i)[0]);
		console.log($(this).val());
	});

});