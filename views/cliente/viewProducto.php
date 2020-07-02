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
                        <img class="d-block w-100" alt="Producto" id="imagen">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6" id="detalle">
            <form method="post" id="shopping-form">
                <div class="row">
                    <div class="col-lg-6">
                        <input type="number" id="id_producto" name="id_producto" class="invisible" />
                    </div>
                    <div class="col-lg-6">
                    <input type="" class="form-control col-lg-3 invisible" id="precio_producto" name="precio_producto">
                    </div>
                </div>
                <h1 class="display-4" id="nombreProducto">Nombre del producto</h1>
                <div>
                    <i class="fas fa-star" style="color:#FFBB00"></i>
                    <i class="fas fa-star" style="color:#FFBB00"></i>
                    <i class="fas fa-star" style="color:#FFBB00"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <p> <i class="fas fa-shopping-basket" style="color:#025373"></i> Vendidos: 324</p>
                </div>
                <div>
                    <p>Precio (US$) <b id="precio"></b></p>
                </div>
                <div>
                    <p id="descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto voluptates vel voluptate voluptatem praesentium officia esse. Qui deleniti mollitia, voluptatum beatae vel consequuntur! Distinctio quod quisquam, laudantium molestiae accusantium nobis.</p>
                </div>
                    <div>
                        <p><b>Cantidad:</b></p>
                        <input type="number" class="form-control col-lg-3" id="cantidad" name="cantidad">
                    </div>
                    <small class="form-text text-mu ed mt-4">Tu valioso producto sera entregado en un plazo de 10 a 15 dias habiles.</small>
                    <small class="form-text text-muted">Pudes solventar tus dudas en nuestro apartado de contactenos :D</small>
                    <div>
                        <button class="btn mt-4" style="background-color: #138496;color:white;" type="submit">Comprar</button>
                        <!-- <button type="submit" class="btn btn-primary" data-tooltip="Cancelar">Agregar a carrito </button>      -->
                    </div>
            </form>
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
Page::footerTemplate('detalleProducto.js');
?>