<?php
require_once('../../core/helpers/templateCliente.php');
Page::headerTemplate('Principal');
?>
<style>
.asd{
    max-width: auto;
    height: 43vh;
}
.das{
    height: 100%;
    overflow: auto;
}
#item{
    height: 30vh;
    width: 40vh;
}
</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-6">
            <img src="../../resources/img/calabera.jpg" alt="producto" class="img-fluid mb-5">
            <hr color=#82D2D3>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-3">
                <img src="../../resources/img/calabera.jpg" alt="producto" class="img-fluid mb-5"  style="cursor: pointer;">
                </div>
                <div class="col-lg-3">
                <img src="../../resources/img/calabera.jpg" alt="producto" class="img-fluid mb-5"  style="cursor: pointer;">
                </div>
                <div class="col-lg-3">
                <img src="../../resources/img/calabera.jpg" alt="producto" class="img-fluid mb-5"  style="cursor: pointer;">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <h1>Nombre del producto</h1>
            <div>
            <i class="fas fa-star" style="color:#FFBB00"></i>
            <i class="fas fa-star" style="color:#FFBB00"></i>
            <i class="fas fa-star" style="color:#FFBB00"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            </div>
            <div>
                <h3>Precio: $1.99</h3>
            </div>
            <div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto voluptates vel voluptate voluptatem praesentium officia esse. Qui deleniti mollitia, voluptatum beatae vel consequuntur! Distinctio quod quisquam, laudantium molestiae accusantium nobis.</p>
            </div>
            <div>
                <div class="form-group col-lg-3">
                    <label for="exampleFormControlSelect1">Cantidad: </label>
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
            <button type="button" class="btn btn-lg mt-2" style="background-color: #03658C; color:white">Comprar</button>
            </div>
            <div class="mt-5">
            <h3>Comentarios</h3>
                <div class="row mt-5">
                    <div class="col-lg-3">
                    <div>
                    <img src="../../resources/img/perfil.jpg" alt="foto_perfil" width="130" class="rounded-circle">
                    </div>
                    </div>
                    <div class="col-lg-9">
                        <h3>Epicardio</h3>
                    <p>Gran producto me salva del estres en mi trabajo!!!</p>
                    </div>
                </div>
                <hr color=#82D2D3>
                <div class="row mt-5">
                    <div class="col-lg-3">
                    <div>
                    <img src="../../resources/img/perfil.jpg" alt="foto_perfil" width="130" class="rounded-circle">
                    </div>
                    </div>
                    <div class="col-lg-9">
                        <h3>Epicardio</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius fuga adipisci, hic at, a, ex nostrum odio eos tempora culpa repellendus inventore vero exercitationem pariatur impedit. Earum iure inventore recusandae!</p>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>
<?php
Page::footerTemplate();
?>