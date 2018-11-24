<?php 
  
  session_start();

  require '../database.php';

  $userId = $_SESSION["userId"];
  $videoId = $_SESSION["videoId"];
  $comment = $_POST["comment"];

  if ( !empty($comment) && !empty($userId) && !empty($videoId) ) {

    $sql = "INSERT INTO comments (description, userId, videoId) VALUES (:comment, :userId, :videoId)";
            
    $stmt = $connetion->prepare($sql);

    if ( $stmt -> execute(array(':comment' =>$comment, ':userId' =>$userId, ':videoId' =>$videoId)) ) {

      echo "ok";

    } else {
      echo "error";
    }

  }

  unset($userId);
  unset($videoId);
  unset($comment);
  unset($connetion);

?>