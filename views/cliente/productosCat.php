<?php
require_once('../../core/helpers/templateCliente.php');
Page::headerTemplate('Principal');
?>
<div class="container">
    <h2 class="mt-2 text-center" id="title"></h2>
</div>

<div class="container">
    <div class="row">
        <form class="form-inline" method="post" id="search-form">
            <input class="form-control mr-sm-2" type="search" id="search" type="text" name="search" placeholder="Busca producto">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Buscar</button>
        </form>
    </div>
</div>

<div class="container d-flex justify-content-between">
    <div class="row" id="productoAll">
    </div>
</div>


<?php
Page::footerTemplate('productosAll.js');
?>