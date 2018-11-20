<?php 

    session_start();

?>

<!DOCTYPE HTML>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LockAtMe</title>

  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">

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
          <a class="navbar-brand" href="index.php">LookAtMe</a>
          <form class="form-inline my-2 m-auto my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
          </form>
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

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
                  echo "<a class='dropdown-item' data-toggle='modal' href='#loginModal'>Iniciar sesión</a>";
                  echo "<a class='dropdown-item' href='register.php'>Registrarse</a>";
                  }
                ?>
              </div>
            </li>
          </ul>
        </div>
      </div>
  </nav>
  <!--Fin -->

  <!--Content-->

  <div class="container">
    <div class="row main-div">
      <div class="col-md-12">
        <div class="header-content">
          <h4 class="panel-title">Recomendados</h4>
        </div>
        <div class="body-content">

          <div class="list-video">

          
            <div class="grid-video">

             
                <div class="image embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=Mnyk5Uscdug" allowfullscreen></iframe>
                </div>
                <div class="information">
                  <p class="name"><strong>Titulo</strong></p>
                  <a class="view-more" href="">Ver más</a>
                </div>
              

            </div>

          </div>

        </div>
      </div>


    </div>
    <div class="row main-div">
      <div class="col-md-12">
        <div class="header-content">
          <h4 class="panel-title">Mixes de Lookatme</h4>
        </div>
        <div class="body-content">

          <div class="list-video">

          
            <div class="grid-video">

             
                <div class="image embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=Mnyk5Uscdug" allowfullscreen></iframe>
                </div>
                <div class="information">
                  <p class="name"><strong>Titulo</strong></p>
                  <a class="view-more" href="">Ver más</a>
                </div>
              

            </div>

          </div>

        </div>
      </div>


    </div>
  
  </div>

  <!--Content Fin-->

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
          <form method="POST" id="form-login">
            <p>Ingrese su correo y contraseña</p>
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



  <!--scripts-->
  <script src="./assets/js/validationLogin.js"></script>

  <!--scripts Fin-->
</body>

</html>