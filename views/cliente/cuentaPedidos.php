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
<button class="btn mb-5" id="menu-toggle" id="hamburger" style="background-color: #17A2B8;color:white;"><i class="fas fa-bars"></i></button>
<h3 class="text-info">Por recibir</h3>

    <div class="card-deck col-lg-10 mt-4">
  <div class="card">
  <img src="../../resources/img/casa.jpg" class="card-img mt-4" alt="producto">
    <div class="card-body">
      <h5 class="card-title">Casa de tejado naranja</h5>
      <p class="card-text">Antiestres de espuma para toda ocasion.</p>
    </div>
  </div>
  <div class="card">
  <img src="../../resources/img/taza-de-cafe.jpg" class="card-img mt-4" alt="producto">
    <div class="card-body">
      <h5 class="card-title">Taza de cafe</h5>
      <p class="card-text">Antiestres de espuma para todo tipo de persona.</p>
    </div>
  </div>
  <div class="card">
  <img src="../../resources/img/llavero-tomate.jpg" class="card-img mt-4" alt="producto">
  <div class="card-body">
      <h5 class="card-title">Llavero de tomate</h5>
      <p class="card-text">Demuestra lo saludable que eres.</p>
    </div>
  </div>
</div>

<div class="container mt-4">
<h3 class="text-info">Recibidos</h3>

    <div class="card-deck col-lg-7 mt-4">
  <div class="card">
  <img src="../../resources/img/rosa.jpg" class="card-img mt-4" alt="producto">
    <div class="card-body">
      <h5 class="card-title">Llavero de corazon rosa</h5>
      <p class="card-text">Antiestres de espuma el amor es lo primero.</p>
      <p class="card-text"><small class="text-muted">11/01/2020</small></p>
    </div>
  </div>
  <div class="card">
  <img src="../../resources/img/regalo.jpg" class="card-img mt-4" alt="producto">
  <div class="card-body">
      <h5 class="card-title">Regalo</h5>
      <p class="card-text">Producto de goma para llevar a todas partes.</p>
      <p class="card-text"><small class="text-muted">23/12/2019</small></p>
    </div>
  </div>
</div>
</div>
</div>
    
</div>


    
</div>
<br></br>

<?php
Page::footerTemplate();
?>