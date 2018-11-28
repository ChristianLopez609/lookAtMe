<?php
  session_start();

  require '../database.php';
  $videoId = $_GET["idvideopul"]; 
  $sql = "DELETE FROM videos WHERE videos.videoId = :videoId";

  $stmt = $connetion -> prepare($sql);
  if ($stmt -> execute (array(':videoId' => $videoId) )) {
    
  }
  echo "ok";
  

?>