<?php
  session_start();

  require '../database.php';

  $playlistId = $_POST["playlists"];
  $videoId = $_SESSION["videoId"];
 
   if ($playlistId != 0) {
    $sql = "INSERT INTO playlistvideo (playlistId, videoId) VALUES (:playlistId, :videoId)";
    $stmt = $connetion -> prepare($sql);
    
    if ( $stmt -> execute(array(':playlistId' =>$playlistId, ':videoId' =>$videoId)) ) {
      echo "ok";
    } else {
      echo "error";
    }

   } else {
     echo "fail";
   }

   unset($playlistId);
   unset($videoId);
   unset($connetion);

?>