<?php
  session_start();

  include '../database.php';

  $title = $_POST['titlepeque']; 
  $description = $_POST['descriptionpeque'];
  $video = $_FILES['filepeque'];
  $userId = $_SESSION['userId'];
  $tipoUser = $_SESSION['type'];
  $videoId = $_POST['idvideo'];
  $tipoVideo = 'vacio';
 

  if (in_array("publicar_video_pub", $_SESSION['permisos'])) {
      $tipoVideo = 2;
      $stringruta = "../videos_admin/";
      } 

  if ( $video["type"] == "video/mp4" ){
    
    $nom_encriptado = md5($video["tmp_name"]).".mp4";
    $ruta = $stringruta.$nom_encriptado;
    move_uploaded_file($video['tmp_name'], $ruta);


    $sql = "UPDATE videos SET videos.title= :title, videos.description= :description, videos.urlFile= :urlFile  WHERE videos.videoId = :videoId";
    
    $stmt = $connetion -> prepare($sql);

    if ($stmt -> execute (array(':title' => $title, ':description' => $description,':urlFile' => $nom_encriptado, ':videoId' => $videoId)) ){
    echo "ok";
    }else{
      echo "error";
    }
  

}else{

  $sql = "UPDATE videos SET videos.title= :title, videos.description= :description, WHERE video.videoId= :videoId";

  $stmt = $connetion -> prepare($sql);

  if ($stmt -> execute(array(':title' => $title, ':description' => $description, ':videoId' => $videoId))) {
    echo "ok";
  }else{
    echo "error";
  }
}

?>

