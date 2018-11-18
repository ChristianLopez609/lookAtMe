<?php require 'database.php';

  $message = " ";

  if (isset($_POST['register'])){
        if ( !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['psw']) && !empty($_POST['confirm']) && !empty($_POST['select']) ) {
            
            if ( $_POST['psw'] == $_POST['confirm'] ){
                
                $name = $_POST['name'];
                $email = $_POST['email'];
                $psw = $_POST['psw'];
                $confirm = $_POST['confirm'];
                $typeuser = $_POST['select'];

                $sql = "INSERT INTO users (name, email, password, confirm, typeUser) VALUES (:name, :email, :psw, :confirm, :typeuser)";
                
                $stmt = $connetion->prepare($sql);

                if ( $stmt -> execute(array(':name' =>$name, ':email' =>$email, ':psw' =>$psw, ':confirm' =>$confirm, ':typeuser' =>$typeuser)) ) {

                $_SESSION["user"] = $email;
                $_SESSION["type"] = $typeuser;
                
                $message = '<div class="alert alert-info">
                                Usuario creado con exito!
                            </div>';

                header("Refresh: 2; url= index.php");

                } else {

                $message = '<div class="alert alert-danger">
                                Lo siento, ha ocurrido un error.
                            </div>';   
                }

            } else {

                $message = '<div class="alert alert-danger">
                                Lo siento, las contraseñas no coinciden.
                            </div>'; 
            } 
        }
    }
?>