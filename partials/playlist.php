<?php 
  session_start();

  require '../database.php';

  $title = $_POST['title-playlist']; 
  $description = $_POST['description-playlist'];
  $userId = $_SESSION['userId'];

  if ( !empty($title) && !empty($description) ){
    $sql = "INSERT INTO playlist (titleplay, description, userId) VALUES (:title, :description, :userId)";

    $stmt = $connetion->prepare($sql);
    
    if ( $stmt -> execute(array(':title' =>$title, ':description' =>$description, ':userId' =>$userId)) ) {
      echo "ok";
    } else {
      echo "error";
    }
  }

  unset($connetion);
  unset($description);
  unset($title);
  unset($userId);
?>