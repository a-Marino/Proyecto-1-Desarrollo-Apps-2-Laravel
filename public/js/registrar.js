$('#role').change(()=>{
	let role = $('#role').val();

	if (role == 'enfermero') {
		$('#div_rup').show();
		$('#div_telefono').show();
	} else {
		$('#div_rup').hide();
		$('#div_telefono').hide();
	}
});