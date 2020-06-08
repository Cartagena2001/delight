<?php
require_once('../../core/helpers/templateAdmin.php');
$pagina = new page;
$pagina->headerTemplate('Principal');
?>

<div class="container">
    <div class="row">
        <div class="container col-lg-12">
        <h1 class="display-4">Productos</h1>
    </div>

<div class="container">
    <div class="row">
        <button type="button" class="btn btn-success mt-3" onclick="openCreateModal()">Agregar producto</button>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <table class="table table-hover">
        <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Categoria</th>
            <th>Estado</th>
            <th>Aciones</th>
        </tr>
        </thead>
        <tbody id="table-productos">
        </tbody>
        </table>
    </div>
</div>


<!-- modal agregar -->
        <div class="modal fade" id="productoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <form method="post" id="save-form"  name="save-form" enctype="multipart/form-data">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Agregar producto</h5>
                <input class="invisible" type="text" id="id_producto" name="id_producto"/>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container text-center">
                
                    <div class="form-group">
                        <input id="nombre" name="nombre" type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre del producto" required>
                    </div>
                    <div class="form-group">
                        <input id="precio" name="precio" type="text" class="form-control" id="exampleInputPassword1" placeholder="Precio" required>
                    </div>
                    <div class="form-group">
                        <textarea id="descripcion" name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descripcion" required></textarea>
                    </div>
                    <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input id="archivoProducto" name="archivoProducto" type="file" class="custom-file-input">
                            <label  class="custom-file-label" for="archivoProducto" aria-describedby="archivoProducto">Buscar imagen</label>
                        </div>
                        <!-- <div class="input-group-append">
                            <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                        </div> -->
                    </div>
                    <label for="exampleFormControlSelect1">Categoria</label>
                    <select class="form-control" id="categoriaProducto" name="categoriaProducto">
                    </select>
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Estado</label>
                    <select class="form-control" id="estadoProducto" name="estadoProducto">
                    <option>En existencias</option>
                    <option>Agotado</option>
                    </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Agregar productos</button>
            </div>
            </div>
            </form>
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
                    <!-- <option>Comida</option>
                    <option>Tecnologia</option>
                    <option>Amor</option>
                    <option>Navidad</option>
                    <option>Hallowen</option> -->
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
$pagina->footerTemplate('productos.js');
$pagina->footerTemplate('account.js');
?>