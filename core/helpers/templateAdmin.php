<?php
class page
{
  public static function headerTemplate($title)
  {
    session_start();
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
        <link type="text/css" rel="stylesheet" href="../../resources/css/morris.css"/>
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link  rel="icon"   href="../../resources/img/ICO.ico" type="image/png"/>
        
        <link type="text/css" rel="stylesheet" href="../../resources/css/dataTable/dataTables.bootstrap4.min.css"/>
        <link type="text/css" rel="stylesheet" href="../../resources/css/dataTable/responsive.bootstrap4.min.css"/>
  
        <title>Inicio administrador</title>
    </head>
    <body>
    ');
    $filename = basename($_SERVER['PHP_SELF']);
    if(isset($_SESSION['id_administrador'])){

      if($filename != 'login.php' && $filename != 'register.php'){
        print('
  
      <nav class="navbar navbar-light">
          <a class="navbar-brand" href="#">
              <img src="../../resources/img/LOGO.png" width="190" height="80" class="d-inline-block align-top" alt="Logo">
              <button class="btn ml-5 mt-4" id="menu-toggle" id="hamburger" style="background-color: #17A2B8;color:white;"><i class="fas fa-bars"></i></button>
          </a>
        </nav>
  
        <div class="d-flex" id="wrapper">
          <div id="sidebar-wrapper">
              <div class="sidebar-heading text-center"><img src="../../resources/img/imgAdmin.jpg" alt="Perfil" class="img-fluid rounded-circle" width="150"></div>
              <h5 class="text-center mb-1">'.$_SESSION['usuario'].'</h5>
              <h5 class="text-center">Admistrador</h5>
            <div class="list-group list-group-flush text-center mt-4">
              <a href="bienvenido.php" class="list-group-item list-group-item-action" id="itemAdmin">Inicio</a>
              <a href="clientes.php" class="list-group-item list-group-item-action" id="itemAdmin">Clientes</a>
              <a href="pedidos.php" class="list-group-item list-group-item-action" id="itemAdmin">Pedidos</a>
              <a href="detallePedidos.php" class="list-group-item list-group-item-action" id="itemAdmin">Detalle Pedidos</a>
              <a href="productos.php" class="list-group-item list-group-item-action" id="itemAdmin">Productos</a>
              <a href="categorias.php" class="list-group-item list-group-item-action" id="itemAdmin">Categorias</a>
              <a href="cupones.php" class="list-group-item list-group-item-action" id="itemAdmin">Cupones</a>
              <a href="noticias.php" class="list-group-item list-group-item-action" id="itemAdmin">Noticias</a>
              <a href="editarperfil.php" class="btn text-center mt-3"><i class="fas fa-edit"></i> Editar perfil</a>
              <a class="btn text-center" href="#" onclick="signOff()" ><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
            </div>
          </div>
      ');
      }else{
        header('location: bienvenido.php');
      }
    }else{
      if($filename != 'login.php' && $filename != 'register.php'){
        header('location: login.php');
      }else{
        print('
        <nav class="navbar navbar-light">
        <a class="navbar-brand" href="#">
            <img src="../../resources/img/LOGO.png" width="190" height="80" class="d-inline-block align-top" alt="Logo">
            <button class="btn ml-5 mt-4" id="menu-toggle" id="hamburger" style="background-color: #17A2B8;color:white;"><i class="fas fa-bars"></i></button>
        </a>
      </nav>

      <div class="d-flex" id="wrapper">
        <div id="sidebar-wrapper">
            <div class="sidebar-heading text-center"><img src="../../resources/img/imgAdmin.jpg" alt="Perfil" class="img-fluid rounded-circle" width="150"></div>
            <h5 class="text-center mb-1">Gabriela Ramirez</h5>
            <h5 class="text-center">Admistrador</h5>
          <div class="list-group list-group-flush text-center mt-4">
            
          </div>
        </div>
        ');
      }
    }
    
  }
  public function footerTemplate($controller)
  {
    print('
      
    
    
    
    
    <script src="../../resources/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../../core/helpers/components.js"></script>
    <script type="text/javascript" src="../../core/controllers/admin/'.$controller.'"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../resources/js/fontawesome.min.js"></script>
    
    
    <script src="https://kit.fontawesome.com/9b3f9e4d8d.js" crossorigin="anonymous"></script>



    <script type="text/javascript" src="../../resources/js/morris.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script type="text/javascript" src="../../resources/js/initialisation.js"></script>

    
    
    
    
    <script type="text/javascript" src="../../resources/js/dataTable/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../resources/js/dataTable/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="../../resources/js/dataTable/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../../resources/js/dataTable/responsive.bootstrap4.min.js"></script>
    
    </body>
    </html>
    ');
  }
}
