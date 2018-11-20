$(document).ready(function () {

  function validarvideo(titulo, description){
    
    $(".error").remove();

    if (titulo.length < 1) {
      $('#title').after('<span class="error">This field is required</span>');
      return false;
    }


    if (description.length < 1) {
      $('#description').after('<span class="error">This field is required</span>');
      return false;
    }

    return true;
  }


  // Validacion de formulario.
  $('#formguardarv').submit(function (e) {
    e.preventDefault();

    var titulo = $('#title').val();
    var description = $('#description').val();

    var validacion = validarvideo(titulo,description);

    }); 

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
