<?php require 'database.php';

  $message = " ";

  if (isset($_POST['login'])){
    $user = $_POST['email'];
    $password = $_POST['psw'];
    $sql = "SELECT email, password, typeuser FROM USERS WHERE EMAIL = :user AND PASSWORD = :pass";
    $stmt = $connetion -> prepare ($sql);
    $stmt -> execute(array(':user' =>$user, ':pass' =>$password));
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($arr as $row) {
     if ($row['email'] == $user){
       if ($row['password'] == $password){
         $_SESION['user'] = $user;
         $_SESSION['typeuser'] = $row['typeUser'];
         $message = '<div class="alert alert-info">
                    Sesión Exitosa!
                  </div>';
          header("Refresh: 2; url= index.php");
       }
     } else {
        $message = '<div class="alert alert-danger">
        Verifique los campos, por favor!
        </div>';
     }
    }
  }

?>