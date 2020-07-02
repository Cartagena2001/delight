<?php
require_once('../../core/helpers/templateCliente.php');
Page::headerTemplate('Principal');
?>
<div class="container">
    <h2 class="mt-2 text-center">Categorias de productos</h2>
</div>



<div class="container d-flex justify-content-between">
    <div class="row" id="categoriaProductos">


    </div>
</div>


<?php
Page::footerTemplate('productosAll.js');
?>