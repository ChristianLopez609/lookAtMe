<?php session_start();

 require './partials/login.php';
 
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LockAtMe</title>

  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">

  <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
  <script src="./assets/jquery/jquery-3.3.1.min.js"></script>
  <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
</head>
<body>

    <!--Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">LookAtMe</a>   
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <form class="form-inline my-2 m-auto my-lg-0">
                    <div class="input-group p-1">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form> 
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Subir video<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cuenta
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Iniciar sesión</a>
                            <a class="dropdown-item" href="#">Registrarse</a>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
  <!--Navbar Fin-->

  <!--Content-->
<div class="container">
  <div class="row">
    <div class="col-md-8" style="border: 1px solid black;">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
      </div>
    </div>
  <!-- aca esta lo de los comentarios que te dije obvio que va cargado con lo que escriben no con eso-->
    <div class="col-md-4" style="border: 1px solid black;">
      <div class="scroll">
      <div class="card">
        <div class="card-header">
          <span class="p-3">Special title treatment</span> 
          
        </div>
        <div class="card-body">
          <p class="card-text">Es el mejor video de mi vida!!</p>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <span class="p-3">Special title treatment</span> 
          
        </div>
        <div class="card-body">
          <p class="card-text">Es el mejor video de mi vida!!</p>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <span class="p-3">Special title treatment</span> 
          
        </div>
        <div class="card-body">
          <p class="card-text">Es el!!</p>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <span class="p-3">Special title treatment</span> 
          
        </div>
        <div class="card-body">
          
          <p class="card-text">Es el mejor video del mundo!!</p>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <span class="p-3">Special title treatment</span> 
          
        </div>
        <div class="card-body">
          
          <p class="card-text">Definitivamente vamos a ser felices los 4</p>

        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <span class="p-3">Special title treatment</span> 
          
        </div>
        <div class="card-body">
          
          <p class="card-text">Es el mejor video de mi vida!!</p>

        </div>
      </div>
      </div>
    </div>
  </div>
</div>

    
  <!--scripts-->
  

  <!--scripts Fin-->
</body>

</html>