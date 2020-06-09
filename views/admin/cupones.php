<?php
require_once('../../core/helpers/templateAdmin.php');
$pagina = new page;
$pagina->headerTemplate('Principal');
?>

<div class="container">
    <div class="row">
        <div class="container col-lg-12">
        <h1 class="display-4">Cupones</h1>
        </div>
<div class="container">
    <div class="row">
        <button type="button" class="btn btn-success mt-3" onclick="openCreateModal()">Agregar cupones</button>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Puntos</th>
                <th>Opcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="table-cupones">
        </tbody>
        </table>
    </div>
</div>        


        <!-- modal agregar -->
        <div class="modal fade" id="agregarcuponesmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <form method="post" id="save-form"  name="save-form" enctype="multipart/form-data">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Cupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                        <input id="puntos" name="puntos" type="text" class="form-control" placeholder="Puntos" required>
                </div>                
                <div class="form-group">
                        <input  id="opcion" name="opcion" type="text" class="form-control" placeholder="Opcion" required>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
            </div>
            </div>
        </div>
</div>

<!-- modal editar -->
<div class="modal fade" id="editarcuponesmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <form method="post" id="save-form"  name="save-form" enctype="multipart/form-data">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Editar Cupon</h5>
                <input class="hide" type="hidden" id="id_cupon" name="id_cupon"/>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                        <input id="puntos" name="puntos" type="text" class="form-control" placeholder="Puntos" required>
                </div>                
                <div class="form-group">
                        <input  id="opcion" name="opcion" type="text" class="form-control" placeholder="Opcion" required>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- modal eliminar -->
<div class="modal fade" id="eliminarcuponesmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <form method="post" id="save-form"  name="save-form" enctype="multipart/form-data">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar cupon</h5>
                <input class="hide" type="hidden" id="id_cupon" name="id_cupon"/>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container text-center">
                <div class="form-group">
                        <h5>¿Desea eliminar este cupon de su lista?</h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Eliminar</button>
            </div>
            </div>
            </div>
        </div>
</div>

    </div>
</div>
<?php
$pagina->footerTemplate('cupones.js');
$pagina->footerTemplate('account.js');
?>
