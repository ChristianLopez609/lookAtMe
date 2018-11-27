<?php

    session_start();

    if (!isset($_SESSION['name'])){
      header("Location: index.php");
    }
    
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet" type="text/css" href="./assets/css/upload.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <script src="./assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    
    

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
                    <input class="form-control mr-sm-2 search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    <!--Navbar Fin-->

    <!--Content-->
    <div class="container">
        <form method="POST" id="formguardarv" enctype="multipart/form-data" autocomplete="off">
            <div class="row main-div" >
                <div class="col-md-8 col-lg-8 upload">
                    <div class="panel">
                        <h2 class="title-upload">Carga de video</h2>
                        <p class="subtitle-upload">Videos en formato MP4</p>
                    </div>
                    <div class="custom-file" id="divvideo">
                        <input type="file" size="10000000"  class="custom-file-label" name="file" id="customFile" accept="video/mp4" required="">
                        <label class="custom-file-label" for="customFile">Seleccionar Archivo</label>
                    </div>
                    <div class="preview">
                        <output class="preview-video" id="list"></output>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 description">
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" name="title" id="title" required="">
                        </div>
                        <div class="form-group">
                            <label for="FormControlTextArea">Descripcion</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required=""></textarea>
                        </div>
                        <div class="form group actions">
                            <button type="submit" class="btn btn-primary btn-block" name="btn-guardar" id="btn-guardar">Guardar</button>
                            <button type="button" class="btn btn-danger btn-block">Cancelar</button>
                        </div>
                </div>
            </div>
        </form>
        <div class="playlist" style="border: solid 1px black; position: relative; top: 10px; background: #fff; padding:10px">
            <div class="columns">
                <div class="col-md-12">
                    <form method="post" id="form-playlist" autocomplete="off">
                        <h4>Creación Lista de reproducción</h4>
                        <div class="form-group">
                            <input type="text" class="form-control" id="title-playlist" name="title-playlist" required placeholder="Lista de reproducción">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="description-playlist" name="description-playlist" required placeholder="Breve descripción..." rows="3"></textarea>
                        </div>
                        <div id="detail-playlist">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
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
              <form method="POST" id="formlogin">
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
    <script src="./assets/js/validacionvideo.js"></script>
    <script src="./assets/js/script2.js" ></script> 
    <!--scripts Fin-->
</body>

</html>