// Función autocompletar
function autocompletar() {
 var minimo_letras = 0; // minimo letras visibles en el autocompletar
 var titulovideo = $('#titulo').val();
 //Contamos el valor del input mediante una condicional
 if (titulovideo.length >= minimo_letras) {
 $.ajax({
 url: 'partials/search.php',
 type: 'POST',
 data: {titulovideo},
 success:function(data){
 $('#lista_id').show();
 $('#lista_id').html(data);
 }
 });
 } else {
 //ocultamos la lista
 $('#lista_id').hide();
 }
}
 
// Funcion Mostrar valores
function set_item(opciones) {
 // Cambiar el valor del formulario input
 $('#titulo').val(opciones);
 // ocultar lista de proposiciones
 $('#lista_id').hide();
}