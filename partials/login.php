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
      $confirm = $result['confirm'];
      $estado = $result['status'];
      $tipouser = $result['typeUser'];

      if ( count($result) > 0 && ($psw == $confirm) && $estado == 1){

        $sql2="SELECT acciones.descripcion FROM acciones,permisos WHERE permisos.id_accion = acciones.id_accion AND permisos.id_tipousuario = :id_tipousuario";

        $stmt2 = $connetion->prepare($sql2);     
        $stmt2 -> bindParam(':id_tipousuario', $tipouser );
        $stmt2 -> execute();
        $resultado = $stmt2 -> fetchAll(PDO::FETCH_ASSOC);

        $_SESSION["name"] = $result['name'];
        $_SESSION["type"] = $result['typeUser'];
        $_SESSION["userId"] = $result['userId'];

        $permisos = array();

        foreach ($resultado as $var) {
          array_push($permisos, $var['descripcion']);
        }

        $_SESSION["permisos"] = $permisos;

        echo "Ok";
        unset($sql);
        unset($stmt);
        unset($connetion);

      } else if ( count($result) > 0 && ($psw == $confirm) && $estado == 0 ){

        echo "Registrarse";
      
      } else {

        echo "Error";

      }
      
    }

?>
