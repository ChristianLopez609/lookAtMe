$(document).ready(function () {

  $("#form-comment").submit(function (e) {

    e.preventDefault();
    // Envio de formulario por ajax.
    var data = new FormData($('#form-comment')[0]);

    $.ajax({
      type: "POST",
      data: data,
      url: "partials/sendmessage.php",
      processData: false,
      contentType: false,
      beforeSend: function () {
        //$("#resultado-login").html("Procesando, espere por favor...");
        console.log("enviando...")
      },
      success: function (response) {
        console.log(response)
      },
      error: function (errortext) {
        console.log(errortext);
      }
    });
  });      // Fin envio de formulario.

});