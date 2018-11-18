<?php require 'database.php';

if ( isset($_POST['btn-guardar']) ) {  

  if(is_uploaded_file($_FILES['file']['tmp_name'])) { 
  
    // me verifica haya sido cargado el archivo  
      $ruta_destino = "videos/"; 
      $namefinal= trim ($_FILES['fichero']['name']); // linea nueva devuelve la cadena sin espacios al principio o al final 
      $namefinal= ereg_replace (" ", "", $namefinal); // linea nueva devuelve la cadena sin espacios entre palabras 
      $uploadfile= $ruta_destino.$namefinal;  

      if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) { // se coloca en su lugar final  
                  
                  echo "<b>Upload exitoso!. Datos:</b><br>";  
                  echo "Nombre: <i><a href=\"".$ruta_destino . $_FILES['fichero']['name']."\">".$_FILES['fichero']['name']."</a></i><br>";  
                  echo "Tipo MIME: <i>".$_FILES['fichero']['type']."</i><br>";  
                  echo "Peso: <i>".$_FILES['fichero']['size']." bytes</i><br>";  
                  echo "<br><hr><br>";  

                  $title  = $_POST["title"]; 
                  $date = $_POST["date"];
                  $description = $_POST["description"]; 
                  $type = 2;

                  $sql = "INSERT INTO videos (title, date, description, urlFile, type, size, videoTypeId)  VALUES ('$title', '$date', '$description', '".$_FILES['fichero']['name']."', '".$_FILES['fichero']['type']."', '".$_FILES['fichero']['size']."', '$type')";
                  
                  $stmt = $connection->prepare($sql);

                  $stmt -> execute();
      }  
  }  
} 
?>