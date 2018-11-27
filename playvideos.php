<?php 

  session_start();

?>

<!DOCTYPE HTML>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LockAtMe</title>

  <link rel="stylesheet" type="text/css" href="./assets/css/playlist.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/search.css">
  
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
        $videoId = $_GET["playlistId"];

        include "database.php";
                  
        $ruta = 'videos/';

        $sql = "SELECT title, description, urlFile, name FROM videos INNER JOIN playlistvideo ON videos.videoId = playlistvideo.videoId LEFT JOIN users ON videos.userId = users.userId WHERE playlistvideo.playlistId = :videoId";

        $stmt = $connetion->prepare($sql);
        
        $stmt -> bindParam('videoId', $videoId);

        $stmt -> execute();
        
        $video = $stmt -> fetch(PDO::FETCH_ASSOC);

        $result = $stmt -> fetchAll();


      ?>
                              
       

			<div class="col-md-8">
					<div class="img-video">
							<div class="embed-responsive embed-responsive-16by9">
								<video class="embed-responsive-item" id="videoarea" autoplay controls src="<?php echo $ruta . $video["urlFile"] ?>" allowfullscreen></video>
							</div>
					</div>
					<div class="img-description">
              <h6 class="img-title"><strong><?php echo $video["title"] ?></strong> </h6>
              <p class="img-autor"> <strong>Autor: </strong><?php echo $video["name"] ?> </p>
							<p class="img-description"> <?php echo $video["description"] ?> </p>
					</div>               
         
			</div>

			<div class="col-md-4">
        <ul id="playlist" class="list">
        
        <?php

          if (count($result) > 0){
            foreach($result as $key){
              $titlevideo = $key["title"];
              $urlFile = $key["urlFile"];

              ?>
              <div class="grid" movieurl="<?php echo $ruta . $urlFile ?>">
                <video width=210 height=118 src="<?php echo $ruta . $urlFile ?>"></video>
                <p class="title-playlist"><?php echo $titlevideo ?></p>
              </div>
              <?php
            }
          }
        ?>
        
            
        </ul>
				
			</div>
      <?php 
            // Se cierra la conexion de la BD, y se liberan la variables.
            unset($result);
            unset($connetion);

          ?>     

		</div>

  </div>

</div>
  <!--scripts-->
	<script src="./assets/js/playlist.js"></script>
  <!--scripts Fin-->
</body>

</html>