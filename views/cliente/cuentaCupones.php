<?php
require_once('../../core/helpers/templateCliente.php');
Page::headerTemplate('Principal');
?>
<div class="d-flex mt-5" id="wrapper" >
    <div class="" id="sidebar-wrapper">
        <h6 class="text-center mb-4" id="nombrePerfil"></h6>
        <hr color=#82D2D3>
        <div class="list-group list-group-flush mt-3 text-center">
            <a href="cuenta.php" class="list-group-item list-group-item-action" id="itemA">Cuenta</a>
            <a href="cuentaPedidos.php" class="list-group-item list-group-item-action" id="itemA">Pedidos</a>
            <a href="cuentaCupones.php" class="list-group-item list-group-item-action" id="itemA">Cupones</a>
        </div>
    </div>

    <div class="container">
    <button class="btn mb-5" id="menu-toggle" id="hamburger" style="background-color: #17A2B8;color:white;"><i class="fas fa-bars"></i></button>
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <h4>Mis cupones</h4>
                </div>
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body" style="background-color: #03A5A7">
                <h5 class="card-title text-center mb-4" style="color: white">Cupon disponible</h5>
                <p class="card-text" style="color: white">Tienes un cupon cupon disponible para reclamar, elije la opcion que mas deseas.</p>
                <button type="submit" class="btn mt-3 btn-block" style="background-color: white">Productos gratis</button>
                <button type="submit" class="btn mt-3 btn-block "style="background-color: white">Bolsa sorpresa</button>
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body" style="background-color: #03A5A7">
                <h5 class="card-title text-center mb-4" style="color: white">4 Compras de 6</h5>
                <p class="card-text" style="color: white">Compra 2 productos más para obtener un cupon gratis.</p>
                <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                </div>
                <button type="submit" class="btn mt-3 btn-block "style="background-color: white">Comprar más productos</button>
            </div>
            </div>
        </div>
        <div class="col-sm-6 mt-3 mb-3">
            <div class="card">
            <div class="card-body" style="background-color: #03A5A7">
                <h5 class="card-title text-center mb-4" style="color: white">Cupon disponible</h5>
                <p class="card-text" style="color: white">Tienes un cupon cupon disponible para reclamar, elije la opcion que mas deseas.</p>
                <button type="submit" class="btn mt-3 btn-block" style="background-color: white">Productos gratis</button>
                <button type="submit" class="btn mt-3 btn-block "style="background-color: white">Bolsa sorpresa</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
<?php
Page::footerTemplate('cuenta.js');
?>
