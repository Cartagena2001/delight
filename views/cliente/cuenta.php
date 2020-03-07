<?php
require_once('../../core/helpers/templateCliente.php');
Page::headerTemplate('Principal');
?>
 <div class="d-flex mt-5" id="wrapper">
    <div class="" id="sidebar-wrapper">
        <div class="sidebar-heading"><img src="../../resources/img/perfil.jpg" alt="" class="img-fluid rounded-circle" width="200"></div>
        <h6 class="text-center mb-4">"Nombre de la cuenta"</h6>
        <hr color=#82D2D3>
        <div class="list-group list-group-flush mt-3 text-center">
            <a href="cuenta.php" class="list-group-item list-group-item-action" id="itemA">Cuenta</a>
            <a href="cuentaCupones.php" class="list-group-item list-group-item-action" id="itemA">Cupones</a>
            <a href="cuentaPedidos.php" class="list-group-item list-group-item-action" id="itemA">Pedidos</a>
        </div>
    </div> 

    <div class="container">
        <div class="row container">
        <button class="btn mb-5" id="menu-toggle" id="hamburger" style="background-color: #17A2B8;color:white;"><i class="fas fa-bars"></i></button>
            <div class="container">
                <h3>Cuenta</h3>
            </div>
        <div class="col-lg-4">
            <label for="exampleFormControlInput1" class="text-info mt-4">Nombre de usuario</label>
            <input type="email" class="form-control">
            <label for="exampleFormControlInput1" class="text-info mt-4">Clave</label>
            <input type="email" class="form-control">
        </div>
        <div class="col-lg-4">
        <label for="exampleFormControlInput1" class="text-info mt-4">Nombre completo</label>
            <input type="email" class="form-control">
            <label for="exampleFormControlInput1" class="text-info mt-4">Departamento</label>
            <input type="email" class="form-control">
        </div>
        <div class="col-lg-4">
        <label for="exampleFormControlInput1" class="text-info mt-4">Apellido</label>
            <input type="email" class="form-control">
            <label for="exampleFormControlInput1" class="text-info mt-4">Direccion</label>
            <input type="email" class="form-control">
        </div>
        <div class="col-lg-8">
        <button type="submit" class="btn mt-3 btn-info btn-block col-lg-5">Actualizar datos</button>
        </div>
        <div class="col-lg-6">
            <h4 class="text mt-5">Cambiar contraseña</h4>
            <p>Debe estar seguro de hacer el siguiente cambio, de ser asi continue dando click en el boton de abajo.</p>
            <button type="submit" class="btn mt-3 btn-info btn-block col-lg-5"> <a href="../../views/cliente/cambiarclave.php" style='text-decoration:none;color:white;'>Cambiar contraseña </a> </button>
        </div>
        <div class="col-lg-6 mb-4">
        <h4 class="text mt-5">Verificar contraseña</h4>
            <p>En su correo hemos enviado un codigo de verifiacion de 4 digitos. Si no lo encuentra revisa en la banjdea es spam</p>
            <div class="col-lg-12 d-flex justify-content-start">
            <button type="submit" class="btn mt-3 btn-info btn-block mr-5"> <a href="../../views/cliente/cambiarclave.php" style='text-decoration:none;color:white;'>Cambiar contraseña </a> </button>
            <input type="email" class="form-control mt-3" placeholder="Codigo">
            </div>

        </div>
        </div>
    </div>
</div>

<?php
Page::footerTemplate();
?>