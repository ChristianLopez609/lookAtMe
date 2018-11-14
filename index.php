
<?php
  session_start();
  require 'database.php';
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LockAtMe</title>

  <link rel="stylesheet" type="text/css" href="style.css">

  <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
  <script src="./assets/jquery/jquery-3.3.1.min.js"></script>
  <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

  <!--Navbar -->
  <?php
    require 'partials/navbar.php';
  ?>
  <!--Fin -->

  <!--Content-->

  <div class="container main-div">
    <div class="row">
      <div class="col-md">
        <div class="header-content">
          <h4 class="panel-title">Recomendados</h2>
        </div>
        <div class="body-content">
          <div class="items">
            <div class="grid-video">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=Mnyk5Uscdug" allowfullscreen></iframe>
              </div>
              <div class="details-video">
                <p class="title"><strong>Titulo</strong></p>
                <p class="detail">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              </div>
            </div>
            <div class="grid-video">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=Mnyk5Uscdug" allowfullscreen></iframe>
              </div>
              <div class="details-video">
                <p class="title"><strong>Titulo</strong></p>
                <p class="detail">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              </div>
            </div>
            <div class="grid-video">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=Mnyk5Uscdug" allowfullscreen></iframe>
              </div>
              <div class="details-video">
                <p class="title"><strong>Titulo</strong></p>
                <p class="detail">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              </div>
            </div>
            <div class="grid-video">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=Mnyk5Uscdug" allowfullscreen></iframe>
              </div>
              <div class="details-video">
                <p class="title"><strong>Titulo</strong></p>
                <p class="detail">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              </div>
            </div>
            <div class="grid-video">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=Mnyk5Uscdug" allowfullscreen></iframe>
              </div>
              <div class="details-video">
                <p class="title"><strong>Titulo</strong></p>
                <p class="detail">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              </div>
            </div>
            <div class="grid-video">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=Mnyk5Uscdug" allowfullscreen></iframe>
              </div>
              <div class="details-video">
                <p class="title"><strong>Titulo</strong></p>
                <p class="detail">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              </div>
            </div>
            <div class="grid-video">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=Mnyk5Uscdug" allowfullscreen></iframe>
              </div>
              <div class="details-video">
                <p class="title"><strong>Titulo</strong></p>
                <p class="detail">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              </div>
            </div>
            <div class="grid-video">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=Mnyk5Uscdug" allowfullscreen></iframe>
              </div>
              <div class="details-video">
                <p class="title"><strong>Titulo</strong></p>
                <p class="detail">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              </div>
            </div>
            <div class="grid-video">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=Mnyk5Uscdug" allowfullscreen></iframe>
              </div>
              <div class="details-video">
                <p class="title"><strong>Titulo</strong></p>
                <p class="detail">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              </div>
            </div>
            <div class="grid-video">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=Mnyk5Uscdug" allowfullscreen></iframe>
              </div>
              <div class="details-video">
                <p class="title"><strong>Titulo</strong></p>
                <p class="detail">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!--Content Fin-->

  <!-- The Modal -->
  <div class="modal" id="loginModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h2>¡Bienvenido!</h2>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="index.php" method="POST">
            <p>Ingrese su correo y contraseña</p>
            <div class="form-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Correo electronico"
                required>
            </div>
            <div class="form-group">
              <input type="password" id="psw" name="psw" class="form-control" placeholder="Contraseña" required>
            </div>
            <div class="forgot">
              <a href="#">Olvido su contraseña?</a>
            </div>
            <button type="submit" id="btn-login" name="login" class="btn btn-primary btn-block btn-md">Ingresar</button>
            <div class="register">
              <a href="./views/register.php">No tienes cuenta? Registrate!</a>
            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>

    </div>
  </div>
  </div>



  <!--scripts-->


  <!--scripts Fin-->
</body>

</html>