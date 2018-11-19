<?php

  $name = $_POST["name"];
  $email = $_POST["email"];
  $type = $_POST["select"];
  $psw = $_POST["psw"];
  $confirm = $_POST["pswconfirm"];

  echo $name, $email, $type, $psw, $confirm;
?>


<?php require 'database.php';

$message = " ";

if (isset($_POST['login'])){
  $email = $_POST['email'];
  $psw = $_POST['psw'];
  $sql = "SELECT email, password, typeuser FROM users WHERE EMAIL = :email";
  $stmt = $connetion->prepare($sql);
  $stmt -> execute(array(':email' =>$email);
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($arr as $row) {
   if ($row['email'] == $email){
     if ($row['password'] == $psw){
       $_SESION['user'] = $user;
       $_SESSION['type'] = $row['typeUser'];
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