<?php

    session_start();

    if (!isset($_SESSION['name'])){
      header("Location: index.php");
    }
    
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" type="text/css" href="./assets/css/admin.css">

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

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="index.php">LookAtMe</a>
                <form class="form-inline my-2 m-auto my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

                    <?php

                    if (isset($_SESSION['type'])){

                    $tipo = $_SESSION['type'];
                        if ( $tipo == 1 ) {
                            echo "<li class='nav-item active'>
                                <a class='nav-link' href='upload.php'>Subir video<span class='sr-only'></span></a>
                                </li>";
                        } else if ( $tipo == 2 ){
                            echo "</li class='nav-item'> 
                                    <a class='nav-link' href='abmAdmin.php'>Administrar Publicidad<span class='sr-only'></span></a>
                                </li>";
                        } 
                    } 

                    ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cuenta
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <?php 
                            if ( isset ($_SESSION['name']) ){
                            echo "<a class='dropdown-item' href='logout.php'>Cerrar sesión</a>";
                            
                            } else { 
                            echo "<a class='dropdown-item' data-toggle='modal' href='#loginModal'>Iniciar sesión</a>";
                            echo "<a class='dropdown-item' href='register.php'>Registrarse</a>";
                            }
                            ?>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <!--Navbar Fin-->

    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="panel">
                    <div class="table-items">
                        <table class="table table-bordered">
                            <div class="title-table">
                                <h4>Publicidades</h4>
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">URL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>
                                        <a href="//www.youtube.com/watch?v=37IN_PW5U8E">publicidad 1</a>
                                        <button id="btn-delete" class="btn btn-danger">Borrar</button>
                                        <button id="btn-edit" class="btn btn-primary">Editar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>
                                        <a href="//www.youtube.com/watch?v=37IN_PW5U8E">publicidad 1</a>
                                        <button id="btn-delete" class="btn btn-danger">Borrar</button>
                                        <button id="btn-edit" class="btn btn-primary">Editar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-panel">
                        <form action="">
                            <div class="title">
                                <h4>Carga de Publicidad</h4>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Titulo de publicidad">
                            </div>
                            <div class="custom-file">
                                <input type="file" class="form-control-file" name="file" id="customFile">
                                <label class="custom-file-label" for="customFile">Elegir archivo</label>
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-primary">Guardar</button>
                                <button class="btn btn-danger">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>