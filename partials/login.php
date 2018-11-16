<?php require 'database.php';

  $message = " ";

  if (isset($_POST['login'])){
    $user = $_POST['email'];
    $password = $_POST['psw'];
    $consulta = $connetion -> prepare ('SELECT email, password, typeuser FROM USERS WHERE EMAIL = '$user' AND PASSWORD = '$password'');
    $consulta -> execute();
    $resultado = $consulta -> fetch();
    if ($resultado !== false) {
      $_SESSION['user'] = $user;
      $_SESSION['typeuser'] = $resultado -> typeuser;
      $message = '<div class="alert alert-info">
                    Sesión Exitosa!
                  </div>';
      header('Refresh: 2; url= index.php');
      
    } else {
      $message = '<div class="alert alert-danger">
                    Verifique los campos, por favor!
                  </div>';
    }
  }

?>