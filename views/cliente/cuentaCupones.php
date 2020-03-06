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
    <div class="container col-lg-12">
    <div class="bd-callout bd-callout-warning">
        <h5 class="text-info" id="conveying-meaning-to-assistive-technologies">Cupones disponibles </h5>
        </div>
    </div>
    </div>
    

</div>
    
<?php
Page::footerTemplate();
?>
