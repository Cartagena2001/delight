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
    <div class="container col-lg-11">
        <div class="mt-4">
        <h4>Pedidos</h4>
        </div>
        <div class="p-3 mb-2 text-white mt-4">
        <table class="table table-hover text-back">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
      <th scope="col">Fecha</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Casa tejado naranja</td>
      <td>$1.00</td>
      <td>20/02/2020</td>
      <td>$2.00</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Taza de cafe</td>
      <td>$1.05</td>
      <td>04/01/2020</td>
      <td>$2.00</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Llavero de tomate</td>
      <td>$0.99</td>
      <td>16/02/2020</td>
      <td>$1.99</td>
    </tr>
  </tbody>
        </table>
        </div>
    </div>
</div>
    
</div>


<?php
Page::footerTemplate();
?>