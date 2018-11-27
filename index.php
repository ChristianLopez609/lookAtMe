<?php 
  session_start();

  if (isset($_SESSION['type'])){
    $tipo = $_SESSION['type'];
    if ( $tipo == 1 ) {
      //header("Location:http://localhost/proyecto/reproduccion.php"); 
    }else if ( $tipo == 2 ){
      header("Location:http://localhost/proyecto/abmAdmin.php");
    } 
  }

  if ( isset($_GET["email"]) && isset($_GET["psw"]) ){

    $correo = $_GET["email"];
    $contraseña = $_GET["psw"];

    $correo = strip_tags($_GET["email"]);
    $correo = trim($_GET["email"]);

    $contraseña = strip_tags($_GET["psw"]);
    $contraseña = trim($_GET["psw"]);

    require 'database.php';
    $sql = "SELECT * FROM users WHERE email = :correo";
    $stmt = $connetion->prepare($sql);  
    $stmt -> bindParam(':correo', $correo);
    $stmt -> execute();
    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    $confirm = $result['password'];
    $estado = $result['status'];

    if ( count($result) > 0 && ($contraseña == $confirm) && $estado == 1){   
      $_SESSION["name"] = $result['name'];
      $_SESSION["type"] = $result['typeUser'];
      $_SESSION["userId"] = $result['userId'];
      
      //Libero las variables.
      unset($sql);
      unset($stmt);
      unset($result);
      unset($connetion);

    } else if (count($result) > 0 && ($contraseña == $confirm) && $estado == 0){
      $estado = 1;
      $sql = "UPDATE users SET status = :estado WHERE email = :correo";
      $stmt = $connetion ->prepare($sql);

      if ( $stmt -> execute(array(':estado' =>$estado, ':correo' =>$correo)) ){
        $sql = "SELECT * FROM users WHERE email = :correo";
        $stmt = $connetion->prepare($sql);
        $stmt -> bindParam(':correo', $correo);
        $stmt -> execute();
        $result = $stmt -> fetch(PDO::FETCH_ASSOC);
        $_SESSION["name"] = $result['name'];
        $_SESSION["type"] = $result['typeUser'];
        $_SESSION["userId"] = $result['userId'];
        
        //Libero las variables.
        unset($sql);
        unset($stmt);
        unset($result);
        unset($connetion);
      }
    }
  }
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LockAtMe</title>

  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
  <script src="./assets/jquery/jquery-3.3.1.min.js"></script>
  <script src="./assets/bootstrap/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
  <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
  <script type="text/javascript" src="buscar.js"></script>
</head>

<style>
ul a{
  color: black;
}
.input_container {
 height: 30px;
 float: left;
}
.input_container input {
}
.input_container ul {
 width: 206px;
 border: 1px solid #eaeaea;
 position: absolute;
 z-index: 9;
 background: #f3f3f3;
 list-style: none;
 padding-left: 15px;
}
.input_container ul li {
 padding: 2px;
}
.input_container ul li:hover {
 background: #eaeaea;
}
#country_list_id {
 display: none;
}
</style>

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
          <form class="form-inline my-2 m-auto my-lg-0" method="POST">
              <div class="input_container" id="pi">
            <input autocomplete="off" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="titulo" id="titulo" onkeyup="autocompletar()">
            <ul id="lista_id"></ul>
            <button class="btn btn-primary my-2 my-sm-0" type="submit" id="btn-buscar" name="btn-buscar">Buscar</button>
            </div>

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
  
                <?php 
                  include "database.php";                
                  $ruta = 'videos/';
                  $sql = "SELECT videoId, title, description, urlFile FROM videos WHERE videoTypeId = 1";
                  $stmt = $connetion->prepare($sql);                 
                  $result = $stmt -> execute();
                  $result = $stmt -> fetchAll();
                 
                  if ( count($result) > 0){
        
                    foreach($result as $key){
                      $urlFile = $key["urlFile"];
                      $title = $key["title"];
                      $videoId = $key["videoId"];

                      ?>
                      <div class="grid-video">
                        <div class="image">
                          <video width="210" height="118" class="image-video" src="<?php echo $ruta . $urlFile ?>"></video>
                        </div>
                        <div class="information">
                          <p class="name"> <?php echo $title ?> </p>
                          <a class="view-more" href="reproduccion.php?urlFile=<?php echo $ruta . $urlFile ?>&videoId=<?php echo $videoId ?>"> Ver más</a>
                        </div>
                      </div>
                      <?php
                    }

                  }
                ?>
              
          </div>

          <?php 

          unset($result);
          unset($connetion);

          ?>

        </div>

      </div>

    </div>

    <div class="row main-playlist">
      <div class="col-md-12">
        <h4 class="playlist-title">Listas de Reproducción</h4>
          <div class="playlist">
            
            <?php 
              include "database.php";
              $sql = "SELECT * FROM playlist";
              $stmt = $connetion -> prepare($sql);
              $videos = $stmt -> execute();
              $videos = $stmt -> fetchAll();
              if ( count($videos) > 0){
                foreach($videos as $key){
                  $playlist = $key["playlistId"];
                  $titleplay = $key["titleplay"];
                  ?>
                  <div class="grid-playlist">
                    <div class="play-img">
                      <a href="playvideos.php?playlistId=<?php echo $playlist ?>">
                        <img src="images/play.png" class="image-video" alt="">
                      </a>
                    </div>
                    <div class="play-info">
                      <p class="name"> <?php echo $titleplay ?> </p>
                    </div>
                  </div>
                  <?php

                }
              } else {
                echo "¡No hay listas cargadas!";
              }
            
            ?>
          </div>
      </div>

       <?php 

        unset($videos);
        unset($connetion);

        ?>
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

  <!--scripts-->
  <script src="./assets/js/validationLogin.js"></script>

  <!--scripts Fin-->
</body>

</html>