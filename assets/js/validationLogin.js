$(document).ready(function () {

  $("#form-login").submit(function () {
    event.preventDefault()
    jQuery.validator.setDefaults({
      debug: true,
      succes: "valid",
      errorElement: "div",
      validClass: "valid-tooltip",
      errorClass: "alert alert-danger font-weight-bold",
      highlight: function (element, errorClass, validClass) {

      },
      unhighlight: function (element, errorClass, validClass) {

      }

    });
    var validacion = $("#form-login").validate({

      rules: {
        email: { required: true, email: true },
        contraseña: { required: true },
      },

      messages: {
        email: { required: " El Email es requisito obligatorio ", email: "El email debe tener el formato de email ej: ejemplo@algo.com" },
        contrasena: { required: " La contraseña es requisito obligatorio " },
      },

    })

    if (validacion) {

      // Envio de formulario por ajax.
      var data = new FormData($('#form-login')[0]);

      $.ajax({
        type: "POST",
        data: data,
        url: "partials/login.php",
        processData: false,
        contentType: false,
        beforeSend: function () {
          console.log("Espere por favor..");
        },
        success: function (response) {
          console.log(response);
          //window.location = 'http://localhost/demo/index.php';
        },
        error: function (errortext) {
          console.log(errortext);
        }
      });
      // Fin envio de formulario.

    } else {

      // Si no valida, tenes que mostrar los errores en pantalla. 

    }

  })

});
