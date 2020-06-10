<?php
require_once('../../core/helpers/templateAdmin.php');
$pagina = new page;
$pagina->headerTemplate('Principal');
?>

<div class="container">
    <div class="row">
        <div class="container col-lg-12">
        <h1 class="display-4">Detalles pedidos</h1>  
        <br>
        <form method="post" id="search-detalle">
            <div class="input-field col s6 m6"> 
                <label for="search">Buscar por Producto</label>
                <input id="search" type="text" name="search"/>
                <button type="submit" class="btn btn-info ml-3" data-tooltip="Buscar">Buscar</button>
            </div>
        </form>
        </div>
<div class="container">
    <div class="row">
        <button type="button" class="btn btn-success mt-3" onclick="openCreateModal()">Agregar detalle pedido</button>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Aciones</th>
            </tr>
        </thead>
        <tbody id="table-detallepedidos">
        </tbody>
        </table>
    </div>
</div>

        <!-- modal agregar-->
        <div class="modal fade" id="detallepedidomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <form method="post" id="save-form"  name="save-form" enctype="multipart/form-data">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Detalle</h5>
                <input  type="hidden" id="id_detalle_pedido" name="id_detalle_pedido"/>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container text-center">
                <div class="form-group">                   
                    <label for="exampleFormControlSelect1">Producto</label>
                    <select class="form-control" id="id_producto" name="id_producto">
                    </select>
                    </div>
                </div>                
                <div class="form-group">
                        <input id="precio_compra" name="precio_compra" type="text" class="form-control" placeholder="Precio" required>
                </div>                
                <div class="form-group">
                        <input  id="cantidad" name="cantidad" type="text" class="form-control" placeholder="Cantidad" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
            </div>
            </form>
        </div>
</div>


<!-- modal eliminar -->
<div class="modal fade" id="eliminarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <form method="post" id="save-form"  name="save-form" enctype="multipart/form-data">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container text-center">
                <div class="form-group">
                        <h5>¿Desea eliminar este producto de su lista?</h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Eliminar</button>
            </div>
            </div>
            </div>
        </div>
</div>

    </div>
</div>
<?php
$pagina->footerTemplate('detalle_pedido.js');
?>