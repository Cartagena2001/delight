<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="icon"   href="../../resources/img/ICO.ico" type="image/png"/>
    <link type="text/css" rel="stylesheet" href="../../resources/css/bootstrap.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../../resources/css/styleAdmin.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../../resources/css/fontawesome.min.css"/>
    <title>Perfil</title>
</head>
<body>
    <div class="row container mt-1">
        <div class="col-lg-7">
        <img src="../../resources/img/LOGO.png" width="190" height="80" class="d-inline-block align-top" alt="Logo">
        </div>
        <div class="col-lg-5 mb-5">
        <h4 class="display-4">Perfil</h4> 
        </div>
    </div>
    


    <div class="contaniner">
        <div class="row">
            <div class="col-lg-12 text-center">
              <h5 class="text-center mb-5">Crear un nuevo usuario</h5>
            </div>            
        </div>
        <div class="container">
            <form id="register-form">
                <div class="row">
                    <div class="col">
                    <h5>Usuario</h5>
                    <input id="usuario" type="text" class="form-control" placeholder="Usuario" style="background-color: #010923; color:white; border-radius:50px" required>
                    </div>
                    <div class="col">
                    <h5>Nombre</h5>
                    <input id="nombre" type="text" class="form-control" placeholder="Nombre completo" style="background-color: #010923; color:white; border-radius:50px" required>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col">
                    <h5>Correo</h5>
                    <input id="correo" type="text" class="form-control" placeholder="Correo" style="background-color: #010923; color:white; border-radius:50px" required>
                    </div>
                    <div class="col">
                    <h5>Telefono</h5>
                    <input id="telefono" type="text" class="form-control" placeholder="Telefono" style="background-color: #010923; color:white; border-radius:50px" required>
                    </div>
                </div>
                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-5 text-center">
                    <h5>Contraseña</h5>
                    <input id="clave1" type="password" class="form-control" placeholder="clave" style="background-color: #010923; color:white; border-radius:50px" required>
                    </div>
                </div>
                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-5 text-center">
                    <h5>Confirmar Contraseña</h5>
                    <input id="clave2" type="password" class="form-control" placeholder="clave" style="background-color: #010923; color:white; border-radius:50px" required>
                    </div>
                </div>
                <div class="mt-5">
                    <button class="btn container d-flex justify-content-center" type="submit" id="btnlogin">Registrarse</button>
                </div>
            </form>
    </div>

    <script src="../../resources/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../resources/js/fontawesome.min.js"></script>
    <script type="text/javascript" src="../../core/helpers/components.js"></script>
    <script type="text/javascript" src="../../core/controllers/admin/account.js"></script>
    <script src="https://kit.fontawesome.com/9b3f9e4d8d.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../core/controllers/admin/register.js"></script>
</body>
</html>