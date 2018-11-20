$(document).ready(function () {

    $("#form-login").submit(function(){
    event.preventDefault()
        jQuery.validator.setDefaults({
            debug:true,
            succes:"valid",
            errorElement:"div",
            validClass:"valid-tooltip",
            errorClass:"alert alert-danger font-weight-bold",
            highlight:function(element,errorClass,validClass){
                
                
            },
            unhighlight:function(element,errorClass,validClass){
                
                
            }
            
        });
        var validacion=$("#form-login").validate({

            rules:{
                email:{required:true, email:true},
                contraseña:{ required:true},

            },

            messages:{
                email:{required:" El Email es requisito obligatorio ",email:"El email debe tener el formato de email ej: ejemplo@algo.com"},
                contrasena:{required:" La contraseña es requisito obligatorio "},
            },
        
        })
    if(validacion){
      //enviarajax
      var formData = new FormData($(this)[0]);
      $.ajax({
        data:formData,
        url:this.action,
        type:"POST",
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
    }else{
      //lo mandas al carajo
    }




    })

});
