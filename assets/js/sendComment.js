$(document).ready(function () {

  $("#video").on('ended',function (){
    alert("video finalizo")
  });

  $("#form-add-playlist").submit(function (e) {
    console.log("entro");
    e.preventDefault();

    var data = new FormData($('#form-add-playlist')[0]);

    $.ajax({
      type: "POST",
      data: data,
      url: "partials/add-playlist.php",
      processData: false,
      contentType: false,
      beforeSend: function () {
        console.log("Guardando...")
      },
      success: function (response) {
        if (response == "ok"){
          $("#cargar").html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Se añadio video</div>');
        } else if (response =="error"){
          $("#cargar").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Error, intente nuevamente</div>');
        }
      },
      error: function (errortext) {
        console.log(errortext);
      }
    });
  });

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