<?php
require_once('../../core/helpers/templateAdmin.php');
$pagina = new page;
$pagina->headerTemplate('Principal');
?>
<div class="container">
    <div class="row">
        <div class="container col-lg-12">
            <h1 class="display-4">Clientes</h1>
    </div>

<div class="container mt-4">
    <div class="row">
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody id="table-clientes">
        </tbody>
        </table>
    </div>
</div>

<!-- modal -->
        <div class="modal fade" id="actualizarClientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form method="post" id="save-form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Editar estado</h5>
                        <input class="invisible" type="text" id="id_cliente" name="id_cliente"/>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container text-center">
                            <div class="form-group">
                                <h5>Estado del cliente</h5>
                                <!-- <input class="visible" type="text" id="comboEstadoCliente" name="comboEstadoCliente"/> -->
                                <select class="form-control" id="comboEstadoCliente" name="comboEstadoCliente">
                                    <option>Activo</option>
                                    <option>Inactivo</option>
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
$pagina->footerTemplate('clientes.js');
$pagina->footerTemplate('account.js');
?>