<?php
class page{
    public static function headerTemplate($title){
        print('
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Inicio</title>
            <link type="text/css" rel="stylesheet" href="../../resources/css/bootstrap.min.css"  media="screen,projection"/>
            <link type="text/css" rel="stylesheet" href="../../resources/css/styleInicio.css"  media="screen,projection"/>
            <link type="text/css" rel="stylesheet" href="../../resources/css/fontawesome.min.css"/>
            <link type="text/css" rel="stylesheet" href="../../resources/css/simple-sidebar.css"/>
            <script src="https://kit.fontawesome.com/9b3f9e4d8d.js" crossorigin="anonymous"></script>

        </head>
        <body>
                <nav class="navbar navbar-light">
                <a class="navbar-brand" href="#">
                    <img src="../../resources/img/LOGO.png" width="220" height="100" class="d-inline-block align-top" alt="Logo">
                </a>
                <div>
                <button type="button" class="btn" id="botones"><i class="fas fa-shopping-cart"></i> <a href="../../views/cliente/carrito.php" style="text-decoration:none;color:#03658C;">Carrito </a></button>
                    <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> Cuenta
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                      <a class="dropdown-item" href="../../views/cliente/cuenta.php"> Configuracion</a>
                      <a class="dropdown-item" href="../../views/cliente/login.php"> Cerrar sesión</a>
                    </div>
                  </div>
                </div>
                </nav>
                <nav class="navbar navbar-expand-sm">
                    <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #17A2B8;color:white;">
                        <span class="navbar-toggler-icon"></span>
                    </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="../../views/cliente/inicio.php">Inicio</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Productos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../../views/cliente/productos.php">Todo</a>
                        <a class="dropdown-item" href="#">Comida</a>
                        <a class="dropdown-item" href="#">Tecnologia</a>
                        <a class="dropdown-item" href="#">Amor</a>
                        <a class="dropdown-item" href="#">Navidad</a>
                        <a class="dropdown-item" href="#">Hallowen</a>
                    </li>
                    <a class="nav-item nav-link" href="../../views/cliente/noticias.php">Noticias</a>
                    <a class="nav-item nav-link" href="../../views/cliente/informacion.php">Informacion</a>
                    <a class="nav-item nav-link" href="../../views/cliente/contactenos.php">Contactenos</a>
                    <a class="nav-item nav-link" href="../../views/cliente/sobrenostros.php">Sobre nosotros</a>
                </div>
            </div>
                </nav>
        ');
    }

    public function footerTemplate(){
        print('
            <footer class="page-footer font-small blue">
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3 d-flex d-flex justify-content-center" id="footer"> © 2020 Copyright:
                <a> Delight.com</a>
            </div>
            <!-- Copyright -->
            
            </footer>

            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="../../resources/js/fontawesome.min.js"></script>
            <script type="text/javascript" src="../../resources/js/initialisation.js"></script>
        </body>
        </body>
        </html>
        ');
    }
}
?>
<!-- <script type="text/javascript" src=".././resources/js/bootstrap.bundle.min.js"></script> -->
