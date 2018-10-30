$(document).ready(function(){
	$('#botonopen').click(function openNav() {
		$("#mySidenav").css('width', '250px');
		$("#main").css('margin-left', '250px');
	});
	$('#botonclose').click(function closeNav() {
		$("#mySidenav").css('width', '0px');
		$("#main").css('margin-left', '0px');
	});

});

