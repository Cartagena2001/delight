<?php
require_once('../../core/helpers/templateCliente.php');
Page::headerTemplate('Principal');
?>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-6">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="../../resources/img/calabera.jpg" class="d-block w-100" alt="Producto">
                    </div>
                    <div class="carousel-item">
                    <img src="../../resources/img/calabera.jpg" class="d-block w-100" alt="Producto">
                    </div>
                    <div class="carousel-item">
                    <img src="../../resources/img/calabera.jpg" class="d-block w-100" alt="Producto">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <h1 class="display-4">Nombre del producto</h1>
            <div>
            <i class="fas fa-star" style="color:#FFBB00"></i>
            <i class="fas fa-star" style="color:#FFBB00"></i>
            <i class="fas fa-star" style="color:#FFBB00"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            </div>
            <div>
                <h4>Precio: $1.99</h4>
                <p> <i class="fas fa-shopping-basket" style="color:#025373"></i> Vendidos: 324</p>
            </div>
            <div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto voluptates vel voluptate voluptatem praesentium officia esse. Qui deleniti mollitia, voluptatum beatae vel consequuntur! Distinctio quod quisquam, laudantium molestiae accusantium nobis.</p>
            </div>
            <div>
                <div class="form-group col-lg-3">
                    <label for="exampleFormControlSelect1">Cantidad:</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    </select>
                </div>
            </div>
            <div>
            <a href="#" class="btn col-lg-2 mt-3" id="btnuniversal">Comprar</a>
            <a href="#" class="btn col-lg-3 mt-3" id="btnuniversal">Añadir a carrito</a>
            </div>
            <div class="mt-5">
            <h3 id="Coment">Comentarios</h3>
                <div class="row mt-5 container">
                <div class="media">
                <img src="../../resources/img/perfil.jpg" class="mr-3 rounded-circle" alt="..." width="130">
                <div class="media-body">
                    <h5 class="mt-0">Epicardio</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
                </div>
                </div>
                <hr color=#82D2D3>
                <div class="row container mb-3">
                <div class="media">
                <img src="../../resources/img/perfil.jpg" class="mr-3 rounded-circle" alt="..." width="130">
                <div class="media-body">
                    <h5 class="mt-0">Malardo</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
Page::footerTemplate();
?>