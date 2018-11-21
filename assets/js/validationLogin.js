$(document).ready(function () {

    function validarlogin(email, psw) {

        $('#erroremail').remove();
        $('#errorpsw').remove();


        var expRegEmail = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        emailValido = expRegEmail.test(email) ? true : false;
        if (!emailValido) {
            $('#email').after('<div id="erroremail" class="alert alert-danger" role="alert"><span>Email invalido</span></div>');
            $('#email').focus(function () {
                $('#erroremail').remove();
            });
            return false;
        }
        if (email.trim().length < 1) {
            $('#email').after('<div id="erroremail" class="alert alert-danger" role="alert"><span> Email invalido</span></div>');
            $('#email').focus(function () {
                $('#erroremail').remove();
            });
            return false;
        }

        var expRegPsw = /^[a-z0-9_-]{4,10}$/;
        pswValido = expRegPsw.test(psw) ? true : false;
        if (!pswValido) {
            $('#psw').after('<div id="errorpsw" class="alert alert-danger" role="alert"><span>Error contraseña muy corta</span></div>');
            $('#psw').focus(function () {
                $('#errorpsw').remove();

            });
            return false;
        }
        if (psw.trim().length < 1) {
            $('#psw').after('<div id="errorpsw" class="alert alert-danger" role="alert"><span>Error contraseña muy corta2</span></div>');

            $('#psw').focus(function () {
                $('#errorpsw').remove();

            });
            return false;
        }

        return true;
        $('#erroremail').remove();
        $('#errorpsw').remove();
    }

    $('#form-login').submit(function (e) {

        e.preventDefault();
        var email = $('#email').val();
        var psw = $('#psw').val();

        var validacion = validarlogin(email, psw);

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
                    $("#resultado-login").html("Procesando, espere por favor...");
                },
                success: function (response) {
                    $("#resultado-login").html(response);
                    //window.location = 'http://localhost/demo/index.php';
                },
                error: function (errortext) {
                    console.log(errortext);
                }
            });
            // Fin envio de formulario.

        } else {
            $("#resultado-login").html("Ocurrio un error, intente nuevamente");
        }

    });
});
