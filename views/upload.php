<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet" type="text/css" href="upload.css">

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../jquery/jquery-3.3.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <!--Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">LookAtMe</a>
                <form class="form-inline my-2 m-auto my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
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
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
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