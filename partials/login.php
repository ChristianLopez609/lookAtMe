<?php
    session_start();

    require '../database.php';

    $email = $_POST["email"];
    $psw = $_POST["psw"];

    $email = strip_tags($_POST['email']);
    $email = trim($_POST['email']);

    $psw = strip_tags($_POST['psw']);
    $pws = trim($_POST['psw']);

    if ( !empty($email) && !empty($psw) ){

      $sql = "SELECT * FROM users WHERE email = :email";

      $stmt = $connetion->prepare($sql);
      
      $stmt -> bindParam(':email', $email);

      $stmt -> execute();

      $result = $stmt -> fetch(PDO::FETCH_ASSOC);

      $confirm = $result['password'];

      if ( count($result) > 0 && ($psw == $confirm) ){
        
        $_SESSION["name"] = $result['name'];
        $_SESSION["type"] = $result['typeUser'];
        $_SESSION["userId"] = $result['userId'];

        echo "ok";
      } 
      
    }

?>
