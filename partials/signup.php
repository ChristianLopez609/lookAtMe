<?php 
    session_start();

    require '../database.php';

    // PHP mailer

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../phpmailer/src/Exception.php';
    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/SMTP.php';

    $name = $_POST["name"];
    $email = $_POST["email"];
    $psw = $_POST["psw"];
    $confirm = $_POST["pswconfirm"];
    $type = $_POST["select"];

    if ( !empty($name) && !empty($email) && !empty($type) && !empty($psw) && !empty($confirm) ) {

        $sql = "SELECT email FROM users WHERE email = :email";

        $stmt = $connetion -> prepare($sql);

        $stmt -> bindParam(':email', $email);

        $result = $stmt ->execute();

        if (count($result) > 0){
            
            echo "Repetido";
        
        } else {

            if ( $psw == $confirm ){

                $sql = "INSERT INTO users (name, email, password, confirm, typeUser) VALUES (:name, :email, :psw, :confirm, :type)";
                
                $stmt = $connetion->prepare($sql);
    
                if ( $stmt -> execute(array(':name' =>$name, ':email' =>$email, ':psw' =>$psw, ':confirm' =>$confirm, ':type' =>$type)) ) {
                
                $result = $connetion -> lastInsertId();
    
                //$_SESSION["name"] = $name;
                //$_SESSION["type"] = $type;
                //$_SESSION["userId"] = $result;
                
                $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                    //Server settings
                    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.office365.com';                   // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'khriz_609@hotmail.com';                // SMTP username
                    $mail->Password = 'T46HS363DF';                          // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to
    
                    //Recipients
                    $mail->setFrom('khriz_609@hotmail.com', 'Mailer');
                    $mail->addAddress($email, 'Mailer');     // Add a recipient
                    //$mail->addAddress('ellen@example.com');               // Name is optional
                    //$mail->addReplyTo('info@example.com', 'Information');
                    //$mail->addCC('cc@example.com');
                    //$mail->addBCC('bcc@example.com');
    
                    //Attachments
                    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Validacion de cuenta';
                    $mail->Body    = 'Hola: ' . $name . '</br>' . 'Este correo es solo para notificarte que tu cuenta fue activada. Para volver, vaya a este link: http://localhost/proyecto/index.php';
                    //$mail->AltBody = '';
    
                    $mail->send();
                    //echo 'Message has been sent';
                } catch (Exception $e) {
                    //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
    
                echo "Ok";
    
                }
    
            } else {

                echo "Error";
            }

        }

        
        
    }

    unset($connetion);
?>