<?php
require_once('../../core/helpers/templateCliente.php');
Page::headerTemplate('Principal');
?>
<div class="container">
<h2>Productos - Todos</h2>
</div>
<div class="container d-flex justify-content-between" >
    <div class="row"  id="productoAll">   
    </div>
</div>


<?php
Page::footerTemplate('productosAll.js');
?>