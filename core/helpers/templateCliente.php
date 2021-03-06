<?php
class page
{
  public static function headerTemplate($title)
  {

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
            <link  rel="icon"   href="../../resources/img/ICO.ico" type="image/png" />
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
                      <a class="dropdown-item" href="../../views/cliente/cuenta.php">Configuracion</a>
                      <a class="dropdown-item" href="#" onclick="logOut()">Cerrar sesión</a>
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
                    <a class="nav-item nav-link" href="../../views/cliente/bienvenido.php">Inicio</a>
                    <a class="nav-item nav-link" href="../../views/cliente/productos.php">Productos</a>
                    <a class="nav-item nav-link" href="../../views/cliente/noticias.php">Noticias</a>
                    <a class="nav-item nav-link" href="../../views/cliente/informacion.php">Informacion</a>
                    <a class="nav-item nav-link" href="../../views/cliente/contactenos.php">Contactenos</a>
                    <a class="nav-item nav-link" href="../../views/cliente/sobrenostros.php">Sobre nosotros</a>
                </div>
            </div>
                </nav>
        ');
  }

  public function footerTemplate($controller)
  {
    print('
            <footer class="page-footer font-small blue">
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3 d-flex d-flex justify-content-center" id="footer"> © 2020 Copyright:
                <a> Delight.com</a>
            </div>
            <!-- Copyright -->
            
            </footer>

            <script type="text/javascript" src="../../core/controllers/cliente/account.js"></script>  
            <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
            <script src="../../resources/js/jquery-3.4.1.min.js"></script>
            <script type="text/javascript" src="../../core/helpers/components.js"></script>

            <script type="text/javascript" src="../../core/controllers/cliente/' . $controller . '"></script>
            

            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="../../resources/js/fontawesome.min.js"></script>
            
        </body>
        </body>
        </html>
        ');
  }
}
?>
<!--  -->