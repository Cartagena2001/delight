<?php
require_once('../../core/helpers/templateCliente.php');
Page::headerTemplate('Principal');
?>
<div class="container mb-5">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="mt-4">Carrito de compras</h3>
    </div>

    <div class="col-lg-9 mt-3">
      <table class="table table-hover" style="background-color: #138496;color:white;">
        <thead>
          <tr>
            <th scope="col">Productos</th>
            <th scope="col">Precio(US$)</th>
            <th scope="col">Cantidad</th>
            <th scope="col">SubTotal</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody id="tbodyCarrito">

        </tbody>
      </table>
    </div>

    <div class="col-lg-3 mt-3">
      <p>TOTAL A PAGAR (US$) <b id="pago"></b></p>
      <button type="buttom" class="btn btn-success" onclick="finishOrder()">Finalizar pago</button>
      <button type="button" class="btn mt-2" style="background-color: #138496;color:white;" onclick="window.location.href='/delight/views/cliente/productos.php'">Regresar a la tienda</button>
    </div>

  </div>
</div>


<!-- modals -->
<div class="modal fade" id="modalCantidad" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="staticBackdropLabel">Cambiar cantidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="ActuCantidad">
      <div class="modal-body border-0">
        <p>Cantidad del producto</p>
        <input type="number" class="form-control" id="cantidad_producto" name="cantidad_producto">
        <input type="number" class="form-control invisible" id="id_detalle" name="id_detalle">
      </div>
      
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Aceptar</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php
Page::footerTemplate('carrito.js');
?>