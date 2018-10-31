$(document).ready(function(){
	$('#botonopen').click(function openNav() {
		$("#mySidenav").css('width', '250px');
		$("#main").css('margin-left', '250px');
		$('#botonopen').addClass('oculto');
		$('#botonclose').removeClass('oculto');

	});
	$('#botonclose').click(function closeNav() {
		$("#mySidenav").css('width', '0px');
		$("#main").css('margin-left', '0px');
		$('#botonclose').addClass('oculto');
		$('#botonopen').removeClass('oculto');
	});

});

