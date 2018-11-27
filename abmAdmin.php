<?php

    session_start();

  if (isset($_SESSION['permisos'])){
    if (in_array("publicar_video_pub", $_SESSION['permisos'])) {
      
    }else{
        header("Location:http://localhost/proyecto/index.php");
    } 
  }

    
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" type="text/css" href="./assets/css/admin.css">

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
                <a class="navbar-brand" href="abmAdmin.php">LookAtMe</a>
                <h3 class="navbar-nav ml-auto mt-2 mt-lg-0">Bienvenido <?php echo $_SESSION['name'];?></h3>
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

    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="panel">
                    <div class="table-items">
                        <table class="table table-bordered">
                            <div class="title-table">
                                <h4>Publicidades</h4>
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">Autor</th>
                                    <th scope="col">Nombre publicidad</th>
                                    <th scope="col">descripcion</th>
                                    <th scope="col">Puesto en</th>
                                    <th scope="col">Vista previa</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                
                  include "database.php";
                  
                  $ruta = 'videos_admin/';

                  $sql = "SELECT videos.videoId, videos.title, videos.description, videos.urlFile, users.name FROM videos, users WHERE videos.videoTypeId = 2 AND users.userId = videos.userId";

                  $stmt = $connetion->prepare($sql);
                  
                  $result = $stmt -> execute();

                  $result = $stmt -> fetchAll();
                 
                  if ( count($result) > 0){
        
                    foreach($result as $key){
                      $nombre = $key["name"]; 
                      $urlFile = $key["urlFile"];
                      $title = $key["title"];
                      $videoId = $key["videoId"];
                      $description = $key["description"];

                      ?>
                                <tr>
                                    <th scope="row"><?php echo $nombre; ?></th>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $description;?></td>
                                    <td><a href=""></a></td>
                                    <td>
                                        <div class="image">
                                            <a data-toggle='modal' href='#videoModal<?php echo $videoId;?>'>
                                                <video width="180" height="98" class="image-video" src="<?php echo $ruta . $urlFile ?>">
                                                    
                                                </video>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <button id="btn-delete" class="btn btn-danger">Borrar</button>
                                        <button id="btn-edit" class="btn btn-primary">Editar</button>
                                    </td>
                                </tr>
                                  <div class="modal" id="videoModal<?php echo $videoId;?>">
                                    <div class="modal-dialog">
                                      <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                          <h2>Video!</h2>
                                        </div>
                                        <div class="img-video">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <video class="embed-responsive-item" src="<?php echo $ruta . $urlFile ?>" controls preload="none" allowfullscreen></video>
                                                </div>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">

                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>

                                      </div>

                                    </div>
                                  </div>
                                <?php

                            }
                        }


                                 ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="title">
            <h4>Carga de Publicidad</h4>
        </div>
        <form method="POST" id="formguardarv" enctype="multipart/form-data" autocomplete="off">
            <div class="row" >
                <div class="col-md-8 col-lg-8 panel">
                    <div class="">
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
                <div class="col-md-4 col-lg-4 panel">
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

</body>
    <script src="./assets/js/validacionvideo.js"></script>
    <script src="./assets/js/script2.js" ></script>
</html>