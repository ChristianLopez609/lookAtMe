<?php

require "../database.php";


if ($_POST['titulovideo']) {
  
  $ruta = 'videos/';

  $titulo = $_POST['titulovideo'];
  
  $sql = "SELECT videoId, title, description, urlFile FROM videos WHERE videoTypeId = 1 AND title LIKE  :titulo";
          
  $stmt = $connetion->prepare($sql);
  $buscar="%".$titulo."%";
  $result = $stmt -> execute(array(':titulo' =>$buscar));

  $rows = $stmt -> fetchAll();

  if (count($rows)) {
    foreach($rows as $row){
      
      $urlFile = $row["urlFile"];
      $title = $row["title"];
      $videoId = $row["videoId"];
 // Colocaremos negrita a los textos
 $nombre_video = str_replace($titulo, '<b>'.$titulo.'</b>', $title);
 // Aquì, agregaremos opciones

    echo "<a href='reproduccion.php?urlFile= ".$ruta . $urlFile. "&videoId=".$videoId."'> <li onclick='set_item(\''.str_replace('', '\', ".$title.").'\')'>".$nombre_video."</li></a>";
  }
  }
  else {
    echo "No hay sugerencias";
  }

}
//<li onclick="set_item(\''.str_replace("'", "\'", $title).'\')">'.$nombre_video.'</li>

?>