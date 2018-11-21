<?php
  session_start();

  require '../database.php';

  $title = $_POST['title']; 
  $description = $_POST['description'];
  $video = $_FILES['file'];
  $userId = $_SESSION['userId'];
  $tipoUser = $_SESSION['type'];
  $tipoVideo = 'vacio';

  if ($tipoUser == 1){
    $tipoVideo = 1;
  } else {
    $tipoVideo = 2;
  }

  if ( $video["type"] == "video/mp4" ){
    
    $nom_encriptado = md5($video["tmp_name"]).".mp4";
    $ruta = "../videos/".$nom_encriptado;
    move_uploaded_file($video['tmp_name'], $ruta);

    $sql = "INSERT INTO videos (title, description, urlFile, userId, videoTypeId) VALUES (:title, :description, :urlFile, :userId, :videoTypeId)";
    
    $stmt = $connetion -> prepare($sql);

    if ( $stmt -> execute(array(':title' => $title, ':description' => $description, ':urlFile' => $nom_encriptado, ':userId' => $userId, ':videoTypeId' => $tipoVideo)) ){
      echo "ok";
    } 

  } else {
    echo "error";
  }

?>