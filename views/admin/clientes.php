<?php
require_once('../../core/helpers/templateAdmin.php');
Page::headerTemplate('Principal');
?>
<div class="container">
    <div class="row">
        <div class="container col-lg-12">
            <h1 class="display-4">Clientes</h1>
        </div>
        <div class="col-lg-12">
            <div class="container mb-5">
                <table id="TbClientes" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Nombre Completo</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-rows">
                        <tr>
                            <td>Tiger</td>
                            <td>Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a hrsef="#" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-edit"></i></a></td>
                        </tr>
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
                                <h5>Estado del cliente</h5>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Activo</option>
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
<script type="text/javascript" src="../../core/controllers/admin/clientes.js"></script>
<?php
Page::footerTemplate();
?>