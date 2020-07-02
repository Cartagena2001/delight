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
      <small class="form-text text-muted">Cuando el estado del pedido esta en 0 significa Finalizado, cuando esta en 1 significa pendiente de pagar</small>
    </div>
    <div class="cotainter">
      <div class="row" id="pedidosCliente">

      </div>
    </div>
  </div>
</div>

<!-- modal -->
<div class="modal fade" id="verdetalle" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="staticBackdropLabel">Detalle del pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body border-0">
        <table class="table" style="background-color: #17A2B8;color:white;">
          <thead>
            <tr>
              <th scope="col">Producto</th>
              <th scope="col">Precio</th>
              <th scope="col">Cantidad</th>
            </tr>
          </thead>
          <tbody id="tbodyDetalle">
          </tbody>
        </table>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<?php
Page::footerTemplate('cuenta.js');
?>