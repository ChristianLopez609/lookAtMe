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


?>

<!DOCTYPE HTML>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LockAtMe</title>

  <link rel="stylesheet" type="text/css" href="./assets/css/play.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
  <script src="./assets/jquery/jquery-3.3.1.min.js"></script>
  <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

    <!--Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">LookAtMe</a>   
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <form class="form-inline my-2 m-auto my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
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
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
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

  <div class="main-videos">

		<div class="columns">

      <?php 
        // Este script recupera los datos enviados por la URL y los procesa para obtener los datos de titulo y descripcion.                
        $urlFile = $_GET["urlFile"];
        $videoId = $_GET["videoId"];

        include "database.php";
                  
        $ruta = 'videos/';

        $sql = "SELECT title, description, name FROM videos INNER JOIN users ON videos.videoId = :videoId AND videos.userId = users.userId";

        $stmt = $connetion->prepare($sql);
        
        $stmt -> bindParam('videoId', $videoId);

        $stmt -> execute();

        $result = $stmt -> fetch(PDO::FETCH_ASSOC);

        $_SESSION["videoId"] = $videoId;

      ?>
                              
       

			<div class="col-md-8">
					<div class="img-video">
							<div class="embed-responsive embed-responsive-16by9">
								<video class="embed-responsive-item" id="video" autoplay controls src="<?php echo $_GET["urlFile"]?>" allowfullscreen></video>
							</div>
					</div>
					<div class="img-description">
              <h6 class="img-title"><strong><?php echo $result["title"] ?></strong> </h6>
              <p class="img-autor"> <strong>Autor: </strong><?php echo $result["name"] ?> </p>
							<p class="img-description"> <?php echo $result["description"] ?> </p>
              <?php
              if (isset($_SESSION['name'])){
                echo '<form id="form-add-playlist" class="form-add-playlist" method="post">
                    
                    <div class="form-group" id="playlistSelect">
                        <select class="form-control" id="playlists" name="playlists" required="">
                            <option value="">Añadir a playlist</option>
                            <?php  // Script para recuperar las playlist.
                              $sql = "SELECT playlistId, titleplay FROM playlist";
                              $stmt = $connetion->prepare($sql);                           
                              $stmt -> execute();
                              $result = $stmt -> fetchAll();                           
                              if (count($result) > 0){                            
                                foreach($result as $key){
                                  echo $key["title"];
                                  ?>
                                  <option value="<?php echo $key["playlistId"] ?>"> <?php echo $key["titleplay"] ?> </option>
                                  <?php
                                }
                              }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Añadir</button>
                    <div id="cargar" class="result-playlist">
                    </div>
                </form>';
              } else {

              }
              ?>
					</div>

          <?php 
            // Se cierra la conexion de la BD, y se liberan la variables.
            unset($result);
            unset($connetion);

          ?>                    
         
			</div>

			<div class="col-md-4">
				<div class="scroll-comment" id="box-comment">

           <?php

            require './database.php';

            $videoId = $_SESSION["videoId"];

            $sql = "SELECT description, name FROM comments INNER JOIN users ON comments.userId = users.userId AND comments.videoId = :videoId";
                    
            $stmt = $connetion->prepare($sql);

            $stmt -> bindParam('videoId', $videoId);

            $stmt -> execute();
              
            $result = $stmt -> fetchAll();
                          
            if ( count($result) > 0){

              foreach($result as $key){
              
              $username = $key['name'];
              $comment = $key['description'];

              ?>
              <div class="main-content">
                <p class="autor"> <strong> <?php echo $username ?> </strong> </p>
                <p class="comment"><?php echo $comment ?></p>
              </div>
              <?php
              }

            }

          ?>                   

				</div>
        
        <?php
          
          if (isset($_SESSION['name'])){
            echo '<div class="input-comment">
              <form action="" method="post" id="form-comment" autocomplete=off>
                  <div class="form-group">
                      <textarea class="form-control" id="comment" placeholder="Escribir..." name="comment" rows="2" required=""></textarea>
                  </div>
                  <button class="btn btn-primary input-form" type="submit" name="send-comment">Comentar</button>
              </form>
            </div>' ;
          } else {
            echo '<div class="no-login">
                    <p class="no-login-access">Para comentar esta publicacion, debe <a href="./register.php">Registrarse</a>.</p>
                  </div>';  
          }
        
        ?>
				
			</div>


		</div>

  </div>
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
  <!--scripts-->
	<script src="./assets/js/sendComment.js"></script>
  <script src="./assets/js/validationLogin.js"></script>
  <!--scripts Fin-->
</body>

</html>