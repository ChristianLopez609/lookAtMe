<?php

  $name = $_POST["name"];
  $email = $_POST["email"];
  $type = $_POST["select"];
  $psw = $_POST["psw"];
  $confirm = $_POST["pswconfirm"];

  echo $name, $email, $type, $psw, $confirm;
?>