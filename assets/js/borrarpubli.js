$(document).ready(function () {

  $('.borrar').click(function(){
    var idvid = $(this).attr("data-idvideo");
    console.log(idvid);


      // Envio de formulario por ajax.
      

      $.ajax({
         //método de envio
        data: { 'idvideopul' : idvid}, //datos que se envian a traves de ajax
        url: "partials/borrarpubli.php", //archivo que recibe la peticion
        type: "GET",
        beforeSend: function () {
          console.log("borrando...");
        },
        success: function (response) {
        console.log(response); //una vez que el archivo recibe el request lo procesa y lo devuelve
          if (response == "ok") {
            console.log("Datos eliminados con exito");
            $("#cont1").html('<div class="alert alert-info">Datos eliminados</div>');

            window.location = 'http://localhost/proyecto/abmAdmin.php';
          } else if (response == "error") {
            $("#cont1").html('<div class="alert alert-danger">No se puede modificar los datos</div>');
            console.log("No es un dato");
          }
          //window.location = 'http://localhost/demo/index.php';
        },
        error: function (errortext) {
          console.log(errortext);
        }
      });
      });
      // Fin envio de formulario.

});
