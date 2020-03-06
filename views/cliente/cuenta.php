<?php
require_once('../../core/helpers/templateCliente.php');
Page::headerTemplate('Principal');
?>
<div class="d-flex mt-5" id="wrapper">
    <div class="" id="sidebar-wrapper">
        <div class="sidebar-heading"><img src="../../resources/img/perfil.jpg" alt="" class="img-fluid rounded-circle" width="200"></div>
        <h6 class="text-center mb-4">Nombre de la cuenta</h6>
        <hr color=#82D2D3>
        <div class="list-group list-group-flush mt-3 text-center">
            <a href="cuenta.php" class="list-group-item list-group-item-action" id="itemA">Cuenta</a>
            <a href="cuentaCupones.php" class="list-group-item list-group-item-action" id="itemA">Cupones</a>
            <a href="cuentaPedidos.php" class="list-group-item list-group-item-action" id="itemA">Pedidos</a>
        </div>
    </div>
    <div class="row">
    <div class="container-fluid">
    <div class="container col-lg-10">
        <form>
            <h3 class="text lg-3">Cuenta</h3>
            <div class="form-group">
                <label for="exampleFormControlInput1" class="text-info mt-4">Nombre de usuario</label>
                <input type="email" class="form-control">

                <div class="form-group mt-4">
                <label for="exampleFormControlInput1" class="text-info">Contraseña</label>
                <input type="email" class="form-control">
            </div>
            </div>
            
        </form>
        <h4 class="text mt-5">Cambiar contraseña</h4>
        <p>Debe estar seguro de hacer el siguiente cambio, de ser asi continue dando click en el boton de abajo.</p>
        <button type="submit" class="btn mt-3 btn-info btn-block"> <a href="../../views/cliente/cambiarclave.php" style='text-decoration:none;color:white;'>Cambiar contraseña </a> </button>
    </div>
    </div>
    </div>
    

    <div class="container col-lg-3 mt-5">
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1" class="text-info mt-3">Nombre</label>
                <input type="email" class="form-control">

                <div class="form-group mt-4">
                <label for="exampleFormControlInput1" class="text-info">Telefono</label>
                <input type="email" class="form-control">
            </div>
            </div>
        </form>
    </div><div class="container col-lg-3 mt-5">
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1" class="text-info mt-3">Apellido</label>
                <input type="email" class="form-control">

                <div class="form-group mt-4">
                <label for="exampleFormControlInput1" class="text-info">Direccion</label>
                <input type="email" class="form-control">
            </div>
            </div>
        </form>

    </div>
    </div>
    </div>

    </div>
    </div>
    
    

</div>


<?php
Page::footerTemplate();
?>