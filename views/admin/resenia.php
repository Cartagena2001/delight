<?php
require_once('../../core/helpers/templateAdmin.php');
$pagina = new page;
$pagina->headerTemplate('Principal');
?>
<div class="container">
    <div class="row">
        <div class="container col-lg-12">
            <h1 class="display-4">Reseñas</h1>
        <br>
        <form method="post" id="search-resenia">
            <div class="input-field col s6 m6"> 
                <label for="search" toot>Buscar por reseñas</label>
                <input id="search" type="text" name="search"/>
                <button type="submit" class="btn btn-info ml-3" data-tooltip="Buscar">Buscar</button>
            </div>
        </form>
    </div>

<div class="container mt-4">
    <div class="row">
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Calificacion</th>
            <th scope="col">Comentario</th>
            <th scope="col">Estado</th>
            <th scope="col">Detalle_pedido</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody id="table-resenia">
        </tbody>
        </table>
    </div>
</div>

<!-- modal -->
        <div class="modal fade" id="actualizarResenia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form method="post" id="save-form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Editar estado</h5>
                        <input class="visible" type="text" id="id_resenia" name="id_resenia"/>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container text-center">
                            <div class="form-group">
                                <h5>Estado del reseñas</h5>
                                <!-- <input class="visible" type="text" id="comboEstadoCliente" name="comboEstadoCliente"/> -->
                                <select class="form-control" id="estadoResenia" name="estadoResenia">
                                    <option>Activo</option>
                                    <option>Suspendido</option>
                                </select>
                            </div>
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
$pagina->footerTemplate('resenia.js');
?>