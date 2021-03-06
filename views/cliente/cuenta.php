<?php
require_once('../../core/helpers/templateCliente.php');
Page::headerTemplate('Principal');
?>
 <div class="d-flex mt-5" id="wrapper">
    <div class="" id="sidebar-wrapper">
        <h6 class="text-center mb-4" id="nombrePerfil"></h6>
        <hr color=#82D2D3>
        <div class="list-group list-group-flush mt-3 text-center">
            <a href="cuenta.php" class="list-group-item list-group-item-action" id="itemA">Cuenta</a>
            <a href="cuentaPedidos.php" class="list-group-item list-group-item-action" id="itemA">Pedidos</a>
            <a href="cuentaCupones.php" class="list-group-item list-group-item-action" id="itemA">Cupones</a>
        </div>
    </div> 

    <div class="container" id="cliente">
        <form method="post" id="editarPerfil">
        <div class="row container">
        <button class="btn mb-5" id="menu-toggle" id="hamburger" style="background-color: #17A2B8;color:white;"><i class="fas fa-bars"></i></button>
            <div class="container">

                <h3>Cuenta</h3>
            </div>
        <div class="col-lg-4">

            <label for="exampleFormControlInput1" class="text-info mt-4">Nombre de usuario </label>
            <input type="text" class="form-control" id="nombreUser" name="nombreUser">
            <label for="exampleFormControlInput1" class="text-info mt-4">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo">
        </div>
        <div class="col-lg-4">
            <label for="exampleFormControlInput1" class="text-info mt-4">Nombre completo</label>
            <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto">
            <label for="exampleFormControlInput1" class="text-info mt-4">Telefono</label>
            <input type="number" class="form-control" id="telefono" name="telefono">
        </div>
        <div class="col-lg-4">
            <label for="exampleFormControlInput1" class="text-info mt-4">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion">
            <input type="number" class="form-control invisible" id="id_cliente" name="id_cliente">
        </div>
        <div class="col-lg-8">
        <button type="submit" class="btn mt-3 btn-info btn-block col-lg-5">Actualizar datos</button>
        </div>
        <div class="col-lg-6">
            <h4 class="text mt-5">Cambiar contraseña</h4>
            <p>Debe estar seguro de hacer el siguiente cambio, de ser asi continue dando click en el boton de abajo.</p>
            <button type="submit" class="btn mt-3 btn-info btn-block col-lg-5"> <a href="../../views/cliente/cambiarclave.php" style='text-decoration:none;color:white;'>Cambiar contraseña </a> </button>
        </div>
        </div>
        </form>
    </div>
</div>
<?php
Page::footerTemplate('cuenta.js');
?>