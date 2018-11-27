$(document).ready(function () {

    function validarlogin(email, psw) {

        $('#erroremail').remove();
        $('#errorpsw').remove();


        var expRegEmail = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        emailValido = expRegEmail.test(email) ? true : false;
        if (!emailValido) {
            $('#email').after('<div id="erroremail" class="alert alert-danger" role="alert"><span>El correo y/o la contraseña no son correctas.</span></div>');
            $('#email').focus(function () {
                $('#erroremail').remove();
            });
            return false;
        }
        if (email.trim().length < 1) {
            $('#email').after('<div id="erroremail" class="alert alert-danger" role="alert"><span>El correo y/o la contraseña no son correctas.</span></div>');
            $('#email').focus(function () {
                $('#erroremail').remove();
            });
            return false;
        }

        var expRegPsw = /^[a-z0-9_-]{4,10}$/;
        pswValido = expRegPsw.test(psw) ? true : false;
        if (!pswValido) {
            $('#psw').after('<div id="errorpsw" class="alert alert-danger" role="alert"><span>El correo y/o la contraseña no son correctas.</span></div>');
            $('#psw').focus(function () {
                $('#errorpsw').remove();

            });
            return false;
        }
        if (psw.trim().length < 1) {
            $('#psw').after('<div id="errorpsw" class="alert alert-danger" role="alert"><span>El correo y/o la contraseña no son correctas.</span></div>');

            $('#psw').focus(function () {
                $('#errorpsw').remove();

            });
            return false;
        }

        return true;
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

                    console.log(response);
                    
                    if (response == "Ok") {
                        $("#resultado-login").html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>¡Inicio de sesión exitoso!</div>');
                        window.location = 'http://localhost/proyecto/index.php';
                    } else if (response == "Registrarse"){
                        $("#resultado-login").html('<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Le enviamos un correo de activacion, revise su casilla.</div>')
                    } else {
                        $("#resultado-login").html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Lo siento, las credenciales no coinciden.</div>')
                    }
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
