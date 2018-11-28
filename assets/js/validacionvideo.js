$(document).ready(function () {

  function validarvideo(titulo, description) {

    $(".error").remove();

    if (titulo.length < 1) {
      $('#title').after('<span class="alert alert-danger" role="alert">El campo es requerido.</span>');
      return false;
    }

    if (description.length < 1) {
      $('#description').after('<span class="alert alert-danger" role="alert"">El campo es requerido.</span>');
      return false;
    }

    return true;
  }


  // Validacion de formulario.
  $('#formguardarv').submit(function (e) {
    e.preventDefault();

    var titulo = $('#title').val();
    var description = $('#description').val();

    var validacion = validarvideo(titulo, description);

    if (validacion) {
      // Envio de formulario por ajax.
      var data = new FormData($('#formguardarv')[0]);

      $.ajax({
        type: 'POST', //método de envio
        data: data, //datos que se envian a traves de ajax
        url: "partials/loadvideo.php", //archivo que recibe la peticion
        contentType: false,
        processData: false,
        beforeSend: function () {
          $("#list").html('<div class="alert alert-info">Subiendo archivo...</div>');
        },
        success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
          alert(response);
          // if (response) {
          //   $("#list").html('<div class="alert alert-success">Video subido con exito</div>');
          //   window.location = 'http://localhost/proyecto/upload.php';
          // } else{
          //   $("#list").html('<div class="alert alert-danger">El archivo no es un video</div>');
          // }
          //window.location = 'http://localhost/demo/index.php';
        },
        error: function (errortext) {
          console.log(errortext);
        }
      });
      // Fin envio de formulario.
    } else {

      console.log("Error");
      //sino valida, tenes que mostrar los errores por pantalla.

    }

  });

  // Validacion de formulario de playlist.
  $('#form-playlist').submit(function (e) {
    e.preventDefault();

    // Envio de formulario por ajax.
    var data = new FormData($('#form-playlist')[0]);

    $.ajax({
      type: 'POST', //método de envio
      data: data, //datos que se envian a traves de ajax
      url: "partials/playlist.php", //archivo que recibe la peticion
      contentType: false,
      processData: false,
      beforeSend: function () {
        console.log("subiendo...");
      },
      success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
        if (response == "ok") {
          console.log("playlist creada");
          $("#detail-playlist").html('<div class="alert alert-info">Lista de reproduccion creada!</div>');
          window.location = 'http://localhost/proyecto/upload.php';
        } else if (response == "error") {
          console.log("error php");
          $("#detail-playlist").html('<div class="alert alert-danger">Intente nuevamente</div>');
        }
      },
      error: function (errortext) {
        console.log(errortext);
      }
    });
    // Fin envio de formulario.
  });



});
