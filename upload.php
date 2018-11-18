<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet" type="text/css" href="./assets/css/upload.css">

    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <script src="./assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/js/validacion.js"></script>
    

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
                    <li class="nav-item">
                        <a class="nav-link" href="upload.php">Subir video<span class="sr-only"></span></a>
                    </li>
                    </li class="nav-item"> 
                        <a class="nav-link" href="abmAdmin.php">Administrar Publicidad<span class="sr-only"></span></a>
                    </li> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cuenta
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                          <?php 
                            if ( isset ($_SESSION['user']) ){
                            echo "<a class='dropdown-item' href='index.php'>Cerrar sesión</a>";
                            session_destroy();
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
    <!--Navbar Fin-->

    <!--Content-->
    <div class="container">
        <form action="" id="formguardarv" enctype="multipart/form-data">
            <div class="row main-div">
                <div class="col-md-8 col-lg-8 upload">
                    <div class="panel">
                        <h2>Carga de video</h2>
                        <p>Videos en formato MPG-4</p>
                    </div>
                    <div class="custom-file">
                        <output id="list"></output>
                        <input type="file" class="custom-file-label" name="file" id="customFile" accept="video/*" required="" ">
                        <label class="custom-file-label" for="customFile">Seleccionar Archivo</label>
                    </div>

                </div>
                <div class="col-md-4 col-lg-4 description">
                    
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Titulo" required="">
                        </div>

                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="text" class="form-control" name="date" id="date" pattern="/([0-9]{2})\-([0-9]{2})\-([0-9]{4})/" required="">
                        </div>
                        <div class="form-group">
                            <label for="FormControlTextArea">Descripcion</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required=""></textarea>
                        </div>
                        <div class="form group">
                            <button type="button" class="btn btn-danger">Cancelar</button>
                            <button type="submit" class="btn btn-primary" name="btn-guardar" id="btn-guardar">Guardar</button>
                        </div>

                </div>
            </div>
        </form>
    </div>
    <!--Fin content-->
    
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
              <form action="index.php" method="POST">
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
    <!--scripts Fin-->
</body>
<script src="./assets/js/script2.js" ></script>
</html>