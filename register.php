<?php

    session_start();

    if (isset($_SESSION['name'])){
      header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" type="text/css" href="./assets/css/register.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <script src="./assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>    
</head>

<body>
    <!--Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="./index.php">LookAtMe</a>
            <form class="form-inline my-2 m-auto my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
            </form>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item active">

                <?php

                  if (isset($_SESSION['type'])){

                    $tipo = $_SESSION['type'];
                    if ( $tipo == 1 ) {
                      echo "<li class='nav-item active'>
                            <a class='nav-link' href='upload.php'>Subir video<span class='sr-only'></span></a>
                          </li>";
                    } else if ( $tipo == 2 ){
                      echo "</li class='nav-item'> 
                              <a class='nav-link' href='abmAdmin.php'>Administrar Publicidad<span class='sr-only'></span></a>
                            </li>";
                    } 
                  } 

                ?>

              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  Cuenta
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <?php 
                    if ( isset ($_SESSION['name']) ){
                    echo "<a class='dropdown-item' href='logout.php'>Cerrar sesión</a>";
                    
                    } else { 
                    echo "<a class='dropdown-item' href='index.php'>Inicio</a>";
                    }
                  ?>
                </div>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <!--Navbar Fin-->

    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="main-div">
                    <div class="panel">
                        <h2>Registro</h2>
                        <p>Ingrese sus datos</p>
                        <p id="resultado-register"></p>
                    </div>
                    
                    <form method="POST" id="formregistrar" autocomplete="off">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required="">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email2" class="form-control" placeholder="Correo electronico"
                                required="">
                        </div>
                        <div class="form-group" id="divcontrolSelect">
                            <select class="form-control" id="controlSelect" name="select" required="">
                                <option value="">Tipo de usuario</option>
                                <option value="1">Usuario</option>
                                <option value="2">Administrativo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="password" name="psw" id="psw2" class="form-control" placeholder="Contraseña"
                                required="">
                        </div>
                        <div class="form-group" id="divpswconfirm">
                            <input type="password" name="pswconfirm" id="pswconfirm" class="form-control" placeholder="Confirmar contraseña"
                                required="">
                        </div>
                        <button type="submit" id="btn-register" name="register" class="btn btn-primary btn-block btn-md">Crear cuenta</button>
                        <div class="acount">
                            <a data-toggle='modal' href='#loginModal'>¿Ya tienes cuenta?</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- The Modal -->
  <div class="modal" id="loginModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h2>¡Bienvenido!</h2>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="POST" id="form-login" autocomplete="off">
            <p>Ingrese su correo y contraseña</p>
            <p id="resultado-login"></p>
            <div class="form-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Correo electronico"
                required>
            </div>
            <div class="form-group">
              <input type="password" id="psw" name="psw" class="form-control" placeholder="Contraseña" required>
            </div>
            <div class="forgot">
              <a href="#">Olvido su contraseña?</a>
            </div>
            <button type="submit" id="btn-login" name="login" class="btn btn-primary btn-block btn-md">Ingresar</button>
            <div class="register">
              <a href="register.php">No tienes cuenta? Registrate!</a>
            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>

    </div>
  </div>
  </div>

  <script src="./assets/js/validacionregistro.js"></script>

</body>

</html>