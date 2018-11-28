$(document).ready(function () {

  function validarmodif(titulo, description) {

    $(".error").remove();

    if (titulo.length < 1) {
      $('#title').after('<span class="alert alert-danger" role="alert">This field is required</span>');
      return false;
    }

    if (description.length < 1) {
      $('#description').after('<span class="alert alert-danger" role="alert"">This field is required</span>');
      return false;
    }

    return true;
  }


  // Validacion de formulario.
  $('#formeditarpubli').submit(function (e) {
    e.preventDefault();

    var titulo = $('#title').val();
    var description = $('#description').val();

    var validacion = validarmodif(titulo, description);

    if (validacion) {

      // Envio de formulario por ajax.
      var data = new FormData($('#formeditarpubli')[0]);

      $.ajax({
        type: 'POST', //método de envio
        data: data, //datos que se envian a traves de ajax
        url: "partials/editvideopubli.php", //archivo que recibe la peticion
        contentType: false,
        processData: false,
        beforeSend: function () {
          console.log("subiendo...");
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
          if (response == "ok") {
            console.log("Datos modificados con exito");
            $("#list").html('<div class="alert alert-info">Datos modificados con exito</div>');

            window.location = 'http://localhost/proyecto/upload.php';
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