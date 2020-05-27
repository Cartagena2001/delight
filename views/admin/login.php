<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="icon"   href="../../resources/img/ICO.ico" type="image/png"/>
    <link type="text/css" rel="stylesheet" href="../../resources/css/bootstrap.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../../resources/css/styleAdmin.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../../resources/css/fontawesome.min.css"/>
    <title>Login administrador</title>
</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="post">
                            <h5 class="text-center mb-5" id="bienvenido">Bienvenido administrador</h5>
                            <div class="form-group">
                                <label for="username">Usuario:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="custom-control custom-radio mb-4">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio1">Recordarme</label>
                            </div>
                            <hr color="#021140">
                            <div class="mt-5">
                                <button class="btn container d-flex justify-content-center" type="submit" id="btnlogin">Acceder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src="../../resources/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../resources/js/fontawesome.min.js"></script>
    <script type="text/javascript" src="../../core/helpers/components.js"></script>
    <script type="text/javascript" src="../../core/controllers/admin/account.js"></script>
    <script src="https://kit.fontawesome.com/9b3f9e4d8d.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../core/controllers/admin/login.js"></script>
    
</body>

</html>