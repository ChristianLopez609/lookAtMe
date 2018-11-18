<?php require 'database.php';

  if (isset($_POST['btn-guardar'])){
    if ( !emply($_POST['title']) && !emply($_POST['date']) && !empty($_POST['description']) ){

      $title = $_POST['title'];
      $date = $_POST['date'];
      $description = $_POST['description'];
      $file = $_POST['file'];
      $type = 2;

      $sql = "INSERT INTO videos (title, date, description, urlFile, type, size, videoTypeId) VALUES (:title, :date, :description, :urlFile, :type, :size, :type)";

      $stmt = $connection->prepare($sql);

      if ( $stmt -> execute(array(':title' =>$title, ':date' =>$date, 'description' =>$description, 'urlFile' =>$archivo, 'type' =>$permitido, 'size' =>$limite )) ){
        echo "Se ha cargado el nuevo video!";
      }
      else {
        echo "Error";
      }

      $id_insert = $connection->lastInsertId();

      if ($_FILES["file"]["error"]>0){
        echo "Error al cargar archivo";
      } else {
        
        $permitido = "video/*";
        $limite = 5120;

        if( ($_FILES["file"]["type"] == $permitido) && $_FILES["file"]["size"] <= $limite ){

          $ruta = 'videos/'.$id_insert.'/';
          $archivo = $ruta.$_FILES["file"]["name"];

          if (!file_exists($ruta)){
            mkdir($ruta);
          }

          if (!file_exists($archivo)){

            $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"],
            $archivo);

          } else {
            echo "Archivo ya existe";
          }

          if ($resultado){
            echo "Archivo guardado";
          } else {
            echo "Error al guardar archivo";
          }

        } else {
          echo "Archivo no permitido o excede el tamaño";
        }
      }
    }
  }

?>