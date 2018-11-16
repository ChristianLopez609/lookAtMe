<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet" type="text/css" href="upload.css">

  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <script src="../assets/jquery/jquery-3.3.1.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
  <!--Navbar -->
  <?php
    require '../partials/navbar.php';
  ?>
  <!--Fin -->

    <!--Content-->
    <div class="container">
        <form action="">
            <div class="row main-div">
                <div class="col-md-8 col-lg-8 upload">
                    <div class="panel">
                        <h2>Carga de video</h2>
                        <p>Videos en formato MPG-4</p>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="form-control-file" name="file" id="customFile">
                        <label class="custom-file-label" for="customFile">Elegir archivo</label>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 description">
                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="titulo">
                    </div>
                    <div class="form-group">
                        <label for="date">Fecha</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>
                    <div class="form-group">
                        <label for="FormControlTextArea">Descripcion</label>
                        <textarea class="form-control" id="FormControlTextArea" name="description" rows="3"></textarea>
                    </div>
                    <div class="form group">
                        <button type="button" class="btn btn-danger">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--Fin content-->

    <!--scripts-->
    <!--scripts Fin-->
</body>

</html>