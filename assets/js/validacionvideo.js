$(document).ready(function () {
  var fechahora = new Date();
  var dia = fechahora.getDate();
  var mes = fechahora.getMonth() + 1;
  var anio = fechahora.getFullYear();

  $("#date").val(dia + "/" + mes + "/" + anio);
  $("#date").prop("disabled", true)


  // Validacion de formulario.
  $('#formguardarv').submit(function (e) {
    e.preventDefault();

    /*var titulo = $('#title').val();
    var fecha = $("#date").val();
    var description = $('#description').val();

    $(".error").remove();

    if (titulo.length < 1) {
      $('#title').after('<span class="error">This field is required</span>');
    }
    if (description.length < 1) {
      $('#description').after('<span class="error">This field is required</span>');
    }

    var regexDateValidator = function (fecha) {
      return (fecha).match(/([0-9]{4})\-([0-9]{2})\-([0-9]{2})/);
    }
    $("#date").blur(function () {
      accept = regexDateValidator($(this).val());
      if (!accept) $(this).val('');
      if (fecha === "") {
        $("#date").after('<span class="error">Este campo no puede ser modificado</span>')
        $("#date").val(dia + "/" + mes + "/" + anio);
        $("#date").prop("disabled", true)
      }

    }); */

    // Envio de formulario por ajax.
    var data = new FormData($('#formguardarv')[0]);

    $.ajax({
      type: 'POST', //método de envio
      data: data, //datos que se envian a traves de ajax
      url: "partials/loadvideo.php", //archivo que recibe la peticion
      contentType: false,
      processData: false,
      beforeSend: function () {
        console.log("subiendo...");
      },
      success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
        alert(response);
        //window.location = 'http://localhost/demo/index.php';
      },
      error: function (errortext) {
        console.log(errortext);
      }
    });
    // Fin envio de formulario.

  });
  // Fin validacion.

});