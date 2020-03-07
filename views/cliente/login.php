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
                <form class="login-form">
                    <h1 class="display-4">Bienvenido</h1>
                </form>
                <div class="form-group">
                    <h4 id="h4">Usuario</h4>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <h4 id="h4">Contraseña</h4>
                    <input type="password" class="form-control">
                </div>
                <div class="forgot-link d-flex aling-items-center justify-content-between">
                    <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1">Recordar</label>
                    </div>
                    <a href="#" id="link">¿Has olvidado tu contraseña?</a>
                </div>
                <div class="form-group">
                    <p class="mt-3 font-weight-n">¿Eres nuevo?<a href="registrarse.php" id="link" >Resgistrate aqui!</a> </p>
                </div>
                <button type="submit" class="btn mt-3 btn-primary btn-block"> <a href="../../views/cliente/inicio.php" style='text-decoration:none;color:white;'>Acceder </a> </button>
            </div>
        </div>
    <div class="col-lg-6 d-none d-lg-block">
    <img src="../../resources/img/Prueba.png" alt="Taza" width="650" id="taza">
    </div>
  </div>
        <!-- <div class="login-container float-left">
            <div class="form-group">
                <img src="../../resources/img/LOGO.png" alt="Logo" id="Logo">
            </div>
            <form class="login-form">
                <h1 class="display-4">Bienvenido</h1>
            </form>
            <div class="form-group">
                <h4 id="h4">Usuario</h4>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <h4 id="h4">Contraseña</h4>
                <input type="password" class="form-control">
            </div>
            <div class="forgot-link d-flex aling-items-center justify-content-between">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="recordar">
                    <label for="recordar">Recordar</label>
                </div>
                <a href="#" id="link">¿Has olvidado tu contraseña?</a>
            </div>
            <div class="form-group">
                <p class="mt-3 font-weight-n">¿Eres nuevo?<a href="registrarse.php" id="link" >Resgistrate aqui!</a> </p>
            </div>
            <button type="submit" class="btn mt-3 btn-primary btn-block"> <a href="../../views/cliente/inicio.php" style='text-decoration:none;color:white;'>Acceder </a> </button>
        </div>

        <div class="float-right d-none d-lg-block">
            <div class="">
            <img src="../../resources/img/Prueba.png" alt="Taza" id="Prueba">
            </div>
        </div> -->

        
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../resources/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
</html>