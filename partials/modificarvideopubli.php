<?php
  session_start();

  require '../database.php';

  $title = $_POST['title']; 
  $description = $_POST['description'];
  $video = $_FILES['file'];
  $userId = $_SESSION['userId'];
  $tipoUser = $_SESSION['type'];
  $videoId = $_POST['idvideo']
  $tipoVideo = 'vacio';
 

  if (in_array("publicar_video_pub", $_SESSION['permisos'])) {
      $tipoVideo = 2;
      $stringruta = "../videos_admin/";
    } 
  }

  if ( $video["type"] == "video/mp4" ){
    
    $nom_encriptado = md5($video["tmp_name"]).".mp4";
    $ruta = $stringruta.$nom_encriptado;
    move_uploaded_file($video['tmp_name'], $ruta);

    $sql = "UPDATE videos SET videos.title = :title, videos.description= :description, videos.urlFile= :urlFile,videos.userId= :userId, video.videoTypeId= :videoTypeId WHERE videos.videoId AND videos.userId= :userId";
    
    $stmt = $connetion -> prepare($sql);

    if ( $stmt -> execute(array(':title' => $title, ':description' => $description, ':urlFile' => $nom_encriptado, ':userId' => $userId, ':videoTypeId' => $tipoVideo)) ){
    } 

    echo "ok";

  }

?>