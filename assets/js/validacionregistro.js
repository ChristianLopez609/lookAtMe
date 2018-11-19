$(document).ready(function () {

    $('#formregistrar').submit(function (e) {
        e.preventDefault();
        var nombre = $('#name').val();
        var email = $('#email').val();
        var psw = $('#psw').val();
        var pswconfirm = $('#pswconfirm').val();
        var select = $('#controlSelect').val();
        $('.error').remove();

        var expReg = /^([a-zA-Z]{4,14})/;
        nombreValido = expReg.test(nombre) ? true : false;
        if (!nombreValido) {
            $('#name').after('<span id="errorname" class="error">Nombre invalido.</span>');
            $('#name').focus(function () {
                $('#errorname').remove();
            });
            return;
        }
        if (nombre.trim().length < 3 || nombre.trim().length > 14) {
            $('#name').after('<span id="errorname" class="error">Nombre invalido.</span>');
            $('#name').focus(function () {
                $('#errorname').remove();
                return;
            });
        }

        var expRegEmail = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        emailValido = expRegEmail.test(email) ? true : false;
        if (!emailValido) {
            $('#email').after('<span id="erroremail" class="error">Email invalido</span>');
            $('#email').focus(function () {
                $('#erroremail').remove();
            });
            return;
        }
        if (email.trim().length < 1) {
            $('#email').after('<span id="erroremail" class="error">Email invalido</span>');
            $('#email').focus(function () {
                $('#erroremail').remove();
                return;
            });
        }

        var expRegPsw = /^[a-z0-9_-]{4,10}$/;
        pswValido = expRegPsw.test(psw) ? true : false;
        if (!pswValido) {
            $('#psw').after('<span id="errorpsw" class="error">Error contraseña muy corta</span>');
            $('#psw').focus(function () {
                $('#errorpsw').remove();
            });
            return;
        }
        if (psw.trim().length < 1) {
            $('#psw').after('<span id="errorpsw" class="error">Error contraseña muy corta</span>');
            $('#psw').focus(function () {
                $('#errorpsw').remove();
                return;
            });
        }
        var expRegPswConfirm = /^[a-z0-9_-]{4,10}$/;
        pswconfirmValido = expRegPswConfirm.test(pswconfirm) ? true : false;
        if (pswValido != pswconfirmValido) {
            $('#pswconfirm').after('<span id="errorpswconfirm" class="error">This field is required</span>');
            $('#pswconfirm').focus(function () {
                $('#errorpswconfirm').remove();
            })

        }
        if (select.trim() === '') {
            $('#divcontrolSelect').after('<span id="errorselect" class="error">Debe seleccionar una opción</span>');
            $('#divcontrolSelect').focus(function () {
                $('#errorselect').remove();
            })
        }

        if (!(psw == pswconfirm)) {
            $("#resultado").html('<div class="alert alert-danger">Lo siento, las contraseñas no coinciden.</div>')
        }


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
                $("#resultado").html(response);
                console.log(response);
                //window.location = 'http://localhost/demo/index.php';

            },
            error: function (errortext) {
                $("#resultado").html(errortext);
            }
        });
        // Fin envio de formulario.


    });
});