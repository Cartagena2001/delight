<?php
class page{
  public static function headerTemplate($title){
  print('
  <!DOCTYPE html>
  <html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link type="text/css" rel="stylesheet" href="../../resources/css/bootstrap.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../../resources/css/styleAdmin.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../../resources/css/fontawesome.min.css"/>
      <link type="text/css" rel="stylesheet" href="../../resources/css/simple-sidebar.css"/>
      <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
      <link  rel="icon"   href="../../resources/img/ICO.ico" type="image/png" />
      <script src="https://kit.fontawesome.com/9b3f9e4d8d.js" crossorigin="anonymous"></script>
      <title>Inicio administrador</title>
  </head>
  <body>
      <nav class="navbar navbar-light">
          <a class="navbar-brand" href="#">
              <img src="../../resources/img/LOGO.png" width="190" height="80" class="d-inline-block align-top" alt="Logo">
              <button class="btn ml-5 mt-4" id="menu-toggle" id="hamburger" style="background-color: #17A2B8;color:white;"><i class="fas fa-bars"></i></button>
          </a>
        </nav>
  
        <div class="d-flex" id="wrapper">
          <div id="sidebar-wrapper">
              <div class="sidebar-heading text-center"><img src="../../resources/img/imgAdmin.jpg" alt="Perfil" class="img-fluid rounded-circle" width="150"></div>
              <h5 class="text-center">Gabriela Ramirez</h5>
              <h5 class="text-center">Admistrador</h5>
            <div class="list-group list-group-flush text-center mt-4">
              <a href="index.php" class="list-group-item list-group-item-action" id="itemAdmin">Inicio</a>
              <a href="clientes.php" class="list-group-item list-group-item-action" id="itemAdmin">Clientes</a>
              <a href="pedidos.php" class="list-group-item list-group-item-action" id="itemAdmin">Pedidos</a>
              <a href="detallePedidos.php" class="list-group-item list-group-item-action" id="itemAdmin">Detalle Pedidos</a>
              <a href="productos.php" class="list-group-item list-group-item-action" id="itemAdmin">Productos</a>
              <a href="categorias.php" class="list-group-item list-group-item-action" id="itemAdmin">Categorias</a>
              <a href="cupones.php" class="list-group-item list-group-item-action" id="itemAdmin">Cupones</a>
              <a href="noticias.php" class="list-group-item list-group-item-action" id="itemAdmin">Noticias</a>
            </div>
          </div>
  ');
  }
  public function footerTemplate(){
    print('
      
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../resources/js/fontawesome.min.js"></script>
    <script type="text/javascript" src="../../resources/js/initialisation.js"></script>
    </body>
    </html>
    ');
  }
}
?>










      