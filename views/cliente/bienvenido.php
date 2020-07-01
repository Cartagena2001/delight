<?php
require_once('../../core/helpers/templateCliente.php');
Page::headerTemplate('Principal');
?>
<div class="container mt-5" id="slider">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" >
        <img src="../../resources/img/inicio1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="../../resources/img/inicio2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="../../resources/img/inicio3.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="../../resources/img/inicio4.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon btn" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" >
        <span class="carousel-control-next-icon btn" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
</div>
<br>
<div class="d-flex justify-content-center container">
    <h3 class="text-sm-center text-center">Ayudanos a ayudarte, Delight te ofrece productos antiestres con la mejor calidad del país.</h3>
</div>
<div class="container">
    <hr color=#82D2D3>
</div>
<div class="d-flex justify-content-center">
    <h3>Promociones</h3>
</div>
<div class="container mt-5" >
    <div class="card-deck">
    <div class="card">
        <img class="card-img-top img-fluid" src="../../resources/img/antiestres-forma-corazon.jpg" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">Corazon rojo</h5>
        <p class="card-text">Aprovecha con nosotros un descuento de 35% en este producto.</p>
        </div>
        <button type="button" class="btn" id="comprar">Añadir al carrito</button>
    </div>
    <div class="card">
        <img class="card-img-top img-fluid" src="../../resources/img/casa.jpg" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">Casa techo naranja</h5>
        <p class="card-text">Un producto irresistible con un descuento de 15%.</p>
        </div>
        <button type="button" class="btn " id="comprar">Añadir al carrito</button>
    </div>
    <div class="card">
        <img class="card-img-top img-fluid" src="../../resources/img/semaforo-ant.jpg" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title">Semaforo</h5>
        <p class="card-text">No te pierdas este marravilloso producto con un super descuento de 20%.</p>
        </div>
        <button type="button" class="btn " id="comprar">Añadir al carrito</button>
    </div>
    </div>
    <br>
</div>


<?php
Page::footerTemplate('account.js');
?>