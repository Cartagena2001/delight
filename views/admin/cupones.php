<?php
require_once('../../core/helpers/templateAdmin.php');
Page::headerTemplate('Principal');
?>

<div class="container">
    <div class="row">
        <div class="container col-lg-12">
        <h1 class="display-4">Cupones</h1>
        </div>
        <div class="col-lg-12">
            <div class="container mb-5">
                <table id="Tbproductos" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Puntos</th>
                            <th>Opcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger</td>
                            <td>Nixon</td>
                            <td>
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Garrett</td>
                            <td>Winters</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Ashton</td>
                            <td>Cox</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Cedric</td>
                            <td>Kelly</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Airi</td>
                            <td>Satou</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Brielle</td>
                            <td>Williamson</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Herrod</td>
                            <td>Chandler</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>

                        </tr>
                        <tr>
                            <td>Rhona</td>
                            <td>Davidson</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>

                        </tr>
                    </tbody>
                </table>  
            </div>
        </div>

        <!-- modal agregar -->
        <div class="modal fade" id="agregarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Cupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container text-center">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cantidad de puntos">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Opcion</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                        <option>Producto gratis</option>
                        <option>Bolsa sorpresa</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Agregar cupon</button>
            </div>
            </div>
        </div>
</div>

<!-- modal editar -->
<div class="modal fade" id="editarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Editar Cupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container text-center">
                <form>
                <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cantidad de puntos">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Opcion</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                        <option>Producto gratis</option>
                        <option>Bolsa sorpresa</option>
                        </select>
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

<!-- modal eliminar -->
<div class="modal fade" id="eliminarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar cupon</h5>
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
                <button type="button" class="btn btn-primary">Eliminar</button>
            </div>
            </div>
        </div>
</div>

    </div>
</div>

<?php
Page::footerTemplate();
?>
