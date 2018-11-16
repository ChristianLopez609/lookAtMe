<?php require 'database.php';

  $message = " ";

  if (isset($_POST['register'])){
        if ( !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['psw']) && !empty($_POST['confirm']) && !empty($_POST['select']) ) {
            if ( $_POST['psw'] == $_POST['confirm'] ){

                $sql = "INSERT INTO users (name, email, password, confirm, typeUser) VALUES (:name, :email, :psw, :confirm, :select)";
                $stmt = $connetion->prepare($sql);
                $stmt->bindParam(':name', $_POST['name']);
                $stmt->bindParam(':email', $_POST['email']);
                $stmt->bindParam(':psw', $_POST['psw']);
                $stmt->bindParam(':confirm', $_POST['confirm']);
                $stmt->bindParam(':select', $_POST['select']);

                if ($stmt->execute()) {

                $_SESSION["user"] = $_POST['email'];
                $_SESSION["typeUser"] = $_POST['select'];
                
                $message = '<div class="alert alert-info">
                                Usuario creado con exito!
                            </div>';
                header("Refresh: 2; url= index.php");
                } else {

                $message = '<div class="alert alert-danger">
                                Lo siento, verifique los campos vacios.
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