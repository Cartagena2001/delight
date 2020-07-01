<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Delight</title>
    <link type="text/css" rel="stylesheet" href="../../resources/css/bootstrap.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../../resources/css/styleLogin.css"  media="screen,projection"/>
</head>
<body style="overflow-x:hidden; overflow-y:hidden">
 

<div class="container">
  <div class="row">
    <div class="col-lg-5 mt-5">
        <div class="login-container">
                <div class="form-group">
                    <img src="../../resources/img/LOGO.png" alt="Logo" id="Logo">
                </div>
                <form id="login-forms" class="form" method="post">
                    <h1 class="display-4">Bienvenido</h1>
                <div class="form-group">
                    <h4 id="h4">Usuario</h4>
                    <input type="text" class="form-control" id="usuario" name="usuario">
                </div>
                <div class="form-group">
                    <h4 id="h4">Contraseña</h4>
                    <input type="password" class="form-control" id="clave" name="clave">
                </div>
                <div class="forgot-link d-flex aling-items-center justify-content-between">
                    <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1">Recordar</label>
                    </div>
                    <a href="#" id="link">¿Has olvidado tu contraseña?</a>
                </div>
                <hr color=#03658C>
                <div class="form-group">
                    <p class="mt-3 font-weight-n">¿Eres nuevo?<a href="registrarse.php" id="link" >Resgistrate aqui!</a> </p>
                </div>
                <button type="submit" class="btn btn-primary col-lg-6 mt-3">iniciar</button>
                </form>
            </div>
        </div>
    <div class="col-lg-6 d-none d-lg-block">
    <img src="../../resources/img/Prueba.png" alt="Taza" width="650" id="taza">
    </div>
  </div>
        
        
    <script src="../../resources/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../resources/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../core/helpers/components.js"></script>
    <script type="text/javascript" src="../../core/controllers/cliente/login.js"></script>
</html>