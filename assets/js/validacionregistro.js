$(document).ready(function () {

    function validarregistro(nombre, email, psw, pswconfirm, select) {

        $('#errorname').remove();
        $('#erroremail').remove();
        $('#errorpsw').remove();
        $('#errorpswconfirm').remove();
        $('#errorselect').remove();

        var expReg = /^([a-zA-Z]{4,14})/;
        nombreValido = expReg.test(nombre) ? true : false;
        if (!nombreValido) {
            $('#name').after('<span id="errorname" class="alert alert-danger" role="alert">Nombre invalido.</span>');
            $('#name').focus(function () {
                $('#errorname').remove();
            });
            return false;
        }
        if (nombre.trim().length < 3 || nombre.trim().length > 14) {
            $('#name').after('<span id="errorname" class="alert alert-danger" role="alert">Nombre invalido.</span>');
            $('#name').focus(function () {
                $('#errorname').remove();
            });
            return false;
        }

        var expRegEmail = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        emailValido = expRegEmail.test(email) ? true : false;
        if (!emailValido) {
            $('#email').after('<span id="erroremail" class="alert alert-danger" role="alert">Email invalido</span>');
            $('#email').focus(function () {
                $('#erroremail').remove();
            });
            return false;
        }
        if (email.trim().length < 1) {
            $('#email').after('<span id="erroremail" class="alert alert-danger" role="alert">Email invalido</span>');
            $('#email').focus(function () {
                $('#erroremail').remove();
            });
            return false;
        }

        var expRegPsw = /^[a-z0-9_-]{4,10}$/;
        pswValido = expRegPsw.test(psw) ? true : false;
        if (!pswValido) {
            $('#psw').after('<span id="errorpsw" class="alert alert-danger" role="alert">Error contraseña muy corta</span>');
            $('#psw').focus(function () {
                $('#errorpsw').remove();
            });
            return false;
        }
        if (psw.trim().length < 1) {
            $('#psw').after('<span id="errorpsw" class="alert alert-danger" role="alert">Error contraseña muy corta</span>');
            $('#psw').focus(function () {
                $('#errorpsw').remove();
            });
            return false;
        }
        var expRegPswConfirm = /^[a-z0-9_-]{4,10}$/;
        pswconfirmValido = expRegPswConfirm.test(pswconfirm) ? true : false;
        if (psw != pswconfirm) {
            $('#pswconfirm').after('<span id="errorpswconfirm" class="alert alert-danger" role="alert">Campo requerido</span>');
            $('#pswconfirm').focus(function () {
                $('#errorpswconfirm').remove();
            })
            return false;

        }
        if (select.trim() === '') {
            $('#divcontrolSelect').after('<span id="errorselect" class="alert alert-danger" role="alert">Debe seleccionar una opción</span>');
            $('#divcontrolSelect').focus(function () {
                $('#errorselect').remove();
            })
            return false;
        }

        if (!(psw == pswconfirm)) {
            $("#resultado").html('<div class="alert alert-danger" role="alert">Lo siento, las contraseñas no coinciden.</div>');
            return false;
        }

        return true;

    }

    $('#formregistrar').submit(function (e) {
        e.preventDefault();
        var nombre = $('#name').val();
        var email = $('#email').val();
        var psw = $('#psw').val();
        var pswconfirm = $('#pswconfirm').val();
        var select = $('#controlSelect').val();

        var validacion = validarregistro(nombre, email, psw, pswconfirm, select);

        if (validacion) {

            // Envio de formulario por ajax.
            var data = new FormData($('#formregistrar')[0]);

            $.ajax({
                type: 'POST', //método de envio
                data: data, //datos que se envian a traves de ajax
                url: "partials/signup.php", //archivo que recibe la peticion
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $("#resultado").html("Procesando, espere por favor...");
                },
                success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    if (response == "ok"){
                        $("#resultado").html('<div class="alert alert-info">Usuario creado con exito</div>');
                        window.location = 'http://localhost/proyecto/index.php';
                    } else {
                        $("#resultado").html('<div class="alert alert-danger">Lo siento, ha ocurrido un error.</div>');
                    }
                    //$("#resultado").html(response);
                },
                error: function (errortext) {
                    console.log(errortext);
                }
            });
            // Fin envio de formulario.

        } else {
            $("#resultado").html("Ocurrio un error, intente nuevamente");
            //sino valida, tenes que mostrar los errores por pantalla.

        }
    });
});