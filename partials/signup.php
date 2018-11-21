<?php 
    session_start();

    require '../database.php';

    $name = $_POST["name"];
    $email = $_POST["email"];
    $psw = $_POST["psw"];
    $confirm = $_POST["pswconfirm"];
    $type = $_POST["select"];

    if ( !empty($name) && !empty($email) && !empty($type) && !empty($psw) && !empty($confirm) ) {
        
        if ( $psw == $confirm ){

            $sql = "INSERT INTO users (name, email, password, confirm, typeUser) VALUES (:name, :email, :psw, :confirm, :type)";
            
            $stmt = $connetion->prepare($sql);

            if ( $stmt -> execute(array(':name' =>$name, ':email' =>$email, ':psw' =>$psw, ':confirm' =>$confirm, ':type' =>$type)) ) {
            
            $result = $connetion -> lastInsertId();

            $_SESSION["name"] = $name;
            $_SESSION["type"] = $type;
            $_SESSION["userId"] = $result;
            
            echo "ok";

            }

        } 
    }
?>