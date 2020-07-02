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
  <div class="container">
    <button class="btn mb-5" id="menu-toggle" id="hamburger" style="background-color: #17A2B8;color:white;"><i class="fas fa-bars"></i></button>
    <div class="container">
      <h3>Pedidos</h3>
    </div>
    <div class="cotainter" >
      <div class="row" id="pedidosCliente">

      </div>
    </div>
  </div>
</div>

</div>
<br></br>

<?php
Page::footerTemplate('cuenta.js');
?>