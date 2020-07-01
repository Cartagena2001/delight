<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse Delight</title>
    <link type="text/css" rel="stylesheet" href="../../resources/css/bootstrap.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../../resources/css/styleLogin.css"  media="screen,projection"/>
</head>
<body>
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-light">
                <a class="navbar-brand" href="#">
                    <img src="../../resources/img/LOGO.png" width="210" height="100" alt="">
                </a>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="container col-lg-6 ">
                <h1 class="text-center mb-5">Registrarse</h1>
                <form id="register-forms" class="form" method="post">
                    <div class="form-group">
                        <label for="Usuario">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario">
                    </div>
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="Direccion">Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion">
                    </div>
                    <div class="form-group">
                        <label for="Correo">Correo</label>
                        <input type="text" class="form-control" id="correo" aria-describedby="emailHelp" name="correo" >
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Telefono</label>
                        <input type="number" name="telefono" pattern="[0-9]{8}" class="form-control" id="telefono">
                    </div>
                    <div class="form-group">
                        <label for="Password1">Contraseña</label>
                        <input type="password" class="form-control" id="clave1" name="clave1">
                    </div>
                    <div class="form-group">
                        <label for="Password2">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="clave2" name="clave2">
                    </div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary col-lg-6 mt-3">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
        

        
    <script src="../../resources/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../resources/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../../resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../core/helpers/components.js"></script>
    <script type="text/javascript" src="../../core/controllers/cliente/registrarse.js"></script>
 </body>
</html>