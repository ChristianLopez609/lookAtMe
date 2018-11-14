<?php 

    session_start();

  require '../database.php';

  $message = " ";

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
        $message = 'Usuario creado con exito!';
        $_SESSION["username"] = $_POST['name'];
        $_SESSION["typeuser"] = $_POST['select'];
        header("Location:../index.php");
        } else {
        $message = 'Lo siento, hubo un error en la cuenta.';   
        }
      } else {
          $message = 'Lo siento, las contraseñas no coinciden.'; 
      } 

    
    }
  
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" type="text/css" href="register.css">

    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="../assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <!--Navbar -->
    <?php
        require '../partials/navbar.php'
    ?>
    <!--Navbar Fin-->

    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="main-div">
                    <div class="panel">
                        <h2>Registro</h2>
                        <p>Ingrese sus datos</p>

                        <?php if(!empty($message)): ?>
                            <p> <?= $message ?></p>
                        <?php endif; ?> 
                    </div>
                    
                    <form action="register.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Correo electronico"
                                required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="controlSelect" name="select">
                                <option value="Tipo de Usuario">Tipo de usuario</option>
                                <option value="1">Usuario</option>
                                <option value="2">Administrativo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="password" name="psw" id="psw" class="form-control" placeholder="Contraseña"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm" id="confirm" class="form-control" placeholder="Confirmar contraseña"
                                required>
                        </div>
                        <button type="submit" id="btn-register" class="btn btn-primary btn-block btn-md">Crear cuenta</button>
                        <div class="acount">
                            <a href="#">¿Ya tienes cuenta?</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>