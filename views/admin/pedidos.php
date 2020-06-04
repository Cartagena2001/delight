<?php
require_once('../../core/helpers/templateAdmin.php');
$pagina = new page;
$pagina->headerTemplate('Principal');
?>

<div class="container">
    <div class="row">
        <div class="container col-lg-12">
        <h1 class="display-4">Pedidos</h1>
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


        <!-- modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Editar estado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container text-center">
                <div class="form-group">
                        <h5>Estado del envio</h5>
                        <select class="form-control" id="exampleFormControlSelect1">
                        <option>Entregado</option>
                        <option>En curso</option>
                        <option>Suspendido</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
            </div>
        </div>
</div>
    </div>
</div>
<?php
$pagina->footerTemplate('pedidos.js');
$pagina->footerTemplate('account.js');
?>