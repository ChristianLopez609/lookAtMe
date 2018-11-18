$(document).ready(function() {
    var fechahora = new Date();
    var dia = fechahora.getDate();
    var mes = fechahora.getMonth() + 1;
    var anio = fechahora.getFullYear();

    $("#date").val(dia+"/"+mes+"/"+anio);
    $("#date").prop("disabled",true)
  $('#formguardarv').submit(function(e) {
    e.preventDefault();
    var titulo = $('#title').val();
    var fecha = $("#date").val();
    var description = $('#description').val();

    $(".error").remove();

    if (titulo.length < 1) {
      $('#title').after('<span class="error">This field is required</span>');
    }
    if (description.length < 1) {
      $('#description').after('<span class="error">This field is required</span>');
    }
    $(function() {
    var regexDateValidator = function (fecha) {
     return (fecha).match(/([0-9]{4})\-([0-9]{2})\-([0-9]{2})/);
 }
 $("#date").blur(function(){
     accept = regexDateValidator($(this).val());
     if (!accept) $(this).val('');
    if (fecha === "") {
        $("#date").after('<span class="error">Este campo no puede ser modificado</span>')
        $("#date").val(dia+"/"+mes+"/"+anio);
        $("#date").prop("disabled",true)
    }
  });
 
    });
  });

});