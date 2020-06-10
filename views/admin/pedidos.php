<?php
require_once('../../core/helpers/templateAdmin.php');
$pagina = new page;
$pagina->headerTemplate('Principal');
?>

<div class="container">
    <div class="row">
        <div class="container col-lg-12">
        <h1 class="display-4">Pedidos</h1>   
        <br>
        <form method="post" id="search-form">
            <div class="input-field col s6 m6"> 
                <label for="search">Buscar Pedido por Cliente</label>
                <input id="search" type="text" name="search"/>
            </div>
            <div class="input-field col s6 m4">
                <button type="submit" class="btn btn-info mt-3" data-tooltip="Buscar">Buscar</button>
            </div>
        </form>
    </div>
<div class="container">
<br>
    <div class="row">
        <button type="button" class="btn btn-success mt-3" onclick="openCreateModal()">Agregar pedido</button>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Cupon</th>
                <th>Costo envio</th>
                <th>Fecha creacion</th>
                <th>Fecha entrega</th>
                <th>Aciones</th>
            </tr>
        </thead>
        <tbody id="table-pedidos">
        </tbody>
        </table>
    </div>
</div>     


        <!-- modal agregar -->
        <div class="modal fade" id="pedidomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <form method="post" id="save-form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Pedidos</h5>
                    <input class="hide" type="hidden" id="id_pedido" name="id_pedido"/>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="form-group">                   
                        <label for="exampleFormControlSelect1">Cliente</label>
                        <select class="form-control" id="id_cliente" name="id_cliente">
                        </select>
                </div> 
                <div class="form-group">                   
                        <label for="exampleFormControlSelect1">Cupon</label>
                        <select class="form-control" id="id_cupon" name="id_cupon">
                        </select>
                </div>    
                <div class="form-group">                   
                        <label for="exampleFormControlSelect1">Detalle Pedido</label>
                        <select class="form-control" id="id_detalle_pedido" name="id_detalle_pedido">
                        </select>
                </div>
                    <div class="form-group">
                            <input id="costo_envio" name="costo_envio" type="text" class="form-control" placeholder="Costo envio" required>
                    </div>                
                    <div class="form-group">
                            <input  id="fecha_pedido" name="fecha_pedido" type="date" class="form-control" placeholder="Fecha pedido" required>
                    </div>
                    <div class="form-group">
                            <input  id="fecha_entrega" name="fecha_entrega" type="date" class="form-control" placeholder="Fecha entrega" required>
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


    </div>
</div>
<?php
$pagina->footerTemplate('pedidos.js');
?>
