<?php
require_once('../../core/helpers/templateCliente.php');
Page::headerTemplate('Principal');
?>

<div class="row">
    <div class="container col-lg-6">
        <div class="mt-4">
        <h4 >Carrito de compras</h4>
        </div>
        <div class="p-3 mb-2 bg-info text-white mt-4">
        <table class="table table-hover text-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Casa tejado naranja</td>
      <td>$1.00</td>
      <td>1</td>
      <td>$2.00</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Taza de cafe</td>
      <td>$1.05</td>
      <td>1</td>
      <td>$2.00</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Llavero de tomate</td>
      <td>$0.99</td>
      <td>1</td>
      <td>$1.99</td>
    </tr>
  </tbody>
        </table>
        </div>
    </div>
    <!--taba de confirma de apagar--> 
    <div class="container col-lg-5">
    <div class="bd-callout bd-callout-warning mt-5">
        <h6 class="text-info" id="conveying-meaning-to-assistive-technologies">Total a pagar</h6>
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Total a pagar</th>
      <th scope="col">Puntos</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>$2.00</td>
      <td>3 puntos</td>
      <td>$5.04</td>
    </tr>
    </table>
        </div>
        
        <div class="forgot-link d-flex aling-items-center justify-content-between">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="recordar">
                    <label for="recordar">Aceptar terminos y condiciones</label>
                 <button type="submit" class="btn mt-3 btn-primary btn-block"> <a href="../../views/cliente/inicio.php" style='text-decoration:none;color:white;'>Comprar ahora </a> </button>
        </div>

           
        </div>

    </div>
</div>

<br></br>






<?php
Page::footerTemplate();
?>