$(document).ready(function () {

  //Validacion formulario de login.
  $('#form-login').submit(function (e) {
    e.preventDefault();
    var email = $('#email').val();
    var psw = $('#psw').val();

    // Envio de formulario por ajax.
    var data = new FormData($('#form-login')[0]);

    $.ajax({
      type: 'POST',
      data: data,
      url: "partials/login.php",
      contentType: false,
      processData: false,
      beforeSend: function () {
        console.log("Espere por favor..");
      },
      success: function (response) {
        console.log(response);
        window.location = 'http://localhost/demo/index.php';
      },
      error: function (errortext) {
        console.log(errortext);
      }
    });

    // Fin envio de formulario.
  })

})