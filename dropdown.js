$('.dropdown').on('change',function() {
	$(this).nextAll('.dropdown').attr('disabled','disabled').attr('value','').html('<option> Select one </option>');
	console.log(this);
});

$('#country-select').on('change', function() {
	var self =$(this);
	$.ajax({
		url: 'http://localhost/coverage/country.php',
		type: 'GET',
		data: { country: self.val() },
		success: function (data) {
			$('#gov-select').html(data).removeAttr('disabled');
		}
	});
});
$('#gov-select').on('change', function() {
	var self =$(this);
	$.ajax({
		url: 'http://localhost/coverage/governorate.php',
		type: 'GET',
		data: { governorate: self.val() },
		success: function (data) {
			$('#dist-select').html(data).removeAttr('disabled');
		}
	});
});
$('#dist-select').on('change', function() {
	var self =$(this);
	$.ajax({
		url: 'http://localhost/coverage/district.php',
		type: 'GET',
		data: { district: self.val() },
		success: function (data) {
			$('#sd-select').html(data).removeAttr('disabled');
		}
	});
});
$('#sd-select').on('change', function() {
	var self =$(this);
	$.ajax({
		url: 'http://localhost/coverage/subdistrict.php',
		type: 'GET',
		data: { subdistrict: self.val() },
		success: function (data) {
			$('#comm-select').html(data).removeAttr('disabled');
		}
	});
});







