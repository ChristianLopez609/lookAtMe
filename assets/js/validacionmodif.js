$(document).ready(function () {

  function validarmodif(titulo, description) {

    $("#errortittle").remove();
    $('#errordescription').remove();

    if (titulo.length < 1) {
      $('#titlepeque').after('<span id="errortittle" class="alert alert-danger" role="alert">Nombre invalido.</span>');
      $('#titlepeque').focus(function () {
        $('#errortittle').remove();
      });
      return false;
    }

    if (description.length < 1) {
      $('#descriptionpeque').after('<span id="errordescription" class="alert alert-danger" role="alert"">Se necesita descripcion</span>');
      $('#descriptionpeque').focus(function () {
        $('#errordescription').remove();
      });
      return false;
    }

    return true;
  }


  // Validacion de formulario.
  $('#formeditar').submit(function (e) {
    e.preventDefault();

    var titulo = $('#titlepeque').val();
    var description = $('#descriptionpeque').val();

    var validacion = validarmodif(titulo, description);

    if (validacion) {

      // Envio de formulario por ajax.
      var data = new FormData($('#formeditar')[0]);

      $.ajax({
        type: 'POST', //método de envio
        data: data, //datos que se envian a traves de ajax
        url: "partials/editvideopubli.php", //archivo que recibe la peticion
        contentType: false,
        processData: false,
        beforeSend: function () {
          console.log("subiendo...");
        },
        success: function (response) {
        console.log(response); //una vez que el archivo recibe el request lo procesa y lo devuelve
          if (response == "ok") {
            $("#list").html('<div class="alert alert-info">Datos modificados con exito</div>');
            window.location = 'http://localhost/proyecto/abmAdmin.php';
          } else if (response == "error") {
            $("#list").html('<div class="alert alert-danger">No se puede modificar los dato</div>');
            console.log("No es un dato");
          }
          //window.location = 'http://localhost/demo/index.php';
        },
        error: function (errortext) {
          console.log(errortext);
        }
      });
      // Fin envio de formulario.
}
});

});