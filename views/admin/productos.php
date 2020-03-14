<?php
require_once('../../core/helpers/templateAdmin.php');
Page::headerTemplate('Principal');
?>

<div class="container">
    <div class="row">
        <div class="container col-lg-12">
        <h1 class="display-4">Productos</h1>
        </div>
        <div class="col-lg-12">
            <div class="container mb-5">
                <table id="Tbproductos" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Descripcion</th>
                            <th>Existencia</th>
                            <th>Categoria</th>
                            <th>Estado</th>
                            <th>Aciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger</td>
                            <td>Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Garrett</td>
                            <td>Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Ashton</td>
                            <td>Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Cedric</td>
                            <td>Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Airi</td>
                            <td>Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Brielle</td>
                            <td>Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Herrod</td>
                            <td>Chandler</td>
                            <td>Sales Assistant</td>
                            <td>San Francisco</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>

                        </tr>
                        <tr>
                            <td>Rhona</td>
                            <td>Davidson</td>
                            <td>Integration Specialist</td>
                            <td>Tokyo</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>

                        </tr>
                        <tr>
                            <td>Colleen</td>
                            <td>Hurst</td>
                            <td>Javascript Developer</td>
                            <td>San Francisco</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Sonya</td>
                            <td>Frost</td>
                            <td>Software Engineer</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Jena</td>
                            <td>Gaines</td>
                            <td>Office Manager</td>
                            <td>London</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>

                        </tr>
                        <tr>
                            <td>Quinn</td>
                            <td>Flynn</td>
                            <td>Support Lead</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Charde</td>
                            <td>Marshall</td>
                            <td>Regional Director</td>
                            <td>San Francisco</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Haley</td>
                            <td>Kennedy</td>
                            <td>Senior Marketing Designer</td>
                            <td>London</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Tatyana</td>
                            <td>Fitzpatrick</td>
                            <td>Regional Director</td>
                            <td>London</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Michael</td>
                            <td>Silva</td>
                            <td>Marketing Designer</td>
                            <td>London</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Paul</td>
                            <td>Byrd</td>
                            <td>Chief Financial Officer (CFO)</td>
                            <td>New York</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Gloria</td>
                            <td>Little</td>
                            <td>Systems Administrator</td>
                            <td>New York</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Bradley</td>
                            <td>Greer</td>
                            <td>Software Engineer</td>
                            <td>London</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Dai</td>
                            <td>Rios</td>
                            <td>Personnel Lead</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Jenette</td>
                            <td>Caldwell</td>
                            <td>Development Lead</td>
                            <td>New York</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Yuri</td>
                            <td>Berry</td>
                            <td>Chief Marketing Officer (CMO)</td>
                            <td>New York</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Caesar</td>
                            <td>Vance</td>
                            <td>Pre-Sales Support</td>
                            <td>New York</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Doris</td>
                            <td>Wilder</td>
                            <td>Sales Assistant</td>
                            <td>Sidney</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Angelica</td>
                            <td>Ramos</td>
                            <td>Chief Executive Officer (CEO)</td>
                            <td>London</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Gavin</td>
                            <td>Joyce</td>
                            <td>Developer</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <tr>
                            <td>Jennifer</td>
                            <td>Chang</td>
                            <td>Regional Director</td>
                            <td>Singapore</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal"><i class="fas fa-plus-square"></i></a>    
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal"><i class="fas fa-trash-alt"></i></a></a>
                            </td>
                    </tbody>
                </table>  
            </div>
        </div>


<!-- modal agregar -->
        <div class="modal fade" id="agregarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Agregar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container text-center">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre del producto">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Precio">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descripcion"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Existencias">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Categoria</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                    <option>Comida</option>
                    <option>Tecnologia</option>
                    <option>Amor</option>
                    <option>Navidad</option>
                    <option>Hallowen</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Estado</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                    <option>Existencia</option>
                    <option>Agotado</option>
                    </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Agregar productos</button>
            </div>
            </div>
        </div>
</div>


<!-- modal editar -->
<div class="modal fade" id="editarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Editar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container text-center">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre del producto">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Precio">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descripcion"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Existencias">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Categoria</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                    <option>Comida</option>
                    <option>Tecnologia</option>
                    <option>Amor</option>
                    <option>Navidad</option>
                    <option>Hallowen</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Estado</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                    <option>Existencia</option>
                    <option>Agotado</option>
                    </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Buscar imagen</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="inputGroupFileAddon02">Subir</span>
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

<!-- modal eliminar -->
<div class="modal fade" id="eliminarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
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

<?php
Page::footerTemplate();
?>